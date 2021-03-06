@extends('Dashboard.layouts.dash')

@section('content')
<main>
    <div class="main_container">
        <div class="main_title">
            <div class="main_greeting">
                <h1>Welcome back, {{ auth()->user()->name }}</h1>
                <p>Have a nice day</p>
            </div>
        </div>

        <!-- Content -->

        <div class="row">

            <div class="col-lg-4">
                <div class="col-lg-12 mb-3">
                    <div class="card card-dashboard border-left-primary rounded shadow-sm">
                        <div class="card-body">
                            <i class="fa-solid fa-user"></i>
                            <h4 class="card-title mb-0">
                                Total Users
                            </h4>
                            <span class="text-muted">{{ $totalUser }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 mb-3">
                    <div class="card card-dashboard border-left-success rounded shadow-sm">
                        <div class="card-body">
                            <i class="fa-solid fa-box"></i>
                            <h4 class="card-title mb-0">
                                Total Products
                            </h4>
                            <span class="text-muted">{{ $totalProduct }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="bg-white rounded border-0 p-3">
                    <h3 class="fw-bold">Last 5 product</h3>
                    <form action="/product" method="get">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="type something...">
                            <button type="submit" class="btn btn-main">Search</button>
                        </div>
                    </form>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Image</td>
                                <td>Product Name</td>
                                <td>Price</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>

                            @if(empty($dataProduct[0]))
                            <tr>
                                <td colspan="5" class="text-center">Product not found</td>
                            </tr>
                            @else
                            @php $i = 1; @endphp
                            @foreach($dataProduct as $product)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    <img src="{{ asset('storage/'. $product->image) }}" width="100px" alt="">
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>Rp.{{ number_format($product->price,0,',','.') }}</td>
                                <td>
                                    <a href="/product/view/{{ $product->id }}" class="badge bg-info">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="/product/edit/{{ $product->id }}" class="badge bg-warning">
                                        <i class="fa-solid fa-pen-square"></i>
                                    </a>
                                    <a href="/product/delete/{{ $product->id }}" class="badge bg-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</main>
@endsection