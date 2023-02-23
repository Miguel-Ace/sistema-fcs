@extends('pageslogin')

@section('contenlogin')
            <div class="row loginCard">
                {{-- <div class="card-header">{{ __('Login') }}</div> --}}

                <div class="col-md-auto">

                    <div class="imgcard">
                        <img src="{{asset('img/logocs.png')}}" alt="logo_construyendo_sonrisas">
                    </div>

                    <div class="card-body formcard">
                        <form method="POST" action="{{ route('login') }}" novalidate>
                            <h1 class="text-center mb-4">Iniciar Sesión</h1>
                            @csrf

                            <div class="campos">
                                <label for="email" class="label">{{ __('Email') }}</label>

                                <input id="email" type="email" class="input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                {{-- <div class="col-md-7 row"> --}}

                                    {{-- @error('email')
                                        <span class="invalid-feedback col-12" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                {{-- </div> --}}
                            </div>

                            <div class="campos">
                                <label for="password" class="label">{{ __('Password') }}</label>

                                <input id="password" type="password" class="input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                {{-- <div class="col-md-7 row"> --}}

                                    {{-- @error('password')
                                        <span class="invalid-feedback col-md-12" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                {{-- </div> --}}
                            </div>

                            {{-- <div class="">
                            </div> --}}

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

                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}

                                {{-- <a class="btn btn-link" href="{{ route('register') }}">
                                    {{ __('Regístrate') }}
                                </a> --}}
                            </div>
                        </form>
                    </div>

                </div>
            </div>
@endsection
