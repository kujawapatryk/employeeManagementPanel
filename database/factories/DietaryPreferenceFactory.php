<?php

namespace Database\Factories;

use App\Models\DietaryPreference;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DietaryPreference>
 */
class DietaryPreferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = DietaryPreference::class;

    public function definition(): array
    {
        static $preferences = [
            'Wegetariańskie', 'Wegańskie', 'Bezglutenowe',
            'Paleo', 'Low-Carb', 'Bezcukrowe', 'Raw', 'Keto'
        ];
        static $index = 0;

        return [
            'name' => $preferences[$index++ % count($preferences)],
        ];
    }
}
