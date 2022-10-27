<?php

namespace Database\Factories;

use App\Helpers\Variables;
use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $fs = Faculty::all()->count();
        $f = rand(0, $fs) + 1;
        $ds = Department::where('faculty_id', $f)->get();

        if ($ds->isEmpty()) {
            $f = 7;
            $d = 27;
            $nim = fake()->numerify('G64190-###');
        } else {
            $di = $ds->random();
            $d = $di->id;
            $alphabet = range('A', 'Z');
            $nim = fake()->numerify($alphabet[$f - 1] . '########');
        }

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'NIM' => $nim,
            'role' => rand(0, 1) ? Variables::ROLE_CREATOR : Variables::ROLE_DEVELOPER,
            'faculty_id' => $f,
            'department_id' => $d,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
