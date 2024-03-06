@extends('layouts.kumpulan')
@section('contents')
    <div class="page-heading">
        <h3>Hallo, {{ Str::title(Auth::user()->name) }}</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="col">
                            <h3 class="mt-3">Selamat Datang di Halaman Admin </h3>
                            <a href="{{ route('admin.create') }}" class="btn btn-primary mt-3">Tambah User
                            </a>
                            <div class=" d-flex  justify-content-center mt-5 ">
                                <table class="table table-bordered border-dark-subtle  ">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">#</th>
                                            <th scope="col" class="text-center">Nama Lengkap</th>
                                            <th scope="col" class="text-center">Email</th>
                                            <th scope="col" class="text-center">Role</th>
                                            <th class="text-center">Option</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $user)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ Str::title($user->name) }}</td>
                                                <td class="text-center">{{ $user->email }}</td>
                                                <td class="text-center">{{ Str::title($user->role) }}</td>
                                                <td>
                                                    @if ($user->id !== Auth::id())
                                                        <div class="dropdown d-flex  justify-content-center ">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Options
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item"
                                                                        href={{ route('admin.show', $user->id) }}>Detail
                                                                        Profile</a>
                                                                </li>
                                                                <li><a class="dropdown-item"
                                                                        href={{ route('admin.edit', $user->id) }}>Edit</a>
                                                                </li>
                                                                <form action="{{ route('admin.destroy', $user->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <li><button type="submit" class="dropdown-item"
                                                                            href="#">Delete</button></li>
                                                                </form>
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
        </section>
    </div>
@endsection
