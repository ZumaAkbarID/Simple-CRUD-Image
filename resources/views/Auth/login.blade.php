@extends('Auth.layouts.auth')
@section('auth')

<div class="container">
    <div class="row min-vh-100 justify-content-center align-items-center">
        <div class="col-lg-4">
            @include('partials.alert')
            <div class="card border-0 rounded shadow-sm p-3">
                <form action="/login" method="post">
                    @csrf
                    <h3 class="text-center fs-3 fw-bold form-title">
                        <i class="fa-solid fa-sign-in fs-4"></i> {{ $title }}
                    </h3>
                    <div class="form-group mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-main w-100">{{ $title }}</button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <p>Don't have an account? <a href="/register" class="text-decoration-none">register here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection