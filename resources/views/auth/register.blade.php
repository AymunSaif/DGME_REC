@extends('layouts.dashboard')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <form id="wizardForm" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                      {{ csrf_field() }}
                        <div class="card card-wizard">
                            <div class="card-header">
                                <h3 class="card-title text-center">Registeration Form</h3>
                            </div>
                        <div class="card-body ">
                            <div class="row justify-content-center">
                                <div class="col-md-5 ">
                                    <div class="form-group">
                                        <label for="name" class="control-label">{{ __('Name') }}</label>
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-5 ">
                                    <div class="form-group">
                                        <label  for="email" class="control-label">{{ __('E-Mail Address') }}</label>
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-5 ">
                                    <div class="form-group">
                                        <label for="password" class="control-label">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-5 ">
                                    <div class="form-group">
                                        <label for="password-confirm" class="control-label">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-md btn-success">
                                    {{ __('Register') }}
                                </button>
                            {{-- <button type="submit" class="btn btn-warning btn-wd">Login</button> --}}
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
