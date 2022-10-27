<?php

namespace Database\Seeders;

use App\Helpers\Variables;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'email' => "akaasyahnurfath@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make("dimitri321"),
            'name' => "Akaasyah Nurfath",
            'NIM' => "G64190065",
            'role' => Variables::ROLE_CREATOR,
            'faculty_id' => 7,
            'department_id' => 27,
        ]);

        User::create([
            'email' => "indo14nurfath@apps.ipb.ac.id",
            'email_verified_at' => now(),
            'password' => Hash::make("dimitri321"),
            'name' => "Akaasyah Nurfath",
            'NIM' => "G64190065",
            'role' => Variables::ROLE_DEVELOPER,
            'faculty_id' => 7,
            'department_id' => 27,
        ]);
    }
}
