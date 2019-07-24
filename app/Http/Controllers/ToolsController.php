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
 * 控制器 -- 小工具
 *
 * @category Null
 * @package  Null
 * @author   Display NAme <chuzhichao@yiihua.com>
 * @license  www.yiihua.com chuzhchao
 * @link     www.yiihua.com
 */
class ToolsController extends Controller
{
    /**
     * 文本编辑器
     *
     * @return array
     */
    public function banji()
    {
        return view("tools/banji")->with('data', $this->Data);
    }

    /**
     * 表单编辑器
     *
     * @return array
     */
    public function build()
    {
        return view("tools/build")->with('data', $this->Data);
    }

    /**
     * 文本markdown
     *
     * @return array
     */
    public function markdown()
    {
        return view("tools/markdown")->with('data', $this->Data);
    }

    /**
     * 文本markdown
     *
     * @return array
     */
    public function uploadfile()
    {
        if ($_FILES['file']) {
             $ret = $this->upfile($_FILES['file']);
             return json_encode($ret);
        }
        return view("tools/uploadFile")->with('data', $this->Data);
    }

    /**
     * 日历
     *
     * @return array
     */
    public function date()
    {
        return view("tools/date")->with('data', $this->Data);
    }


    /**
     * 时间插件
     *
     * @return array
     */
    public function laydate()
    {
        return view("tools/test")->with('data', $this->Data);
    }

    /**
     * 图片展示
     *
     * @return array
     */
    public function image()
    {
        $this->Data['typeid'] = $_REQUEST['type'] ?? 1;
        return view("tools/image")->with('data', $this->Data);
    }

    

}
