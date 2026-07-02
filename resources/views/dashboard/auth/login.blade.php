@extends('dashboard.layouts.auth')

@section('title', 'Login')

@section('content')
<div class="container">
    <form action="{{ route('dashboard.login') }}" method="POST">
        @csrf
        <div class="row justify-content-md-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="login-screen">
                    <div class="login-box">
                        <a href="#" class="login-logo">
                            <img src="{{ asset('img/logo-dark.png') }}" alt="CCESS Logo" />
                        </a>
                        <h5>Welcome back,<br />Please Login to your Account.</h5>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0 pl-3">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" value="{{ old('email') }}" required autofocus />
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required />
                        </div>
                        <div class="actions mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" id="remember_pwd">
                                <label class="custom-control-label" for="remember_pwd">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
