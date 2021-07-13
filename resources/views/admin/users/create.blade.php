@extends("layout")
@section('title', "Tạo Mới user")
@section('content')
<form class="pt-2" methods="post" action="/admin/users">
    <div class="row">
      <div class="col-md-12">
        <input type="text" class="form-control" placeholder="Tên">
      </div>
      <div class="col-md-12">
        <input type="text" class="form-control" placeholder="Email">
      </div>
      <div class="col-md-12">
        <input type="text" class="form-control" placeholder="Địa Chỉ">
      </div>
      <div class="col-md-6">
        <label>Giới Tính</label>
      <select id="inputState" class="form-control">
        <option selected value="1">Nam</option>
        <option value="2">Nữ</option>  
      </select>
    </div>
    <div class="col-md-6">  
        <label>vai Trò</label>
        <select id="inputState" class="form-control">
          <option selected value="1">Khách hàng</option>
          <option value="2">Quản trị</option>  
        </select>
      </div>
    </div>
    <button class="mt-2"type="submit">Tạo Mới</button>
  </form>
@endsection 