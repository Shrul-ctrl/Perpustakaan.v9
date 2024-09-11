<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penuli;
use App\Models\Kategori;
use App\Models\buku;
use App\Models\penerbit;
use App\Models\user;
use App\chart\MonthlyUsersChart;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $jumlahbuku = Buku::count();
        $jumlahpenerbit = Penerbit::count();
        $jumlahpenulis = Penuli::count();
        $jumlahkategori = Kategori::count();
        $users = User::orderBy('id', 'desc')->get();
        $user = Auth::user();
        
        return view('admin.dashboard', ['user' => $user], compact('jumlahbuku','jumlahpenerbit', 'jumlahpenulis', 'jumlahkategori','users'));
    }
    
    // public function chart(MonthlyUsersChart $chart)
    // {
    //     return view('admin.dashboard', ['chart' => $chart->build()]);
    // } 

}
