<?php

namespace App\Http\Controllers\Auth;

use App\Building;
use App\Resource;
use App\Services\UserService;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $userService;

    /**
     * RegisterController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'nickname' => 'required|string|max:16', # Nickname
            'countryId' => 'required|integer|min:0',
            'religionId' => 'required|integer|min:0',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     * @param array $data
     * @return array
     */
    protected function create(array $data)
    {
        DB::beginTransaction();
        try {
            $userModel = User::create([
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'nickname' => $data['nickname'],
                'countryId' => $data['countryId'],
                'religionId' => $data['religionId'],
            ]);

            // 计算下一个空地址，并进行事务赋值（Service），返回MapModel数据。
            $mapModel = $this->userService->nullableMap($userModel->id);
            if (is_string($mapModel)) return ['status' => 201, 'info' => $mapModel];

            $mapArray = \App\Services\InitService::TERRAIN_NAME_AREA;
            $resourceModel = new Resource();
            $resourceModel->mapId = $mapModel->id;
            $resourceModel->userId = $userModel->id;
            $resourceModel->area = $mapArray[$mapModel->terrain];
            $resourceModel->areaVoid = $mapArray[$mapModel->terrain];
            $resourceModel->save();

            $buildModel = new Building();
            $buildModel->mapId = $mapModel->id;
            $buildModel->userId = $userModel->id;
            $buildModel->save();

            if($userModel && $resourceModel->save() && $buildModel->save()) {
                DB::commit();
                return $userModel;
            }
        } catch (\Exception $e) {
            DB::rollBack();
            echo '意外错误(Unexpected error)：User.999';
            exit;
        }
    }
}
