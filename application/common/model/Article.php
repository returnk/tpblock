<?php

namespace app\common\model;

use app\common\validate\ArtValidate;
use think\Model;
use think\model\concern\SoftDelete;

class Article extends Model
{
    use SoftDelete;
    // 文章关联 多对一
    public function cate()
    {
        return $this->belongsTo('cate','cate_id');
    }
    // 关联评论表 一对多
    public function comment()
    {
        return $this->hasMany('comment','article_id');
    }

    // 文章添加
    public function add($data)
    {
        $validate = new ArtValidate();
        if(!$validate->sceneAdd()->check($data)) {
            return $validate->getError();
        }
       $res = $this->allowField(true)->save($data);
        if($res) {
            return 1;
        } else {
            return $this->error('');
        }
    }
    // 修改是否推荐
    public function top($data)
    {
        $validate = new ArtValidate();
        if(!$validate->scene('top')->check($data)) {
            return $validate->getError();
        }
        // 修改数据
        $artInfo = $this->find($data['id']);
        $artInfo->is_top = $data['is_top'];
        $res = $artInfo->save();
        if($res){
            return 1;
        } else {
            return '操作失败';
        }
    }
    // 修改文章
    public function edit($data)
    {
        $validate = new ArtValidate();
        if(!$validate->sceneEdit()->check($data)) {
            return $validate->getError();
        }
        // 先查询后插入
        $res = $this->find($data['id']);
        $res->title = $data['title'];
        $res->tags = $data['tags'];
        $res->cate_id = $data['cate_id'];
        $res->is_top = $data['is_top'];
        $res->desc = $data['desc'];
        $res->content = $data['content'];
        $res = $res->save();
        if($res) {
            return 1;
        }else {
            return '文章修改失败';
        }
    }
}
