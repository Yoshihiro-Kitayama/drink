<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shohin extends Model
{
    use HasFactory;

    protected $fileable = [
        'name',
        'makername',
        'price',
        'stocks',
        'comment',
        'image_file'
    ];

    public function getList() {
        // shohinsテーブルからデータを取得
        $shohins = DB::table('shohins')->get();

        return $shohins;
    }

    public function registShohin($data, $image_path) {
    // 登録処理
        DB::table('shohins')->insert([
            'image_file' => $image_path,
            'name' => $data->name,
            'price' => $data->price,
            'stocks' => $data->stocks,
            'makername' => $data->makername,
            'comment' => $data->comment,
        ]);
    }

    public function SearchList($keyword) {
    
        $shohins=DB::table('shohins')
        ->where('name', 'like', "%$keyword%")->get();

        return $shohins;
    }

}