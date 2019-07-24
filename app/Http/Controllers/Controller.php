<?php

namespace App\Http\Controllers;

use App\Models\Privilledge;
use DB;
use App\Models\Admin;
use App\Models\Role;
use App\Models\Channel;
use Session;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\URL;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $Validator;
    protected $Menu;
    protected $Data;
    /**
     * 构造函数
     *
     * @return
     */
    public function __construct()
    {
        $this->Validator = new \App\Libraries\Common\Validator();
        $query = Privilledge::where('id', '>', 0)->orderBy('pid', 'asc');
        $this->Menu=$query->get()->toArray();   // toArray() 将对象转数组
        $data = $this->makeMenu($this->Menu);
        $this->Data['menu']=$data;        // 获取所有的目录
        $role = Role::roleType();
        $this->Data['role']=$role; // 角色信息
        $REQUEST_URI = $_SERVER['REQUEST_URI'];
        $pageSelf = $this->getSelf($data, $REQUEST_URI);
        $this->Data['rl']=$pageSelf[0];
        $this->Data['sl']=$pageSelf[1];
        $this->Data['selfUrl']=$REQUEST_URI;
        $channel = Channel::getSting();
        $this->Data['channel']=$channel;

        // 构造函数里不能直接使用session , 需要使用中间键
        $this->middleware(function ($request, $next) {
                $username = Session::get('username');
                $query =  Admin::where('username', '=', $username)->first();
                $this->Data['admin']=$query;
                return $next($request);
        });
    }


    /**
     * 字符串转译
     *
     * @param string $string 字符串
     *
     * @return string
     */
    public static function escape($string)
    {
        return (PHP_VERSION > '5.3.0' ) ? addslashes(trim($string)) : mysql_escape_string(trim($string));
    }

    /**
     * 转正整数
     *
     * @param int $num 数字
     *
     * @return int
     */
    public static function uint($num)
    {
        return max(0, (int)$num);
    }

    /**
     * 目录处理
     *
     * @param array $data 目录
     *
     * @return int
     */
    public static function makeMenu($data)
    {
        if (!$data) {
            return array();
        }
        $buff = array();
        foreach ($data as $k => $v) {
            if ($v['pid'] == 0) {
                $buff[$v['id']] = $v;
            }
            if ($v['pid'] > 0) {
                $buff[$v['pid']]['child'][] = $v;
            }
        }
        return $buff;
    }

    /**
     * 当前目录
     *
     * @param array  $data 目录数组
     * @param string $uri  当前uri
     *
     * @return int
     */
    public static function getSelf($data, $uri)
    {
        $rl = $sl = '';
        foreach ($data as $v) {
            if (isset($v['child'])) {
                foreach ($v['child'] as $vs) {
                    if ($vs['menuUrl'] == $uri) {
                        $rl = $vs['menuName'];
                        $sl = $v['menuName'];
                    }
                }
            }
        }
        return array($rl , $sl);
    }


    /**
     * 数据库条件符合转换 -- jqGrid插件
     *
     * @param string $str 条件符号
     *
     * @return int
     */
    public static function jqGridsqlChange($str)
    {
        switch ($str) {
        case 'eq':
            return '=';
        case 'ne':
            return '!=';
        case 'lt':
            return '<';
        case 'le':
            return '<=';
        case 'gt':
            return '>';
        case 'ge':
            return '>=';
        default:
            return $str;
        }
    }

    /**
     * 插件jqGrid的查询操作全部走这里
     *
     * @param string $ModelName 空的orm查询模型
     *
     * @return int
     */
    public static function jqGridSearch($ModelName)
    {

        if (isset($_REQUEST['searchField'])) {
            $oper = Controller::jqGridsqlChange($_REQUEST['searchOper']);
            if ($oper == 'in') {
                $search = explode(',', $_REQUEST['searchString']);  // 数据格式 ： 27,34,54
                $ModelName->whereIn($_REQUEST['searchField'], $search);
            } elseif ($oper == 'ni') {
                $search = explode(',', $_REQUEST['searchString']);  // 数据格式 ： 27,34,54
                $ModelName->whereNotIn($_REQUEST['searchField'], $search);
            } else {
                $ModelName->where($_REQUEST['searchField'], $oper, $_REQUEST['searchString']);
            }
        }
        if ($_REQUEST['sidx']) {
            $ModelName->orderby($_REQUEST['sidx'], $_REQUEST['sord']);
        }

        if ($_REQUEST['page']  &&  $_REQUEST['rows']) {
            $ModelName->offset(($_REQUEST['page'] -1) * $_REQUEST['rows'])->limit($_REQUEST['rows']);
        }
        $list = $ModelName->get();
        //  打印sql
        // print_r($ModelName->toSql());
        // echo '<pre>';
        // print_r($ModelName->getBindings());die;
        return  $list;
    }

    /**
     * 上传头像到本地
     *
     * @param string $file 文件内容
     *
     * @return int
     */
    public function uppic($file)
    {
        $PIC_MAX_SIZE = 2097152;
        $PIC_PATH     =  PATH_PUBLIC.'/assets/img/head';

        $filename  =  $file['name'];
        $locallpath  = $PIC_PATH. "/{$filename}";
        $locallpath2 = $PIC_PATH. "/".date("Ymd")."small_{$filename}";
        //文件类型检查
        if ($file['size'] > $PIC_MAX_SIZE) {
            @unlink($file['tmp_name']);
             return array('erro'=>1, 'msg'=>'失败：图片过大！');
        }
        if ($file['size'] < 100) {
            @unlink($file['tmp_name']);
             return array('erro'=>1, 'msg'=>'失败：图片错误！');
        }
        if (!@move_uploaded_file($file['tmp_name'], $locallpath)) {
            @unlink($file['tmp_name']);
            return array('erro'=>2, 'msg'=>'失败：请确认路径是否正确, 是否有写权限!');
        }
        $this->zoomImage($locallpath, 64, 64, $locallpath2);
        return array('erro'=>0, 'msg'=>'上传成功' , 'data'=>"assets/img/head/".date("Ymd")."small_{$filename}");
    }


    /**
     * 上传文件本地
     *
     * @param string $file 文件内容
     *
     * @return int
     */
    public function upfile($file)
    {
        $PIC_MAX_SIZE = 20971520;
        $PIC_PATH     =  PATH_PUBLIC.'/assets/img/files';

        $filename  =  $file['name'];
        $locallpath  = $PIC_PATH. "/{$filename}";
       
        //文件类型检查
        if ($file['size'] > $PIC_MAX_SIZE) {
            @unlink($file['tmp_name']);
             return array('erro'=>1, 'msg'=>'失败：文件过大！');
        }
        if ($file['size'] < 100) {
            @unlink($file['tmp_name']);
             return array('erro'=>1, 'msg'=>'失败：文件错误！');
        }
        if (!@move_uploaded_file($file['tmp_name'], $locallpath)) {
            @unlink($file['tmp_name']);
            return array('erro'=>2, 'msg'=>'失败：请确认路径是否正确, 是否有写权限!');
        }
        return array('erro'=>0, 'msg'=>'上传成功' , 'data'=>$locallpath);
    }



    /**
     * 图片缩放
     * 
     * @param string $imageurl   图片地址
     * @param int    $maxwidth   宽度
     * @param int    $maxheight  高度 
     * @param string $localspath 存放路径
     *
     * @return string
     */
    public  function zoomImage($imageurl, $maxwidth, $maxheight, $localspath)
    {
        $imageInfo = getimagesize($imageurl);
        $imagetype = $imageInfo[2];
        switch ($imagetype) {
        case 1://gif
                $img=imagecreatefromgif($imageurl);
                $filetype = '.gif';
            break;
        case 2://jpeg
                $img=imagecreatefromjpeg($imageurl);
                $filetype = '.jpg';
            break;
        case 3://png
                $img=imagecreatefrompng($imageurl);
                $filetype = '.png';
            break;
        default:
            return false;
        }
        $name = $localspath;
         
        $pic_width = imagesx($img);
        $pic_height = imagesy($img);
        if (($maxwidth && $pic_width > $maxwidth) || ($maxheight && $pic_height > $maxheight)) {
            //原图宽度大于最大宽度
            if ($maxwidth && $pic_width>$maxwidth) {
                $widthratio = $maxwidth/$pic_width;
                $resizewidth_tag = true;
            }
            //原图高度度大于最大高度
            if ($maxheight && $pic_height>$maxheight) {
                $heightratio = $maxheight/$pic_height;
                $resizeheight_tag = true;
            }
            //如果新图片的宽度和高度都比原图小
            if ($resizewidth_tag && $resizeheight_tag) {
                //那个比较小就说明它的长度要长，就取哪条，以长边为准缩放保证图片不被压缩
                $ratio = $widthratio > $heightratio ? $widthratio : $heightratio;
            }
        
            if ($resizewidth_tag && !$resizeheight_tag) {
                $ratio = $widthratio;
            }
            if ($resizeheight_tag && !$resizewidth_tag) {
                $ratio = $heightratio;
            }
    
            $newwidth = $pic_width * $ratio;            //原图的宽度*要缩放的比例
            $newheight = $pic_height * $ratio;          //原图高度*要缩放的比例
            if (function_exists("imagecopyresampled")) {
                $newim = imagecreatetruecolor($newwidth, $newheight);                     //生成一张要生成的黑色背景图 ，比例为计算出来的新图片比例
                imagecopyresampled($newim, $img, 0, 0, 0, 0, $newwidth, $newheight, $pic_width, $pic_height);  //复制按比例缩放的原图到 ，新的黑色背景中。
            } else {
                $newim = imagecreate($newwidth, $newheight);
                imagecopyresized($newim, $img, 0, 0, 0, 0, $newwidth, $newheight, $pic_width, $pic_height);
            }
        } else {
            $newim = $img;
        }
        
        //$name = $name.$filetype;
        switch ($imagetype) {
        case 1:
                imagegif($newim, $name);
            break;
        case 2:
                imagejpeg($newim, $name);
            break;
        case 3:
                imagepng($newim, $name);
            break;
        default:
            return false;
        }
            
        imagejpeg($newim, $name);
        imagedestroy($newim);
    }
}
