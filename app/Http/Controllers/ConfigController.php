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
use App\Models\Role;
use App\Models\Privilledge;
use App\Models\Channel;
use App\Models\Contacts;
use App\Models\Mall;
use App\Libraries\Common\Result;
use App\Libraries\Common\Token;
use DB;


/**
 * 控制器 -- 小工具
 *
 * @category Null
 * @package  Null
 * @author   Display NAme <chuzhichao@yiihua.com>
 * @license  www.yiihua.com chuzhchao
 * @link     www.yiihua.com
 */
class ConfigController extends Controller
{
    /**
     * 商城配置修改
     *
     * @return array
     */
    public function goods()
    {
        if (isset($_REQUEST['act']) && $_REQUEST['act'] ==  'get') {
            $ret =  Mall::where(Mall::$userKey, '>', 0);  // 创建一个空的orm查询模型
            $list = $this->jqGridSearch($ret);
            $list = is_object($list) ? $list->toArray() : array();
            $count = Mall::count();
            $total = ceil($count / $_REQUEST['rows']);
            $return =  ['records'=>$count , 'page'=>$_REQUEST['page'] ,'total'=>$total , 'rows'=>$list]; 
            return json_encode($return);
        }
        if ($_REQUEST['oper'] ==  'add' ||  $_REQUEST['oper'] == 'edit') {
            //插入或更新
            $Privill =  Mall::find($_REQUEST['id']) ??   new Mall();
            $Privill->appid = $this->uint($_REQUEST['appid']);
            $Privill->gname = $this->escape($_REQUEST['gname']);
            $Privill->type = $this->uint($_REQUEST['type']);
            $Privill->num = $this->uint($_REQUEST['num']);
            $Privill->ptype = $this->uint($_REQUEST['ptype']);
            $Privill->price = $_REQUEST['price'];
            $Privill->addtype = $this->uint($_REQUEST['addtype']);
            $Privill->addnum = $this->uint($_REQUEST['addnum']);
            $Privill->status = $this->uint($_REQUEST['status']);
            $Privill->mcard = $this->uint($_REQUEST['mcard']);
            $Privill->siteno = $this->escape($_REQUEST['siteno']);
            $Privill->bestvalue = $this->escape($_REQUEST['bestvalue']);
            $Privill->pic = $this->escape($_REQUEST['pic']);
            $Privill->propid = $this->uint($_REQUEST['propid']);
            $Privill->isdouble = $this->uint($_REQUEST['isdouble']);
            $Privill->save();
            return json_encode(array('code'=>0 , 'msg'=>'保存成功'));       
        }

        if ($_REQUEST['oper'] ==  'del') {
            //删除
            $Privill =  Mall::find($_REQUEST['id']);
            $Privill->delete();
            return json_encode(array('code'=>0 , 'msg'=>'删除成功'));    
        }
        return view("config/goods")->with('data', $this->Data);
    }

  

}
