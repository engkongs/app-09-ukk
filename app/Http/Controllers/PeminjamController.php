<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    public function index()
    {
        return redirect()->intended('peminjaman');
    }
}
