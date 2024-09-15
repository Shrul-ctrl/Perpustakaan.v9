<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;
use Illuminate\Support\Facades\Auth;

class KontakController extends Controller
{ 

    public function create()
    { 
        $kontak = Kontak::all(); 
        $user = Auth::user();
        return view('user.home', compact('kontak', 'user',));
    }

    public function store(Request $request) { 
    
        $kontak = new kontak();
        $kontak->kontak = $request->kontak;
        $kontak->id_user = auth()->id();
        // $kontak->id_user = auth()->id();
        $kontak->save();

        return redirect()->back()->with('success', 'kontak Berhasil dikirim');
    }
    
  
    
}