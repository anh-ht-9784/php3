@extends('layout_fe')

@section('content')
<div class="container">
<table class="table">
    <thead>
        <tr>
            <th scope="col">Tên</th>
            <th scope="col">Giá</th>
            <th scope="col">Số Lượng</th>
            <th scope="col">Ảnh</th>
          
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $c)
            <tr>
              
                <td><a href=" ">{{ $c['name'] }}</a></td>
                <td>{{ $c['price'] }}</td>
                <td>{{ $c['sl'] }}</td>
                <td> <img src="{{ asset("storage/images/products/".$c['image'])}}" alt="..." height="300px" width="200px"> </td>
            </tr>
            @endforeach
    </tbody>
</table>
<div>
    <a class="btn btn-primary" href="{{ route('frontend.save_cart') }}" role="button">Mua hàng</a>
</div>
</div>
@endsection