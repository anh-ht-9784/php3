@extends("layout")
@section('title', "Danh Sách Hóa Đơn")
@section('content')
<div class="row">
  <div class="col-6">
    <a href="{{route('admin.invoices.create')}}" class="btn btn-success">Creat</a>
  </div>
</div>
@if(!empty($list))
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">tên Người Mua</th>
        <th scope="col">Địa chỉ</th>
        <th scope="col">Số Điện Thoại</th>
        <th scope="col">Tổng tiền</th>
        <th scope="col">Trạng Thái</th>
      </tr>
    </thead> 
    <tbody>
        @foreach ($list as $data)
      <tr>
        <th scope="row">{{$data->id}}</th>
        <td>{{$data->users->name}}</td>
        <td>{{$data->address}}</td>
        <td>{{$data->number}}</td>
        <td>{{$data->total_price}}</td>
        <td>  @foreach (config('common.invoice.status') as $key => $value)
          @if($data->status == $value)
            {{ $key }}
         @endif
        @endforeach
         <td>
           <a href="{{route('admin.invoices.edit',['id' => $data->id])}}" class="btn btn-primary">Update</a>
         </td>
         <td>
         <button class="btn btn-primary"   data-toggle="modal" data-target="#confim_delete{{$data->id}}">Delete</button>
         <div class="modal fade" id="confim_delete{{$data->id}}" tabindex="-1" role="dialog" >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              Xác Nhận Xóa Bản Ghi
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="{{route('admin.invoices.delete',['id' => $data->id])}}" method="post">
                  @csrf
                  <button type="submit" class="btn btn-primary">Xóa</button>
                </form>
               
              </div>
            </div>
          </div>
        </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@else
<h2>Không có dữ liệu</h2>
@endif
@endsection
