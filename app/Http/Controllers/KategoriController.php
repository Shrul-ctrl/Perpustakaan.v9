<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Peminjamens;
use Illuminate\Support\Facades\Auth;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumlahpengembalian = Peminjamens::where('status_pengajuan','dikembalikan')->count(); 
        $jumlahpengajuan = Peminjamens::where('status_pengajuan','ditahan')->count();
        $kategori = Kategori::orderBy('id', 'desc')->get();
        $peminjamannotif = Peminjamens::all();
        $user = Auth::user();
        return view('admin.kategori.index', compact('peminjamannotif','user','kategori','jumlahpengajuan','jumlahpengembalian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jumlahpengembalian = Peminjamens::where('status_pengajuan','dikembalikan')->count(); 
        $jumlahpengajuan = Peminjamens::where('status_pengajuan','ditahan')->count();
        $peminjamannotif = Peminjamens::all();
        $user = Auth::user();
        return view('admin.kategori.create', compact('peminjamannotif','user','jumlahpengajuan','jumlahpengembalian'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'nama_kategori' => 'required|unique:kategoris,nama_kategori'
        ],
    
        [
            'nama_kategori.required' => 'Nama harus diisi',
            'nama_kategori.unique' => 'Kategori dengan nama tersebut sudah ada sebelumnya.',
        ]
    );
    
        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return redirect()->route('kategori.index')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        $user = Auth::user();
        return view('admin.kategori.show', compact('peminjamannotif','user','kategori'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        $jumlahpengajuan = Peminjamens::where('status_pengajuan','ditahan')->count();
        $jumlahpengembalian = Peminjamens::where('status_pengajuan','dikembalikan')->count(); 
        $peminjamannotif = Peminjamens::all();
        $user = Auth::user();
        return view('admin.kategori.edit', compact('peminjamannotif','user','kategori','jumlahpengajuan','jumlahpengembalian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return redirect()->route('kategori.index')->with('success', 'Data berhasil diubah');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::FindOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Data berhasil dihapus');
    }
}
