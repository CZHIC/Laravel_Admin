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
class Admin extends Model
{
    
    protected $table = 'admin';
    protected $connection = 'mysql2'; 
    public   $timestamps = false;
    public    $primaryKey = 'id'; // orm  使用 ， 不能静态
    public static $userKey = 'id';
    
    // protected $hidden = [    
    //     'uid', 'roleid', 'username', 'password', 'headimg' , 'status'
    // ];
    
    /**
     * 获取Token （单点登录需要）
     *
     * @param array $name 用户名
     *
     * @return array
     */
    public static function createToken($name) 
    {
        $token = strtoupper(md5(uniqid(mt_rand(), true)));
        
        Admin::where('name', '=', $name)->update(['token'=>$token]);
        
        return $token;
    }
    /**
     * 清除Token （单点登录需要）
     *
     * @param array $token 
     *
     * @return array
     */
    public static function clearToken($token) 
    {
        Admin::where('token', '=', $token)->update(['token'=>'']);
    }
    /**
     * 判断用户是否存在
     *
     * @param array $name 
     *
     * @return array
     */
    public static function hasName($name)
    {
        $count = Admin::where('name', '=', $name)->count();
        
        return $count > 0;
    }
    /**
     * 根据token获取用户信息
     *
     * @param array $token 
     *
     * @return array
     */
    public static function getByToken($token)
    {
        return Admin::where('token', '=', $token)->first();
    }
}
