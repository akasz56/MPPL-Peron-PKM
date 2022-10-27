<?php

namespace App\Http\Controllers;

use App\Helpers\Variables;
use App\Models\Request as RequestModel;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric'
        ]);

        $vacancy = Vacancy::find($request->id);
        if (!$vacancy) {
            return back()->withErrors('Lowongan tidak ditemukan');
        }

        $user = Auth::user();

        $exists = RequestModel::where('user_id', $user->id)
            ->where('vacancy_id', $vacancy->id)
            ->get();

        if ($exists->isNotEmpty()) {
            return back()->withErrors('Pengajuan bergabung sudah pernah dikirim');
    }

        $requestModel = RequestModel::create([
            'status' => Variables::REQUEST_STATUS_PENDING,
            'user_id' => Auth::user()->id,
            'vacancy_id' => $vacancy->id,
        ]);

        return back()->with('successAlert', 'Pengajuan bergabung berhasil dikirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function details(RequestModel $requestModel)
    {
        // $requestObject find
        // return view('requests.details', compact('requestObject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestModel $requestModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestModel $requestModel)
    {
        // $requestObject find
        // if $requestObject count > 0
        // then back withErrors
        // else
        // $requestObject delete

        // return redirect(route('dashboard'));
    }
}
