<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/29
 * Time: 21:49
 */
namespace App\Http\Controllers;

use App\Building;
use App\Manor;
use App\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class MappingController extends Controller {
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
     * 地图 静态
     */
    public function index() {
        return view('manor');
    }

    /**
     * 地图 数据
     */
    public function indexData($manorId) {
        $data = Building::where([
            ['userId', Auth::id()],
            ['manorId', $manorId]
        ])->get();

        return $data;
    }

    /**
     * 入侵某块领地
     */
    public function assault(Request $request) {
        $manorId = Input::get('manorId');
    }

    /**
     * 支援某块领地
     */
    public function support(Request $request) {
        $manorId = Input::get('manorId');
    }
}