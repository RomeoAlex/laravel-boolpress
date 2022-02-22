<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
// dopo aver creato il model lo importo per utilizzarlo
use App\Post;
// per slug bisogna importare la funzione di supporto
use Illuminate\Support\Str;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //creo 15  post
        for ($i=0; $i < 15; $i++) { 
            $new_post = new Post();
            $new_post->title = $faker->sentence();
            $new_post->content = $faker->paragraphs(1 , 3 ,true);
            // slug sarà popolato dal titolo del post
            $new_post->slug = Str::slug($new_post->title);
            $new_post->save();
        }
    }
}
