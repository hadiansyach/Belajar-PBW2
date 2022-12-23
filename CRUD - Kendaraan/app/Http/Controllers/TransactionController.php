<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaksi.daftarTransaksi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.peminjaman');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('transaksi.daftarTransaksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('transaksi.daftarPengembalian');
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
        return view('transaksi.daftarTransaksi');
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

    public function getAllTransactions()
    {
        $transactions = DB::table('transactions as t')
        ->select(
            't.id as id',
            'u.name as peminjam',
            'v.name as kendaraan',
            't.startDate as start',
            't.endDate as end',
            't.price as price',
            DB::raw('
                (CASE 
                WHEN t.status="1" THEN "Pinjam" 
                WHEN t.status="2" THEN "Kembali" 
                WHEN t.status="3" THEN "Hilang" 
                END) AS status
                '),
        )
        ->join('users as u', 't.userId', '=', 'u.id')
        ->join('vehicles as v', 't.vehicleId', '=', 'v.id')
        ->orderBy('t.startDate', 'asc')
        ->get();
        
        return DataTables::of($transactions)
        ->addColumn('action', function($transaction){
            $html = '
            <button data-rowid="" class"btn btn-xs btn-light" data-toggle="tooltip" data-placement="top"
            data-container="body" title="Edit Koleksi" onclick="infoKoleksi('."'".$transaction->id."'".')">
            <i class="fa fa-edit"></i>
            
            ';
            return $html;
        })
        ->make(true);
    }
}
