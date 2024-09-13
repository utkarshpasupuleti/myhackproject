<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed the users table with a test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Call the CategoriesTableSeeder to seed categories, subcategories, and minsubcategories
        $this->call(CategoriesTableSeeder::class);
    }
}
