<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjamens;
use App\Models\penuli;
use App\Models\Kategori;
use App\Models\buku;
use App\Models\penerbit;
use App\Models\user;
use App\Models\komentar;
use Illuminate\Support\Facades\Auth;



class PerpusController extends Controller
{
    public function index()
    {
        $jumlahditerima = Peminjamens::where('status_pengajuan', 'diterima')->count();

        $buku = Buku::all();
        $user = Auth::user();
        $peminjaman = Peminjamens::all();
        return view('user.home',  compact('user', 'peminjaman', 'buku', 'jumlahditerima'));
    }

    public function dashboard()
    {
        $user = auth()->user();
        $jumlahditerima = Peminjamens::where('status_pengajuan', 'diterima')->count();
        $jumlahbuku = Buku::count();
        $jumlahpenerbit = Penerbit::count();
        $jumlahpenulis = Penuli::count();
        $jumlahkategori = Kategori::count();
        $jumlahpinjam = Peminjamens::count();
        $jumlahhistori = Peminjamens::where('nama_peminjam', $user->name)->count();

        $buku = Buku::all();
        $peminjaman = Peminjamens::all();
        $peminjamannotif = Peminjamens::all();
        return view('user.dashboarduser', compact('user','buku', 'jumlahbuku', 'jumlahpenerbit', 'jumlahpenulis', 'jumlahkategori', 'peminjamannotif', 'peminjaman', 'jumlahpinjam', 'jumlahhistori', 'jumlahditerima', 'user'));
    }

    public function listbuku($id = null)
    {
        $jumlahditerima = Peminjamens::where('status_pengajuan', 'diterima')->count();
        $kategori = Kategori::all();
        $buku = $id ? Buku::where('id_kategori', $id)->get() :
        $buku = Buku::all();
        $user = Auth::user();
        $peminjaman = Peminjamens::all();
        return view('user.listbuku',  compact('user', 'peminjaman', 'buku', 'kategori', 'jumlahditerima'));
    }

    public function show($id)
    {
        $jumlahditerima = Peminjamens::where('status_pengajuan', 'diterima')->count();
        $buku = Buku::findOrFail($id);
        $user = User::findOrFail($id);
        $user = Auth::user();
        $peminjaman = Peminjamens::all();
        $komentars = Komentar::with('user')->latest()->get();
        return view('user.show', ['user' => $user], compact('komentars','buku', 'peminjaman', 'user', 'jumlahditerima'));
    }

    public function profile()
    {
        $jumlahditerima = Peminjamens::where('status_pengajuan', 'diterima')->count();
        $user = Auth::user();
        $peminjamannotif = Peminjamens::all();
        return view('user.profile', compact('user', 'peminjamannotif', 'jumlahditerima'));
    }

    public function profilelistbuku($id = null)
    {
        $jumlahditerima = Peminjamens::where('status_pengajuan', 'diterima')->count();
        $kategori = Kategori::all();
        $buku = $id ? Buku::where('id_kategori', $id)->get() :
        $buku = Buku::all();
        $user = Auth::user();
        $peminjamannotif = Peminjamens::all();
        return view('user.profilelistbuku', compact('user','buku', 'peminjamannotif', 'kategori', 'jumlahditerima'));
    }

    public function historiuser()
    {
        $jumlahditerima = Peminjamens::where('status_pengajuan', 'diterima')->count();
        $user = Auth::user();
        $peminjaman = Peminjamens::where('nama_peminjam', $user->name)->get();
        $peminjaman = Peminjamens::all();
        $peminjamannotif = Peminjamens::all();

        return view('user.historiuser', compact('user','peminjaman','peminjamannotif', 'jumlahditerima'));
    }
}
