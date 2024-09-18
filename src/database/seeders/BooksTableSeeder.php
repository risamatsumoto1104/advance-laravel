<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'author_id' => '1',
            'title' => '桃太郎'
        ];
        DB::table('books')->insert($param);

        $param = [
            'author_id' => '3',
            'title' => '白雪姫'
        ];
        DB::table('books')->insert($param);

        $param = [
            'author_id' => '3',
            'title' => 'シンデレラ'
        ];
        DB::table('books')->insert($param);

        $param = [
            'author_id' => '3',
            'title' => 'マッチうりの少女'
        ];
        DB::table('books')->insert($param);

        $param = [
            'author_id' => '3',
            'title' => '三匹の子ぶた'
        ];
        DB::table('books')->insert($param);
    }
}
