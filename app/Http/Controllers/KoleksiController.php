<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;
use App\Models\User;
use App\Models\Buku;
use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $koleksi = Koleksi::where('id_user', auth()->user()->id)->paginate(5);
        $user = User::get();
        $buku = Buku::get();
        return view('dashboard.koleksi', compact('koleksi'), [
            'title' => 'Register',
            'active' => 'koleksi',
            'user' => $user

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->authorize('admin-petugas');
        $validateData = $request->validate([
            'id_buku' => 'required',
            'id_user' => 'required',
        ]);

        $koleksi = Koleksi::create($validateData);

        return redirect()->route('koleksi.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Koleksi $koleksi)
    {
        // $this->authorize('admin-petugas');
        // $koleksi = Koleksi::FindOrFail($id);

        $koleksi->delete();

        return redirect('koleksi');
    }
}
