<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Run the database seeders.
   *
   * @return void
   */
  public function run()
  {
    \App\Models\User::factory(5)->has(\App\Models\Recipe::factory()->count(3))->create();

      // $this->call([
      //     UserSeeder::class,
      //   //  RecipeSeeder::class,
      //     // CommentSeeder::class,
      //
      // ]);
  }
}
