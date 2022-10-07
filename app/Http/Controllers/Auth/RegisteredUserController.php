<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Creator;
use App\Models\Department;
use App\Models\Developer;
use App\Models\Faculty;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $faculties = Faculty::all();
        $departments = Department::all();
        return view('auth.register', compact('faculties', 'departments'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'name' => ['required', 'string', 'max:255'],
            'nim' => ['required', 'string', 'max:255'],
            'faculty_id' => ['required'],
            'department_id' => ['required'],
            'role' => ['required', Rule::in(['creator', 'developer'])],
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username,
            'name' => $request->name,
            'NIM' => $request->nim,
            'faculty_id' => $request->faculty_id,
            'department_id' => $request->department_id,
        ]);

        $role = null;
        if ($request->role == "creator") {
            $role = Creator::create(['user_id' => $user->id]);
        } else if ($request->role == "developer") {
            $role = Developer::create(['user_id' => $user->id]);
        } else {
            dd("Detected Error during creating role");
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
