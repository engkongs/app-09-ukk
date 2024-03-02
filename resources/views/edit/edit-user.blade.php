@extends('layouts.kumpulan')
@section('contents')
    <div class="row justify-content-center mt-3">
        <div class="">
            <div class="">
                <h3>Halaman Edit Profile</h3>
            </div>
            @if ($errors->any())
                <p>{{ $errors }}</p>
            @endif
            <form action="{{ route('admin.update', $user->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            <div class="avatar avatar-2xl">
                                <img src="{{ asset('image/' . $user->gambar) }}" style="width:200px; height:200px"
                                    alt="Avatar">
                            </div>
                            <h3 class="mt-3">{{ Str::title($user->username) }}</h3>
                            <p class="text-small">{{ Str::title($user->role) }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="Nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Nama Lengkap" value="{{ Str::title($user->name) }}">
                        </div>
                        <div class="mb-3">
                            <label for="penulis" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                value="{{ Str::title($user->email) }}">
                        </div>
                        <div class="mb-3">
                            <label for="Judul" class="form-label">Nomor Telepon</label>
                            <input type="text" max="13" class="form-control" id="nomor_telepon"
                                name="nomor_telepon" placeholder="Nomor Telepon"
                                value="{{ Str::title($user->nomor_telepon) }}">
                        </div>
                        <div class="mb-3">
                            <label for="Judul" class="form-label">Alamat</label>
                            <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" readonly>{{ Str::title($user->alamat) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="Gambar User" class="form-label">Profile User</label>
                            <input type="file" name="gambar" class="form-control" id="gambar">
                        </div>
                        <div class="mb-3">
                            <label for="Judul" class="form-label">Role</label>
                            <select class="form-control" name="role" id="role" aria-label="Default select example">
                                <option value="admin"{{ $user->role == 'admin' ? 'selected' : '' }}>Admin
                                </option>
                                <option value="petugas"{{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas
                                </option>
                                <option value="peminjam"{{ $user->role == 'peminjam' ? 'selected' : '' }}>
                                    Peminjam
                                </option>
                            </select>
                        </div>
                        <a href="{{ route('admin.index') }}" class="btn btn-primary ">Back</a>


                        <button type="reset" class="btn btn-dark ">Reset</button>


                        <button type="submit" class="btn btn-success">Simpan</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
