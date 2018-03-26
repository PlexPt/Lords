<?php
/**
 * Created by PhpStorm.
 * User: uiosun
 * Date: 17-12-23
 * Time: 上午10:19
 */

class UserRepository
{
    protected $user;

    public function __construct(\App\User $user)
    {
        $this->user = $user;
    }

    public function getAgeThan($age)
    {
        return $this->user
            ->where('age', '>', $age)
            ->orderBy('age')
            ->get();
    }
}