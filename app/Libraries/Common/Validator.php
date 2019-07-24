<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Libraries\Common;

use Illuminate\Support\Facades\Validator as SystemValidator;

/**
 * Description of Validator
 *
 * @author SZ
 */
class Validator {
    
    public $attributes;
    private $messages;
    
    public function __construct() 
    {
        $this->attributes = [
            'name' => '用户名',
            'password' => '密码',
            'phone' => '手机号码',
            'phoneVerifyCode' => '验证码',
            'oldPassword' => '原密码',
            'newPassword' => '新密码',
            'code' => '编码',
            'parentId' => '父级',
            'verifyCode' => '验证码',
            'categoryId' => '分类',
            'title' => '标题',
            'is_hot' => '热门标记',
            'image_addr' => '图片地址',
            'enable' => '有效标记',
            'content_1' => '正文不能为空',
            'articleId' => '文章'
        ];
        
        $this->messages = [
            "required" => ":attribute不能为空",
            "between" => ":attribute长度必须在:min和:max之间",
            "unique" => ":attribute已经存在",
            'digits' => ":attribute须为6位数字",
            'exists' => ":attribute不存在",
        ];
    }
    
    public function make(Array $data, Array $rule)
    {
        return SystemValidator::make($data, $rule, $this->messages, $this->attributes);
    }
}
