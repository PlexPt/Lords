<?php

namespace App\Http\Controllers;

use App\Services\InitService;
use App\System;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function registerInfo()
    {
        $data = System::where('category', 'country')
            ->orWhere('category', 'religion')
            ->get();

        return $data;
    }
}
