<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
  

class PostSeeder extends Seeder
{

    
    /**
     * Run the database seeds.
     */ 
    public function run(Faker $faker): void
    {


// metodo per svuotare la tabella
        // Post::truncate();
        //
        for ($i = 0; $i < 30; $i++){

            $type = Type::inRandomOrder()->first();
        
        $post = new Post();
        $post->title = $faker->sentence(3);
        $post->content = $faker->text(100);
        $post->slug = Str::of($post->title)->slug('-');
        $post->type_id = $type->id;
        $post->save();
        }
    }
}
