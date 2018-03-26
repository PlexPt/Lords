<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $_COOKIE['time'] = 0;

        factory(App\User::class, 30)
            ->create()
            ->each(
                function ($u) {
                    $_COOKIE['time'] = $u->id;
                    $u->resources()->save( factory(App\Resource::class)->make() );
                    $u->buildings()->save( factory(App\Building::class)->make() );
                }
            );
    }
}
