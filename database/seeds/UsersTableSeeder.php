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
            'password'=>bcrypt('728danshi'),
            'bio'=>'森に住んでいます',
            ],
             ['username'=>'うさぎ',
            'mail'=>'usa@co.jp',
            'password'=>bcrypt('728danshi'),
            'bio'=>'来週のレース参戦予定',
            ],
             ['username'=>'たぬき',
            'mail'=>'tanu@co.jp',
            'password'=>bcrypt('728danshi'),
            'bio'=>'火が怖いです',
           ]]);
    }
}
