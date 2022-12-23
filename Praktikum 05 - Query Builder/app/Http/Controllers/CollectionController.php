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
            'namaKoleksi.required'=> 'Nama koleksi harus diisi',
            'namaKoleksi.unique'=> 'Nama koleksi telah digunakan'
        ]
    );
        
        $collection = [
            'namaKoleksi' => $request->namaKoleksi,
            'jenisKoleksi' => $request->jenisKoleksi,
            'jumlahKoleksi' => $request->jumlahKoleksi,
            'jumlahSisa' => $request->jumlahKoleksi,
            'jumlahKeluar' => 0 
        ];
        DB::table('collections')->insert($collection);
        return view('koleksi.daftarKoleksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        return view('koleksi.infoKoleksi', compact('collection'));
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
    public function update(Request $request)
    {
        $request->validate([
            'jenisKoleksi'     => ['required', 'gt:0'],
            'jumlahSisa'     => ['required', 'gt:0']
        ]);
        
        $affected = DB::table('collections')
        ->where('id', $request->id)
        ->update([
            'jenisKoleksi' => $request->jenisKoleksi,
            'jumlahSisa' => $request->jumlahSisa,
            'jumlahKeluar' => $request->jumlahKeluar
        ]);
        return view('koleksi.daftarKoleksi');
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
            <a href= "'.url('koleksiView')."/".$collection->id.'">
                <i class= "fas fa-edit"></i>
            </a>';
            return $html;
        })
        ->make(true);
    }
}
