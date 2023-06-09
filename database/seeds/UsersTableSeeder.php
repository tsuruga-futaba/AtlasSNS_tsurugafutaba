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
        //
        DB::table('users')->insert([
            ['username'=>'くま',
            'mail'=>'kuma@co.jp',
            'password'=>'0010',
            'bio'=>'森に住んでいます',
            'images'=>'.../img/kuma.png',
            ],
             ['username'=>'うさぎ',
            'mail'=>'usa@co.jp',
            'password'=>'0020',
            'bio'=>'来週のレース参戦予定',
            'images'=>'.../img/usagi.png',
            ],
             ['username'=>'たぬき',
            'mail'=>'tanu@co.jp',
            'password'=>'0030',
            'bio'=>'火が怖いです',
            'images'=>'.../img/tanuki.png',
           ]]);
    }
}
