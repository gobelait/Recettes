<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Recipe;
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

    // Cree une recette par défaut

    Recipe::create([
      'author_id' => 1,
      'title' => 'Poulet Basquaise',
      'content' => 'Le poulet basquaise ou poulet à la basquaise est une spécialité culinaire de cuisine traditionnelle emblématique de la cuisine basque, étendue avec le temps à la cuisine française.',
      'ingredients' => 'poulet mijotés,sauce confite de poivrons rouge et vert, tomates, oignons, ail, vin blanc, bouquet garni, piment, huile.',
      'url' => 'https://fr.wikipedia.org/wiki/Poulet_basquaise',
      'tags' => 'Plat de résistance',
      'date' => now(),
      'status' => 'Facile',
      'image'=>'images/20210412145456.jpg',
    ]);

    // Cree 5 faux users
      User::factory(5)->has(\App\Models\Recipe::factory()->count(3))->create();
  }
}
