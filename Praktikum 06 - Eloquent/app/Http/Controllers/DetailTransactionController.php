<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DetailTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        if ($request->status == 1) {
        } else {
            $affected = DB::table('detail_transactions')
            ->where('id', $request->idDetailTransaksi)
            ->update([
                'status' => $request->status,
                'tanggalKembali' => Carbon::now()->toDateString()
            ]);

            if ($request->status == 2) {
                //kalau dikembalikan
                DB::table('collections')->increment('jumlahSisa');
                DB::table('collections')->decrement('jumlahKeluar');
            } else {
                //kalau hilang
                DB::table('collections')->increment('jumlahSisa');
            }
        }

        
        $transaction = Transaction::where('id', '=', $request->idTransaksi)->first();
        return redirect('transaksiView/'.$request->idTransaksi)->with('transaction', $transaction);
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

    public function detailTransactionKembalikan($detailTransactionId)
    {
        $detailTransaction = DB::table('detail_transactions as dt')
        ->select(
            't.id as idTransaksi',
            'dt.id as idDetailTransaksi',
            'dt.tanggalKembali as tanggalKembali',
            't.tanggalPinjam as tanggalPinjam',
            'dt.status',
            'uPinjam.fullname as namaPeminjam',
            'uTugas.fullname as namaPetugas',
            'c.namaKoleksi as koleksi',
            'uPinjam.id as idPeminjam',
            'uTugas.id as idPetugas'
        )
        ->join('collections as c', 'c.id', '=', 'collectionId')
        ->join('transactions as t', 't.id', '=', 'dt.transactionId')
        ->join('users as uPinjam', 't.userIdPeminjam', '=', 'uPinjam.id')
        ->join('users as uTugas', 't.userIdPetugas', '=', 'uTugas.id')
        ->where('dt.id', '=', $detailTransactionId)->first();

        return view('detailTransaction.detailTransactionKembalikan', compact('detailTransaction'));
    }

    public function getAllDetailTransactions($transactionId)
    {
        $detail_transactions = DB::table('detail_transactions as dt')
        ->select(
            'dt.id',
            'c.namaKoleksi as namaKoleksi',
            'dt.tanggalKembali as tanggalKembali',
            't.tanggalPinjam as tanggalPinjam',
            'dt.status as statusType',
            DB::raw('(CASE WHEN dt.status="1" THEN "Pinjam"
            WHEN dt.status="2" THEN "Kembali"
            WHEN dt.status="3" THEN "Hilang"
            END) as status
            '),
            'c.namaKoleksi as koleksi'
        )
        ->join('collections as c', 'c.id', '=', 'collectionId')
        ->join('transactions as t', 't.id', '=', 'dt.transactionId')
        ->where('transactionId', '=', $transactionId)->get();

        return DataTables::of($detail_transactions)
        ->addColumn('action', function($detail_transaction){
            $html = '';
            if($detail_transaction->statusType == "1"){
                $html = '
                    <a href="'.url('detailTransactionKembalikan')."/".$detail_transaction->id.'">
                    <i class="fas fa-edit"></i>
                    </a>
                ';
            }

            return $html;
        })
        ->make(true);
    }
}
