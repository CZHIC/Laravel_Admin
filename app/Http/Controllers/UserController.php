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
class UserController extends Controller
{


    /**
     * 个人信息
     *
     * @param array $error 
     *
     * @return array
     */
    public function info($error = null)
    {
       
        return view("user/info")->with('data', $this->Data);
    }
}
