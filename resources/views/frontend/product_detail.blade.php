@extends('layout_fe')

@section('content')
    <div class="container">
    <div class=" row">
        <div class="col-6"></div>

    <div class="card col-4 text-center" >
        <img class="align-self-center" src="{{asset("storage/images/products/$data->image")}}"  width="400px" height="500px" >
        <div class="card-body align-self-center">
            <h5 class="card-title">{{$data->name}}</h5>
            <p class="card-text"> Giá Tiền : {{$data->price}} USD</p>
            <a href="#" class="btn btn-primary">Mua Hàng</a>
        </div>
    </div>
        <br>
        <h2>Các Sản Phẩm cùng danh mục</h2>
        @foreach($category as $cate)
            <div class="col-4 text-center">
            <img src="{{asset("storage/images/products/$cate->image")}}"  width="400px" height="300px">
            <div class="card-body">
                <h5 class="card-title">{{$cate->name}}</h5>
                <p class="card-text"> Giá Tiền : {{$cate->price}} VND</p>
                <a href="#" class="btn btn-primary">Mua Hàng</a>
            </div>
            </div>
        @endforeach
    </div>
    </div>
@endsection
