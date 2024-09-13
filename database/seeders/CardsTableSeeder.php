<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'title' => 'Programming development',
            'description' => 'Software development is under this',
            'rating' => 5.0,
            'price' => 50.00,
            'gig_id' => 1,
            'images' => json_encode(['images/image1.jpg', 'images/image2.jpg']),
            'videos' => json_encode(['videos/video1']),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        foreach (range(1, 50) as $index) {
            DB::table('cards')->insert($data);
        }
    }
}
