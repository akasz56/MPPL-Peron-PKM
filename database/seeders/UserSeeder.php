<?php

namespace Database\Seeders;

use App\Helpers\Variables;
use App\Models\Request;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u1 = User::create([
            'email' => "akaasyahnurfath@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make("dimitri321"),
            'name' => "Akaasyah Nurfath",
            'NIM' => "G64190065",
            'role' => Variables::ROLE_CREATOR,
            'faculty_id' => 7,
            'department_id' => 27,
        ]);

        $u2 = User::create([
            'email' => "indo14nurfath@apps.ipb.ac.id",
            'email_verified_at' => now(),
            'password' => Hash::make("dimitri321"),
            'name' => "Akaasyah Nurfath",
            'NIM' => "G64190065",
            'role' => Variables::ROLE_DEVELOPER,
            'faculty_id' => 7,
            'department_id' => 27,
        ]);

        // $v = Vacancy::factory(5, ['user_id' => $u1->id])->create();
        // Request::factory(5, ['vacancy_id' => $v->first()->id])->create();

        // Request::factory(5, ['user_id' => $u2->id])->create();
    }
}
