@extends('layouts.kumpulan')
@section('contents')
    <div class="row justify-content-center mt-3">
        <div class="">
            <div class="">
                <h3>Halaman Tambah Ulasan</h3>
            </div>
            @if ($errors->any())
                <p>{{ $errors }}</p>
            @endif
            <form action="{{ route('ulasan.store') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <input type="text" hidden name="id_user" value="{{ Auth::user()->id }}" id="">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" placeholder="" readonly
                                value="{{ Auth::user()->name }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Judul Buku</label>
                            <select class="form-select" name="id_buku" aria-label="Default select example">
                                @foreach ($buku as $buku)
                                    <option value="{{ $buku->id }}">{{ $buku->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Judul" class="form-label">Kasih Rating</label>
                            <select class="form-control" name="rating" id="rating" aria-label="Default select example">
                                <option value="1">1
                                </option>
                                <option value="2">2
                                </option>
                                <option value="3">3
                                </option>
                                <option value="4">4
                                </option>
                                <option value="5">5
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="komentar" class="form-label">Komentar</label>
                            <textarea type="text" class="form-control" id="ulasan" name="ulasan" placeholder=" Komentar"></textarea>
                        </div>
                        <a href="{{ route('dashboard.index') }}" class="btn btn-primary ">Back</a>


                        <button type="reset" class="btn btn-dark ">Reset</button>


                        <button type="submit" class="btn btn-success">Simpan</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
