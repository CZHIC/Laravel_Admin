<?php
/**
 * 数据库模型
 * PHP version 7
 *
 * @category Null
 * @package  Null
 * @author   Display NAme <chuzhichao@yiihua.com>
 * @license  www.yiihua.com chuzhchao
 * @link     ##
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Privilledge;
use App\Models\Channel;

/**
 * 数据库模型  role
 *
 * @category Null
 * @package  Null
 * @author   Display NAme <chuzhichao@yiihua.com>
 * @license  www.yiihua.com chuzhchao
 * @link     www.yiihua.com
 */
class Role extends Model
{
    
    protected $table = 'role';
    protected $connection = 'mysql2';
    public $timestamps = false;
    public $primaryKey = 'id'; // orm  使用 ， 不能静态
    public static $userKey = 'id';

    /**
     * 获取角色类型）
     *
     * @return array
     */
    public static function roleType()
    {
        $ret = Role::all();
        if ($ret) {
            $ret = $ret->toArray();
        } else {
            return '';
        }

        $str = "0:未选择;";
        foreach ($ret as $v) {
            $str .= $v['id'].':'.$v['rolename'].';';
        }
        $str = trim(substr($str, 0, -1));
        return $str;
    }


    /**
     * 获取角色权限
     *
     * @param int $id 角色id
     *
     * @return array
     */
    public static function editRolePower($id)
    {
        $ret = Role::where('id', '=', $id)->first();
        if ($ret) {
            $ret = $ret->toArray();
        } else {
            return array();
        }
        $privilledges=explode(',', $ret['privilledges']);
        $priAll =  Privilledge::all()->toArray();
        $buff=array();
        foreach ($priAll as $key => $val) {
            if ($val['pid']==0) {
                $buff[$val['id']]['item_name']=$val['menuName'];
                $buff[$val['id']]['item_id']=$val['id'];
                $buff[$val['id']]['children']=array();
            } else {
                $data=array();
                $data['item_name']=$val['menuName'];
                if ($val['isshow']==1) {
                    $data['item_name']="<span style=\"color:red;\">".$val['menuName']."</span>";
                }
                $data['item_val']=$val['id'];
                $data['item_status']=in_array($val['id'], $privilledges) ? 1: 0;
                $buff[$val['pid']]['children'][]=$data;
            }
        }
        return $buff;
    }

    /**
     * 获取角色权限
     *
     * @return array
     */
    public static function rolePower()
    {
        $ret = Role::all();
        $priAll =  Privilledge::all();
        if (!$ret || !$priAll) {
             return array();
        }
        $ret = $ret->toArray();
        $priAll = $priAll->toArray();
        foreach ($ret as $k => $v) {
            $count = 0;
            $tmpStr = '<span style="color:#3D46E3;">';
            $priArr = explode(',', $v['privilledges']);
            $len = count($priArr);
            foreach ($priAll as $mkey => $pnum) {
                if (in_array($pnum['id'], $priArr)  && $pnum['pid']==0) {
                    $count++;
                    if ($count % 4 == 0) {
                        $tmpStr .= $pnum['menuName'] . '<br>';
                    } else if ($count == $len) {
                        $tmpStr .= $pnum['menuName'];
                    } else {
                        $tmpStr .= $pnum['menuName'] . ' <font color=#CA293F size=3>&bull;</font> ';
                    }
                }
            }
            $tmpStr .= '</span>';
            $tmpStr .= '<button    class = "btn btn-info"  type = "button" onclick = "power('.$v['id'].',\''.$v['rolename'].'\')" > <i class="fa fa-paste"></i>  编辑</button> ' ;

            $all[$v['id']]= $tmpStr;
        }
        unset($priAll);
        return $all;
    }
    /**
     * 获取角色渠道
     *
     * @return array
     */
    public static function roleChannel()
    {
        $ret = Role::all();
        $Channel =  Channel::all();
        if (!$ret || !$Channel) {
             return array();
        }
        $ret = $ret->toArray();
        $Channel = $Channel->toArray();
        foreach ($ret as $k => $v) {
            $count = 0;
            $tmpStr = '<span style="color:#3D46E3;">';

            if (!$v['appids']) {
                 $tmpStr .= '全渠道';
            } else {
                $priArr = explode(',', $v['appids']);
                $len = count($priArr);
                if(!$priArr) $priArr =array();
                foreach ($Channel as $mkey => $pnum) {
                    if (in_array($pnum['id'], $priArr)) {
                        $count++;
                        if ($count % 4 == 0) {
                            $tmpStr .= $pnum['text'] . '<br>';
                        } else if ($count == $len) {
                            $tmpStr .= $pnum['text'];
                        } else {
                            $tmpStr .= $pnum['text'] . ' <font color=#CA293F size=3>&bull;</font> ';
                        }
                    }
                }
            }
            $tmpStr .= '</span>';
            $tmpStr .= '<button    class = "btn btn-info"  type = "button" onclick = "power2('.$v['id'].',\''.$v['rolename'].'\')" > <i class="fa fa-paste"></i>  编辑</button> ' ;
            $all[$v['id']]= $tmpStr;
        }
        return $all;
    }
}
