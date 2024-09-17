<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use App\Models\penuli;
use App\Models\penerbit;
use App\Models\kategori;
use App\Models\Peminjamens;
use Illuminate\Support\Facades\Auth;


class BukuController extends Controller
{

    public function index()
    {
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->count();
        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->count();
        $peminjamannotif = Peminjamens::all();
        $buku = buku::orderBy('id', 'asc')->get();
        $bukus = Buku::all();
        $user = Auth::user();
        return view('admin.buku.index', compact('peminjamannotif', 'user', 'buku', 'bukus', 'jumlahpengajuan', 'jumlahpengembalian'));
    }

    public function create()
    {
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->count();
        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->count();
        $peminjamannotif = Peminjamens::all();
        $penulis = penuli::all();
        $penerbit = penerbit::all();
        $kategori = kategori::all();
        $user = Auth::user();
        return view('admin.buku.create', compact('peminjamannotif', 'user', 'jumlahpengajuan', 'jumlahpengembalian', 'kategori', 'penulis', 'penerbit'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'judul' => 'required|unique:bukus,judul'
            ],

            [
                'judul.required' => 'Nama harus diisi',
                'judul.unique' => 'buku dengan nama tersebut sudah ada sebelumnya.',
            ]
        );


        $buku = new buku();
        $buku->judul = $request->judul;
        $buku->deskripsi = $request->deskripsi;
        $buku->id_penulis = $request->id_penulis;
        $buku->id_penerbit = $request->id_penerbit;
        $buku->id_kategori = $request->id_kategori;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->jumlah_buku = $request->jumlah_buku;

        // update img
        if ($request->hasFile('foto')) {
            $img = $request->file('foto');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/buku', $name);
            $buku->foto = $name;
        }

        $buku->save();

        return redirect()->route('buku.index')->with('success', 'Data berhasil ditambah');
    }

    public function show($id)
    {
        $peminjamannotif = Peminjamens::all();
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->count();
        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->count();
        $buku = Buku::findOrFail($id);
        $user = Auth::user();
        return view('admin.buku.show', compact('peminjamannotif', 'buku', 'jumlahpengajuan', 'jumlahpengembalian', 'user'));
    }

    public function edit(buku $buku)
    {
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->count();
        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->count();
        $peminjamannotif = Peminjamens::all();
        $penulis = penuli::all();
        $penerbit = penerbit::all();
        $kategori = kategori::all();
        $user = Auth::user();
        return view('admin.buku.edit', compact('peminjamannotif', 'user', 'jumlahpengajuan', 'jumlahpengembalian', 'kategori', 'penulis', 'penerbit', 'buku'));
    }

    public function update(Request $request, buku $buku)
    {
        $buku->judul = $request->judul;
        $buku->deskripsi = $request->deskripsi;
        $buku->id_penulis = $request->id_penulis;
        $buku->id_penerbit = $request->id_penerbit;
        $buku->id_kategori = $request->id_kategori;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->jumlah_buku = $request->jumlah_buku;

        // delete img
        if ($request->hasFile('foto')) {
            $img = $request->file('foto');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/buku', $name);
            $buku->foto = $name;
        }

        $buku->save();
        return redirect()->route('buku.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $buku = buku::FindOrFail($id);
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Data berhasil dihapus');
    }
}
