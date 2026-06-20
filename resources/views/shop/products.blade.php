@extends('layouts.app')

@section('title', 'Cửa hàng')

@section('page-header')
    <h1>🛒 Cửa hàng</h1>
    <p class="mb-0">Danh sách sản phẩm</p>
@endsection

@section('content')

<div class="row">

    @foreach($products as $product)

        <div class="col-md-3 mb-4">

            <div class="card shadow-sm h-100">

                <div class="card-body">

                    <h5 class="card-title">
                        {{ $product }}
                    </h5>

                    <p class="card-text">
                        Sản phẩm demo cho bài thực hành Laravel.
                    </p>

                    <button class="btn btn-success">
                        Mua ngay
                    </button>

                </div>

            </div>

        </div>

    @endforeach

</div>

@endsection