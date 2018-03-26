<?php
/**
 * Created by PhpStorm.
 * User: uiosun
 * Date: 17-12-23
 * Time: 下午1:18
 */
namespace App\Services;

class InitService
{
    const TERRAIN_NAME_AREA = [
        'upland' => '100',  // 山地
        'hilly_buffer' => '115',  // 丘陵缓冲带
        'hilly' => '130',  // 丘陵
        'plain_buffer' => '140', // 平原缓冲带
        'marsh' => '130',  // 沼地
        'plain' => '150', // 平原
    ];
    const TERRAIN_AREA = [
        '65',  // 山地
        '80',  // 丘陵缓冲带
        '95',  // 丘陵
        '110', // 平原缓冲带
        '90',  // 沼地
        '130', // 平原
    ];
    const TERRAIN_NAME = [
        'upland',  // 山地
        'hilly_buffer',  // 丘陵缓冲带
        'hilly',  // 丘陵
        'plain_buffer', // 平原缓冲带
        'marsh',  // 沼地
        'plain', // 平原
    ];

    public function __construct($x = 100, $y = 100)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @param int $x_r X轴的最大坐标
     * @param int $y_r Y轴的最大坐标
     * @param int $base 基础地形要求, 0-5
     * @param int $persistence 波动度，当前地形保持下去的可能性，最低持续度发生后按几率触发，0 - 100(0% - 100%)
     * @param float $fluctuate 倍率，0-3
     * @return array
     */
    public function initMap($base = 2, $persistence = 15, $fluctuate = 1.00)
    {
        $this->x -= 1;
        $this->y -= 1;
        $area = [];

        // 'area' => (self::TERRAIN_AREA[$base] * (rand(90, 110) / 100) * $fluctuate)
        for ($x = 0; $x <= $this->x; $x++) {
            for ($y = 0; $y <= $this->y; $y++) {
                $base = rand(0, count(self::TERRAIN_NAME)-1);
                $area[$x][$y] = ['xAxis' => $x+1, 'yAxis' => $y+1, 'terrain' => self::TERRAIN_NAME[$base], 'created_at' => date("Y-m-d H:i:s", time()), 'updated_at' => date("Y-m-d H:i:s", time())];
            }
            //
        }

        return $area;
    }
}