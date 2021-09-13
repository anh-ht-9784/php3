@extends('layout_fe')

@section('content')
<div class="container">
    <div>
    <a href="{{ route('frontend.delete_cart') }}"
        class="btn btn-primary">Xóa Toàn bộ sản phẩm</a>
    </div>
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
        @if (!empty($data))
        @foreach ($data as $c)
            <tr>
              
                <td><a href=" ">{{ $c['name'] }}</a></td>
                <td>{{ $c['price'] }}</td>
                <td>{{ $c['sl'] }}</td>
                <td> <img src="{{ asset("storage/images/products/".$c['image'])}}" alt="..." height="300px" width="200px"> </td>
            </tr>
            @endforeach
            @endif
    </tbody>
</table>
@if (!empty($data))
<div>
    <form class="pt-2" method="Get" action="{{ route('frontend.save_cart') }}">
        @csrf
        <div>
            <label for="">
               Số Điện Thoại
            </label>
            <input type="number" name="number" id="">
        </div>
        <div>
            <label for="">Địa Chỉ</label>
            <input type="text" name="address">
        </div>
<button type="submit"> Mua Hàng</button>
    </form>
</div>
@endif
</div>

@endsection