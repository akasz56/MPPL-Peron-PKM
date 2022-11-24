<?php

namespace Database\Factories;

use App\Helpers\Variables;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacancy>
 */
class VacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $u = User::where('role', Variables::ROLE_CREATOR)->get('id')->random();
        $user_id = $u->id;

        return [
            'title' => fake()->words(rand(1, 3), true),
            'desc' => fake()->paragraph(rand(1, 5), true),
            'requirement' => fake()->paragraph(rand(1, 2), true),
            'user_id' => $user_id,
        ];
    }
}
