@extends('layouts.auth')

@section('contents')
    <div class="container-fluid d-flex  align-items-center "
        style="height:1300px; background-repeat:no-repeat;background-image: url('{{ asset('image 1.png') }}');">
        <div class="container d-flex  justify-content-center">
            <div class="">
                <div class="card " style="width: 30rem; margin-bottom: 500px;">
                    <div class="">
                        <h1 class="d-flex justify-content-center fw-bold  ">Selamat Datang !</h1>
                        <div class="card-body">
                            <form action="{{ route('login.store') }}" method="post">
                                @csrf
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
                                        aria-describedby="passwordHelpInline" name="password" placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif

                                </div>
                                <div class=" d-flex justify-content-center mb-3">
                                    <button type="submit"
                                        class="btn btn-dark d-flex justify-content-center rounded-pill p-3 ">Masuk !
                                </div>

                                <div class="justify-content-center mb-3 ">
                                    <a href="{{ url('/') }}"
                                        class="btn btn-dark d-flex justify-content-center rounded-pill p-3">Back Back</a>
                                </div>
                                <div class="text-center mt-5 text-lg mb-3">
                                    <a href="{{ url('register') }}"> Belum punya akun?
                                    </a>
                                    <p>Tunggu apa lagi langsung daftar saja</p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
