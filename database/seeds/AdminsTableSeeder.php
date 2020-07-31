<?php

use App\Role;
use App\Admin;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    factory(Admin::class, 1)->create([
      'email' => 'admin@news.com',
      'username' => 'admin-news'
    ])->each(function (Admin $admin) {
      $admin->roles()->attach(Role::find(1));
    });
  }
}
