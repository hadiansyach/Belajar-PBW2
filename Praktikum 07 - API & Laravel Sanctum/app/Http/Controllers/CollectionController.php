<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollectionController extends Controller
{
    public function getCollections(){
    $collections = DB::table('collections')
    ->select(
        'namaKoleksi',
        'jenisKoleksi'
    )
    ->orderBy('namaKoleksi','asc')
    ->get();
    return response()->json($collections,200);    
}
}