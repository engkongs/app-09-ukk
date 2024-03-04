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
                        <h3 class="mt-3">Selamat Datang di Halaman Kategori </h3>
                        <div class="card">
                            <div class="card-body">
                                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'petugas')
                                    <a href="{{ route('kategori.create') }}">
                                        <button class="btn btn-primary ">Tambah Kategori</button>
                                    </a>
                                @endif
                                <div class=" d-flex  justify-content-center mt-5 ">
                                    <table class="table table-bordered border-dark-subtle  ">
                                        <thead>
                                            <tr>
                                                <th scope="col"
                                                    class=" text-center
                                                ">#
                                                </th>
                                                <th scope="col" class="text-center">Nama Kategori</th>
                                                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'petugas')
                                                    <th scope="col" class="text-center">Option</th>
                                                @endif

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kategori as $kategori)
                                                <tr>
                                                    <td class=" text-center ">{{ $loop->iteration }}</td>
                                                    <td class="text-center">{{ Str::title($kategori->kategori) }}</td>

                                                    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'petugas')
                                                        <td>
                                                            <div class="dropdown d-flex  justify-content-center ">
                                                                <button class="btn btn-secondary dropdown-toggle"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    Options
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'petugas')
                                                                        <li><a class="dropdown-item"
                                                                                href={{ route('kategori.edit', $kategori->id) }}>Edit</a>
                                                                        </li>
                                                                    @endif
                                                                    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'petugas')
                                                                        <form
                                                                            action="{{ route('kategori.destroy', $kategori->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <li><button type="submit" class="dropdown-item"
                                                                                    href="#">Delete</button></li>
                                                                        </form>
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                    @endif
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
