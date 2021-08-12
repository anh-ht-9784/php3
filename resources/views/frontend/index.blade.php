@extends('layout_fe')

@section('content')
<h1 class="font-weight-bold text-center" style="font-family: 'Times New Roman', Times, serif;">SẢN PHẨM BÁN CHẠY NHẤT</h1>

<div class="container">
    <div class="row">
        <style>
            body,
            .breadcrumb {
                background-color: #F5F5F5 !important;
            }

            .breadcrumb-item a {
                color: black !important;
            }

            .card {
                background-color: #F5F5F5 !important;
            }
        </style>

        @foreach ($data as $data)

        <div class="col-4">
            <div class="card" style=" text-align: center;  padding-top: 30px;">

                <img src="{{asset("storage/images/products/$data->image")}}" class="card-img-top" alt="..." height="300px" width="200px">
                <div class="card-body-1">
                    <p class=""><a href="{{ route('frontend.detail', ['id' => $data->id]) }}">{{ $data->name }}</a> <br></p>
                    <p>{{ $data->price }} VND</p>
                </div>
                <div class="money" style="margin-top: 2rem; text-align: center;">
                    <a href="{{route('frontend.add_cart',['id'=> $data->id])}}"> <button type="button" class="btn btn-danger" style="width: 60%;"><i class="fas fa-cart-plus"></i>Mua Hàng</button> </a>

                </div>
            </div>
        </div>

        @endforeach
    </div>
</div>
@endsection
