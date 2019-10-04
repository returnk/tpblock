<?php

namespace app\common\model;

use app\common\validate\ComValidate;
use think\Model;
use think\model\concern\SoftDelete;

class Comment extends Model
{
    use SoftDelete;
    //关联文章表
    public function article()
    {
        return $this->belongsTo('article','article_id');
    }
    // 关联会员表
    public function member()
    {
        return $this->belongsTo('member','member_id');
    }

    // 首页评论
    public function comm($data)
    {
        $validate = new ComValidate();
        if(!$validate->scene('comm')->check($data)) {
            return $validate->getError();
        }
        // 插入数据库
        $res = $this->allowField(true)->save($data);
        if($res) {
            return 1;
        }else {
            return '留言失败';
        }
    }
}
