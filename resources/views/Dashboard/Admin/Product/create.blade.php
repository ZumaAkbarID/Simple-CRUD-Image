@extends('Dashboard.layouts.dash')

@section('content')
<main>
    <div class="main_container">

        <!-- Content -->

        <div class="row justify-content-center">

            <div class="col-lg-6">
                @include('partials.alert')
                <div class="card border-0 rounded shadow-sm p-3">
                    <form action="/admin/product/create" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3 class="text-center fs-3 fw-bold form-title">
                            <i class="fa-solid fa-box fs-4"></i> {{ $title }}
                        </h3>
                        <div class="form-group mb-3">
                            <label for="name">Product Name</label>
                            <input type="text" name="name" id="name" placeholder="product name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept=".jpg,.png,.jpeg">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="price">Price Rp.</label>
                            <input type="number" name="price" id="price" placeholder="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                            @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Description</label>
                            <textarea name="description" id="description" placeholder="description" class="form-control @error('description') is-invalid @enderror">{{ old('email') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-main w-100">Create</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</main>
@endsection