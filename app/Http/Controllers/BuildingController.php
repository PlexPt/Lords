<?php

namespace App\Http\Controllers;

use App\Map;
use App\Services\BuildingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BuildingController extends Controller
{
    protected $buildingService;

    /**
     * HomeController constructor.
     */
    public function __construct(BuildingService $buildingService)
    {
        $this->middleware('auth');
        $this->buildingService = $buildingService;
    }

    public function buildingList()
    {
        return config('building');
    }

    public function detail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mapId' => 'required|numeric|min:1'
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->all();
            array_unshift($error, 201);
            return $error;
        }
        $check = DB::select('SELECT COUNT(*) FROM maps WHERE id = ? AND userId = ?', [$request->mapId, Auth::id()]);

        if (json_decode(json_encode($check[0]), TRUE)['COUNT(*)'] >= 1) {
            $userData = DB::select('SELECT * FROM buildings WHERE id = ?', [Auth::id(), $request->mapId]);
            $mapData = DB::select('SELECT * FROM resources WHERE userId = ?', [Auth::id(), $request->mapId]);
        } else return [202, '该领地不属于领主。'];

        return [
            'userInfo' => $userData,
            'mapInfo' => $mapData,
        ];
    }

    /**
     * @param Request $request
     * @return $this|int
     */
    public function build(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:1|max:255',
            'number' => 'required|numeric|min:1',
            'mapId' => 'required|numeric|min:1'
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->all();
            array_unshift($error, 201);
            return $error;
        }

        $result = $this->buildingService->build($request->name, $request->number, $request->mapId);

        if ($result && !is_string($result)) return 101;
        else return $result;
    }

    /**
     * @param Request $request
     * @return bool|int
     */
    public function demolish(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:1|max:255',
            'number' => 'required|numeric|min:1',
            'mapId' => 'required|numeric|min:1'
        ]);
        $validator->setAttributeNames([
            'name' => '建筑名称',
            'number' => '建造数',
            'mapId' => '地图Id参数错误',
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->all();
            array_unshift($error, 201);
            return $error;
        }

        $result = $this->buildingService->demolish($request->name, $request->number, $request->mapId);

        if ($result && !is_string($result)) return 101;
        else return $result;
    }
}
