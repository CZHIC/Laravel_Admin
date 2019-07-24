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
/**
 * 数据库模型  sRegister
 *
 * @category Null
 * @package  Null
 * @author   Display NAme <chuzhichao@yiihua.com>
 * @license  www.yiihua.com chuzhchao
 * @link     www.yiihua.com
 */
class Sregister extends Model
{
    
    protected $table = 'sRegister_2019';
    protected $connection = 'mysql3';
    public $timestamps = false;
    public $primaryKey = 'id'; // orm  使用 ， 不能静态
    public static $userKey = 'appid';
}
