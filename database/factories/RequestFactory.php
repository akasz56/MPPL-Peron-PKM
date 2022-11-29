<?php

namespace Database\Factories;

use App\Helpers\Variables;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $u = User::where('role', Variables::ROLE_DEVELOPER)->get('id')->random();
        $vacancy_count = Vacancy::count();

        return [
            'status' => rand(1, 3),
            'user_id' => $u,
            'vacancy_id' => rand(1, $vacancy_count),
        ];
    }
}
