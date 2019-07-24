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
use App\Models\Sregister;
use App\Libraries\Common\Result;
use App\Libraries\Common\Token;
use DB;

/**
 * 控制器 -- 统计数据
 *
 * @category Null
 * @package  Null
 * @author   Display NAme <chuzhichao@yiihua.com>
 * @license  www.yiihua.com chuzhchao
 * @link     www.yiihua.com
 */
class StatController extends Controller
{
    /**
     * 文本编辑器
     *
     * @return array
     */
    public function register()
    {
        if ($_REQUEST['act'] == 'get') {
            $data = Sregister::where('appid', '=', 0)->where('gameid', '=', 0)->get()->toArray();
            return json_encode($data);
        }
        
       
        return view("stat/register")->with('data', $this->Data);
    }
}
