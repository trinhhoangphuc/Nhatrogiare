<?php

use Illuminate\Database\Seeder;

class tinhTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('tinh')->insert([
        	['ten'=>'Sóc Trăng'],
        	['ten'=>'Mỹ Xuyên'],
        	['ten'=>'Vĩnh Long'],
        	['ten'=>'Cần Thơ'],
        	['ten'=>'Trà Vinh'],
        	['ten'=>'Bạc Liêu']
        ]);
    }
}
