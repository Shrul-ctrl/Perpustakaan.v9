<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penuli;
use App\Models\Kategori;
use App\Models\buku;
use App\Models\penerbit;
use App\Models\user;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahbuku = Buku::count();
        $jumlahpenerbit = Penerbit::count();
        $jumlahpenulis = Penuli::count();
        $jumlahkategori = Kategori::count();
        $user = User::orderBy('id', 'desc')->get();

        
        return view('admin.dashboard', compact('jumlahbuku','jumlahpenerbit', 'jumlahpenulis', 'jumlahkategori','user'));
    }
    
}
