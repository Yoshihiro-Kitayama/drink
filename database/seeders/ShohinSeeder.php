<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShohinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('shohins')->insert([
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'image_file' => '商品画像',
                'name' => 'コーラ',
                'price' => '130',
                'stocks' => '10',
                'makername' => 'Coka-Cola',
                'comment' => '',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'image_file' => '商品画像',
                'name' => 'お茶',
                'price' => '130',
                'stocks' => '6',
                'makername' => 'サントリー',
                'comment' => '',

            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'image_file' => '商品画像',
                'name' => '水',
                'price' => '110',
                'stocks' => '6',
                'makername' => 'キリン',                'shosai' => '詳細',
                'comment' => '',
            ],

        ]);
    }
}
