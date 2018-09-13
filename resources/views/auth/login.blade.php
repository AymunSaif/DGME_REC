@extends('layouts.login')

@section('content')
<div class="full-page  section-image" data-color="black" data-image="{{asset('img/theme/img/full-screen-image-2.jpg')}}" ;>
    <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    <div class="content">
        <div class="container">
            <div class="col-md-4 col-sm-6 ml-auto mr-auto" style=" margin-top:-12%;">
                <form form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf
                    <div class="card card-login card-hidden">
                        <div class="card-header ">
                            <h3 class="header text-center">
                                <img src="{{asset('img/theme/img/logo.png')}}" /><br>
                            
                            </h3>
                        </div>
                        <div class="card-body ">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    {{-- <label>Email address</label> --}}
                                    <input id="email" type="email" placeholder="Email Address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password" >{{ __('Password') }}</label>
                                    {{-- <label>Password</label> --}}
                                    <input placeholder="Password"  id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                            <label for="remember" class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            {{-- <input class="form-check-input" type="checkbox" value="" checked> --}}
                                                    <span class="form-check-sign"></span>
                                                    {{ __('Remember Me') }}
                                                </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-wd btn-success btn-outline">
                                {{ __('Login') }}
                            </button> 
                            {{-- <button type="submit" class="btn btn-warning btn-wd">Login</button> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a> --}}
                            {{-- </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}} 
@endsection
