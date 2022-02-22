@extends('Auth.layouts.auth')
@section('auth')

<div class="container">
    <div class="row min-vh-100 justify-content-center align-items-center">
        <div class="col-lg-6">
            @include('partials.alert')
            <div class="card border-0 rounded shadow-sm p-3">
                <form action="/register" method="post" enctype="multipart/form-data">
                    @csrf
                    <h3 class="text-center fs-3 fw-bold form-title">
                        <i class="fa-solid fa-user fs-4"></i> {{ $title }}
                    </h3>
                    <div class="form-group mb-3">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" id="name" placeholder="full name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="avatar">Photo Profile</label>
                        <input type="file" name="avatar" id="avatar" class="form-control" accept=".jpg,.png,.jpeg">
                    </div>
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
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" placeholder="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="password_confirmation">Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="password confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                                @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-main w-100">{{ $title }}</button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <p>Already have an account? <a href="/login" class="text-decoration-none">login here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection