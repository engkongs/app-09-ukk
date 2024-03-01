<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::get();
        return view('admin.index', [
            'title' => 'Index',
            'active' => 'index',
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::get();
        return view('form.form-admin', [
            'title' => 'Index',
            'active' => 'index',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:5|max:85',
            'email' => 'required|email|',
            'password' => 'nullable|max:8',
            'nomor_telepon' => 'required|max:13',
            'alamat' => 'required|max:255',
            'role' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);
        $image = $request->gambar;
        $imagename = time() . '.' . $image->extension();
        $validateData['gambar']->move(public_path('image') . '/', $imagename);
        $validateData['gambar'] = $imagename;
        if ($validateData) {
            // dd($validateData);
            User::create($validateData);

            return redirect()->intended('admin');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::where('id', $id)->first();

        return view('dashboard.detail-profile', [
            'title' => 'Profile',
            'active' => 'buku',
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', $id)->first();

        return view('edit.edit-user', [
            'user' => $user,
            'title' => 'Edit User',
            'actiive' => 'buku'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->has('gambar')) {
            $validateData = $request->validate([
                'name' => 'required|min:5|max:85',
                'email' => 'required|email|',
                'password' => 'nullable|max:8',
                'nomor_telepon' => 'required|max:13',
                'alamat' => 'required|max:255',
                'role' => 'required',
                'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            ]);
            $user = User::where('id', $id)->first();

            if ($user->gambar != null) {
                $path = public_path('image/') . $user->gambar;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            $image = $request->gambar;
            $imagename = time() . '.' . $image->extension();
            $validateData['gambar']->move(public_path('image') . '/', $imagename);
            $validateData['gambar'] = $imagename;

            $user->update($validateData);
            
        } else {
            $validateData = $request->validate([
                'name' => 'nullable|min:5|max:85',
                'email' => 'nullable|email|',
                'password' => 'nullable|max:8',
                'nomor_telepon' => 'nullable|max:13',
                'alamat' => 'nullable|max:255',
                'role' => 'nullable',
            ]);
            $user = User::where('id', $id)->update($validateData);
        }
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id)->first();
        if ($user->gambar != null) {
            $path = public_path('storage/posts/') . $user->gambar;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $user->delete();
        return back();
    }
}
