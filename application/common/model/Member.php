<?php

namespace app\common\model;

use app\common\validate\MemberValidate;
use think\Model;
use think\model\concern\SoftDelete;

class Member extends Model
{
    // 软删除
    use SoftDelete;
    // 关联评论表
    public function comment()
    {
        return $this->hasMany('comment','member_id');
    }
    // 只读字段
    protected $readonly = ['username','email'];
    // 添加
    public function add($data)
    {
        $validate = new MemberValidate();
        if(!$validate->sceneAdd()->check($data)) {
            return $validate->getError();
        }
        // 插入数据
        $res = $this->allowField(true)->save($data);
        if($res) {
            return 1;
        } else {
            return '会员添加失败';
        }
    }
    // 修改
    public function edit($data)
    {
        $validate = new MemberValidate();
        if(!$validate->sceneEdit()->check($data)) {
            return $validate->getError();
        }
        // 修改数据
        $memInfo = model('member')->find($data['id']);
        if($data['oldpass'] != $memInfo['password']) {
            return '原密码不正确';
        }
        $memInfo['username'] = $data['username'];
        $memInfo['password'] = $data['password'];
        $memInfo['email'] = $data['email'];
        $res = $memInfo->save();
        if($res) {
            return 1;
        } else {
            return '添加失败';
        }
    }

    // 前台注册 register
    public function register($data)
    {
        $validate = new MemberValidate();
        if(!$validate->scene('register')->check($data)) {
            return $validate->getError();
        }
        // 插入数据库
        $res = $this->allowField(true)->save($data);
        if($res) {
            return 1;
        }else {
            return '注册失败';
        }
    }
    // 登录
    public function login($data)
    {
        $validate = new MemberValidate();
        if(!$validate->scene('login')->check($data)) {
            return $validate->getError();
        }
        // 过滤验证码
        unset($data['verify']);
        // 检查数据
        $res = model('member')->where($data)->find();
        if($res) {
            // 登录成功 将数据保存到session
            $sessionData = [
                'id' => $res['id'],
                'username' =>$res['username']
            ];
            session('index',$sessionData);
            return 1;
        }else {
            return '用户名或密码错误';
        }
    }
}
