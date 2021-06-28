<?php

namespace Database\Seeders;

use DB;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->delete();

        $php = new Tag();
        $php->title = "Travel";
        $php->slug = "travel";
        $php->save();

        $laravel = new Tag();
        $laravel->title = "Blog";
        $laravel->slug = "blog";
        $laravel->save();

        $symphony = new Tag();
        $symphony->title = "Life Style";
        $symphony->slug = 'life-style';
        $symphony->save();

        $vue = new Tag();
        $vue->title = "Journey";
        $vue->slug = "journey";
        $vue->save();

        $tags = [
            $php->id,
            $laravel->id,
            $symphony->id,
            $vue->id
        ];

        foreach (Post::all() as $post)
        {
            shuffle($tags);

            for ($i = 0; $i < rand(0, count($tags)-1); $i++)
            {
                $post->tags()->detach($tags[$i]);
                $post->tags()->attach($tags[$i]);
            }
        }
    }
}
