@extends('layouts.kumpulan')
@section('contents')
    <div class="row justify-content-center mt-3">
        <div class="">
            <div class="">
                <h3>Halaman Edit Peminjam</h3>
            </div>
            @if ($errors->any())
                <p>{{ $errors }}</p>
            @endif
            <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="Judul" class="form-label">Judul Buku</label>
                            <select class="form-select" name="id_buku" placeholder="Nama Kategori">
                                @foreach ($listbuku as $buku)
                                    <option
                                        value="{{ $buku->id }}"{{ $buku->id == $peminjaman->buku->id ? 'selected' : '' }}>
                                        {{ $buku->judul }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam"
                                placeholder="Tanggal Pinjam" value="{{ $peminjaman->tanggal_pinjam }}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali"
                                value="{{ $peminjaman->tanggal_kembali }}" placeholder="Tanggal Kembali">
                        </div>
                        <div class="mb-3">
                            <label for="Tenggat" class="form-label">Tenggat</label>
                            <input type="date" class="form-control" id="tenggat" name="tenggat" placeholder="Tenggat"
                                value="{{ $peminjaman->tenggat }}">
                        </div>
                        <div class="mb-3">
                            <label for="Judul" class="form-label">Status</label>
                            <select class="form-control" name="status" id="status" aria-label="Default select example">
                                <option value="dipeasn"{{ $peminjaman->status == 'dipeasn' ? 'selected' : '' }}>Dipesan
                                </option>
                                <option value="dipinjam"{{ $peminjaman->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam
                                </option>
                                <option value="dikembalikan"{{ $peminjaman->status == 'dikembalikan' ? 'selected' : '' }}>
                                    Dikembalikan
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_user" class="form-label">Peminjam</label>
                            <select class="form-select" name="id_user" placeholder="Nama Kategori">
                                @foreach ($user as $user)
                                    <option value="{{ $user->id }}"
                                        {{ $user->id == $peminjaman->id_user ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <a href="{{ route('peminjaman.index') }}" class="btn btn-primary ">Back</a>


                        <button type="reset" class="btn btn-dark ">Reset</button>


                        <button type="submit" class="btn btn-success">Simpan</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
