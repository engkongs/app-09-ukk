@extends('layouts.kumpulan')
@section('contents')
    <div class="row justify-content-center mt-3">
        <div class="">
            <div class="">
                <h3>Halaman Tambah Kategori</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('kategori.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="Kategori" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="judul-buku" name="kategori"
                                placeholder="Nama Kategori">
                        </div>
                        <a href="{{ route('kategori.index') }}" class="btn btn-primary ">Back</a>
                        <a href="">
                            <button type="reset" class="btn btn-dark ">Reset</button>
                        </a>
                        <a href="">
                            <button type="submit" class="btn btn-success ">Simpan</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
