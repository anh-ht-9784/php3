@extends("layout")
@section('title', 'detail user')
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-12 row">
            <div class="col-6 d-inline-block">
                <label class="col-3" for="">Họ tên :</label>
                <label for="">{{ $user->name }}</label>
            </div>
            <div class="col-6">
                <label class="" for="">Địa chỉ :</label>
                <label for="">{{ $user->address }}</label>
            </div>
            <div class="col-6">
                <label class="col-3" for="">Email :</label>
                <label for="">{{ $user->email }}</label>
            </div>
        </div>
    </div>

    <table class="table table-stripped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">tên</th>
                <th scope="col">Số</th>
                <th scope="col">địa chỉ</th>
                <th scope="col">Giá </th>
                <th scope="col">Trạng thái đơn hàng</th>
                <th scope="col">Ngày tạo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->name }}</td>
                    <td>{{ $invoice->number }}</td>
                    <td>{{ $invoice->address }}</td>
                    <td>{{ $invoice->total_price }}</td>
                    <td>{{ $invoice->status }}</td>
                    <td>{{ $invoice->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
