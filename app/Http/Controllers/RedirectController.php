<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function cek() {
        if (auth()->user()->role === 'admin') {
            return redirect('/superadmin');
        } else if (auth()->user()->role === 'pegawai') {
            return redirect('/pegawai');

        } else {
            return redirect('/peminjam');
        }
}
}
