<?php
/**
 * Created by PhpStorm.
 * User: uiosun
 * Date: 17-12-23
 * Time: 下午1:18
 */
namespace App\Services;

use App\Map;
use Illuminate\Support\Facades\DB;

class UserService
{
    /**
     * @param $userId
     * @return mixed
     */
    public function nullableMap($userId)
    {
        $model =  Map::find($userId*7);
        if ($model->userId != 0) return '过时的程序还在运行，注册任务无法完成。请向开发组汇报，感谢。';
        $model->userId = $userId;
        $model->save();

        return $model;
    }
}