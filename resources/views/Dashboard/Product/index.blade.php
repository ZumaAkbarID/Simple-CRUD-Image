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
                            <ul class="list-unstyled">
                                <li class="list-item">
                                    <a href="/product/create" class="btn btn-primary w-20">Create New Product</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-4">
                            <ul class="list-unstyled">
                                <li class="list-item d-flex justify-content-around">
                                    <form action="/product" method="get">
                                        <input type="hidden" name="orderBy" value="older">
                                        <button type="submit" class="btn btn-info">Older</button>
                                    </form>
                                    <form action="/product" method="get">
                                        <input type="hidden" name="orderBy" value="lasted">
                                        <button type="submit" class="btn btn-success">Lasted</button>
                                    </form>
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