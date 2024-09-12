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
            // $peminjaman = Peminjamens::orderBy('id', 'desc')->get();
            $user = Auth::user();
            $peminjaman = Peminjamens::where('nama_peminjam', $user->name)->get();
            $user = Auth::user();
            return view('user.peminjaman.index', ['user' => $user], compact('peminjaman'));
        }
    }

    public function indexAdmin()
    {
        $peminjaman = Peminjamens::where('status_pengajuan', 'ditahan')->get();
        $user = Auth::user();
        return view('admin.peminjaman.index', ['user' => $user], compact('peminjaman'));
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
        $request->validate(
            [
                'id_buku' => 'required|unique:Peminjamens,id_buku',
                'jumlah_pinjam' => 'required',
            ],

            [
                'id_buku.required' => 'Nama harus diisi',
                'id_buku.unique' => 'Buku dengan Judul tersebut sudah dipinjam.',
            ]
        );

        $buku = Buku::find($request->id_buku);
        if (!$buku) {
            return redirect()->back()->withErrors(['id_buku' => 'Buku tidak ditemukan'])->withInput();
        }

        if ($buku->jumlah_buku < $request->jumlah_pinjam) {
            return redirect()->back()->withErrors(['jumlah_pinjam' => 'Stok buku terbatas'])->withInput();
        }


        $peminjaman = new Peminjamens();
        $peminjaman->nama_peminjam = $request->nama_peminjam;
        $peminjaman->id_buku = $request->id_buku;
        $peminjaman->jumlah_pinjam = $request->jumlah_pinjam;
        $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $peminjaman->batas_pinjam = $request->batas_pinjam;
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;
        $peminjaman->status_pengajuan = 'ditahan';
        $peminjaman->save();

        // Update book stock
        $buku->jumlah_buku -= $request->jumlah_pinjam;
        $buku->save();

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman Buku berhasil dibuat. Tunggu sekitar 10 menit untuk persetujuan dari admin. ');
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
        // $request->validate([
        //     'status_pengajuan' => 'required|in:accepted,rejected',
        // ]);

        $peminjaman->status_pengajuan = $request->status_pengajuan;

        if ($request->status_pengajuan === 'diterima') {
            $buku = Buku::findOrFail($peminjaman->id_buku);
            if ($buku) {
                $buku->jumlah_buku -= $peminjaman->jumlah_pinjam;
                $buku->save();
            }
        } elseif ($request->status_pengajuan === 'ditolak') {
            // Optionally, restore book quantity or notify user
        }

        $peminjaman->save();
        if ($request->has('redirect_to') && $request->redirect_to === 'peminjamanadmin') {
            return redirect()->route('peminjamanadmin')->with('success', 'Status pengajuan berhasil diperbarui');
        } else {
            return redirect()->route('peminjaman.index')->with('success', 'Peminjaman Buku berhasil dikembalikan');
        }
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
