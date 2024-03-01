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
                        <h3 class="mt-3">Selamat Datang di Halaman Peminjaman </h3>
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('peminjaman.create') }}">
                                    <button class="btn btn-primary ">Tambah Data</button>
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
                                                <th scope="col" class="text-center">Tanggal Pinjam</th>
                                                <th scope="col" class="text-center">Tanggal Kembali</th>
                                                <th scope="col" class="text-center">Tenggat</th>
                                                <th scope="col" class="text-center">Status</th>
                                                <th scope="col" class="text-center">Peminjam</th>
                                                <th scope="col" class="text-center">Option</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($peminjam as $peminjam)
                                                <tr>
                                                    <td class=" text-center ">{{ $loop->iteration }}</td>
                                                    <td class="text-center">{{ Str::title($peminjam->buku->judul) }}</td>
                                                    <td class="text-center">{{ $peminjam->tanggal_pinjam }}</td>
                                                    <td class="text-center">{{ $peminjam->tanggal_kembali }}</td>
                                                    <td class="text-center">{{ $peminjam->tenggat }}</td>
                                                    <td class="text-center">{{ Str::title($peminjam->status) }}</td>
                                                    <td class="text-center">{{ Str::title($peminjam->user->name) }}</td>
                                                    <td>
                                                        <div class="dropdown d-flex  justify-content-center ">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Options
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item"
                                                                        href={{ route('peminjaman.edit', $peminjam->id) }}>Edit</a>
                                                                </li>
                                                                <form
                                                                    action="{{ route('peminjaman.destroy', $peminjam->id) }}"
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
