@extends('layouts.kumpulan')
@section('contents')
    <div class="row justify-content-center mt-3">
        <div class="">
            <div class="">
                <h3>Halaman Edit Buku</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.update', $buku->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <img src="{{ asset('image/' . $buku->cover) }}" width="400" height="500" alt="">
                        </div>
                        <div class="mb-3">
                            <label for="Judul" class="form-label">Judul Buku</label>
                            <input type="text" class="form-control" value="{{ $buku->judul }}" id="judul-buku"
                                name="judul" placeholder="Judul Buku">
                        </div>
                        <div class="mb-3">
                            <label for="Kategori" class="form-label">Kategori</label>
                            <select class="form-select" name="id_kategori" placeholder="Nama Kategori">
                                @foreach ($kategori as $kategori)
                                    <option value="{{ $kategori->id }}"
                                        {{ $kategori->id == $buku->kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input type="text" class="form-control" value="{{ $buku->penulis }}" id="penulis"
                                name="penulis" placeholder="Judul Buku">
                        </div>
                        <div class="mb-3">
                            <label for="Judul" class="form-label">Tahun Terbit</label>
                            <input type="text" class="form-control" value="{{ $buku->tahun_terbit }}" id="judul-buku"
                                name="tahun_terbit" placeholder="Judul Buku">
                        </div>
                        <div class="mb-3">
                            <label for="cover" class="form-label">Gambar</label>
                            <input type="file" class="form-control" name="cover" id="cover"
                                value="{{ $buku->cover }}">
                        </div>
                        <div class="mb-3">
                            <label for="Judul" class="form-label">Deskripsi</label>
                            <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi">{{ $buku->deskripsi }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="Stok" class="form-label">Stok</label>
                            <input type="text" class="form-control" value="{{ $buku->stok }}" id="stok"
                                name="stok" placeholder="Stok">
                        </div>
                        <a href="{{ route('dashboard.index') }}" class="btn btn-primary ">Back</a>


                        <button type="reset" class="btn btn-dark ">Reset</button>


                        <button type="submit" class="btn btn-success">Simpan</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
