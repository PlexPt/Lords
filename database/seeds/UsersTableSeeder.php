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
        factory(App\User::class, 30)->create()->each(function (\App\User $u) {
            $u->posts()->save(factory(App\Manor::class)->make());
        });
    }
}
