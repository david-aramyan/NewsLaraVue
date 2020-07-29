<?php

use Illuminate\Database\Seeder;

class RolesPermissionsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $roles = [
      ['name' => 'admin'],
      ['name' => 'user']
    ];

    factory(\App\Role::class)->createMany($roles);
  }
}
