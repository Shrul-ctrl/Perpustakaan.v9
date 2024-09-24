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
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;



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

        $jumlahpengajuanditerima = Peminjamens::where('status_pengajuan', 'pengajuan diterima')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $jumlahpengajuanditolak = Peminjamens::where('status_pengajuan', 'pengajuan ditolak')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $jumlahpengembalianditerima = Peminjamens::where('status_pengajuan', 'pengembalian diterima')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $jumlahpengembalianditolak = Peminjamens::where('status_pengajuan', 'pengembalian ditolak')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $peminjamannotif = Peminjamens::where('nama_peminjam', $user->name)->whereIn('status_pengajuan', ['pengajuan diterima', 'pengajuan ditolak', 'pengembalian diterima', 'pengembalian ditolak'])->orderBy('id', 'desc')->get();
        Peminjamens::where('notif', false)->update(['notif' => true]);

        $buku = Buku::orderBy('id', 'desc')->get();
        $peminjamanuser = Peminjamens::where('nama_peminjam', $user->name);
        return view('user.dashboarduser', compact('peminjamanuser', 'user', 'buku', 'jumlahbuku', 'jumlahpenerbit', 'jumlahpenulis', 'jumlahkategori', 'peminjamannotif', 'jumlahpinjam', 'jumlahhistori', 'user', 'jumlahpengajuanditerima', 'jumlahpengajuanditolak', 'jumlahpengembalianditerima', 'jumlahpengembalianditolak'));
    }

    public function listbuku($id = null)
    {
        $kategori = Kategori::all();
        $buku = $id ? Buku::where('id_kategori', $id)->get() :
            $buku = Buku::paginate(12);
        $pagination = DB::table('peminjamens')->paginate(8);
        $user = Auth::user();
        $peminjaman = Peminjamens::all();
        return view('user.listbuku',  compact('pagination', 'user', 'peminjaman', 'buku', 'kategori'));
    }

    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        $user = User::findOrFail($id);
        $user = Auth::user();
        $peminjaman = Peminjamens::all();
        $komentars = Komentar::with('user')->latest()->get();
        return view('user.show', ['user' => $user], compact('komentars', 'buku', 'peminjaman', 'user'));
    }

    public function profile()
    {
        $user = Auth::user();

        $jumlahpengajuanditerima = Peminjamens::where('status_pengajuan', 'pengajuan diterima')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $jumlahpengajuanditolak = Peminjamens::where('status_pengajuan', 'pengajuan ditolak')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $jumlahpengembalianditerima = Peminjamens::where('status_pengajuan', 'pengembalian diterima')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $jumlahpengembalianditolak = Peminjamens::where('status_pengajuan', 'pengembalian ditolak')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $peminjamannotif = Peminjamens::where('nama_peminjam', $user->name)->whereIn('status_pengajuan', ['pengajuan diterima', 'pengajuan ditolak', 'pengembalian diterima', 'pengembalian ditolak'])->orderBy('id', 'desc')->get();
        Peminjamens::where('notif', false)->update(['notif' => true]);

        return view('user.profile', compact('user', 'peminjamannotif', 'jumlahpengajuanditerima', 'jumlahpengajuanditolak', 'jumlahpengembalianditerima', 'jumlahpengembalianditolak'));
    }

    public function profilelistbuku($id = null)
    {
        $kategori = Kategori::all();
        $buku = $id ? Buku::where('id_kategori', $id)->get():
            $buku = Buku::paginate(8);
        $user = Auth::user();
        $pagination = DB::table('peminjamens')->paginate(8);

        $jumlahpengajuanditerima = Peminjamens::where('status_pengajuan', 'pengajuan diterima')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $jumlahpengajuanditolak = Peminjamens::where('status_pengajuan', 'pengajuan ditolak')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $jumlahpengembalianditerima = Peminjamens::where('status_pengajuan', 'pengembalian diterima')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $jumlahpengembalianditolak = Peminjamens::where('status_pengajuan', 'pengembalian ditolak')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $peminjamannotif = Peminjamens::where('nama_peminjam', $user->name)->whereIn('status_pengajuan', ['pengajuan diterima', 'pengajuan ditolak', 'pengembalian diterima', 'pengembalian ditolak'])->orderBy('id', 'desc')->get();
        Peminjamens::where('notif', false)->update(['notif' => true]);

        return view('user.profilelistbuku', compact('pagination', 'user', 'buku', 'peminjamannotif', 'kategori', 'jumlahpengajuanditerima', 'jumlahpengajuanditolak', 'jumlahpengembalianditerima', 'jumlahpengembalianditolak'));
    }

    public function historiuser()
    {
        $user = Auth::user();
        $peminjaman = Peminjamens::where('status_pengajuan' , 'pengembalian diterima')->where('nama_peminjam', $user->name)->paginate(8);
        $pagination = DB::table('peminjamens')->paginate(8);
      
        $jumlahpengajuanditerima = Peminjamens::where('status_pengajuan', 'pengajuan diterima')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $jumlahpengajuanditolak = Peminjamens::where('status_pengajuan', 'pengajuan ditolak')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $jumlahpengembalianditerima = Peminjamens::where('status_pengajuan', 'pengembalian diterima')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $jumlahpengembalianditolak = Peminjamens::where('status_pengajuan', 'pengembalian ditolak')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $peminjamannotif = Peminjamens::where('nama_peminjam', $user->name)->whereIn('status_pengajuan', ['pengajuan diterima', 'pengajuan ditolak', 'pengembalian diterima', 'pengembalian ditolak'])->orderBy('id', 'desc')->get();
        Peminjamens::where('notif', false)->update(['notif' => true]);

        return view('user.historiuser', compact('pagination', 'user', 'peminjaman', 'peminjamannotif', 'jumlahpengajuanditerima', 'jumlahpengajuanditolak', 'jumlahpengembalianditerima', 'jumlahpengembalianditolak'));
    }

    // public function updateprofileuser(Request $request, User $user)
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => [
    //             'required',
    //             'string',
    //             'email',
    //             'max:255',
    //             // use Illuminate\Validation\Rule;
    //             Rule::unique('users')->ignore($user->id)
    //         ],
    //     ]);

    //     $user->name = $request->name;
    //     $user->alamat = $request->alamat;
    //     $user->no_hp = $request->no_hp;
    //     $user->email = $request->email;
    //     // $user->isAdmin = $request->isAdmin;

    //     //  delete img
    //      if ($request->hasFile('fotoprofile')) {
    //         $img = $request->file('fotoprofile');
    //         $name = rand(1000, 9999) . $img->getClientOriginalName();
    //         $img->move('images/user', $name);
    //         $user->fotoprofile = $name;
    //     }


    //     $user->save();
    //     if ($request->has('redirect_to') && $request->redirect_to === 'profile') {
    //         return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui');
    //     } else {
    //         return redirect()->route('user.index')->with('success', 'Data berhasil diperbarui');
    //     }
    // }
}
