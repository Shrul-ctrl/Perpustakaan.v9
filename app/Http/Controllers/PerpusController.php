<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjamens;
use App\Models\penuli;
use App\Models\Kategori;
use App\Models\buku;
use App\Models\penerbit;
use App\Models\user;
use Illuminate\Support\Facades\Auth;



class PerpusController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        $user = Auth::user();
        return view('user.home', ['user' => $user], compact('buku'));
    }

    public function dashboard()
    {
        $jumlahbuku = Buku::count();
        $jumlahpenerbit = Penerbit::count();
        $jumlahpenulis = Penuli::count();
        $jumlahkategori = Kategori::count();
        $jumlahpinjam = Peminjamens::count();

        $buku = Buku::all();
        $user = auth()->user();
        $peminjaman = Peminjamens::all();
        return view('user.dashboarduser', ['user' => $user], compact('buku', 'jumlahbuku', 'jumlahpenerbit', 'jumlahpenulis', 'jumlahkategori', 'peminjaman', 'jumlahpinjam', 'user'));
    }

    public function listbuku($id = null)
    {
        $kategori = Kategori::all();
        $buku = $id ? Buku::where('id_kategori', $id)->get() :
        $buku = Buku::all();
        $user = Auth::user();
        return view('user.listbuku', ['user' => $user], compact('buku', 'kategori',));
    }

    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        $user = User::findOrFail($id);
        $user = Auth::user();
        return view('user.show', ['user' => $user], compact('buku', 'user',));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', ['user' => $user]);
    }

    public function profilelistbuku($id = null)
    {
        $kategori = Kategori::all();
        $buku = $id ? Buku::where('id_kategori', $id)->get() :
        $buku = Buku::all();
        $user = Auth::user();
        return view('user.profilelistbuku', ['user' => $user], compact('buku', 'kategori',));
    }


}
