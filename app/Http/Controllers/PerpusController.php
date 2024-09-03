<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class PerpusController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return view('layouts.frontend',compact('buku'));
    }

    

}
