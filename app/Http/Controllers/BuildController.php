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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class BuildController extends Controller {
    /**
     * ManorController constructor.
     *
     * Include middleware:
     *  - Auth
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 领地建筑 静态
     */
    public function index() {
        return view('manor');
    }

    /**
     * 领地建筑 数据
     */
    public function indexData($manorId) {
        $data = Building::where([
            ['userId', Auth::id()],
            ['manorId', $manorId]
        ])->get();

        return $data;
    }

    /**
     * 在某个位置，建造某个建筑
     */
    public function build(ManorBuildPost $request) {
        $manorId = Input::get('manorId');
    }

    /**
     * 拆除某个位置的建筑
     */
    public function demolish(ManorBuildPost $request) {
        $manorId = Input::get('manorId');
    }
}