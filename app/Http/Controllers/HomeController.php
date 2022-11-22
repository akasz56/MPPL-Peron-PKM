<?php

namespace App\Http\Controllers;

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
            $vacancies = $user
                ->vacancies
                ->sortByDesc('created_at');
            $waitingRequestsToCreator = $this
                ->getWaitingRequestsToCreator($user->id)
                ->sortByDesc('created_at');

            return view('dashboard-creator', compact('user', 'vacancies', 'waitingRequestsToCreator'));
        } else if ($user->isDeveloper()) {
            $requests = $user
                ->requests
                ->sortBy('status');
            $accepted_requests = $user
                ->acceptedRequests()
                ->sortByDesc('updated_at');

            return view('dashboard-developer', compact('user', 'requests', 'accepted_requests'));
        }

        return redirect(route('logout'));
    }
}
