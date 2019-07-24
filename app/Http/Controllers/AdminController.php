<?php
/**
 * 控制器 -- 用户登录
 * PHP version 7
 *
 * @category Null
 * @package  Null
 * @author   Display NAme <chuzhichao@yiihua.com>
 * @license  www.yiihua.com chuzhchao
 * @link     ##
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\Admin;
use App\Models\Role;
use App\Models\Privilledge;
use App\Models\Channel;
use App\Models\Contacts;
use App\Libraries\Common\Result;
use App\Libraries\Common\Token;
use DB;


/**
 * 控制器 -- 用户登录
 *
 * @category Null
 * @package  Null
 * @author   Display NAme <chuzhichao@yiihua.com>
 * @license  www.yiihua.com chuzhchao
 * @link     www.yiihua.com
 */
class AdminController extends Controller
{


    /**
     * 默认页面
     *
     * @param array $error 
     *
     * @return array
     */
    public function index($error = null)
    {
        if (Session::get('username')) {
            Session::forget('username');
        }
        return view("login");
    }

    /**
     * 登录页面
     *
     * @param array $error 
     *
     * @return array
     */
    public function login($error = null)
    {
         
        if (Session::get('username')) {
            Session::forget('username');
        }
        return view("login")->with('error', $error);
    }


    /**
     * 登录操作
     *
     * @return array
     */
    public function doLogin()
    {

        $validator = $this->Validator->make(   // 前段输入验证
            $_REQUEST, [
                'username' => 'required|between:5,30',
                'password' => 'required|between:6,16',
            ]
        );
        if ($validator->fails()) {
            return view("login")->with('error', $validator->messages()->first());
        }
        $ret =  Admin::where('username', '=', $this->escape($_REQUEST['username']))
                ->where('password', '=', md5($this->escape($_REQUEST['password'])))
                ->where('status', '=', 0)
                ->first();   
        if ($ret) {
            $ret = $ret->toArray();
            Session::put('username', $ret['username']);
            return redirect("/admin/getList");
        } else {
            return view("login")->with('error', '用户名或密码错误');
        }      
     
    }


    /**
     * 注册页面
     *
     * @param array $error 
     *
     * @return array
     */
    public function register($error = null)
    {
         
        if (Session::get('username')) {
            Session::forget('username');
        }
        return view("register");
    }


    /**
     * 注册页面
     *
     * @param array $error 
     *
     * @return array
     */
    public function doregister($error = null)
    {
        if ($_REQUEST['password1'] != $_REQUEST['password2']) {
             return view("register")->with('error', '两次密码不相同');
        } 
        $admin = new Admin();
        $admin->username = $this->escape($_REQUEST['username']);
        $admin->password = md5($this->escape($_REQUEST['password1']));
        $admin->status   = 2; // 状态2，待审核
        $admin->save();
        return view("login")->with('error', '注册成功，等待审核');
    }


