<?php
/**
 * Created by PhpStorm.
 * User: uiosun
 * Date: 17-12-23
 * Time: 上午10:49
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController
{
    protected $userRepository;

    public function __construct()
    {
    }

    public function getUserInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userId' => 'numeric|min:1'
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->all();
            array_unshift($error, 201);
            return $error;
        }
        $id = (empty($request->userId)) ? Auth::id() : $request->userId;
        $userData = DB::select('SELECT email, nickname, gender, countryId, religionId FROM users WHERE id = ?', [$id]);
        $mapData = DB::select('SELECT id, xAxis, yAxis, placename, terrain FROM maps WHERE userId = ?', [$id]);

        return [
            'userInfo' => $userData,
            'mapInfo' => $mapData,
        ];
    }
}