<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.daftarPengguna');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.registrasiPengguna');
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
            'username'              => ['required', 'string', 'max:255', 'unique:users'],
            'fullname'              => ['required', 'string', 'max:255'],
            'email'                 => ['email'],
            'password'              => ['required', 'confirmed', Rules\Password::defaults()],
            'address'               => ['required', 'string'],
            'birthdate'             => ['required', 'date', 'before:today'],
            'phonenumber'           => ['required']
        ],  
        [
            'username.required'     => 'Username harus diisi',
            'username.unique'       => 'Username telah digunakan',
            'birthdate.before'      => 'Tanggal lahir harus sebelum hari ini'
        ]);

        $user = User::create([
            'username'  => $request->username,
            'fullname'  => $request->fullname,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'address'  => $request->address,
            'birthdate'  => $request->birthdate,
            'phonenumber'  => $request->phonenumber,
        ]);


        return view('user.daftarPengguna');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.infoPengguna', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fullname'     => ['required', 'gt:0'],
            'password'     => ['required', 'gt:0'],
            'phonenumber'     => ['required', 'gt:0']
        ]);
        
        $affected = DB::table('users')
        ->where('id', $request->id)
        ->update([
            'fullname' => $request->fullname,
            'password' => $request->password,
            'phonenumber' => $request->phonenumber,
            'address' => $request->address
        ]);
        return view('user.daftarPengguna');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAllUsers()
    {
        $users = DB::table('users')
        ->select(
            'id as id',
            'fullname as fullname',
            'username as username',
            'email as email',
            'address as address',
            'phonenumber as phonenumber',
            'birthdate as birthdate'
        )
        ->orderBy('fullname', 'asc')
        ->get();

        return DataTables::of($users)
        ->addColumn('action', function($users){
            $html = '
            <a href= "'.url('userView')."/".$users->id.'">
                <i class= "fas fa-edit"></i>
            </a>';
            return $html;
        })
        ->make(true);
    }
}
