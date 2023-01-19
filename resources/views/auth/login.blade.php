@extends('pageslogin')

@section('contenlogin')
            <div class="row loginCard">
                {{-- <div class="card-header">{{ __('Login') }}</div> --}}

                <div class="col-md-auto">

                    <div class="imgcard">
                        <img src="{{asset('img/ninosConGlobos.jpg')}}" alt="logo_construyendo_sonrisas">
                    </div>

                    <div class="card-body formcard">
                        <form method="POST" action="{{ route('login') }}" novalidate>
                            <h1 class="text-center mb-5">Iniciar Sesión</h1>
                            @csrf

                            <div class="row">
                                <div class="mb-4">
                                    <label for="email" class="col-md-4 col-form-label text-md-center">{{ __('Email') }}</label>

                                    <div class="col-md-7 row">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        {{-- @error('email')
                                            <span class="invalid-feedback col-12" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror --}}
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="password" class="col-md-4 col-form-label text-md-center">{{ __('Password') }}</label>

                                    <div class="col-md-7 row">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        {{-- @error('password')
                                            <span class="invalid-feedback col-md-12" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror --}}
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    {{-- @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif --}}

                                    <a class="btn btn-link" href="{{ route('register') }}">
                                        {{ __('Regístrate') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
@endsection
