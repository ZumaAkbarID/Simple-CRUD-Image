@extends('Dashboard.layouts.dash')

@section('content')
<main>
    <div class="main_container">

        <!-- Content -->

        <div class="row">

            <div class="col-lg-8 order-2">
                <div class="bg-white rounded border-0 p-3">

                    <table class="table table-hover">
                        <form action="/product" method="get">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="type something...">
                                <button type="submit" class="btn btn-main">Search</button>
                            </div>
                        </form>
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td class="tb_image">Image</td>
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
                                <td class="tb_image">
                                    <img src="{{ asset('storage/'. $product->image) }}" width="100px" alt="">
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>Rp.{{ number_format($product->price,0,',','.') }}</td>
                                <td>
                                    <a href="/product/{{ $product->id }}" class="badge bg-info text-decoration-none">
                                        <i class="fa-solid fa-eye"></i> Detail
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4 mb-3">
                <div class="bg-white rounded border-0 shadow-sm px-3 pt-3">
                    @include('partials.alert')

                    <div class="row">

                        <div class="col-4">
                            <ul class="list-unstyled">
                                <li class="list-item">
                                    <a href="/product?orderBy=lasted" class="btn btn-primary mb-2 w-100">Lasted</a>
                                </li>
                                <li class="list-item">
                                    <a href="/product?orderBy=older" class="btn btn-info mb-2 w-100">Older</a>
                                </li>
                                <li class="list-item">
                                    <a href="/product?orderBy=ASC" class="btn btn-info mb-2 w-100">A-Z</a>
                                </li>
                                <li class="list-item">
                                    <a href="/product?orderBy=DESC" class="btn btn-info mb-2 w-100">Z-A</a>
                                </li>
                            </ul>
                        </div>


                        <div class="col-8 order-1 d-flex justify-content-end">
                            <ul class="list-unstyled">

                                <form action="" method="get">
                                    <p class="fw-bold mt-1">Filter Price</p>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number" name="rangefrom" class="form-control mb-2" min="1" placeholder="Min" required>
                                        </div>
                                        <div class="col-6">
                                            <input type="number" name="rangeto" class="form-control mb-2" min="1" placeholder="Max">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info w-100">Filter</button>
                                </form>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</main>
@endsection