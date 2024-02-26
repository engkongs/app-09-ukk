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
                        <h3 class="mt-3">Selamat Datang di Halaman Kategori </h3>
                        <div class=" d-flex  justify-content-center mt-5 ">
                            <table class="table table-bordered border-dark-subtle  ">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Kategori</th>
                                        <th scope="col">Option</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori as $kategori)
                                        <tr>
                                            <th scope="row">1</th>
                                            <th class=" ">Si Bobo</th>

                                            <td>
                                                <div class="dropdown d-flex  justify-content-center ">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        Options
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="/edit">Edit</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                                        <li><a class="dropdown-item" href="#"></a></li>
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
        </section>
    </div>
@endsection
