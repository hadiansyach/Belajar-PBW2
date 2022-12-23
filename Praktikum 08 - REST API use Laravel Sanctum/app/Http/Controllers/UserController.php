<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function getUsers(){
        $users = DB::table('users')
        ->select(
            'username',
            'fullname',
            'email',
        )
        ->orderBy('username', 'asc')
        ->get();
        return response()->json($users, 200);
    }
}
