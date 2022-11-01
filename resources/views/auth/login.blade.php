@extends('layout')

<style>
    .login-card {
        padding: 48px 32px;
        background: rgba(255, 255, 255, 0.192);
        backdrop-filter: blur(10px);
        width: 350px;
        border-radius: 15px;
        border: 1px solid rgba(43, 43, 43, 0.568);
    }

    .form-control {
        border-color: #ffbb00 !important;
    }

    .form-control:focus {
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 217, 0, 0.6) !important;
    }
</style>

@section('content')
    <div class="d-flex justify-content-center mt-5">
        <div class="row login-card">
            <div class="col-md-4" style="width: 100%">
                <h1 class="h3 mb-3 fw-bold text-center text-light">Login</h1>

                @if (session()->has('registerSuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>User registered !</strong> Please login.
                    </div>
                @endif

                @if (session()->has('loginFailed'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Login Failed !</strong> {{ session('loginFailed') }}
                    </div>
                @endif

                <form action="/login" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email"
                            class="form-control text-warning bg-transparent @error('email') is-invalid @enderror"
                            id="email" name="email" placeholder="someone@email.com" autofocus required
                            value="{{ old('email') }}">
                        <label for="email" class="text-warning">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password"
                            class="form-control text-warning bg-transparent @error('password') is-invalid @enderror"
                            id="password" name="password" placeholder="Enter your password">
                        <label for="password" class="text-warning">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="checkbox mb-3 text-light">
                        <label>
                            <input type="checkbox" name="remember" value="remember-me"> Remember me
                        </label>
                    </div>
                    <button class="w-100 btn btn-md btn-warning" type="submit">Sign In</button>
                    <div class="mt-4">
                        <small class="text-white">Don&apos;t have an account ? <a href="/register" class="text-warning">Sign
                                Up</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
