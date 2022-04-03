<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Photo;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'file' => 'photo1.jpg',
                'caption' => 'photo1.jpg',
                'tags' => 'Panorama'
            ],
            [
                'file' => 'photo2.jpg',
                'caption' => 'photo2.jpg',
                'tags' => 'Panorama'
            ],
            [
                'file' => 'photo3.jpg',
                'caption' => 'photo3.jpg',
                'tags' => 'Beach'
            ],
            [
                'file' => 'photo4.jpg',
                'caption' => 'photo4.jpg',
                'tags' => 'Mountain'
            ],
        ];

        foreach ($data as $data){
            Photo::create($data);
        }
    }
}
