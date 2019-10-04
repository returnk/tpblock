<?php

namespace app\common\validate;

use think\Validate;

class ComValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'content|评论' => 'require'
    ];

}
