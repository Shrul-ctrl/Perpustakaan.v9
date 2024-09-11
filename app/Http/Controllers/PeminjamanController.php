<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjamens;
use App\Models\Buku;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { {
            $peminjaman = Peminjamens::orderBy('id', 'desc')->get();
            $user = Auth::user();
            return view('user.peminjaman.index', ['user' => $user], compact('peminjaman'));
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
        $batastanggal = Carbon::now()->addWeek()->format('Y-m-d');
        $sekarang = now()->format('Y-m-d');
        $user = Auth::user();
        return view('user.peminjaman.create', ['user' => $user], compact('buku', 'sekarang', 'batastanggal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //     $request -> validate([
        //         'id_buku' => 'required|unique:Peminjamens,id_buku',
        //         'jumlah_pinjam' => 'required',
        //     ],

        //     [
        //         'id_buku.required' => 'Nama harus diisi',
        //         'id_buku.unique' => 'Buku dengan Judul tersebut sudah dipinjam.',
        //         'jumlah_pinjam.required' => 'jumlah_pinjam harus diisi', 
        //     ]
        // );



        $peminjaman = new Peminjamens();
        $peminjaman->nama_peminjam = $request->nama_peminjam;
        $peminjaman->id_buku = $request->id_buku;
        $peminjaman->jumlah_pinjam = $request->jumlah_pinjam;
        $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $peminjaman->batas_pinjam = $request->batas_pinjam;
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;
        $peminjaman->status = $request->status;
        $peminjaman->save();

        $buku = Buku::findOrFail($request->id_buku);
        if ($buku) {
            if ($buku->jumlah_buku >= $request->jumlah_pinjam) {
                $buku->jumlah_buku -= $request->jumlah_pinjam;
                $buku->save();

                return redirect()->route('peminjaman.index')->with('success', 'Buku Berhasil dipinjam');
            } else {
                return redirect()->back()->withErrors(['jumlah_pinjam' => 'Stok buku terbatas'])->withInput();
            }
        } else {
            return redirect()->back()->withErrors(['jumlah_pinjam' => 'Buku tidak ditemukan'])->withInput();
        }
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
    public function edit(Peminjamens $peminjaman)
    {
        $buku = Buku::all();
        $user = Auth::user();
        return view('user.peminjaman.edit', ['user' => $user], compact('peminjaman', 'buku'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjamens $peminjaman)
    {
        $validated = $request->validate([
            'status' => 'required',
        ]);

        $peminjaman->nama_peminjam = $request->nama_peminjam;
        $peminjaman->id_buku = $request->id_buku;
        $peminjaman->jumlah_pinjam = $request->jumlah_pinjam;
        $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $peminjaman->batas_pinjam = $request->batas_pinjam;
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;
        $peminjaman->status = $request->status;

        if ($validated['status'] === 'Dikembalikan') {
            $buku = Buku::findOrFail($peminjaman->id_buku);
    
            $buku->jumlah_buku += $peminjaman->jumlah;
            $buku->save();
    
            $totalpinjam = Peminjamens::where('nama')->sum('jumlah');
            $totalpinjam -= $peminjaman->jumlah;
    
            if ($totalpinjam < 0) {
                $totalpinjam = 0;
            }
        }

        $peminjaman->save();
        return redirect()->route('peminjaman.index')->with('success', 'Data berhasil diubah');
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
}
