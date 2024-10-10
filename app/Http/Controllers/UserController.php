<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User as Model;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('operator.user_index', [
            'models' => Model::where('akses', '<>', 'user')
            ->latest()
            ->paginate(50)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'model' => new \App\Models\User(),
            'method' => 'POST',
            'route' => 'user.store',
            'button' => 'SIMPAN'
        ];
        return view('operator.user_form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'nohp' => 'required|unique:users,nohp',
            'akses' => 'required|in:operator,admin',
            'password' => 'required'
        ]);
        $requestData['password'] = bcrypt($requestData['password']);
        // $requestData['email_verified_at'] = now(); //jika ingin verifikasi email
        Model::create($requestData);
        flash('Data Berhasil Disimpan');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
        'model' => \App\Models\User::findOrFail($id),
        'method' => 'PUT',
        'route' => ['user.update', $id],
        'button' => 'Update'
    ];

    return view('operator.user_form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' .$id,
            'nohp' => 'required|unique:users,nohp,' .$id,
            'akses' => 'required|in:operator,admin',
            'password' => 'nullable'
        ]);
        $model = Model::findOrFail($id);
        if ($requestData['password'] == ""){
            unset($requestData['password']);
        } else{
            $requestData['password'] = bcrypt($requestData['password']);
        }
        $model->fill($requestData);
        $model->save();
        flash('Data Berhasil Disimpan');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
