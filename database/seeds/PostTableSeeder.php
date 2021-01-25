<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run(Faker $faker)
     {

         for ($i=0; $i < 100; $i++) {
             $new_post = new Post();
             $new_post->author = $faker->name();
             $new_post->contributor = $faker->name();
             $new_post->title = $faker->sentence();
             $new_post->description = $faker->paragraph();

             $new_post->save();
         }

         // $posts = config('posts');
         //
         // foreach ($posts as $post) {
         //     $new_post = new Post();
         //     $new_post->author = $post['author'];
         //     $new_post->contributor = $post['contributor'];
         //     $new_post->title = $post['title'];
         //     $new_post->description = $post['description'];
         //
         //     $new_post->save();
         // }
     }
}
