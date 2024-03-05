<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjam = Peminjaman::get();
        $peminjaman_user = Peminjaman::where('id_user', auth()->user()->id)->get();
        $user = User::get();
        return view('dashboard.peminjaman', [
            'title' => 'Peminjam',
            'active' => 'peminjam',
            'peminjam' => $peminjam,
            'user' => $user,
            'peminjaman_user' => $peminjaman_user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $this->authorize('admin-petugas');
        $buku = Buku::get();
        $user = User::get();

        return view('form.form-peminjam', [
            'title' => 'Form Peminjaman',
            'active' => 'Peminjam',
            'buku' => $buku,
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->authorize('admin-petugas');
        $validateData = $request->validate([
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'status' => 'required',
            'tenggat' => 'required',
            'id_user' => 'required',
            'id_buku' => 'required',
            'jumlah_pinjam' => 'required',
        ]);

        if ($validateData) {
            Peminjaman::create($validateData);

            return redirect('peminjaman');
        }

        return redirect()->route('peminjaman.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $this->authorize('admin-petugas');
        $peminjaman = Peminjaman::where('id', $id)->first();
        $listbuku = Buku::get();
        $user = User::get();

        return view('edit.edit-peminjaman', [
            'peminjaman' => $peminjaman,
            'listbuku' => $listbuku,
            'user' => $user,
            'title' => 'Form Buku',
            'active' => 'peminjam',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $this->authorize('admin-petugas');
        $validateData = $request->validate([
            'id_buku' => 'nullable',
            'tanggal_pinjam' => 'nullable',
            'tanggal_kembali' => 'nullable',
            'status' => 'nullable',
            'tenggat' => 'nullable',
            'id_user' => 'nullable',
            'jumlah_pinjam' => 'nullable',
        ]);
        $peminjaman = Peminjaman::where('id', $id)->update($validateData);
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $this->authorize('admin-petugas');
        $peminjam = Peminjaman::findOrFail($id);

        $peminjam->delete();

        return redirect('peminjaman');
    }
}
