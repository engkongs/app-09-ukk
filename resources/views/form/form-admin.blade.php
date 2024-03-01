@extends('layouts.kumpulan')
@section('contents')
    <div class="row justify-content-center mt-3">
        <div class="">
            <div class="">
                <h3>Halaman Tambah Admin</h3>
            </div>
            @if ($errors->any())
                <p>{{ $errors }}</p>
            @endif
            <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="Nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Nama Lengkap">
                        </div>
                        <div class="mb-3">
                            <label for="penulis" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="password">
                        </div>
                        <div class="mb-3">
                            <label for="Judul" class="form-label">Nomor Telepon</label>
                            <input type="text" max="13" class="form-control" id="nomor-telepon"
                                name="nomor_telepon" placeholder="Nomor Telepon">
                        </div>
                        <div class="mb-3">
                            <label for="Judul" class="form-label">Alamat</label>
                            <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="Gambar User" class="form-label">Profile User</label>
                            <input type="file" name="gambar" class="form-control" id="gambar">
                        </div>
                        <div class="mb-3">
                            <label for="Role" class="form-label">Role</label>
                            <select class="form-control" name="role" id="role" aria-label="Default select example">
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                                <option value="peminjam">Peminjam</option>
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
