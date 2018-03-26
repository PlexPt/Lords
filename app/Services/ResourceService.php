<?php
/**
 * Created by PhpStorm.
 * User: uiosun
 * Date: 17-12-23
 * Time: 下午1:18
 */
namespace App\Services;

use App\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResourceService
{
    const TIME_RATE = 3; # 3(Game):1(Real)

    /**
     * 资源自增
     * @param int $userId
     * @return bool
     * @version 1.0
     */
    public function automatic($userId = 0)
    {
        if (empty($userId)) $userId = Auth::id();

        DB::beginTransaction();
        try {
            // 查询用户资源
            $resourcesModel = Resource::where(['userId' => $userId])->all();
            if (empty($resourcesModel)) return false;

            // 遍历增长用户资源
            foreach ($resourcesModel as $item) {
                if ($item->updated == time()) continue;
                $timeLength = time() - $item->updated;

                $item->peopleHas = $item->peopleHas + $item->peopleBorn * self::TIME_RATE * $timeLength;
                $item->peopleVoid = $item->peopleVoid + $item->peopleBorn * self::TIME_RATE * $timeLength;
                $item->foodHas = $item->foodHas + $item->foodBorn * self::TIME_RATE * $timeLength;
                $item->moneyHas = $item->moneyHas + $item->moneyBorn * self::TIME_RATE * $timeLength;
                $item->woodHas = $item->woodHas + $item->woodBorn * self::TIME_RATE * $timeLength;

                if(!$item->save()) {
                    $status = false;
                    DB::rollBack();
                    break;
                }
            }
            if ($status) DB::commit();
            return false;
        } catch (\Exception $e) {
            DB::rollBack();
            echo '意外错误(Unexpected error)：Resource.001';
        }

        return true;
    }

    /**
     * 资源操作
     * @param array $resources
     * @param int $mapId
     * @param int $userId
     * @return bool
     * @version 1.0
     */
    public function manual(Array $resources, $mapId = 0, $userId = 0)
    {
        if (empty($mapId)) return false;
        if (empty($userId)) $userId = Auth::id();

        DB::beginTransaction();
        try {
            // 查询用户资源
            $resourceModel = Resource::where(['userId' => $userId, 'mapId' => $mapId])->first();
            if (empty($resourceModel)) return false;

            // 操作用户资源
            $special = ['peopleHas', 'areaHas'];

            foreach ($resources as $key => $value) {
                if (in_array($key, $special)) {
                    $keyVoid = substr($key, -3) . 'Void';
                    $resourceModel->$keyVoid += $value;
                }
                $resourceModel->$key += $value;
            }

            if($resourceModel->save()) {
                DB::commit();
                return true;
            }
        } catch (\Exception $e) {
            DB::rollBack();
            echo '意外错误(Unexpected error)：Resource.002';
        }

        return true;
    }
}