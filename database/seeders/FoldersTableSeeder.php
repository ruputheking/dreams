<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class FoldersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('folders')->insert([
            [
                'title' => 'Others',
                'slug' => 'others'
            ]
        ]);
    }
}