    /**
     * 获取管理员列表
     *
     * @return array
     */
    public function getList()
    {
        if (isset($_REQUEST['act']) && $_REQUEST['act'] ==  'get') {
            $ret =  Admin::where(Admin::$userKey, '>', 0)->orderby('status', 'desc');  // 创建一个空的orm查询模型
            $list = $this->jqGridSearch($ret);
            $list = is_object($list) ? $list->toArray() : array();
            $count = Admin::count();
            $total = ceil($count / $_REQUEST['rows']);
            $return =  ['records'=>$count , 'page'=>$_REQUEST['page'] ,'total'=>$total , 'rows'=>$list]; 
            return json_encode($return);
        }

        if ($_REQUEST['oper'] ==  'add' ||  $_REQUEST['oper'] == 'edit') {
            //插入或更新
            $Privill =  Admin::find($_REQUEST['id']) ??   new Admin();
            $Privill->roleid = $this->uint($_REQUEST['roleid']);
            $Privill->username = $this->escape($_REQUEST['username']);
            $Privill->headimg = $_REQUEST['headimg'];
            $Privill->status = $this->uint($_REQUEST['status']);
            $Privill->save();
            return json_encode(array('code'=>0 , 'msg'=>'保存成功'));       
        }

        if ($_REQUEST['oper'] ==  'del') {
            //删除
            $Privill =  Admin::find($_REQUEST['id']);
            $Privill->delete();
            return json_encode(array('code'=>0 , 'msg'=>'删除成功'));    
        }
        return view('admin/list')->with('data', $this->Data);
    }
    /**
     * 获取角色管理列表
     *
     * @return array
     */
    public function getrole()
    {
        $channel = Role::roleChannel();
        if (isset($_REQUEST['act']) && $_REQUEST['act'] ==  'get') {
            $ret =  Role::where(Role::$userKey, '>', 0);  // 创建一个空的orm查询模型
            $list = $this->jqGridSearch($ret);
            $list = is_object($list) ? $list->toArray() : array();
            $rolePower = Role::rolePower();
            $channel = Role::roleChannel();
            foreach ($list as &$v) {
                $v['privilledges'] =  $rolePower[$v['id']];
                $v['appids'] =  $channel[$v['id']];
            }

            $count = Role::count();
            $total = ceil($count / $_REQUEST['rows']);
            $return =  ['records'=>$count , 'page'=>$_REQUEST['page'] ,'total'=>$total , 'rows'=>$list]; 
            return json_encode($return);
        }

        if ($_REQUEST['oper'] ==  'add' ||  $_REQUEST['oper'] == 'edit') {
            //插入或更新
            $Role =  Role::find($_REQUEST['id']) ??   new Role();
            $Role->rolename = $this->escape($_REQUEST['rolename']);
            $Role->save();
            return json_encode(array('code'=>0 , 'msg'=>'保存成功'));       
        }

        if ($_REQUEST['oper'] ==  'del') {
            //删除
            $Role =  Role::find($_REQUEST['id']);
            $Role->delete();
            return json_encode(array('code'=>0 , 'msg'=>'删除成功'));    
        }


        return view('admin/role')->with('data', $this->Data);
    }
    /**
     * 修改角色权限
     *
     * @return array
     */
    public function editPower() 
    {
        

        if ($_REQUEST['act'] ==  'editRole') {
            $data = Role::editRolePower($_REQUEST['id']);
            $format = array(); //JSON格式转换
            foreach ($data as  $val) {
                    if(count($val['children']) == 0) continue;
                    $keys = range(0, count($val['children']) -1);
                    $val['children'] = array_combine($keys, $val['children']);
                    $format[] = $val;
            }
            return json_encode($format);
        }

        if ($_REQUEST['act'] == 'addRole') { // 更新 / 插入
            $Role =  Role::find($_REQUEST['id']) ??   new Role();
            $Role->rolename = $this->escape($_REQUEST['rolename']);
            $Role->privilledges = $this->escape($_REQUEST['privill']);
            $Role->save();
            return json_encode(array('code'=>0 , 'msg'=>'保存成功'));     
        }
        $this->Data['id'] = $_REQUEST['id'];
        $this->Data['rolename'] = $_REQUEST['name'];
        return view('admin/editPower')->with('data', $this->Data);
    }
    /**
     * 修改角色权限
     *
     * @return array
     */
    public function editAppid() 
    { 
        if ($_REQUEST['act'] == 'addRole') { // 更新 / 插入
            $Role =  Role::find($_REQUEST['id']) ??   new Role();
            $Role->rolename = $this->escape($_REQUEST['rolename']);
            $Role->appids = $_REQUEST['appid'];
            $Role->save();
            return json_encode(array('code'=>0 , 'msg'=>'保存成功'));     
        }
        $channel = Channel::getAll($_REQUEST['id']);
        $this->Data['id'] = $_REQUEST['id'];
        $this->Data['rolename'] = $_REQUEST['name'];
        $this->Data['channel'] = $channel;
        return view('admin/editAppid')->with('data', $this->Data);
    }
    /**
     * 获取菜单管理列表
     *
     * @return array
     */
    public function getprivilledge()
    {
        if (isset($_REQUEST['act']) && $_REQUEST['act'] ==  'get') {
            $ret =  Privilledge::where(Privilledge::$userKey, '>', 0);  // 创建一个空的orm查询模型
            $list = $this->jqGridSearch($ret);
            $list = is_object($list) ? $list->toArray() : array();
            $count = Privilledge::count();
            $total = ceil($count / $_REQUEST['rows']);
            $return =  ['records'=>$count , 'page'=>$_REQUEST['page'] ,'total'=>$total , 'rows'=>$list]; 
            return json_encode($return);
        }
        if ($_REQUEST['oper'] ==  'add' ||  $_REQUEST['oper'] == 'edit') {
            //插入或更新
            $Privill =  Privilledge::find($_REQUEST['id']) ??   new Privilledge();
            $Privill->pid = $this->uint($_REQUEST['pid']);
            $Privill->menuVal = $this->escape($_REQUEST['menuVal']);
            $Privill->menuName = $this->escape($_REQUEST['menuName']);
            $Privill->menuUrl = $_REQUEST['menuUrl'];
            $Privill->sort = $this->uint($_REQUEST['sort']);
            $Privill->save();
            return json_encode(array('code'=>0 , 'msg'=>'保存成功'));       
        }
        if ($_REQUEST['oper'] ==  'del') {
            //删除
            $Privill =  Privilledge::find($_REQUEST['id']);
            $Privill->delete();
            return json_encode(array('code'=>0 , 'msg'=>'删除成功'));    
        }
        return view('admin/privilledge')->with('data', $this->Data);
    }
    /**
     * 渠道列表
     *
     * @return array
     */
    public function getChannel()
    {
        if (isset($_REQUEST['act']) && $_REQUEST['act'] ==  'get') {
            $ret =  Channel::where(Channel::$userKey, '>', 0);  // 创建一个空的orm查询模型
            $list = $this->jqGridSearch($ret);
            $list = is_object($list) ? $list->toArray() : array();
            $count = Channel::count();
            $total = ceil($count / $_REQUEST['rows']);
            $return =  ['records'=>$count , 'page'=>$_REQUEST['page'] ,'total'=>$total , 'rows'=>$list]; 
            return json_encode($return);
        }
        if ($_REQUEST['oper'] ==  'add' ||  $_REQUEST['oper'] == 'edit') {
            //插入或更新
            $Privill =  Channel::find($_REQUEST['id']) ??   new Channel();
            $Privill->text = $this->escape($_REQUEST['text']);
            $Privill->phonetype = $this->uint($_REQUEST['phonetype']);
            $Privill->GameMain = $this->uint($_REQUEST['GameMain']);
            $Privill->save();
            return json_encode(array('code'=>0 , 'msg'=>'保存成功'));       
        }
        if ($_REQUEST['oper'] ==  'del') {
            //删除
            $Privill =  Channel::find($_REQUEST['id']);
            $Privill->delete();
            return json_encode(array('code'=>0 , 'msg'=>'删除成功'));    
        }
        return view('admin/channel')->with('data', $this->Data);
    }

