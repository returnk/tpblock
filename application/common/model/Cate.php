<?php

namespace app\common\model;

use app\common\validate\CateValidate;
use think\Model;
use think\model\concern\SoftDelete;
use think\Validate;

class Cate extends Model
{
    // 软删除
    use SoftDelete;

    // 关联文章表
    public function article()
    {
        return $this->hasMany('article', 'cate_id');
    }

    // 栏目添加
    public function add($data)
    {
        $validate = new CateValidate();
        if (!$validate->scene('add')->check($data)) {
            return $validate->getError();
        }
        // 插入数据
        $res = $this->save($data);
        if ($res) {
            return 1;
        } else {
            return $this->error('添加失败');
        }
    }

    // 栏目排序
    public function sort($data)
    {
        // 验证
        $validate = new CateValidate();
        if (!$validate->scene('sort')->check($data)) {
            return $validate->getError();
        }
        // 插入数据库
        $cateInfo       = $this->find($data['id']);
        $cateInfo->sort = $data['sort'];
        $res            = $cateInfo->save();
        if ($res) {
            return 1;
        } else {
            return $this->error('排序失败');
        }
    }

    // 栏目编辑
    public function edit($data)
    {
        $validata = new CateValidate();
        if (!$validata->scene('edit')->check($data)) {
            return $validata->getError();
        }
        $cateInfo           = $this->find($data['id']);
        $cateInfo->catename = $data['catename'];
        $res                = $cateInfo->save();
        if ($res) {
            return 1;
        } else {
            return $this->error('修改失败');
        }
    }
}
