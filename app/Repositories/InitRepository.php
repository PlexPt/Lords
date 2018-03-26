<?php
/**
 * Created by PhpStorm.
 * User: uiosun
 * Date: 17-12-23
 * Time: 上午10:19
 */
namespace App\Repository;

use App\Map;

class InitRepository
{
    protected $user;

    public function __construct(\App\User $user)
    {
        $this->user = $user;
    }

    public function insertMap(Array $data)
    {
        DB::beginTransaction();
        try{
            $result = Map::create($data);
            var_dump($result);exit();
            DB::commit();
        }catch (Exception $e) {
            DB::rollBack();
        }

        return 101;
    }
}