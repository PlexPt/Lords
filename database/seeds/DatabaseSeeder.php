<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(SystemsTableSeeder::class);
        $this->call(MapsTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        $data = [
            [
                'category' => 'country',
                'key' => '1',
                'value' => '苍鹭王朝',
                'tips' => '历史上首个大一统国家，起源于极北之域，后将首都搬迁至大陆南方后，日益腐败。因大规模民众叛乱，痛失了西南领土。',
            ],
            [
                'category' => 'country',
                'key' => '2',
                'value' => '迪西米帝国',
                'tips' => '世界上最强国之一，脱胎于苍鹭王朝的西南领土，拥有温和大气的民风与规模庞大的步兵军团。',
            ],
            [
                'category' => 'country',
                'key' => '3',
                'value' => '青璐公国同盟',
                'tips' => '同盟汇聚了四个王国的实力，对外一致，对内协商是立盟口号。具备长期的民主与自由风气。',
            ],
            [
                'category' => 'religion',
                'key' => '1',
                'value' => '刺裂光辉',
                'tips' => '苍鹭王朝领导下的特别宗教组织，近年来因为允许中产民众与外国人加入，内部产生了诸多分歧。',
            ],
            [
                'category' => 'religion',
                'key' => '2',
                'value' => '波西米亚圣教',
                'tips' => '本是迪西米帝国的立国宗教，但因为教义分歧，圣教内部分裂为鹰鸽两派，弱势的鹰派被逐出，前往青璐公国传教。',
            ],
        ];

        DB::table('systems')->insert($data);
    }
}
