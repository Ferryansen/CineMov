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
                <h1 class="h3 mb-3 fw-bold text-center text-white">Register</h1>

                <form action="/register" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text"
                            class="form-control text-warning bg-transparent @error('name') is-invalid @enderror"
                            id="name" value="{{ old('name') }}" placeholder="Enter your name" name="name">
                        <label class="text-warning" for="name">Name</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email"
                            class="form-control text-warning bg-transparent @error('email') is-invalid @enderror"
                            id="email" value="{{ old('email') }}" placeholder="someone@email.com" name="email">
                        <label class="text-warning" for="email">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password"
                            class="form-control text-warning bg-transparent @error('password') is-invalid @enderror"
                            id="password" placeholder="Enter your password" name="password">
                        <label class="text-warning" for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password"
                            class="form-control text-warning bg-transparent @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation" placeholder="Enter your password again">
                        <label class="text-warning" for="password_confirmation">Confirm Password</label>
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="w-100 btn btn-md btn-warning" type="submit">Sign Up</button>
                    <div class="mt-4">
                        <small class="text-white">Already have an account ? <a href="/login" class="text-warning">Sign
                                In</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
