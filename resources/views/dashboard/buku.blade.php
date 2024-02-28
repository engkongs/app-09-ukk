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
                        <h3 class="mt-3">Selamat Datang di Halaman Buku </h3>
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('dashboard.create') }}">
                                    <button class="btn btn-primary ">Tambah Buku</button>
                                </a>
                                <div class=" d-flex  justify-content-center mt-5 ">
                                    <table class="table table-bordered border-dark-subtle  ">
                                        <thead>
                                            <tr>
                                                <th scope="col"
                                                    class=" text-center 
                                                ">#
                                                </th>
                                                <th scope="col" class="text-center">Judul</th>
                                                <th scope="col" class="text-center">Kategori</th>
                                                <th scope="col" class="text-center">Penulis</th>
                                                <th scope="col" class="text-center">Tahun Terbit</th>
                                                <th scope="col" class="text-center">Deskripsi</th>
                                                <th scope="col" class="text-center">Cover</th>
                                                <th scope="col" class="text-center">Stok</th>
                                                <th scope="col" class="text-center">Option</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($buku as $buku)
                                                <tr>
                                                    <td class=" text-center ">{{ $loop->iteration }}</td>
                                                    <td class="text-center">{{ Str::title($buku->judul) }}</td>
                                                    <td class="text-center">{{ Str::title($buku->kategori->kategori) }}</td>
                                                    <td class="text-center">{{ Str::title($buku->penulis) }}</td>
                                                    <td class="text-center">{{ Str::title($buku->tahun_terbit) }}</td>
                                                    <td class="text-center">{{ Str::title($buku->deskripsi) }}</td>
                                                    <td style="width: 150px; height: 200px"><img
                                                            src="{{ asset('image/' . $buku->cover) }}" width="150"
                                                            height="200" alt="">
                                                    </td>
                                                    <td class="text-center">{{ Str::title($buku->stok) }}</td>

                                                    <td>
                                                        <div class="dropdown d-flex  justify-content-center ">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Options
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item"
                                                                        href={{ route('dashboard.show', $buku->id) }}>Detail
                                                                        Buku</a>
                                                                </li>
                                                                <li><a class="dropdown-item"
                                                                        href={{ route('dashboard.edit', $buku->id) }}>Edit</a>
                                                                </li>
                                                                <form action="{{ route('dashboard.destroy', $buku->id) }}"
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