    /**
     * 搜索
     *
     * @return array
     */
    public function searchResults()
    {
        $search = $this->escape($_REQUEST['top-search']);
        $ret = Privilledge::where('menuName', 'like', "%$search%")->where('pid', '!=', 0)->get();
        if ($ret) {
            $ret = $ret->toArray();
        } else {
            $ret = array();
        }
        $this->Data['list'] = $ret;
        $this->Data['count'] = count($ret);
        return view('admin/searchResults')->with('data', $this->Data); 
    }

    /**
     * 联系人
     *
     * @return array
     */
    public function contacts()
    {
        $ret = Contacts::where('id', '>', 0)->orderby('id', 'asc')->limit(10)->get();
        if ($ret) {
            $ret = $ret->toArray();
        } else {
            $ret = array();
        }
        $this->Data['list'] = $ret;
        return view('admin/contacts')->with('data', $this->Data); 
    }

    /**
     * 头像上传
     *
     * @return array
     */
    public function headUpload()
    {
        if ($_FILES['file']) {
             $ret = $this->uppic($_FILES['file']);
             $username = Session::get('username');
             Admin::where('username', '=', $username)->update(['headimg' => $ret['data']]);
             return json_encode($ret);
        }
        return view('admin/headUpload')->with('data', $this->Data); 
    }
}
