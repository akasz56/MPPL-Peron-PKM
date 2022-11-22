<?php

namespace App\Http\Controllers;

use App\Helpers\Variables;
use App\Models\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function getWaitingRequestsToCreator($creator_id)
    {
        $user = User::findOrFail($creator_id);

        // $all = DB::table('requests as r')
        //     ->join('vacancies as v', 'r.vacancy_id', '=', 'v.id')
        //     ->join('users as u', 'v.user_id', '=', 'u.id')
        //     ->where('r.status', '=', Variables::REQUEST_STATUS_PENDING)
        //     ->where('u.id', '=', $user->id)
        //     ->get(['*']);

        $all = Request::with(['vacancy', 'vacancy.author'])
            ->where('status', '=', Variables::REQUEST_STATUS_PENDING)
            ->whereRelation('vacancy.author', 'id', '=', $user->id)
            ->get(['*']);

        return $all;
    }
}
