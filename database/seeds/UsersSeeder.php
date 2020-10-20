<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert($this->getData());
  }

  private function getData(): array
  {
    return [
      [
        'name' => 'admin',
        'email' => 'admin@admin.ru',
        'password' => Hash::make(123),
        'status' => 1,
        'remember_token' => Str::random(10),
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'user',
        'email' => 'user@user.ru',
        'password' => Hash::make(123),
        'status' => 0,
        'remember_token' => Str::random(10),
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'shmuser',
        'email' => 'shmuser@shmuser.ru',
        'password' => Hash::make(123),
        'status' => 0,
        'remember_token' => Str::random(10),
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ];
  }
}
