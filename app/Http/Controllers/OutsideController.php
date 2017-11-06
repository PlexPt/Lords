<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/29
 * Time: 21:49
 */
namespace App\Http\Controllers;

use App\Building;
use App\Http\Requests\ManorBuildPost;
use App\Manor;
use App\System;
use Illuminate\Support\Facades\Input;

class OutsideController extends Controller {
    public function __construct()
    {
        //
    }

    /**
     * 首页静态
     */
    public function index() {
        return view('index');
    }

    /**
     * 首页数据
     */
    public function indexData(ManorBuildPost $data) {
        $data = System::where()
            ->orderBy('id', 'desc')
            ->take(1)
            ->get();

        return $data;
    }

    /**
     * 请求登录
     */
    public function login() {
        //.
    }

    /**
     * 请求注册
     */
    public function register() {
        //.
    }
}