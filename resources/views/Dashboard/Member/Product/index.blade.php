@extends('Dashboard.layouts.dash')

@section('content')
<main>
    <div class="main_container">

        <!-- Content -->

        <div class="row">

            <div class="col-lg-12">
                <div class="bg-white rounded border-0 p-3">

                    <div class="row">
                        <div class="col-8">
                            @include('partials.alert')
                        </div>

                        <div class="col-4">
                            <ul class="list-unstyled">
                                <li class="list-item">
                                    <a href="/product?orderBy=lasted" class="btn btn-primary mr-2">Lasted</a>
                                    <a href="/product?orderBy=older" class="btn btn-info">Older</a>
                                </li>
                            </ul>
                        </div>
                    </div>

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
                                    <a href="/product/{{ $product->id }}" class="badge bg-info text-decoration-none">
                                        <i class="fa-solid fa-eye"></i> View Detail
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