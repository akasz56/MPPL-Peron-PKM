<?php

namespace App\Http\Controllers;

use App\Helpers\Variables;
use App\Models\Request as RequestModel;
use App\Models\User;
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
        return view('requests.index');
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

        return redirect(route('requests.details', ['id' => $requestModel->id]))->with('successAlert', 'Pengajuan bergabung berhasil dikirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $data = RequestModel::with(['author', 'vacancy'])->findOrFail($id);
        return view('requests.details', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => ['required', 'numeric'],
            'status' => ['required', 'numeric'],
        ]);

        $id = $request->id;
        $model = RequestModel::findOrFail($id);
        $model->fill($request->all());
        $model->save();

        return redirect(route('requests.details', $id))->with('successAlert', 'Status pengajuan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = RequestModel::findOrFail($id);
        if ($model->status > Variables::REQUEST_STATUS_PENDING) {
            return back()->withErrors('Pengajuan tidak bisa dihapus');
        }
        $model->delete();

        return redirect(route('dashboard'))->with('successAlert', 'Pengajuan berhasil dibatalkan');
    }

    public function findMyRequest(Request $request)
    {
        $user_id = $request->query('user');
        $vacancy_id = $request->query('vacancy');

        $data = RequestModel::where('user_id', $user_id)
            ->where('vacancy_id', $vacancy_id)
            ->first();

        return redirect(route('requests.details', $data->id));
    }
}
