<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('koleksi.daftarKoleksi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('koleksi.registrasiKoleksi');
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
            'namaKoleksi'                  =>['required', 'string', 'max:255'],
            'jenisKoleksi'                  =>['required', 'string', 'max:255'],
            'jumlahKoleksi'                  =>['required', 'string', 'max:255'],
        ],
        [
            'namaKoleksi.required'=> 'Judul harus diisi',
            'namaKoleksi.unique'=> 'Judul telah digunakan'
        ]
    );
        

        $collection = Collection::create([
            'namaKoleksi'  => $request->namaKoleksi,
            'jenisKoleksi'  => $request->jenisKoleksi,
            'jumlahKoleksi'  => $request->jumlahKoleksi,
        ]);

        return view('koleksi.daftarKoleksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('koleksi.infoKoleksi');
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
        //
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

    public function getAllCollections()
    {
        $collection = DB::table('collections')
        ->select(
            'id as id',
            'namaKoleksi as judul',

            DB::raw('
            (CASE
                WHEN jenisKoleksi="1" THEN "Buku"
                WHEN jenisKoleksi="2" THEN "Majalah"
                WHEN jenisKoleksi="3" THEN "Cakram Digital"
            END) AS jenis
            '),
            'jumlahKoleksi as jumlah'
        )
        ->orderBy('namaKoleksi', 'asc')
        ->get();

        return DataTables::of($collection)
        ->addColumn('action', function($collection){
            $html = '
            <button data-rowid="" class="btn btn-xs btn-light" data-toggle="tooltip" data-placement="top"
                data-container="body" title="Edit Koleksi" onclick="infoKoleksi('."'".$collection->id."'".')">
                <i class="fa fa-edit"></i>
            ';
            return $html;
        })
        ->make(true);
    }
}
