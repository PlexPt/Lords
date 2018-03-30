<?php

namespace App\Http\Controllers;

use App\Services\InitService;
use App\Services\ResourceService;
use App\System;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $resourceService;

    /**
     * HomeController constructor.
     * @param ResourceService $resourceService
     */
    public function __construct(ResourceService $resourceService)
    {
        $this->middleware('auth');
        $this->resourceService = $resourceService;
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
        $this->resourceService->automatic();
        $data = System::where('category', 'country')
            ->orWhere('category', 'religion')
            ->get();

        return $data;
    }
}
