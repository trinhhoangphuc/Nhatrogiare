<?php

use Illuminate\Database\Seeder;

class loaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loai')->insert([
            ['ten'=>'Ở Ghép'],
            ['ten'=>'Nhà Nguyên Căn'],
            ['ten'=>'Nhà Trọ'],
        ]);
    }
}
