<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class PicklistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('picklists')->insert([
            [
                'type' => 'Religion',
                'value' => 'Hindu'
            ],
            [
                'type' => 'Religion',
                'value' => 'Christian'
            ],
            [
                'type' => 'Religion',
                'value' => 'Muslim'
            ]
        ]);
    }
}
