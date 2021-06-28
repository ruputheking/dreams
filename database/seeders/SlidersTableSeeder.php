<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert([
            [
                'title' => "Take the world's best courses, onine.",
                'button1' => 'Read More',
                'url_link1' => '#',
                'details' => "We provides always our best services for our clients and always try to achieve our client's trust and satisfaction.",
                'position' => 'right',
                'photo' => 'bg/bg5.jpg',
                'button2' => null,
                'url_link2' => null
            ],
            [
                'title' => "Take the world's best courses, onine.",
                'button1' => 'Read More',
                'url_link1' => '#',
                'details' => "We provides always our best services for our clients and always try to achieve our client's trust and satisfaction.",
                'position' => 'center',
                'photo' => 'bg/bg2.jpg',
                'button2' => null,
                'url_link2' => null
            ],
            [
                'title' => "Take the world's best courses, onine.",
                'button1' => 'Read More',
                'url_link1' => '#',
                'details' => "We provides always our best services for our clients and always try to achieve our client's trust and satisfaction.",
                'position' => 'left',
                'photo' => 'bg/bg1.jpg',
                'button2' => 'Register Now',
                'url_link2' => '#'
            ]
        ]);
    }
}
