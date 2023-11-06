<?php

namespace Database\Seeders;

use App\Models\DietaryPreference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DietaryPreferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DietaryPreference::factory(8)->create();
    }
}
