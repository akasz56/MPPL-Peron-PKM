<?php

namespace App\Http\Controllers;

use App\Helpers\Variables;
use App\Models\Faculty;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function index()
    {
        $data = Vacancy::with('author')->get();
        return view('index', compact('data'));
    }

    public function dashboard()
    {
        $user = User::find(Auth::user()->id);

        if ($user->isCreator()) {
            $vacancies = $user->vacancies;
            return view('dashboard-creator', compact('user', 'vacancies'));
        } else if ($user->isDeveloper()) {
            $requests = $user->requests;
            $accepted_requests = $user->requests->where('status', Variables::REQUEST_STATUS_ACCEPTED);
            return view('dashboard-developer', compact('user', 'requests', 'accepted_requests'));
        }
        return redirect(route('logout'));
    }
}
