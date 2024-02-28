@extends('layouts.kumpulan')
@section('contents')
    <div class="row justify-content-center mt-3">
        <div class="">
            <div class="">
                <h3>Halaman Tambah Buku</h3>
            </div>
            @if ($errors->any())
                <p>{{ $errors }}</p>
            @endif
            <form action="{{ route('dashboard.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="Judul" class="form-label">Judul Buku</label>
                            <input type="text" class="form-control" id="judul-buku" name="judul"
                                placeholder="Judul Buku">
                        </div>
                        <div class="mb-3">
                            <label for="Kategori" class="form-label">Kategori</label>
                            <select class="form-select" name="id_kategori" placeholder="Nama Kategori">
                                @foreach ($kategori as $kategori)
                                    <option value="{{ $kategori->id }}"
                                        {{ $kategori->id == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Penulis">
                        </div>
                        <div class="mb-3">
                            <label for="Judul" class="form-label">Tahun Terbit</label>
                            <input type="date" max="2099" step="1" class="form-control" id="judul-buku"
                                name="tahun_terbit" placeholder="Tahun Terbit">
                        </div>
                        <div class="mb-3">
                            <label for="Judul" class="form-label">Deskripsi</label>
                            <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="Stok" class="form-label">Stok</label>
                            <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok">
                        </div>
                        <div class="mb-3">
                            <label for="Gambar Pinjam" class="form-label">Gambar / Cover Buku</label>
                            <input type="file" name="cover" class="form-control" id="">
                        </div>

                        <a href="{{ route('dashboard.index') }}" class="btn btn-primary ">Back</a>


                        <button type="reset" class="btn btn-dark ">Reset</button>


                        <button type="submit" class="btn btn-success">Simpan</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
