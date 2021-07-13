@extends("layout")
@section('title', "Tạo Mới Danh Mục")
@section('content')
@if(!empty($data))
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">tên</th>
        <th scope="col">email</th>
        <th scope="col">địa chỉ</th>
        <th scope="col">giới tính</th>
        <th scope="col">Quyền</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $c)
      <tr>
        <th scope="row">{{$c->id}}</th>
        <td>{{$c->name}}</td>
        <td>{{$c->email}}</td>
        <td>{{$c->address}}</td>
        <td>
            @if($c->gender == 1)
              nam
            @endif</td>
        <td>
            @if($c->role == 1)
             Khách Hàng
            @endif
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
@else
<h2>Không có dữ liệu</h2>
@endif
@endsection
