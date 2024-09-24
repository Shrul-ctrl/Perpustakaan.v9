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
use App\Charts\BukuChart;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index(BukuChart $chart)
    {
        $chartIntance = $chart->build();

        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->where('notif', false)->count();
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->where('notif', false)->count();
        $peminjamannotif = Peminjamens::all();
        Peminjamens::where('notif', false)->update(['notif' => true]);
        // $peminjamannotif = Peminjamens::where('notif', false)->get();
        $jumlahuser  = User::where('isAdmin', 0)->count();
        $jumlahpeminjamanbuku  = Peminjamens::count();
        $users = User::orderBy('id', 'desc')->get();
        $jumlahkategori = Kategori::count();
        $jumlahpenerbit = Penerbit::count();
        $jumlahpenulis = Penuli::count();
        $jumlahbuku = Buku::count();
        $jumlahkomentar = Komentar::count();


        $user = Auth::user();

        return view('admin.dashboard', ['chart' => $chartIntance], compact('jumlahkomentar', 'peminjamannotif', 'users', 'user', 'jumlahuser', 'jumlahbuku', 'jumlahpenerbit', 'jumlahpenulis', 'jumlahkategori', 'jumlahpengajuan', 'jumlahpengembalian', 'jumlahpeminjamanbuku'));
    }
}
