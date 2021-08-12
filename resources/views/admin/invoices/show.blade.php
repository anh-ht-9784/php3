@extends("layout")
@section('title', "Danh Sách Hóa Đơn")
@section('content')
<div class="row">
  <div class="col-6">
    {{-- <a href="{{route('admin.invoicedtail.create')}}" class="btn btn-success">Creat</a> --}}
  </div>
</div>
<div>
  <div class="row mt-5 mb-5">
    <div class="col-12 row">
        <div class="col-6 d-inline-block">
            <label class="col-3" for="">Họ tên :</label>
            <label for="">{{ $invoice->users->name }}</label>
        </div>
        <div class="col-6">
            <label class="" for="">Địa chỉ :</label>
            <label for="">{{ $invoice->address }}</label>
        </div>
        <div class="col-6">
            <label class="col-3" for="">Email :</label>
            <label for="">{{ $invoice->number }}</label>
        </div>
    </div>
</div>

<table class="table table-stripped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">tên sản Phẩm</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Thành Tiền</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach ($invoice_detail as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->products->name }}</td>
                <td>{{ $value->id }}</td>
                <td>{{ $value->unit_price }} VND</td>
            
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection