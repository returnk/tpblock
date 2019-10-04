<?php

namespace app\admin\controller;

use think\Controller;

class Base extends Controller
{
    protected function initialize()
    {
        if(!session('?admin.id')) {
            return $this->redirect('admin/index/login');
        }
    }
}
