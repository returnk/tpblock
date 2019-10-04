<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Base extends Controller
{
    /*protected function initialize()
{
        // 获取栏目
        $cate = model('cate')->order('sort','asc')->select();
        // 获取网站信息
        $webInfo =model('system')->find();
        // 获取推荐
        $topArticle = model('article')->where('is_top',1)->order('create_time','desc')->limit(10)->select();

        $viewData = [
                'cate'=>$cate,
                'webInfo'=>$webInfo,
                'topArticle' => $topArticle
            ];
            return $this->view->share($viewData);
        }*/
    protected function initialize()
    {
        $cate = model('cate')->order('sort','asc')->select();
        // 是否推荐文章
        $topArt = model('article')->where('is_top',1)->order('create_time','desc')->limit(8)->select();
        // 网站信息
        $webInfo = model('system')->find();
        $viewData = [
            'cate' => $cate,
            'webInfo'=>$webInfo,
            'topArt' => $topArt
        ];
        return $this->view->share($viewData);
    }
}
