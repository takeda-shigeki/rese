<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '太田正一',
            'email' => 'shoichi@nut.com',
            'password' => Hash::make('86218621'),
            'role' => 'admin',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤一郎',
            'email' => 'ichirou@pine.com',
            'password' => Hash::make('11111111'),
            'role' => 'host',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤二郎',
            'email' => 'jirou@pine.com',
            'password' => Hash::make('22222222'),
            'role' => 'host',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤三郎',
            'email' => 'saburou@pine.com',
            'password' => Hash::make('33333333'),
            'role' => 'host',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤四郎',
            'email' => 'shirou@pine.com',
            'password' => Hash::make('44444444'),
            'role' => 'host',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤五郎',
            'email' => 'gorou@pine.com',
            'password' => Hash::make('55555555'),
            'role' => 'host',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤六郎',
            'email' => 'rokurou@pine.com',
            'password' => Hash::make('66666666'),
            'role' => 'host',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤七郎',
            'email' => 'shichirou@pine.com',
            'password' => Hash::make('77777777'),
            'role' => 'host',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤八郎',
            'email' => 'hachirou@pine.com',
            'password' => Hash::make('88888888'),
            'role' => 'host',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤九郎',
            'email' => 'kurou@pine.com',
            'password' => Hash::make('99999999'),
            'role' => 'host',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤十郎',
            'email' => 'jurou@pine.com',
            'password' => Hash::make('000000000'),
            'role' => 'host',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤十一郎',
            'email' => 'juichirou@pine.com',
            'password' => Hash::make('111111111'),
            'role' => 'host',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤十二郎',
            'email' => 'juniirou@pine.com',
            'password' => Hash::make('222222222'),
            'role' => 'host',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤十三郎',
            'email' => 'jusanrou@pine.com',
            'password' => Hash::make('333333333'),
            'role' => 'host',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤十四郎',
            'email' => 'jushirou@pine.com',
            'password' => Hash::make('444444444'),
            'role' => 'host',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤十五郎',
            'email' => 'jugorou@opine.com',
            'password' => Hash::make('555555555'),
            'role' => 'host',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤十六郎',
            'email' => 'jurokurou@pine.com',
            'password' => Hash::make('666666666'),
            'role' => 'host',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤一郎',
            'email' => 'ichirou@cherry.com',
            'password' => Hash::make('11111111'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤二郎',
            'email' => 'jirou@cherry.com',
            'password' => Hash::make('22222222'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤三郎',
            'email' => 'saburou@cherry.com',
            'password' => Hash::make('33333333'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤四郎',
            'email' => 'shirou@cherry.com',
            'password' => Hash::make('44444444'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤五郎',
            'email' => 'gorou@cherry.com',
            'password' => Hash::make('55555555'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤六郎',
            'email' => 'rokurou@cherry.com',
            'password' => Hash::make('66666666'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤七郎',
            'email' => 'shichirou@cherry.com',
            'password' => Hash::make('77777777'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤八郎',
            'email' => 'hachirou@cherry.com',
            'password' => Hash::make('88888888'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤九郎',
            'email' => 'kurou@cherry.com',
            'password' => Hash::make('99999999'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤十郎',
            'email' => 'jurou@cherry.com',
            'password' => Hash::make('000000000'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤十一郎',
            'email' => 'kjuichirou@cherry.com',
            'password' => Hash::make('111111111'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤十二郎',
            'email' => 'kjuniirou@cherry.com',
            'password' => Hash::make('222222222'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤十三郎',
            'email' => 'kjusanrou@cherry.com',
            'password' => Hash::make('333333333'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤十四郎',
            'email' => 'jushirou@cherry.com',
            'password' => Hash::make('444444444'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤十五郎',
            'email' => 'jugorou@cherry.com',
            'password' => Hash::make('555555555'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '加藤十六郎',
            'email' => 'jurokurou@cherry.com',
            'password' => Hash::make('666666666'),
        ];
        DB::table('users')->insert($param);
    }
}
