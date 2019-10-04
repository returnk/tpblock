<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class System extends Base
{
    public function set()
    {
        $data = model('system')->order('create_time', 'desc')->paginate(6);
        return view('admin@system/set', compact('data'));
    }

    // 设置添加
    public function add()
    {
        if (request()->isAjax()) {
            $data           = [
                'id'        => input('post.id'),
                'webname'   => input('post.webname'),
                'copyright' => input('post.copyright'),
            ];
            $res            = model('system');
            $res['webname'] = $data['webname'];
            $res['copyright'] = $data['copyright'];
            $res = $res->save();
            if($res) {
                return $this->success('添加成功','admin/system/set');
            } else {
                return $this->error('添加失败');
            }
        }
        return view('admin@system/add');
    }

    // 删除
    public function del()
    {
        $id = input('id');
        $res = model('system')->find($id);
        $res = $res->delete();
        if($res) {
            return $this->success('删除成功','admin/system/set');
        }else {
            return $this->error('删除失败');
        }
    }
}
