<?php
/**
 * Created by PhpStorm.
 * User: uiosun
 * Date: 17-12-23
 * Time: 下午1:18
 */
namespace App\Services;

use App\Building;
use App\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BuildingService
{
    const RECOVERY_RATE = 4; # 4(NeedResource):1(BackResource)

    /**
     * 建造
     * @param $name
     * @param $number
     * @param int $mapId
     * @return bool
     * @version 0.9
     */
    public function build($name, $number, $mapId = 0)
    {
        if (empty($mapId)) return false;
        $userId = Auth::id();

        DB::beginTransaction();
        try {
            // 查询用户资源
            $resourceModel = Resource::where(['userId' => $userId, 'mapId' => $mapId])->first();
            if (empty($resourceModel)) return false;

            $buildingModel = Building::where(['userId' => $userId, 'mapId' => $mapId])->first();
            if (empty($buildingModel)) return false;
            // 确认用户资源足够
            $buildingList = config('building');
            foreach ($buildingList[$name]['resource'] as $key => $value)
                if ($resourceModel->$key < $value * $number) return '消耗型资源数量不足';
            foreach ($buildingList[$name]['occupy'] as $key => $value)
                if ($resourceModel->$key < $value * $number) return '占用型资源数量不足';

            // 削减与占用用户资源
            foreach ($buildingList[$name]['resource'] as $key => $value) {
                $key = $key . 'Has';
                $resourceModel->$key -= $value * $number;
            }
            foreach ($buildingList[$name]['occupy'] as $key => $value) {
                $key = $key . 'Void';
                $resourceModel->$key -= $value * $number;
            }
            // 增加资源的增长额
            foreach ($buildingList[$name]['produce'] as $key => $value) {
                $key = $key . 'Born';
                $resourceModel->$key += $value * $number;
            }
            // 增加建筑数量
            $buildingModel->$name += $number;

            if($resourceModel->save()&&$buildingModel->save()) {
                DB::commit();
                return true;
            }
        } catch (\Exception $e) {
            DB::rollBack();
            echo '意外错误(Unexpected error)：Building.001';
        }

        return true;
    }

    /**
     * 拆除
     * @param $name
     * @param $number
     * @param int $mapId
     * @return bool
     * @version 0.9
     */
    public function demolish($name, $number, $mapId = 0)
    {
        if (empty($mapId)) return false;
        $userId = Auth::id();

        DB::beginTransaction();
        try {
            // 查询建筑数量
            $buildingModel = Building::where(['userId' => $userId, 'mapId' => $mapId])->first();
            if (empty($buildingModel)) return false;

            $resourceModel = Resource::where(['userId' => $userId, 'mapId' => $mapId])->first();
            if (empty($resourceModel)) return false;
            // 确认建筑数量足够
            if ($buildingModel->$name < $number) return '建筑数量不足';
            // 削减建筑数量
            $buildingModel->$name -= $number;

            // 增加用户资源
            $buildingList = config('building');
            foreach ($buildingList[$name]['resource'] as $key => $value) {
                $key = $key . 'Has';
                $resourceModel->$key += ceil($value / self::RECOVERY_RATE * $number);
            }
            // 还原占用的资源
            foreach ($buildingList[$name]['occupy'] as $key => $value) {
                $key = $key .  'Void';
                $resourceModel->$key += $value * $number;
            }
            // 移除对资源的增长
            foreach ($buildingList[$name]['produce'] as $key => $value) {
                $key = $key . 'Born';
                $resourceModel->$key -= $value * $number;
            }

            if($resourceModel->save()&&$buildingModel->save()) {
                DB::commit();
                return true;
            }
        } catch (\Exception $e) {
            DB::rollBack();
            echo '意外错误(Unexpected error)：Building.002';
        }

        return true;
    }
}