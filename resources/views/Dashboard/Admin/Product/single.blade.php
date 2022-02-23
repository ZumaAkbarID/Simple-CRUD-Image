@extends('Dashboard.layouts.dash')

@section('content')
<main>
    <div class="main_container">

        <!-- Content -->

        <div class="row justify-content-center">

            <div class="col-lg-6">
                @include('partials.alert')
                <div class="card border-0 rounded shadow-sm p-3">
                    <div class="text-center">
                        <img src="{{ asset('storage/'.$product->image) }}" width="300" alt="">
                    </div>
                    <div class="card-body">
                        <h2 class="text-center fw-bold">{{ $title }}</h2>

                        <table>
                            <tr>
                                <td width="130">Product Name</td>
                                <td>: {{ $product->name }}</td>
                            </tr>
                            <tr>
                                <td width="130">Creator</td>
                                <td>: {{ $product->user->name }}</td>
                            </tr>
                            <tr>
                                <td width="130">Price</td>
                                <td>: Rp.{{ number_format($product->price,0,',','.') }}</td>
                            </tr>
                            <tr>
                                <td width="130">Description</td>
                                <td>: {!! $product->description !!}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="bg-white rounded border-0">
                    <ul class="list-unstyled p-3">
                        <li class="list-item mb-3">
                            <a href="/admin/product/edit/{{ $product->id }}" class="btn btn-warning w-100">Edit</a>
                        </li>
                        <li class="list-item">
                            <a href="/admin/product/delete/{{ $product->id }}" class="btn btn-danger w-100">Delete</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
</main>
@endsection