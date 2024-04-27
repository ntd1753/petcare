@extends('layouts.Auth')

@section('content')

    <div class="sign-in-from">
        <h1 class="mb-0">{{ __('Register') }}</h1>
        <form class="mt-2" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">{{ __('Name') }}</label>
                <input type="" class="form-control mb-0 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus id="exampleInputEmail1" placeholder="Your Full Name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail2">{{ __('Email Address') }}</label>
                <input type="email" class="form-control mb-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" id="exampleInputEmail2" placeholder="Enter email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control mb-0" id="exampleInputPassword1" name="password_confirmation" required autocomplete="new-password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">{{ __('Confirm Password') }}</label>
                <input type="password" class="form-control mb-0" id="exampleInputPassword1 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="d-inline-block w-100">
                <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">


                </div>
                <button type="submit" class="btn btn-primary float-right"> {{ __('Register') }}</button>
            </div>
            <div class="sign-info">
                <span class="dark-color d-inline-block line-height-2">Already Have Account ? <a href="/login">Log In</a></span>

            </div>
        </form>
    </div>
@endsection
