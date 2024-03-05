@extends('layouts.kumpulan')
@section('contents')
    <div class="page-heading">
        <h3>Hallo, {{ Str::title(Auth::user()->name) }}</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="container">
                <div class="">
                    <div class="col">
                        <h3 class="mt-3">Selamat Datang di Halaman Peminjaman </h3>
                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'petugas')
                            <div class="card">
                                <div class="card-body">
                                    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'petugas')
                                        <a href="{{ route('peminjaman.create') }}">
                                            <button class="btn btn-primary ">Tambah Data</button>
                                        </a>
                                    @endif
                                    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'petugas')
                                        <a href="{{ route('cetakpeminjaman') }}">
                                            <button class="btn btn-primary ">Export Data Peminjaman</button>
                                        </a>
                                    @endif
                                    <div class=" d-flex  justify-content-center mt-5 ">
                                        <table class="table table-bordered border-dark-subtle  ">
                                            <thead>
                                                <tr>
                                                    <th scope="col"
                                                        class=" text-center
                                                ">
                                                        #
                                                    </th>
                                                    <th scope="col" class="text-center">Judul</th>
                                                    <th scope="col" class="text-center">Tanggal Pinjam</th>
                                                    <th scope="col" class="text-center">Tanggal Kembali</th>
                                                    <th scope="col" class="text-center">Tenggat</th>
                                                    <th scope="col" class="text-center">Status</th>
                                                    <th scope="col" class="text-center">Peminjam</th>
                                                    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'petugas')
                                                        <th scope="col" class="text-center">Option</th>
                                                    @endif

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($peminjam as $peminjam)
                                                    <tr>
                                                        <td class=" text-center ">{{ $loop->iteration }}</td>
                                                        <td class="text-center">{{ Str::title($peminjam->buku->judul) }}
                                                        </td>
                                                        <td class="text-center">{{ $peminjam->tanggal_pinjam }}</td>
                                                        <td class="text-center">{{ $peminjam->tanggal_kembali }}</td>
                                                        <td class="text-center">{{ $peminjam->tenggat }}</td>
                                                        <td class="text-center">{{ Str::title($peminjam->status) }}</td>
                                                        <td class="text-center">{{ Str::title($peminjam->user->name) }}</td>
                                                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'petugas')
                                                            <td>
                                                                <div class="dropdown d-flex  justify-content-center ">
                                                                    <button class="btn btn-secondary dropdown-toggle"
                                                                        type="button" data-bs-toggle="dropdown"
                                                                        aria-expanded="false">
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
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if (auth()->user()->role == 'peminjam')
                            <div class="card">
                                <div class="card-body">
                                    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'petugas')
                                        <a href="{{ route('peminjaman.create') }}">
                                            <button class="btn btn-primary ">Tambah Data</button>
                                        </a>
                                    @endif
                                    <div class=" d-flex  justify-content-center mt-5 ">
                                        <table class="table table-bordered border-dark-subtle  ">
                                            <thead>
                                                <tr>
                                                    <th scope="col"
                                                        class=" text-center
                                                ">
                                                        #
                                                    </th>
                                                    <th scope="col" class="text-center">Judul</th>
                                                    <th scope="col" class="text-center">Tanggal Pinjam</th>
                                                    <th scope="col" class="text-center">Tanggal Kembali</th>
                                                    <th scope="col" class="text-center">Tenggat</th>
                                                    <th scope="col" class="text-center">Status</th>
                                                    <th scope="col" class="text-center">Peminjam</th>
                                                    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'petugas')
                                                        <th scope="col" class="text-center">Option</th>
                                                    @endif

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($peminjaman_user as $peminjaman_user)
                                                    <tr>
                                                        <td class=" text-center ">{{ $loop->iteration }}</td>
                                                        <td class="text-center">
                                                            {{ Str::title($peminjaman_user->buku->judul) }}
                                                        </td>
                                                        <td class="text-center">{{ $peminjaman_user->tanggal_pinjam }}</td>
                                                        <td class="text-center">{{ $peminjaman_user->tanggal_kembali }}
                                                        </td>
                                                        <td class="text-center">{{ $peminjaman_user->tenggat }}</td>
                                                        <td class="text-center">{{ Str::title($peminjaman_user->status) }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ Str::title($peminjaman_user->user->name) }}
                                                        </td>
                                                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'petugas')
                                                            <td>
                                                                <div class="dropdown d-flex  justify-content-center ">
                                                                    <button class="btn btn-secondary dropdown-toggle"
                                                                        type="button" data-bs-toggle="dropdown"
                                                                        aria-expanded="false">
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
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
