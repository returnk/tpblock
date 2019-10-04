<?php
namespace app\index\controller;

class Index extends Base
{
    /*public function index()
    {
        $where = [];
        $catename = null;
        if(input('?id')) {
            $where = [
                'cate_id' => input('id')
            ];
            // 获取标题
            $catename = model('cate')->where('id',input('id'))->value('catename');

        }
        // 文章
        $data = model('article')->where($where)->order('create_time','desc')->paginate(2);
       return view('index@index/index',compact('data','catename'));
    }*/
    // 首页
    public function index()
    {
        // 判断栏目是否存在id
        $where = [];
        if(input('?id')) {
            $where = [
                'cate_id' => input('id'),
            ];
        }
        $where[] = ['title','like','%'.input('keyword').'%'];
        $searchName = input('keyword');
        // 文章列表
        $artData = model('article')->where($where)->order('create_time','desc')->paginate(3);
        return view('index@index/index',compact('artData','searchName'));
        /*$viewData = [
            'searchName' => $searchName,
            'artData' => $artData,
        ];
        $this->assign($viewData);
        return $this->view('index');*/
    }

    // 注册页面
    public function register()
    {
        if(request()->isAjax()) {
            $data = [
                'username' => input('post.username'),
                'password' => input('post.password'),
                'conpass' => input('post.conpass'),
                'email' => input('post.email'),
                'verify' => input('post.verify'),
            ];
            $res = model('member')->register($data);
            if($res == 1) {
                return $this->success('注册成功','index/index/login');
            }else {
                return $this->error($res);
            }
        }
        return view('index@index/register');
    }

    // 登录页面
    public function login()
    {
        if(request()->isAjax()) {
            $data = [
                'verify' => input('post.verify'),
               'username' => input('post.username'),
               'password' => input('post.password'),
            ];
            $res = model('member')->login($data);
            if($res == 1) {
                return $this->success('登录成功','index/index/index');
            }else {
                return $this->error($res);
            }
        }
        return view('index@index/login');
    }
    // 退出
    public function logout()
    {
        session(null);
        return $this->success('退出成功','index/index/index');
    }
    // 文章评论
    public function content()
    {
        $data = [
            'article_id' => input('post.article_id'),
            'member_id' => input('post.member_id'),
            'content' => input('post.content'),
        ];
        $res = model('comment')->comm($data);
        if($res == 1) {
            return $this->success('评论成功');
        }else {
            return $this->error($res);
        }
    }
    // 搜索
    /*public function search()
    {
        $where[] = ['title','like','%'.input('keyword').'%'];
        $articles = model('article')->where($where)->order('create_time','desc')->paginate(2);
        $catename = input('keyword');
        $viewData = [
            'artWord' => $articles,
            'catename' => $catename
        ];
        $this->assign($viewData);
        return view('index@index/index');
    }*/
}
