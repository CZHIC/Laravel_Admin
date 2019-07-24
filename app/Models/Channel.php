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
use App\Models\Role;

/**
 * 数据库模型  channel
 *
 * @category Null
 * @package  Null
 * @author   Display NAme <chuzhichao@yiihua.com>
 * @license  www.yiihua.com chuzhchao
 * @link     www.yiihua.com
 */
class Channel extends Model
{
    
    protected $table = 'channel';
    protected $connection = 'mysql2';
    public $timestamps = false;
    public $primaryKey = 'id'; // orm  使用 ， 不能静态
    public static $userKey = 'id';

    /**
     * 获取处理后的所有渠道
     *
     * @param array $id 角色ID
     *
     * @return array
     */
    public static function getAll($id)
    {
        $ret = Role::where('id', '=', $id)->first();
        $channelCfg= Channel::all();
        if ($ret  &&  $channelCfg) {
            $ret = $ret->toArray();
            $channelCfg = $channelCfg->toArray();
        } else {
            return array();
        }
        $appids=explode(",", $ret['appids']);
        foreach ($channelCfg as $key => &$val) {
            $val['status']=0;
            if (in_array($val['id'], $appids)) {
                $val['status']=1;
            }
        }
        $buff=array();
        foreach ($channelCfg as $key=>$val) {
            $gameid=explode(',', $val['GameMain']);
            foreach ($gameid as $vs) {
                if(!$vs) continue;
                $buff[$vs][$val['phonetype']][]=$val;
            }
        }
        return $buff;
    }

    /**
     * 获取处理后的所有渠道 --jqGird选择框
     *
     * @return array
     */
    public static function getSting()
    {
        $channelCfg= Channel::all()->toArray();
        $str = '';
        foreach ($channelCfg as $v) {
            $str .= $v['id'].":".$v['text'].";";
        }
        $str = substr($str, 0, -1);
        return $str;
    }
}
