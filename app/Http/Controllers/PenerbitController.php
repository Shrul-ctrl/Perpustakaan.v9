<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbit;
use Illuminate\Support\Facades\Auth;


class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerbit = Penerbit::orderBy('id', 'desc')->get();
        $user = Auth::user();
        return view('admin.penerbit.index', ['user' => $user], compact('penerbit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('admin.penerbit.create', ['user' => $user]);
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
            'nama_Penerbit' => 'required|unique:Penerbits,nama_Penerbit'
        ],
    
        [
            'nama_Penerbit.required' => 'Nama harus diisi',
            'nama_Penerbit.unique' => 'Penerbit dengan nama tersebut sudah ada sebelumnya.',
        ]
    );
    
        $Penerbit = new Penerbit();
        $Penerbit->nama_Penerbit = $request->nama_Penerbit;
        $Penerbit->alamat = $request->alamat;
        $Penerbit->save();

        return redirect()->route('penerbit.index')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Penerbit $Penerbit)
    {
        $user = Auth::user();
        return view('admin.penerbit.show', ['user' => $user], compact('penerbit'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Penerbit $penerbit)
    {
        $user = Auth::user();
        return view('admin.penerbit.edit', ['user' => $user], compact('penerbit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penerbit $penerbit)
    {

        $penerbit->nama_penerbit = $request->nama_penerbit;
        $penerbit->alamat = $request->alamat;
        $penerbit->save();
        return redirect()->route('penerbit.index')->with('success', 'Data berhasil diubah');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penerbit = Penerbit::FindOrFail($id);
        $penerbit->delete();
        return redirect()->route('penerbit.index')->with('success', 'Data berhasil dihapus');
    }
}
