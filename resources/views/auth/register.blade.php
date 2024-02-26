@extends('layouts.mainregister')

@section('contents')
    <div class="container-fluid d-flex  align-items-center "
        style="height:1000px; background-repeat:no-repeat;background-image: url('{{ asset('River-of-Books-scaled-e1683319031281.jpg') }}');">
        <div class="container d-flex  justify-content-center">
            <div class="">
                <div class="card" style="width: 30rem;">
                    <div class="">
                        <h1 class="d-flex justify-content-center  fw-bold ">Belum Punya Akun ?</h1>
                        <div class="d-flex justify-content-center">
                            <h3 class=" fw-semibold ">Langsung Saja Daftar</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('register.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <input type="text"
                                        class="form-control border rounded-pill p-3 @error('name') is-invalid @enderror"
                                        id="name" placeholder="Nama Lengkap" name="name"
                                        value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                    <div class="mt-3  mb-3">
                                        <input type="email"
                                            class="form-control border rounded-pill p-3 @error('email') is-invalid  @enderror"
                                            placeholder="Email" id="email" name="email" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" id="password"
                                            class="form-control border  rounded-pill  p-3 @error('password') is-invalid  @enderror"
                                            aria-describedby="passwordHelpInline" placeholder="Password" id="password"
                                            name="password">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_confirmation"
                                            class="col-md-4 col-form-label text-md-end text-start"></label>
                                        <div class="col">
                                            <input type="password" class="form-control border  rounded-pill p-3 "
                                                id="password_confirmation" name="password_confirmation"
                                                placeholder="Konifrmasi Password">
                                        </div>
                                    </div>
                                    {{-- <div class="mb-3">
                                        <input type="text"
                                            class="form-control border rounded-pill p-3 @error('username') is-invalid  @enderror "
                                            id="username" name="username" value="{{ old('username') }}"
                                            placeholder="Username">
                                        @if ($errors->has('username'))
                                            <span class="text-danger">{{ $errors->first('username') }}</span>
                                        @endif
                                    </div> --}}
                                    <div class="mb-3">
                                        <input type="number"
                                            class="form-control border rounded-pill p-3 @error('nomor_telepon') is-invalid @enderror  "
                                            placeholder="Nomor Telepon" id="nomor_telepon" name="nomor_telepon"
                                            value="{{ old('nomor_telepon') }}">
                                        @if ($errors->has('nomor_telepon'))
                                            <span class="text-danger">{{ $errors->first('nomor_telepon') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control border rounded-pill @error('alamat') is-invalid @enderror " id="alamat"
                                            placeholder="Alamat" name="alamat" value="{{ old('alamat') }}"></textarea>
                                    </div>
                                    

                                    <div class="mb-3 d-flex justify-content-center rounded-pill p-3 ">
                                        <button type="submit"
                                            class="btn btn-dark d-flex justify-content-center rounded-pill p-3  ">Masuk!</button>
                                    </div>
                                    <div class="justify-content-center mb-3 ">
                                        <a href="{{ url('login') }}"
                                            class="btn btn-dark d-flex justify-content-center rounded-pill p-3">Back
                                            Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
