<?php

use Illuminate\Database\Seeder;
use App\Category;
use Faker\Generator as Faker;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run(Faker $faker)
     {
         for ($i=0; $i < 5; $i++) {
             $name = new Category();
             $name->name = $faker->word();
             $name->slug = $faker->word();
             $name->save();
         }
     }
}
