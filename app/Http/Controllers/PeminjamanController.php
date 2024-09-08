<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $peminjaman = Peminjaman::latest()->paginate(5);
            return view('user.peminjaman.index', compact('peminjaman'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buku = Buku::all();
        $peminjaman = Peminjaman::all();
        return view('user.peminjaman.create',compact('buku','peminjaman'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
        $buku = new buku();
        $buku->jumlah = $request->jumlah;
        $buku->tanggal_pinjam = $request->tanggal_pinjam;
        $buku->nama_peminjam = $request->nama_peminjam;
        $buku->status = $request->status;
        $buku->id_buku= $request->id_buku ;

        $buku = Buku::findOrFail($request ->id_buku);

        if ($buku) {
            $buku->jumlah -= $request->jumlah;
            $buku->save();

            $buku->save();

        return redirect()->route('peminjaman.index');
            
        }else{
                    return redirect()->back()->with('Error', 'Buku tidak ditemukan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {

        $buku = Buku::all();
        $peminjaman = Peminjaman::findOrfail($id);
        return view('user.peminjaman.edit',compact('buku','peminjaman'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        
        $peminjaman = Peminjaman::findOrfail($id);
        $buku = Buku::findOrfail($peminjaman->id_buku);

        $peminjaman ->update($request->all());

        if ($buku->jumlah < $request->jumlah){
        return redirect() ->route('user.peminjaman.index');
            
        }else{
            $buku->jumlah -= $request->jumlah;
            $buku->jumlah += $request->jumlah;
            $buku->save();
        }

        
        if ($buku->status == "Sudah Dikembalikan"){
            $buku->jumlah += $peminjaman->jumlah;
            $buku->save();
                
            }
            $peminjaman->save();
        return redirect() ->route('user.peminjaman.index');
    }

    /** 
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        {
            $peminjaman = $peminjaman::FindOrFail($id);
            $peminjaman->delete();
            return redirect()->route('peminjaman.index')->with('success', 'Data berhasil dihapus');
        }
    }
}
