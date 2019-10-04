<?php

namespace app\common\validate;

use think\Validate;

class ArtValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'title|标题' => 'require',
	    'tags|标签' => 'require',
	    'is_top|推荐' => 'require',
	    'cate_id|栏目' => 'require',
        'desc|内容' => 'require',
        'content|内容' => 'require',
    ];

	// 添加场景
	public function sceneAdd()
	{
	    return $this->only(['title','tags','is_top','cate_id','desc','content']);
	}
	// 修改是否推荐场景
    public function sceneTop()
    {
        return $this->only(['is_top']);
    }
    // 修改场景
    public function sceneEdit()
    {
        return $this->only(['title','is_top','tags','cate_id','desc','content']);
    }
}
