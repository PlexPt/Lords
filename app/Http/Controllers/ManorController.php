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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ManorController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('manor');
    }

    public function indexData() {
        $data = System::where()
            ->orderBy('id', 'desc')
            ->take(1)
            ->get();

        return $data;
    }

    public function manor() {
        return view('manor');
    }

    public function manorData($xAxis, $yAxis) {
        $data = Manor::where([
            ['userId', Auth::id()],
            ['xAxis', $xAxis],
            ['yAxis', $yAxis]
        ])->get();

        return $data;
    }

    public function building() {
        return view('manor');
    }

    public function buildingData($manorId) {
        $data = Building::where([
            ['userId', Auth::id()],
            ['manorId', $manorId]
        ])->get();

        return $data;
    }

    public function build(Request $request) {
        $manorId = Input::get('manorId');

//        $build = new Building();
//
//        $build->save();
    }
}