<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RoleModel;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = RoleModel::get();
        $users = User::with(['role'])->get();

        return view('users.index', [
            'title' => 'Data users',
            'users' => $users,
            'role' => $role

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // menambahkan data
        $customAttributes = [
            'role_id' => 'Role',
            'name' => 'Nama',
            'no_telp' => 'Nomor Telepon',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'img' => 'Foto',
            'email' => 'Email',
            'password' => 'Password',
        ];

        $request->validate([
            'role_id' => 'required|integer',
            'name' => 'max:255',
            'no_telp' => 'integer',
            'jenis_kelamin' => 'max:255|required',
            'alamat' => 'max:255',
            'img' => 'mimes:jpeg,jpg,png,gif,svg|image|required',
            'email' => 'max:255|required',
            'password' => 'max:255|required',
        ], [], $customAttributes);

        $request['password'] = Hash::make($request->password);
        $input = $request->all();

        if ($image = $request->file('img')) {
            $destinationPath = 'assets/img/profile';
            $profileImage = date('YmdHis') . "." . $image->extension();
            $image->move($destinationPath, $profileImage);
            $input['img'] = "$profileImage";
        } else {
            unset($input['img']);
        }

        $user = User::create($input);
        return redirect('/users')->with('success', 'Data Berhasil Ditambahkan!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect('/users')->with('success', 'Data Berhasil Dihapus!');
    }
}
