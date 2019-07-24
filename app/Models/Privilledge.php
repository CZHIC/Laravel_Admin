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
 * 数据库模型  admin
 *
 * @category Null
 * @package  Null
 * @author   Display NAme <chuzhichao@yiihua.com>
 * @license  www.yiihua.com chuzhchao
 * @link     www.yiihua.com
 */
class Privilledge extends Model
{
    
    protected $table = 'privilledge2'; 
    protected $connection = 'mysql2'; 
    public    $timestamps = false;
    public    $primaryKey = 'id'; // orm  使用 ， 不能静态
    public static $userKey = 'id';
}
