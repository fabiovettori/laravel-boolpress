<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 5; $i++) {
            $tag = new Tag();
            $tag->name = $faker->words(3, true);

            // genero lo slug associato al nome
            $slug = Str::slug($tag->name, '-');
            $slug_base = $slug;

            // verifico che lo slug generato non sia già presente (deve essere univoco) interrogando il debug
            $test = Tag::where('slug', $slug)->first();
            $counter = 1;
            while ($test) { //se entro nel ciclo vuol dire che lo slug generato era già presente
                $slug = $slug_base . '-' . $counter; //genero un nuovo slug concatenando una stringa ad un contatore
                // interrogo nuovamente il db perchè devo comunque verificare che il nuovo slug generato non sia presente e ripetere il ciclo (se rientro vuol dire che ne ho trovato uno)
                $test = Tag::where('slug', $slug)->first();
                // incremento il contatore che mi servirà per generare un nuovo slug qualora rientrassi nel ocicloselo
                $counter++;
            };

            // se esco dal ciclo posso dire di aver generato uno slug univoco e posso salvarlo
            $tag->slug = $slug;
            $tag->save();
        }
    }
}
