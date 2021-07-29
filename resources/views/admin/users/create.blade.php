@extends("layout")
@section('title', 'Tạo Mới user')
@section('content')
    <form class="pt-2" method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Tên">
                @error('name')
                    <span class="">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" value="{{ old('email') }}" name="email" placeholder="Email">
                @error('email')
                    <span class="">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" value="{{ old('address') }}" placeholder="Địa Chỉ" name="address">
                @error('address')
                    <span class="">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" placeholder="password" name="password">
                @error('password')
                    <span class="">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Giới Tính</label>
                <select id="inputState" name="gender" class="form-control">
                    <option {{ old('gender',config('common.user.gender.male')) == config('common.user.gender.male') ? 'selected' : '' }}
                        value="{{ config('common.user.gender.male') }}">Nam</option>
                    <option {{ old('gender',config('common.user.gender.female')) == config('common.user.gender.female') ? 'selected' : '' }}
                        value="{{ config('common.user.gender.female') }}">Nữ</option>
                </select>
            </div>
            <div class="col-md-6">
                <label>vai Trò</label>
                <select id="inputState" name="role" class="form-control">
                    <option {{ old('role',config('common.user.role.user')) == config('common.user.role.user') ? 'selected' : '' }}
                        value="{{ config('common.user.role.user') }}">Khách hàng</option>
                    <option {{ old('role',config('common.user.role.admin')) == config('common.user.role.admin') ? 'selected' : '' }}
                        value="{{ config('common.user.role.admin') }}">Quản trị</option>
                </select>
            </div>
        </div>
        <button class="mt-2" type="submit">Tạo Mới</button>
    </form>
@endsection
