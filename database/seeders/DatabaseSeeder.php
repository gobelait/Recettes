<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
  /**
   * Run the database seeders.
   *
   * @return void
   */
  public function run()
  {
    // Cree un administrateur par défaut
    User::create([
      'name' => 'admin',
      'email' => 'admin@admin.com',
      'email_verified_at' => now(),
      'password' => bcrypt('adminadmin'),
      'remember_token' => Str::random(10),
      'is_admin'=>1,
    ]);

    // Cree 5 faux users
      User::factory(5)->has(\App\Models\Recipe::factory()->count(3))->create();
  }
}
