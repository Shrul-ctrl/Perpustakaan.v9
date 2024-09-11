<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use App\Models\penuli;
use App\Models\penerbit;
use App\Models\kategori;
use Illuminate\Support\Facades\Auth;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = buku::orderBy('id', 'asc')->get();
        $bukus = Buku::all();
        $user = Auth::user();
        return view('admin.buku.index', ['user' => $user], compact('buku','bukus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penulis = penuli::all();
        $penerbit = penerbit::all();
        $kategori = kategori::all();
        $user = Auth::user();
        return view('admin.buku.create', ['user' => $user],compact('kategori','penulis','penerbit'));
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
            'judul' => 'required|unique:bukus,judul'
        ],
    
        [
            'judul.required' => 'Nama harus diisi',
            'judul.unique' => 'buku dengan nama tersebut sudah ada sebelumnya.',
        ]
    );

    
    $buku = new buku();
    $buku->judul = $request->judul;
    $buku->deskripsi = $request->deskripsi;
    $buku->id_penulis = $request->id_penulis;
    $buku->id_penerbit = $request->id_penerbit;
    $buku->id_kategori= $request->id_kategori ;
    $buku->tahun_terbit= $request->tahun_terbit ;
    $buku->jumlah_buku= $request->jumlah_buku ;

        // update img
        if ($request->hasFile('foto')) {
            $img = $request->file('foto');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/buku', $name);
            $buku->foto = $name;
        }

        $buku->save();

        return redirect()->route('buku.index')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $buku = Buku::findOrFail($id);
        $user = Auth::user();
        return view('admin.buku.show', ['user' => $user],compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(buku $buku)
    {
        $penulis = penuli::all();
        $penerbit = penerbit::all();
        $kategori = kategori::all();
        $user = Auth::user();
        return view('admin.buku.edit', ['user' => $user] ,compact('kategori','penulis','penerbit','buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, buku $buku)
    {
        $buku->judul = $request->judul;
        $buku->deskripsi = $request->deskripsi;
        $buku->id_penulis = $request->id_penulis;
        $buku->id_penerbit = $request->id_penerbit;
        $buku->id_kategori= $request->id_kategori ;
        $buku->tahun_terbit= $request->tahun_terbit ;
        $buku->jumlah_buku= $request->jumlah_buku;

        // delete img
        if ($request->hasFile('foto')) {
            $img = $request->file('foto');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/buku', $name);
            $buku->foto = $name;
        }

        $buku->save();
        return redirect()->route('buku.index')->with('success', 'Data berhasil diubah');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = buku::FindOrFail($id);
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Data berhasil dihapus');
    }
}
