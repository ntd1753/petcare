@extends('layouts.Auth')

@section('content')
    <div class="sign-in-from">
        <h1 class="mb-0">{{__('Login')}}</h1>
        <p>Enter your email address and password to access dashboard.</p>
        <form class="mt-4" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">{{ __('Email Address') }}</label>
                <input name="email" type="email" class="form-control mb-0 @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">{{ __('Password') }}</label>
                <a href="#" class="float-right" href="{{ route('password.request') }}">Forgot password?</a>
                <input type="password" name="password" class="form-control mb-0 @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password"  required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="d-inline-block w-100">
                <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="customCheck1">{{ __('Remember Me') }}</label>
                </div>
                
                    <button type="submit" class="btn btn-primary float-right"> {{ __('Login') }}</button>
               
                
            </div>
            <div class="sign-info">
                <span class="dark-color d-inline-block line-height-2">Don't have an account? <a href="/register">Sign up</a></span>
            </div>
        </form>
    </div>
@endsection
