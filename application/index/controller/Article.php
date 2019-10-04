<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Article extends Base
{
    public function info()
    {
        $artInfo = model('article')->with('comment,comment.member')->find(input('id'));
        $artInfo->setInc('pv');
        return view('index@article/info',compact('artInfo'));
    }
}
