<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate();

        return view('operator.user_index', compact('users'));
        // return view('operator.user_index', [
        //     'models' => Model::where('akses', '<>', 'user')
        //     ->latest()
        //     ->paginate(50)
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = new User();
        $route = 'user.store';
        $id = null;
        $method = null;

        // $data = [
        //     'model' => new \App\Models\User(),
        //     'method' => 'POST',
        //     'route' => 'user.store',
        //     'button' => 'SIMPAN'
        // ];
        return view('operator.user_form', compact('user','route', 'id', 'method'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'nohp' => 'required|unique:users',
            'akses' => 'required|in:operator,admin',
            'password' => 'required'
        ]);

        $requestData['password'] = bcrypt($requestData['password']);

        User::create($requestData);

        flash('Data User Berhasil Disimpan');

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    // public function show(User $user)
    // {
    //     return view()
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $route = 'user.update';
        $id = $user->id;
        $method = 'PUT';

        return view('operator.user_form', compact('user', 'id', 'route','method'));
        // $data = [
        //     'model' => \App\Models\User::findOrFail($id),
        //     'method' => 'PUT',
        //     'route' => 'user.update', $id,
        //     'button' => 'Update'
        // ];
        // return view('operator.user_form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $requestData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'nohp' => 'required|unique:users,nohp,' . $user->id,
            'akses' => 'required|in:operator,admin',
            'password' => 'nullable'
        ]);

        if ($requestData['password'] == ""){
            unset($requestData['password']);
        } else{
            $requestData['password'] = bcrypt($requestData['password']);
        }

        $user->update($requestData);
        
        flash('Data User Berhasil Diubah');
        
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        flash('Data User Berhasil Dihapus');

        return redirect()->route('user.index');
    }
}
