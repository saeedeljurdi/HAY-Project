<?php

use Illuminate\Database\Seeder;

use App\Admin;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Admin::create([
          'firstname' => 'hayhowareyou',
          'lastname'  => 'fineandyou',
          'email' => 'hayhowareyou@gmail.com',
          'username' => 'hayhowareyou!!!',
          'password' => bcrypt('hayhowareyou!!!')
      ]);
    }
}
