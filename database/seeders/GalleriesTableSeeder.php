<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class GalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $j = 1;
        for ($i=0; $i < 12; $i++) {
            DB::table('galleries')->insert([
                'folder_id' => rand(1, 5),
                'image' => $j++ . '.jpg',
                'image_name' => 'Dreams Academy of Professional Studies'
            ]);
        }
    }
}
