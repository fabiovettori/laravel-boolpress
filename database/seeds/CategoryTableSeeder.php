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
             $category = new Category();
             $category->name = $faker->words(2, true);

             // genero lo slug dal nome generato
             $slug = Str::slug($category->name, '-');
             $slug_base = $slug;

             // interrogo il db per verificare se lo slug è già presente
             $test = Category::where('slug', $slug)->first();

             $counter = 1;
             while($test){ //se restituisce true non entro nel ciclo

                // se lo slug è già presente allora lo modifico
                $slug = $slug_base . '-' . $counter;

                // reinterrogo il db per verificare se lo slug generato è già presente
                $test = Category::where('slug', $slug)->find();
                $counter ++;
             };

             // uscito dal ciclo sono sicuro che lo slug generato non è presente e lo posso salvare
             $category->slug = $slug;
             $category->save();
         }
     }
}
