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

class ArmyController extends Controller {
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
     * 领地军队 静态
     */
    public function index() {
        return view('manor');
    }

    /**
     * 领地军队 数据
     */
    public function indexData($manorId) {
        $data = Building::where([
            ['userId', Auth::id()],
            ['manorId', $manorId]
        ])->get();

        return $data;
    }

    /**
     * 雇佣一定数量的特定军种
     */
    public function employ(Request $request) {
        $manorId = Input::get('manorId');
    }

    /**
     * 解雇一定数量的特定军种
     */
    public function dismiss(Request $request) {
        $manorId = Input::get('manorId');
    }
}