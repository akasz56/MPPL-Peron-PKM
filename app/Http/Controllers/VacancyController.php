<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vacancies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vacancies.create');
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
            'title' => ['required', 'string'],
            'desc' => ['required', 'string'],
            'requirement' => ['required', 'string'],
        ]);

        $vacancy = Vacancy::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'requirement' => $request->requirement,
            'user_id' => Auth::user()->id,
        ]);

        return redirect(route('vacancies.details', $vacancy->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $vacancy = Vacancy::with('author')->findOrFail($id);
        return view('vacancies.details', compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        return view('vacancies.edit', compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => ['required', 'numeric'],
            'title' => ['required', 'string'],
            'desc' => ['required', 'string'],
            'requirement' => ['required', 'string'],
        ]);

        $id = $request->id;
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->title = $request->title;
        $vacancy->desc = $request->desc;
        $vacancy->requirement = $request->requirement;
        $vacancy->save();

        return redirect(route('vacancies.details', $id))->with('successAlert', 'Lowongan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Vacancy::findOrFail($id);
        if (count($model->requests) > 0) {
            return back()->withErrors('Lowongan tidak bisa dihapus karena sudah terdapat pengajuan bergabung');
        }
        $model->delete();

        return redirect(route('dashboard'));
    }
}
