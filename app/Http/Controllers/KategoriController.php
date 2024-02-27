<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::get();

        return view('dashboard.kategori', compact('kategori'), [
            "title" => 'Kategori',
            "active" => 'kategori',
            'kategori' => $kategori
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form.form-kategori', [
            'title' => 'Form Kategori',
            'active' => 'kategori',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kategori' => 'required'
        ]);

        if ($validateData) {
            Kategori::create($validateData);

            return redirect('kategori');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::where('id', $id)->first();

        return view('edit.edit-kategori', [
            'kategori' => $kategori,
            'title' => 'Kategori',
            'active' => 'kategori',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'kategori' => 'required'
        ]);

        Kategori::where('id', $id)->update($validateData);
        return redirect('kategori')->with(['Sukses' => 'Data Berhasil Diedit']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);

        $kategori->delete();

        return back();
    }
}
