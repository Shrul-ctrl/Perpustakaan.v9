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

        $buku = Buku::all();
        $user = Auth::user();
        $peminjaman = Peminjamens::all();
        return view('user.home',  compact('user', 'peminjaman', 'buku'));
    }

    public function dashboard()
    {
        $user = auth()->user();
        $jumlahbuku = Buku::count();
        $jumlahpenerbit = Penerbit::count();
        $jumlahpenulis = Penuli::count();
        $jumlahkategori = Kategori::count();
        $jumlahpinjam = Peminjamens::count();
        $jumlahhistori = Peminjamens::where('nama_peminjam', $user->name)->count();
        $jumlahpengajuanditerima = Peminjamens::where('status_pengajuan', 'pengajuan diterima')->where('nama_peminjam', $user->name)->count();
        $jumlahpengajuanditolak = Peminjamens::where('status_pengajuan', 'pengajuan ditolak')->where('nama_peminjam', $user->name)->count();
        $jumlahpengembalianditerima = Peminjamens::where('status_pengajuan', 'pengembalian diterima')->where('nama_peminjam', $user->name)->count();
        $jumlahpengembalianditolak = Peminjamens::where('status_pengajuan', 'pengembalian ditolak')->where('nama_peminjam', $user->name)->count();

        $buku = Buku::all();
        $peminjaman = Peminjamens::all();
        $peminjamannotif = Peminjamens::all();
        return view('user.dashboarduser', compact('user','buku', 'jumlahbuku', 'jumlahpenerbit', 'jumlahpenulis', 'jumlahkategori', 'peminjamannotif', 'peminjaman', 'jumlahpinjam', 'jumlahhistori', 'user', 'jumlahpengajuanditerima','jumlahpengajuanditolak','jumlahpengembalianditerima','jumlahpengembalianditolak'));
    }

    public function listbuku($id = null)
    {
        $kategori = Kategori::all();
        $buku = $id ? Buku::where('id_kategori', $id)->get() :
        $buku = Buku::all();
        $user = Auth::user();
        $peminjaman = Peminjamens::all();
        return view('user.listbuku',  compact('user', 'peminjaman', 'buku', 'kategori'));
    }

    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        $user = User::findOrFail($id);
        $user = Auth::user();
        $peminjaman = Peminjamens::all();
        $komentars = Komentar::with('user')->latest()->get();
        return view('user.show', ['user' => $user], compact('komentars','buku', 'peminjaman', 'user'));
    }

    public function profile()
    {
        $user = Auth::user();
        $peminjamannotif = Peminjamens::all();
        $jumlahpengajuanditerima = Peminjamens::where('status_pengajuan', 'pengajuan diterima')->where('nama_peminjam', $user->name)->count();
        $jumlahpengajuanditolak = Peminjamens::where('status_pengajuan', 'pengajuan ditolak')->where('nama_peminjam', $user->name)->count();
        $jumlahpengembalianditerima = Peminjamens::where('status_pengajuan', 'pengembalian diterima')->where('nama_peminjam', $user->name)->count();
        $jumlahpengembalianditolak = Peminjamens::where('status_pengajuan', 'pengembalian ditolak')->where('nama_peminjam', $user->name)->count();
        return view('user.profile', compact('user', 'peminjamannotif', 'jumlahpengajuanditerima','jumlahpengajuanditolak','jumlahpengembalianditerima','jumlahpengembalianditolak'));
    }

    public function profilelistbuku($id = null)
    {
        $kategori = Kategori::all();
        $buku = $id ? Buku::where('id_kategori', $id)->get() :
        $buku = Buku::all();
        $user = Auth::user();
        $peminjamannotif = Peminjamens::all();
        $jumlahpengajuanditerima = Peminjamens::where('status_pengajuan', 'pengajuan diterima')->where('nama_peminjam', $user->name)->count();
        $jumlahpengajuanditolak = Peminjamens::where('status_pengajuan', 'pengajuan ditolak')->where('nama_peminjam', $user->name)->count();
        $jumlahpengembalianditerima = Peminjamens::where('status_pengajuan', 'pengembalian diterima')->where('nama_peminjam', $user->name)->count();
        $jumlahpengembalianditolak = Peminjamens::where('status_pengajuan', 'pengembalian ditolak')->where('nama_peminjam', $user->name)->count();
        return view('user.profilelistbuku', compact('user','buku', 'peminjamannotif', 'kategori', 'jumlahpengajuanditerima','jumlahpengajuanditolak','jumlahpengembalianditerima','jumlahpengembalianditolak'));
    }

    public function historiuser()
    {
        $user = Auth::user();
        $peminjaman = Peminjamens::where('nama_peminjam', $user->name)->get();
        $peminjaman = Peminjamens::all();
        $peminjamannotif = Peminjamens::all();
        $jumlahpengajuanditerima = Peminjamens::where('status_pengajuan', 'pengajuan diterima')->where('nama_peminjam', $user->name)->count();
        $jumlahpengajuanditolak = Peminjamens::where('status_pengajuan', 'pengajuan ditolak')->where('nama_peminjam', $user->name)->count();
        $jumlahpengembalianditerima = Peminjamens::where('status_pengajuan', 'pengembalian diterima')->where('nama_peminjam', $user->name)->count();
        $jumlahpengembalianditolak = Peminjamens::where('status_pengajuan', 'pengembalian ditolak')->where('nama_peminjam', $user->name)->count();

        return view('user.historiuser', compact('user','peminjaman','peminjamannotif', 'jumlahpengajuanditerima','jumlahpengajuanditolak','jumlahpengembalianditerima','jumlahpengembalianditolak'));
    }
}
