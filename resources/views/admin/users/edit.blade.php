@extends("layout")
@section('title', 'update user')
@section('content')
    <form class="pt-2" method="POST" action="{{ route('admin.users.update', ['id' => $data->id]) }}">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control" value="{{ $data->name }}" name="name" placeholder="Tên">
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" value="{{ $data->email }}" name="email" placeholder="Email">
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" value="{{ $data->address }}" placeholder="Địa Chỉ" name="address">
            </div>
            <div class="col-md-6">
                <label>Giới Tính</label>
                <select id="inputState" name="gender" class="form-control">
                    <option {{ $data->gender == 1 ? 'selected' : '' }} name="role" value="1">Nam</option>
                    <option {{ $data->gender == 2 ? 'selected' : '' }} name="role" value="2">Nữ</option>
                </select>
            </div>
            <div class="col-md-6">
                <label>vai Trò</label>
                <select id="inputState" name="role" class="form-control">
                    <option {{ $data->role == 1 ? 'selected' : '' }} name="role" value="1">Khách hàng</option>
                    <option {{ $data->role == 2 ? 'selected' : '' }} name="role" value="2">Quản trị</option>
                </select>
            </div>
        </div>
        <button class="mt-2" type="submit">Update</button>
    </form>
@endsection
