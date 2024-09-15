<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penuli;
use App\Models\Kategori;
use App\Models\buku;
use App\Models\penerbit;
use App\Models\user;
use App\Models\Peminjamens;
use App\Models\Komentar;
use App\chart\MonthlyUsersChart;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $jumlahpengembalian = Peminjamens::where('status_pengajuan','dikembalikan')->count(); 
        $jumlahpengajuan = Peminjamens::where('status_pengajuan','ditahan')->count();
        $jumlahuser  = User::where('isAdmin', 0)->count();
        $jumlahpeminjamanbuku  = Peminjamens::count();
        $users = User::orderBy('id', 'desc')->get();
        $peminjamannotif = Peminjamens::all();
        $jumlahkategori = Kategori::count();
        $jumlahpenerbit = Penerbit::count();
        $jumlahpenulis = Penuli::count();
        $jumlahbuku = Buku::count();
        $jumlahkomentar = Komentar::count();
        
        $user = Auth::user();
        
        return view('admin.dashboard',compact('jumlahkomentar','peminjamannotif','users','user','jumlahuser','jumlahbuku','jumlahpenerbit', 'jumlahpenulis', 'jumlahkategori','jumlahpengajuan','jumlahpengembalian','jumlahpeminjamanbuku'));
    }
    
}
