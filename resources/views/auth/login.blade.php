@extends('layouts.auth')
@section('title', 'Sign in')
@section('content')
<div class="sign-up-form-wrapper">
    <form action="{{ route('login') }}" class="form-container" method="POST">
        @csrf
        <div class="back-btn"><a href="index.html">
                <svg class="back-to-home-icon" width="30px" height="30px" viewBox="0 0 48 48" fill="#173554"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M4.58579 22.5858L20.8787 6.29289C21.2692 5.90237 21.9024 5.90237 22.2929 6.29289L23.7071 7.70711C24.0976 8.09763 24.0976 8.7308 23.7071 9.12132L8.82843 24L23.7071 38.8787C24.0976 39.2692 24.0976 39.9024 23.7071 40.2929L22.2929 41.7071C21.9024 42.0976 21.2692 42.0976 20.8787 41.7071L4.58579 25.4142C3.80474 24.6332 3.80474 23.3668 4.58579 22.5858Z">
                    </path>
                </svg> <span>Back</span>
            </a></div>
        <div class="form-heading-wrapper mb-5">
            <div class="form-heading-text">
                WELCOME TO {{ config('app.name') }}
            </div>
            <div class="form-sub-head-text">
                Please input your details to log in to your account
            </div>
        </div>
        <div class="form-input-wrapper">
            <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="sign-up-email" placeholder="graduate@example.com"
                    required name="email" value="{{ old('email') }}">
                <label for="sign-up-email">Email Address</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3 has-validation">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="sign-up-pwd" placeholder="Password" name="password" required>
                <label for="sign-up-pwd">Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-submit-wrapper">
            <div><span class="text-muted">Don't have an account?</span> <a class="register-btn" href="{{ route('register') }}"> Register</a></div>
            <button class="log-in-btn" type="submit"> Log in</button>
        </div>
    </form>
</div>
@endsection
