<?php

use Illuminate\Database\Seeder;

class MapsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $result = \Illuminate\Support\Facades\DB::statement('TRUNCATE maps');
        if (!$result) return '旧数据清理失败';

        // 生成后插入地块组
        $service = new \App\Services\InitService();
        $mapArray = $service->initMap();

        foreach ($mapArray as $item) {
            $result = \App\Map::insert($item);
            if ($result != 1) return '意外错误';
        }
    }
}
