<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penuli;
use App\Models\Peminjamens;
use Illuminate\Support\Facades\Auth;


class PenulisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penulis = Penuli::orderBy('id', 'desc')->get();
        $jumlahpengajuan = Peminjamens::where('status_pengajuan','ditahan')->count();
        $jumlahpengembalian = Peminjamens::where('status_pengajuan','dikembalikan')->count(); 
        $peminjamannotif = Peminjamens::all();
        $user = Auth::user();
        return view('admin.penulis.index', compact('user','peminjamannotif','penulis','jumlahpengajuan','jumlahpengembalian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jumlahpengajuan = Peminjamens::where('status_pengajuan','ditahan')->count();
        $jumlahpengembalian = Peminjamens::where('status_pengajuan','dikembalikan')->count(); 
        $peminjamannotif = Peminjamens::all();
        $user = Auth::user();
        return view('admin.penulis.create', compact('peminjamannotif','user','jumlahpengajuan','jumlahpengembalian'));
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
            'nama_penulis' => 'required|unique:penulis,nama_penulis'
        ],
    
        [
            'nama_penulis.required' => 'Nama harus diisi',
            'nama_penulis.unique' => 'Penuli dengan nama tersebut sudah ada sebelumnya.',
        ]
    );
    
        $penuli = new Penuli();
        $penuli->nama_penulis = $request->nama_penulis;
        $penuli->save();

        return redirect()->route('penulis.index')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Penuli $penuli)
    {
        $user = Auth::user();
        return view('admin.penulis.show', ['user' => $user], compact('penuli'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Penuli $penuli)
    {
        $user = Auth::user();
        $peminjamannotif = Peminjamens::all();
        $jumlahpengajuan = Peminjamens::where('status_pengajuan','ditahan')->count();
        $jumlahpengembalian = Peminjamens::where('status_pengajuan','dikembalikan')->count(); 
        return view('admin.penulis.edit',compact('peminjamannotif','user','penuli','jumlahpengajuan','jumlahpengembalian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penuli $penuli)
    {

        $penuli->nama_penulis = $request->nama_penulis;
        $penuli->save();
        return redirect()->route('penulis.index')->with('success', 'Data berhasil diubah');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penuli = Penuli::FindOrFail($id);
        $penuli->delete();
        return redirect()->route('penulis.index')->with('success', 'Data berhasil dihapus');
    }
}
