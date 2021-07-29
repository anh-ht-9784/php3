@extends("layout")
@section('title', 'List Products')
@section('content')
    <div class="row">
        <div class="col-6">
            <a href="{{ route('admin.products.create') }}" class="btn btn-success">Creat</a>
        </div>
    </div>
    @if (!empty($data))
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">tên</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Danh Mục</th>
                    <th scope="col">Ảnh</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $c)
                    <tr>
                        <th scope="row">{{ $c->id }}</th>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->price }}</td>
                        <td>{{ $c->quantity }}</td>
                        <td>{{ $c->categories->name }}</td>
                        <td>
                            <image src="{{ $c->image }}">
                        </td>

                        <td>
                            <a href="{{ route('admin.products.edit', ['id' => $c->id]) }}" class="btn btn-primary">Update</a>
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
                                            <form action="{{ route('admin.products.delete', ['id' => $c->id]) }}"
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
