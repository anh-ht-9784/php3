@extends("layout")
@section('title', 'Tạo Mới Danh Mục')
@section('content')

    <div class="col-6">
        <div class="col-6">
            <a href="{{ route('admin.users.create') }}" class="btn btn-success">Creat</a>
        </div>
        {{-- <button class="btn btn-success" role="button" data-toggle="modal" data-target="#modal_create">Create</button> --}}

        {{-- <div class="modal fade" id="modal_create" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm mới người dùng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="form_create" action="{{ route('admin.users.store') }}">
                            @csrf
                            <div class="mt-3">
                                <label>Name</label>
                                <input class="mt-3 form-control" type="text" name="name" }}" />
                            </div>
                            <div class="mt-3">
                                <label>Email</label>
                                <input class="mt-3 form-control" type="email" name="email" />
                            </div>
                            <div class="mt-3">
                                <label>Address</label>
                                <input class="mt-3 form-control" type="text" name="address" />
                            </div>
                            <div class="mt-3">
                                <label>Password</label>
                                <input class="mt-3 form-control" type="password" name="password" />
                            </div>

                            <div class="mt-3">
                                <label>Gender</label>
                                <select class="mt-3 form-control" name="gender">
                                    <option value="{{ config('common.user.gender.male') }}">
                                        Male
                                    </option>
                                    <option value="{{ config('common.user.gender.female') }}">
                                        Female
                                    </option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <label>Role</label>
                                <select class="mt-3 form-control" name="role">
                                    <option value="{{ config('common.user.role.user') }}">
                                        User
                                    </option>
                                    <option value="{{ config('common.user.role.admin') }}">
                                        Admin
                                    </option>
                                </select>
                            </div>

                            <div class="mt-3">
                                <button class="mt-3 btn btn-primary">Create</button>
                                <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    @if (!empty($data))
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">tên</th>
                    <th scope="col">email</th>
                    <th scope="col">địa chỉ</th>
                    <th scope="col">Số Đơn </th>
                    <th scope="col">giới tính</th>
                    <th scope="col">Quyền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $c)
                    <tr>
                        <th scope="row">{{ $c->id }}</th>
                        <td><a href="{{ route('admin.users.show', ['user' => $c->id]) }}">{{ $c->name }}</a></td>
                        <td>{{ $c->email }}</td>
                        <td>{{ $c->address }}</td>
                        <td>{{ $c->invoices()->count() }}</td>
                        <td>
                            {{ $c->gender == config('common.user.gender.male') ? 'nam' : 'nữ' }}
                        </td>
                        <td>
                            {{ $c->role == config('common.user.role.user') ? 'Khách hàng' : 'Admin' }}
                        </td>
                        <td>
                            <a href="{{ route('admin.users.edit', ['id' => $c->id]) }}"
                                class="btn btn-primary">Update</a>
                        </td>
                        <td>
                            <button class="btn btn-primary" data-toggle="modal"
                                data-target="#confim_delete{{ $c->id }}">Delete</button>
                            <div class="modal fade" id="confim_delete{{ $c->id }}" tabindex="-1" role="dialog">
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
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <form action="{{ route('admin.users.delete', ['id' => $c->id]) }}"
                                                method="post">
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

@push('script')
    <script>
        $("#form_create").on('click', function(event) {
            // chặn sk loat lại trang
            event.preventDefault();
            // cónst url = $("#form_create").attributes('action');
            const url = "{{ route('admin.users.store') }}";

            let name = $("#form_create input[name='name']").val();
            let email = $("#form_create input[name='email']").val();
            let address = $("#form_create input[name='address']").val();
            let password = $("#form_create input[name='password']").val();
            let gender = $("#form_create select[name='gender']").val();
            let role = $("#form_create select[name='role']").val();
            let _token = $("#form_create input[name='_token']").val();
            const data = {
                _token,
                name,
                email,
                address,
                password,
                gender,
                role,
            }
            //   console.log(data);
            fetch(url, {
                    method: 'POST',
                    body: JSON.stringify(data),
                    headers: {
                        "X-CSRF-Token": _token,
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-Requestd-With": "XMLHttpRequest"
                    },
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.status == 200) {
                        window.location.reload();
                    }
                })
        })
    </script>
@endpush
