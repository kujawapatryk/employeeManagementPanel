<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\DietaryPreference;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    protected $model = Employee::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('pl_PL');
        $phoneNumbers = [];

        for ($i = 0; $i < rand(1, 5); $i++) {
            $phoneNumbers[] = $faker->phoneNumber;
        }
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'company_id' => Company::query()->inRandomOrder()->first()?->id ?? Company::factory()->create()->id,
            'phone_numbers' =>  $phoneNumbers,
            'dietary_preference_id' => DietaryPreference::query()->inRandomOrder()->first()?->id ?? DietaryPreference::factory()->create()->id,
        ];
    }
}
