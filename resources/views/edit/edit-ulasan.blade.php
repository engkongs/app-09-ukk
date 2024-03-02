@extends('layouts.kumpulan')
@section('contents')
    <div class="row justify-content-center mt-3">
        <div class="">
            <div class="">
                <h3>Halaman Edit Ulasan</h3>
            </div>
            @if ($errors->any())
                <p>{{ $errors }}</p>
            @endif
            <form action="{{ route('ulasan.update', $ulas->id) }}" method="post">
                @method('PUT')
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
                            <label for="Judul" class="form-label">Judul Buku</label>
                            <select class="form-select" name="id_buku" placeholder="Nama Kategori">
                                @foreach ($buku as $buku)
                                    <option value="{{ $buku->id }}"{{ $buku->id == $ulas->buku->id ? 'selected' : '' }}>
                                        {{ $buku->judul }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Judul" class="form-label">Rating</label>
                            <select class="form-control" name="rating" id="rating" aria-label="Default select example">
                                <option value="1"{{ $ulas->rating == '1' ? 'selected' : '' }}>1
                                </option>
                                <option value="2"{{ $ulas->rating == '2' ? 'selected' : '' }}>2
                                </option>
                                <option value="3"{{ $ulas->rating == '3' ? 'selected' : '' }}>3
                                </option>
                                <option value="4"{{ $ulas->rating == '4' ? 'selected' : '' }}>4
                                </option>
                                <option value="5"{{ $ulas->rating == '5' ? 'selected' : '' }}>5
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="komentar" class="form-label">Komentar</label>
                            <textarea type="text" class="form-control" id="ulasan" name="ulasan" placeholder=" Komentar">{{ $ulas->ulasan }}</textarea>
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
