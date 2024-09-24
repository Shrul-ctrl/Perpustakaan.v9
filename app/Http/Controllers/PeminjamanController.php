<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjamens;
use App\Models\Buku;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource./
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $user = Auth::user();
    
        $query = Peminjamens::where('nama_peminjam', $user->name)
            ->whereIn('status_pengajuan', ['menunggu pengajuan', 'pengajuan diterima', 'pengajuan ditolak', 'pengembalian diterima', 'pengembalian ditolak']);
    
        if ($request->filled('status_pengajuan')) {
            $query->where('status_pengajuan', $request->status_pengajuan);
        }
    
        $peminjaman = $query->orderBy('id', 'desc')->get();
        $peminjamanditerima = Peminjamens::where('status_pengajuan', 'pengajuan diterima')->orderBy('id', 'desc')->get();
    
        $jumlahpengajuanditerima = Peminjamens::where('status_pengajuan', 'pengajuan diterima')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $jumlahpengajuanditolak = Peminjamens::where('status_pengajuan', 'pengajuan ditolak')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $jumlahpengembalianditerima = Peminjamens::where('status_pengajuan', 'pengembalian diterima')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $jumlahpengembalianditolak = Peminjamens::where('status_pengajuan', 'pengembalian ditolak')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $peminjamannotif = Peminjamens::where('nama_peminjam', $user->name)->whereIn('status_pengajuan', ['pengajuan diterima', 'pengajuan ditolak', 'pengembalian diterima', 'pengembalian ditolak'])->orderBy('id', 'desc')->get();
        
        Peminjamens::where('notif', false)->update(['notif' => true]);
    
        return view('user.peminjaman.index', compact('user', 'peminjamannotif', 'peminjaman', 'peminjamanditerima', 'jumlahpengajuanditerima', 'jumlahpengajuanditolak', 'jumlahpengembalianditerima', 'jumlahpengembalianditolak'));
    }
    

    public function indexpengajuan()
    {
        $peminjaman = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->orderBy('id', 'desc')->get();
        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->where('notif', false)->count();
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->where('notif', false)->count();
        $peminjamannotif = Peminjamens::orderBy('id', 'desc')->get();
        $user = Auth::user();
        return view('admin.peminjaman.indexpengajuan', ['user' => $user], compact('peminjamannotif', 'peminjaman', 'jumlahpengajuan', 'jumlahpengembalian'));
    }

    public function indexpeminjaman()
    {
        $peminjaman = Peminjamens::orderBy('id', 'desc')->get();
        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->where('notif', false)->count();
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->where('notif', false)->count();
        $peminjamannotif = Peminjamens::all();
        $user = Auth::user();
        return view('admin.peminjaman.indexpeminjaman', ['user' => $user], compact('peminjamannotif', 'peminjaman', 'jumlahpengajuan', 'jumlahpengembalian'));
    }

    public function indexpengembalian()
    {
        $peminjaman = Peminjamens::where('status_pengajuan', 'dikembalikan')->orderBy('id', 'desc')->get();
        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->where('notif', false)->count();
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->where('notif', false)->count();
        $peminjamannotif = Peminjamens::all();
        $user = Auth::user();
        return view('admin.peminjaman.indexpengembalian', compact('user', 'peminjamannotif', 'peminjamannotif', 'peminjaman', 'jumlahpengajuan', 'jumlahpengembalian'));
    }

    public function create($id)
    {
        $buku = Buku::findOrFail($id);
        $batastanggal = Carbon::now()->addWeek()->format('Y-m-d');
        $sekarang = now()->format('Y-m-d');
        $user = Auth::user();
        return view('user.peminjaman.create', compact('buku', 'batastanggal', 'sekarang', 'user'));
    }


    public function store(Request $request)
    {

        $buku = Buku::find($request->id_buku);
        if (!$buku) {
            return redirect()->back()->withErrors(['id_buku' => 'Buku tidak ditemukan'])->withInput();
        }

        if ($buku->jumlah_buku < $request->jumlah_pinjam) {
            return redirect()->back()->withErrors(['jumlah_pinjam' => 'Stok buku terbatas'])->withInput();
        }

        $peminjaman = new Peminjamens();
        $peminjaman->nama_peminjam = $request->nama_peminjam;
        $peminjaman->id_buku = $request->id_buku;
        $peminjaman->jumlah_pinjam = $request->jumlah_pinjam;
        $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $peminjaman->batas_pinjam = $request->batas_pinjam;
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;
        $peminjaman->status_pengajuan = 'menunggu pengajuan';
        $peminjaman->save();

        return redirect()->route('peminjaman.index')->with('success', 'Pengajuan peminjaman buku berhasil dibuat. Tunggu persetujuan dari admin.');
    }

    public function showpengajuanuser($id)
    {
        $peminjaman = Peminjamens::findOrFail($id);
        $peminjamannotif = Peminjamens::all();
        $buku = Buku::all();
        $user = Auth::user();
        $jumlahpengajuanditerima = Peminjamens::where('status_pengajuan', 'pengajuan diterima')->where('nama_peminjam', $user->name)->count();
        $jumlahpengajuanditolak = Peminjamens::where('status_pengajuan', 'pengajuan ditolak')->where('nama_peminjam', $user->name)->count();
        $jumlahpengembalianditerima = Peminjamens::where('status_pengajuan', 'pengembalian diterima')->where('nama_peminjam', $user->name)->count();
        $jumlahpengembalianditolak = Peminjamens::where('status_pengajuan', 'pengembalian ditolak')->where('nama_peminjam', $user->name)->count();
        return view('user.peminjaman.showpengajuan', compact('user', 'buku', 'peminjaman', 'peminjamannotif', 'jumlahpengajuanditerima', 'jumlahpengajuanditolak', 'jumlahpengembalianditerima', 'jumlahpengembalianditolak'));
    }

    public function showpengembalianuser($id)
    {
        $peminjaman = Peminjamens::findOrFail($id);
        $peminjamannotif = Peminjamens::all();
        $buku = Buku::all();
        $user = Auth::user();
        $jumlahpengajuanditerima = Peminjamens::where('status_pengajuan', 'pengajuan diterima')->where('nama_peminjam', $user->name)->count();
        $jumlahpengajuanditolak = Peminjamens::where('status_pengajuan', 'pengajuan ditolak')->where('nama_peminjam', $user->name)->count();
        $jumlahpengembalianditerima = Peminjamens::where('status_pengajuan', 'pengembalian diterima')->where('nama_peminjam', $user->name)->count();
        $jumlahpengembalianditolak = Peminjamens::where('status_pengajuan', 'pengembalian ditolak')->where('nama_peminjam', $user->name)->count();
        return view('user.peminjaman.showpengembalian', compact('user', 'buku', 'peminjaman', 'peminjamannotif', 'jumlahpengajuanditerima', 'jumlahpengajuanditolak', 'jumlahpengembalianditerima', 'jumlahpengembalianditolak'));
    }


    public function showpengajuan($id)
    {
        $peminjaman = Peminjamens::findOrFail($id);
        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->where('notif', false)->count();
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->where('notif', false)->count();
        $peminjamannotif = Peminjamens::all();
        $user = Auth::user();
        return view('admin.peminjaman.showpengajuan', ['user' => $user], compact('peminjamannotif', 'peminjaman', 'jumlahpengajuan', 'jumlahpengembalian'));
    }

    public function showpengembalian($id)
    {
        $peminjaman = Peminjamens::findOrFail($id);
        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->where('notif', false)->count();
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->where('notif', false)->count();
        $peminjamannotif = Peminjamens::all();
        $user = Auth::user();
        return view('admin.peminjaman.showpengembalian', ['user' => $user], compact('peminjamannotif', 'peminjaman', 'jumlahpengajuan', 'jumlahpengembalian'));
    }

    public function edit(Peminjamens $peminjaman)
    {
        $peminjamannotif = Peminjamens::all();
        $buku = Buku::all();
        $user = Auth::user();
        $jumlahpengajuanditerima = Peminjamens::where('status_pengajuan', 'pengajuan diterima')->where('nama_peminjam', $user->name)->count();
        $jumlahpengajuanditolak = Peminjamens::where('status_pengajuan', 'pengajuan ditolak')->where('nama_peminjam', $user->name)->count();
        $jumlahpengembalianditerima = Peminjamens::where('status_pengajuan', 'pengembalian diterima')->where('nama_peminjam', $user->name)->count();
        $jumlahpengembalianditolak = Peminjamens::where('status_pengajuan', 'pengembalian ditolak')->where('nama_peminjam', $user->name)->count();
        return view('user.peminjaman.edit', compact('user', 'buku', 'peminjaman', 'peminjamannotif', 'jumlahpengajuanditerima', 'jumlahpengajuanditolak', 'jumlahpengembalianditerima', 'jumlahpengembalianditolak'));
    }

    public function update(Request $request, Peminjamens $peminjaman)
    {

        $peminjaman->status_pengajuan = $request->status_pengajuan;
        $peminjaman->alasan_pengembalian = $request->alasan_pengembalian;
        $peminjaman->alasan_pengajuan = $request->alasan_pengajuan;

        if ($request->status_pengajuan === 'pengajuan diterima') {
            $buku = Buku::findOrFail($peminjaman->id_buku);
            if ($buku) {
                $buku->jumlah_buku -= $peminjaman->jumlah_pinjam;
                $buku->save();
            }
            $peminjaman->notif = false;
            $peminjaman->status_pengajuan = 'pengajuan diterima';
        } elseif ($request->status_pengajuan === 'pengajuan ditolak') {
            $peminjaman->notif = false;
            $peminjaman->status_pengajuan = 'pengajuan ditolak';
        } elseif ($request->status_pengajuan === 'dikembalikan') {
            $buku = Buku::findOrFail($peminjaman->id_buku);
            if ($buku) {
                $buku->jumlah_buku += $peminjaman->jumlah_pinjam;
                $buku->save();
            }
            $peminjaman->status_pengajuan = 'dikembalikan';
        } elseif ($request->status_pengajuan === 'pengembalian diterima') {
            $buku = Buku::findOrFail($peminjaman->id_buku);
            if ($buku) {
                $buku->jumlah_buku += $peminjaman->jumlah_pinjam;
                $buku->save();
            }
            $peminjaman->notif = false;
            $peminjaman->status_pengajuan = 'pengembalian diterima';
        } elseif ($request->status_pengajuan === 'pengembalian ditolak') {
            $buku = Buku::findOrFail($peminjaman->id_buku);
            if ($buku) {
                $buku->jumlah_buku += $peminjaman->jumlah_pinjam;
                $buku->save();
            }
            $peminjaman->notif = false;
            $peminjaman->status_pengajuan = 'pengembalian ditolak';
        } elseif ($request->status_pengajuan === 'sukses') {
            $buku = Buku::findOrFail($peminjaman->id_buku);
            if ($buku) {
                $buku->jumlah_buku += $peminjaman->jumlah_pinjam;
                $buku->save();
            }
            $peminjaman->status_pengajuan = 'sukses';
        }

        $peminjaman->save();
        if ($request->has('redirect_to') && $request->redirect_to === 'showpengajuan') {
            return redirect()->route('indexpengajuan')->with('success', 'Status pengajuan berhasil diperbarui');
        } elseif ($request->has('redirect_to') && $request->redirect_to === 'showpengembalian') {
            return redirect()->route('indexpengembalian')->with('success', 'Pinjaman Buku berhasil dikembalikan');
        } else {
            return redirect()->route('peminjaman.index')->with('success', 'Peminjaman Buku berhasil dikembalikan');
        }
    }

    public function destroy($id)
    {
        //
    }
}
