<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Cate extends Base
{
    // 栏目列表
    public function list()
    {
        $data = model('cate')->order(['sort'])->paginate(7);
        return view('admin@cate/list',compact('data'));
    }
    // 栏目添加
    public function add()
    {
        if(request()->isAjax()) {
            $data = [
                'catename' => input('post.catename'),
                'sort' => input('post.sort'),
            ];
            $res = model('cate')->add($data);
            if($res == 1) {
                return $this->success('添加成功', 'admin/cate/list');
            }else {
                return $this->error($res);
            }
        }
        return view('admin@cate/add');
    }
    // 栏目排序
    public function sort()
    {
        $data = [
            'id' => input('post.id'),
            'sort' => input('post.sort'),
        ];
        $res = model('cate')->sort($data);
        if($res == 1) {
            $this->success('排序成功');
        } else {
            return $this->error($res);
        }
    }
    // 栏目修改
    public function edit()
    {
        if(request()->isAjax()){
            $data = [
              'id' => input('post.id'),
              'catename' => input('post.catename'),
            ];
            $res = model('cate')->edit($data);
            if($res == 1) {
                return $this->success('栏目修改成功','admin/cate/list');
            } else {
                return $this->error($res);
            }
        }
        $cateInfo = model('cate')->find(input('id'));
        return view('admin@cate/edit',compact('cateInfo'));
    }
    // 栏目删除
    public function del()
    {
        $cateInfo = model('cate')->with('article,article.comment')->find(input('post.id'));
        foreach ($cateInfo['article'] as $k => $v) {
            $v->together('comment')->delete();
        }
        $res = $cateInfo->together('article')->delete();
        if($res) {
            return $this->success('删除成功','admin/cate/list');
        } else {
            return $this->error('栏目删除失败');
        }
    }
}
