<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjamens;
use App\Models\penuli;
use App\Models\Kategori;
use App\Models\buku;
use App\Models\penerbit;

class PerpusController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return view('user.home', compact('buku'));
    }

    public function dashboard()
    {
        $jumlahbuku = Buku::count();
        $jumlahpenerbit = Penerbit::count();
        $jumlahpenulis = Penuli::count();
        $jumlahkategori = Kategori::count();
        $buku = Buku::all();
        $peminjaman = Peminjamens::all();
        return view('user.dashboarduser', compact('buku', 'jumlahbuku', 'jumlahpenerbit', 'jumlahpenulis', 'jumlahkategori', 'peminjaman'));
    }

    public function listbuku($id = null)
    {
        $kategori = Kategori::all();
        $buku = $id ? Buku::where('id_kategori', $id)->get():
        $buku = Buku::all();
    
        return view('user.listbuku', compact('buku', 'kategori'));
    }

    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        return view('user.show', compact('buku'));
    }

    public function profile()
    {
        $buku = Buku::all();
        return view('user.profile', compact('buku'));
    }


}
