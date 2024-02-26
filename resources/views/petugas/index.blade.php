@extends('layouts.kumpulan')
@section('contents')
    <div class="page-heading">
        <h3>Profile Statistics</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="container">
                <div class="">
                    <div class="col">
                        <h3 class="mt-3">Selamat Datang di Peminjaman </h3>
                        <div class=" d-flex  justify-content-center mt-5 ">
                            <table class="table table-bordered border-dark-subtle  ">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Penulis</th>
                                        <th scope="col">Penerbit</th>
                                        <th scope="col">Tahun Terbit</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Jumlah Pinjam</th>
                                        <th scope="col">Stok</th>
                                        <th>Option</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <th class=" ">Si Bobo</th>
                                        <td class=" ">Fadli</td>
                                        <td class="">Pasya</td>
                                        <td class="">2013</td>
                                        <td class="">Buku ini Bagus</td>
                                        <td class="">2</td>
                                        <td class="">1</td>
                                        <td>
                                            <div class="dropdown d-flex  justify-content-center ">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Options
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="{{ 'kategori.edit' }} }}">Edit</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                                    <li><a class="dropdown-item" href="#"></a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
