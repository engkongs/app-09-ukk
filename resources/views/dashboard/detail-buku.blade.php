@extends('layouts.kumpulan')
@section('contents')
    <div class="page-heading">
        <h3></h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="container">
                <div class="">
                    <div class="col">
                        <h3 class="mt-3">Selamat Datang di Detail Buku </h3>
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('kategori.create') }}">
                                    <button class="btn btn-primary ">Tambah Koleksi</button>
                                </a>
                                <img src="{{ asset('storage/posts/' . $buku->cover) }}" alt="" class="ms-3"
                                    style="width:200px; height:200px">
                                <div class=" d-flex  justify-content-center mt-5 ">
                                    <div class="mb-3">
                                        <form action="">
                                            <div class="mb-3">
                                                <label for="judul-buku" class="form-label">ID</label>
                                                <input type="text" class="form-control" readonly
                                                    value="{{ $buku->id }}" id="judul-buku" name="judul"
                                                    placeholder="Judul">
                                            </div>
                                            <div class="mb-3">
                                                <label for="judul-buku" class="form-label">Judul Buku</label>
                                                <input type="text" class="form-control" readonly
                                                    value="{{ Str::title($buku->judul) }}" id="judul-buku" name="judul"
                                                    placeholder="Judul Buku">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Kategori" class="form-label">Kategori</label>
                                                <input type="text" class="form-control" readonly
                                                    value="{{ Str::title($kategori->kategori) }}" id="kategori"
                                                    name="kategori" placeholder="Nama Kategori">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Penulis" class="form-label">Penulis</label>
                                                <input type="text" class="form-control" value="Gilang faster" readonly
                                                    id="penulis" name="penulis" placeholder="Penulis">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Penerbit" class="form-label">Penerbit</label>
                                                <input type="text" class="form-control" value="PT.Gema" readonly
                                                    id="penerbit" name="penerbit" placeholder="Nama Kategori">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Tahun terbit" class="form-label">Tahun Terbit</label>
                                                <input type="number" min="1990" max="2099" step="1"
                                                    value="2005" class="form-control" readonly
                                                    value="{{ Str::title($buku->tahun_terbit) }}" id="tahun_terbit"
                                                    name="tahun_terbit" placeholder="Nama Kategori">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Stok" class="form-label">Stok</label>
                                                <input type="number" class="form-control" readonly
                                                    value="{{ Str::title($buku->stok) }}" value="20" id="stok"
                                                    name="stok" placeholder="Nama Kategori">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Deskripsi" class="form-label">Deskripsi</label>
                                                <textarea type="text" class="form-control" readonly value="{{ Str::title($buku->deskripsi) }}" id="kategori"
                                                    name="deskripsi" placeholder="Deskripsi">{{ $buku->deskripsi }}</textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class=" d-flex  justify-content-center mt-5 ">
                                    <table class="table table-bordered border-dark-subtle  ">
                                        <thead>
                                            <tr>
                                                <th scope="col"
                                                    class=" text-center 
                                                ">#
                                                </th>
                                                <th scope="col" class="text-center">Buku</th>
                                                <th scope="col" class="text-center">Ulasan</th>
                                                <th scope="col" class="text-center">Rating</th>
                                                <th scope="col" class="text-center">Pemberi Ulasan</th>
                                                <th scope="col" class="text-center">Option</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ulas as $ulas)
                                                <tr>
                                                    <td class=" text-center ">{{ $loop->iteration }}</td>
                                                    <td class="text-center">{{ Str::title($ulas->$buku->judul) }}</td>
                                                    <td class="text-center">{{ $ulas->ulasan }}</td>
                                                    <td class="text-center">{{ $ulas->rating }}</td>
                                                    <td class="text-center">{{ Str::title($ulas->user->username) }}</td>
                                                    <td>
                                                        <div class="dropdown d-flex  justify-content-center ">
                                                            <button class="btn btn-secondary dropdown-toggle"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                Options
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item"
                                                                        href={{ route('ulas.edit', $kategori->id) }}>Edit</a>
                                                                </li>
                                                                <form action="{{ route('ulas.destroy', $kategori->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <li><button type="submit" class="dropdown-item"
                                                                            href="#">Delete</button></li>
                                                                </form>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
