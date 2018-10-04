<?php

use Illuminate\Database\Seeder;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
            [
              'name' => 'admin',
              'email' => 'admin@gmail.com',
              'password' => bcrypt('123456'),
              'avatar' => 'admin.jpg',
              'phone' => '01668060988',
              'role' => 1
          ],
          [
              'name' => 'Trịnh Hoàng Phúc',
              'email' => 'thphucct@gmail.com',
              'password' => bcrypt('123456'),
              'avatar' => 'phuc.jpg',
              'phone' => '0368060988',
              'role' => 0
          ]
      ]);
    }
}
