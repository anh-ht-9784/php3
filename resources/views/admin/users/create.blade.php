@extends("layout")
@section('title', 'Tạo Mới user')
@section('content')
    <form class="pt-2" method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control" name="name" placeholder="Tên">
                @error('name')
                    <span class="">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" name="email" placeholder="Email">
                @error('email')
                    <span class="">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Địa Chỉ" name="address">
                @error('address')
                    <span class="">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" placeholder="password" name="password">
                @error('address')
                    <span class="">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Giới Tính</label>
                <select id="inputState" name="gender" class="form-control">
                    <option selected value="1">Nam</option>
                    <option value="2">Nữ</option>
                </select>
            </div>
            <div class="col-md-6">
                <label>vai Trò</label>
                <select id="inputState" name="role" class="form-control">
                    <option selected value="1">Khách hàng</option>
                    <option value="2">Quản trị</option>
                </select>
            </div>
        </div>
        <button class="mt-2" type="submit">Tạo Mới</button>
    </form>
@endsection
