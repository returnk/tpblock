<?php

namespace app\admin\controller;

use app\common\model\Article;
use app\common\validate\ArtValidate;
use think\Controller;
use think\Db;
use think\Request;

class Articles extends Controller
{
    // 文章首页
    public function list()
    {
        $data = model('article')->with('cate')->order(['is_top' => 'desc', 'create_time' => 'desc'])->paginate(10);
        return view('admin@art/list', compact('data'));
    }

    // 添加
    public function add()
    {
        if (request()->isAjax()) {
            // 获取栏目数据
            $cdata = db('cate')->select();
            $data  = [
                'title'   => input('post.title'),
                'desc'    => input('post.desc'),
                'tags'    => input('post.tags'),
                'is_top'  => input('post.is_top', 0),
                'cate_id' => input('post.cate_id'),
                'content' => input('post.content'),
            ];
            $res   = model('article')->add($data);
            if ($res == 1) {
                return $this->success('添加成功', 'admin/articles/list');
            } else {
                return $this->error($res);
            }
        }
        $cateData = model('cate')->select();
        return view('admin@art/add', compact('cateData'));
    }

    // 修改是否推荐
    public function top()
    {
        $data = [
            'id'     => input('post.id'),
            'is_top' => input('post.is_top') ? 0 : 1, // 有0没有1
        ];
        $res  = model('article')->top($data);
        if ($res == 1) {
            return $this->success('修改成功', 'admin/articles/list');
        } else {
            return $this->error($res);
        }
    }

    // 文章修改
    public function edit()
    {
        if (request()->isAjax()) {
            $data = [
                'id'      => input('post.id'),
                'title'   => input('post.title'),
                'desc'    => input('post.desc'),
                'tags'    => input('post.tags'),
                'is_top'  => input('post.is_top', 0),
                'cate_id' => input('post.cate_id'),
                'content' => input('post.content'),
            ];
            $res  = model('article')->edit($data);
            if ($res == 1) {
                return $this->success('文章编辑成功', 'admin/articles/list');
            } else {
                return $this->error($res);
            }
        }
        $artData  = model('article')->find(input('id'));
        $cateData = model('cate')->select();
        return view('admin@art/edit', compact('artData', 'cateData'));
    }

    // 文章删除
    public function del()
    {
        $art = model('article')->with('comment')->find(input('post.id'));
        $res = $art->together('comment')->delete();
        if ($res) {
            return $this->success('删除成功', 'admin/articles/list');
        } else {
            return $this->error('删除失败');
        }
    }

}
