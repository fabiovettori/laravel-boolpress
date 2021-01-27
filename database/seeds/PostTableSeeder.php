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

         for ($i=0; $i < 10; $i++) {
             $new_post = new Post();
             $new_post->author = $faker->name();
             $new_post->contributor = $faker->name();
             $new_post->topic = $faker->name();
             $new_post->title = 'Titolo test'; //assegno un valore fisso per verificare se funziona il controllo con il while
             $new_post->description = $faker->paragraph();

             //salvo lo slug in una variabile
             $slug = Str::slug($new_post->title, '-');
             $slug_base = $slug;
             // interrogo il db
             $test_slug = Post::where('slug', $slug)->first();
             // ..verifico se il db risponde con un valore non NULL
             $counter = 1;
             // se ottengo un valore non NULL entro nel ciclo (altrimenti NULL = false)
             while ($test_slug) {
                 // se sono entrato nel ciclo devo assegnare allo slug un valore incrementale
                 $slug = $slug_base . '-' . $counter;
                 // e quindi incremento il $counter
                 $counter ++;
                 // rieseguo la query e verifico che questo nome non sia presente (se restituisce NULL esco da ciclo)
                 $test_slug = Post::where('slug', $slug)->first();
             };

             // se sono uscito dal ciclo sono sicuro che quel nome non era stato già assegnato
             $new_post->slug = $slug;
             // ora posso salvare la nuova istanza di classe Post
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
