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

    public function search(Request $request)
    {
        $searchQuery = $request->searchQuery;

        // $all = DB::table('vacancies as v')
        //     ->join('users as u', 'v.user_id', '=', 'u.id')
        //     ->join('faculties as f', 'u.faculty_id', '=', 'f.id')
        //     ->join('departments as d', 'u.department_id', '=', 'd.id')
        //     ->select([
        //         'v.title',
        //         'v.desc',
        //         'v.requirement',
        //         'u.name as creator_name',
        //         'u.email as creator_email',
        //         'u.NIM as creator_NIM',
        //         'f.name as creator_faculty',
        //         'd.name as creator_department',
        //     ])->get();

        $data = Vacancy::with(['author', 'author.faculty', 'author.department'])
            ->where('title', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('desc', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('requirement', 'LIKE', '%' . $searchQuery . '%')
            ->orWhereRelation('author', 'name', 'LIKE', '%' . $searchQuery . '%')
            ->orWhereRelation('author', 'email', 'LIKE', '%' . $searchQuery . '%')
            ->orWhereRelation('author.faculty', 'name', 'LIKE', '%' . $searchQuery . '%')
            ->orWhereRelation('author.department', 'name', 'LIKE', '%' . $searchQuery . '%')
            ->get();

        return view('search-result', compact('data', 'searchQuery'));
    }
}
