<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    public function register()
    {
        return view('auth.register')->with('title', 'Register');
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            // 'username'=>'required|string|max:50|',
            'password' => 'required|min:8|confirmed',
            'nomor_telepon' => 'required|string|max:13',
            'alamat' => 'required|string|max:250',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png|max:5120'


        ]);


        $image = $request->gambar;
        $imagename = time() . '.' . $image->extension();
        $validateData['gambar']->move(public_path('image') . '/', $imagename);
        $validateData['gambar'] = $imagename;
        if ($validateData) {
            $validateData['role'] = 'peminjam';

            User::create($validateData);

            return redirect()->intended('login');
        }


        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     // 'username'=>$request->username,
        //     'nomor_telepon' => $request->nomor_telepon,
        //     'alamat' => $request->alamat,
        //     'gambar' => 'nullable|image|mimes:jpeg,jpg,png|max:5120'
        // ]);



        // $credentials  = $request->only('email', 'password');
        // Auth::attempt($credentials);
        // $request->session()->regenerate();
        // return redirect()->route('login')->withSuccess('Succes Register');
    }

    public function login()
    {
        return view('auth.login')->with('title', 'Login');
    }

    public function authenticate(Request $request)
    {
        $credentials  = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->role === 'admin') {
                return redirect()->intended('/admin');
            } else if (auth()->user()->role === 'petugas') {
                return redirect()->intended('/petugas');
            } else if (auth()->user()->role === 'peminjam') {
                return redirect()->intended('/peminjaman');
            }
            // return redirect('dashboard')->withSuccess('Succes Login');
        }

        return back()->withErrors([
            'email' => 'Tidak Sesuai dengan email',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }
}
