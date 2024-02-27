<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use PhpParser\Node\NullableType;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::latest()->paginate(5);
        $kategori = Kategori::get();
        return view('dashboard.buku', compact('buku'), [
            "title" => 'Buku',
            "active" => 'buku',
            'kategori' => $kategori
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::get();

        return view('form.form-buku', [
            'title' => 'Buku',
            'active' => 'buku',
            'kategori' => $kategori,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'deskripsi' => 'required',
            'cover' => 'required|image|mimes:jpg,png,jpeg|max:5120',
            'stok' => 'required',
            'id_kategori' => 'id_kategori'


        ]);
        //upload gambar
        $image = $request->file('cover');
        $image = $request->storeAs('public/posts', $image->hashName());
        $validateData['cover'] = $image->hashName();

        if ($validateData) {
            Buku::create($validateData);

            return redirect('buku');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buku = Buku::where('id', $id)->first();
        $kategori = Kategori::where('id', $buku->id_kategori)->first();
        $ulas = Ulasan::latest()->paginate(5);

        return view('dashboard.detail-buku', [
            'title' => 'Detail Buku',
            'active' => 'buku',
            'buku' => $buku,
            'kategori' => 'kategori',
            'ulas' => $ulas,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Buku::latest()->paginate(5);
        $kategori = Kategori::get();

        return view('edit.edit-buku', [
            'buku' => $buku,
            'kategori' => $kategori,
            'buku' => 'Edit Buku',
            'active' => 'buku',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->has('cover')) {
            $validateData = $request->validate([
                'judul' => 'nullable',
                'penulis' => 'nullable',
                'penerbit' => 'nullable',
                'tahun_terbit' => 'nullable',
                'deskripsi' => 'nullable',
                'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
                'stok' => 'nullable',
                'id_kategori' => 'nullable',
            ]);
            $buku = Buku::where('id', $id)->first();
            if ($buku->cover != null) {
                $path = public_path('storage/posts/') . $buku->cover;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            $image = $request->file('cover');
            $image->storeAs('public/posts', $image->hashName());
            $validateData['cover'] = $image->hashName();
            $buku = Buku::where('id', $id)->update($validateData);
        } else {
            $validateData = $request->validate([
                'judul' => 'nullable',
                'penulis' => 'nullable',
                'penerbit' => 'nullable',
                'tahun_terbit' => 'nullable',
                'deskripsi' => 'nullable',
                'stok' => 'nullable',
                'id_kategori' => 'nullable',
            ]);
            $buku = Buku::where('id', $id)->update($validateData);
        }
        return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::where('id', $id)->first();
        if ($buku->cover != null) {
            $path = public_path('storage/posts/') . $buku->cover;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $buku->delete();
        return back();
    }
}
