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
                            <div class="card-body d-flex row ">
                                <div class="col-6 position-relative ">
                                    <form action="{{ route('koleksi.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id_buku" value="{{ $buku->id }}">
                                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                        <button type="submit" class="btn btn-primary position-absolute top-0 left-0">Tambah
                                            Koleksi</button>
                                    </form>
                                    <img src="{{ asset('image/' . $buku->cover) }}" class="w-75" alt="">
                                </div>
                                <div class=" d-flex mt-5 col-6">
                                    <div class="mb-3">
                                        <form action="">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="judul-buku" class="form-label">ID</label>
                                                        <input type="text" class="form-control" readonly
                                                            value="{{ $buku->id }}" id="judul-buku" name="judul"
                                                            placeholder="Judul">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="judul-buku" class="form-label">Judul Buku</label>
                                                        <input type="text" class="form-control" readonly
                                                            value="{{ Str::title($buku->judul) }}" id="judul-buku"
                                                            name="judul" placeholder="Judul Buku">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="Kategori" class="form-label">Kategori</label>
                                                        <input type="text" class="form-control" readonly
                                                            value="{{ Str::title($kategori->kategori) }}" id="kategori"
                                                            name="kategori" placeholder="Nama Kategori">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="Penulis" class="form-label">Penulis</label>
                                                        <input type="text" class="form-control"
                                                            value=" {{ Str::title($buku->penulis) }}" readonly
                                                            id="penulis" name="penulis" placeholder="Penulis">
                                                    </div>
                                                </div>
                                                <div class="col-6">
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
                                                            value="{{ Str::title($buku->stok) }}" value="20"
                                                            id="stok" name="stok" placeholder="Nama Kategori">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="Deskripsi" class="form-label">Deskripsi</label>
                                                        <textarea type="text" class="form-control" readonly value="{{ Str::title($buku->deskripsi) }}" id="kategori"
                                                            name="deskripsi" placeholder="Deskripsi">{{ $buku->deskripsi }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h3>Ulasan</h3>
                                <a href="{{ route('ulasan.create') }}">
                                    <button type="submit" class="btn btn-primary mt-3">
                                        Kasih Ulasan
                                    </button>
                                </a>
                                <div class=" d-flex  justify-content-center mt-5 ">
                                    <table class="table table-bordered border-dark-subtle  ">
                                        <thead>
                                            <tr>
                                                <th scope="col"
                                                    class=" text-center
                                                ">
                                                    #
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
                                                    <td class="text-center">{{ Str::title($buku->judul) }}</td>
                                                    <td class="text-center">{{ $ulas->ulasan }}</td>
                                                    <td class="text-center">{{ $ulas->rating }}</td>
                                                    <td class="text-center">{{ Str::title($ulas->user->name) }}</td>
                                                    <td>
                                                        <div class="dropdown d-flex  justify-content-center ">
                                                            <button class="btn btn-secondary dropdown-toggle"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                Options
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item"
                                                                        href="{{ route('ulasan.edit', $ulas->id) }}">Edit</a>
                                                                </li>
                                                                <form action="{{ route('ulasan.destroy', $ulas->id) }}"
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
