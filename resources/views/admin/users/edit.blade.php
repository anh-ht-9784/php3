@extends("layout")
@section('title', 'update user')
@section('content')
    <form class="pt-2" method="POST" action="{{ route('admin.users.update', ['user' => $data->id]) }}">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control" value="{{ $data->name }}" name="name" placeholder="Tên">
                @error('name')
                <span class="">{{ $message }}</span>
            @enderror
            </div>

            <div class="col-md-12">
                <input type="text" class="form-control" value="{{ $data->email }}" name="email" placeholder="Email">
                @error('email')
                <span class="">{{ $message }}</span>
            @enderror
            </div>
             <div class="col-md-12">
                <input type="text" class="form-control" value="{{ $data->address }}" placeholder="Địa Chỉ" name="address">
                @error('address')
                <span class="">{{ $message }}</span>
            @enderror
            </div>
           
            <div class="col-md-6">
                <label>Giới Tính</label>
                <select id="inputState" name="gender" class="form-control">
                    <option {{ $data->gender == config('common.user.gender.male') ? 'selected' : '' }} name="gender" value="{{config('common.user.gender.male')}}">Nam</option>
                    <option {{ $data->gender == config('common.user.gender.female') ? 'selected' : '' }} name="gender" value="{{config('common.user.gender.female')}}">Nữ</option>
                </select>
            </div>
            <div class="col-md-6">
                <label>vai Trò</label>
                <select id="inputState" name="role" class="form-control">
                    <option {{ $data->role == config('common.user.role.user') ? 'selected' : '' }} name="role" value="{{config('common.user.role.user')}}">Khách hàng</option>
                    <option {{ $data->role == config('common.user.role.admin') ? 'selected' : '' }} name="role" value="{{config('common.user.role.admin')}}">Quản trị</option>
                </select>
            </div>
        </div>
        <button class="mt-2" type="submit">Update</button>
    </form>
@endsection
