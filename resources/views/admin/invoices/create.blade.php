@extends("layout")
@section('title', 'Tạo Mới Hóa đơn')
@section('content')
<form class="pt-2" method="POST" action="{{ route('admin.invoices.store') }}">
    @csrf
    <div class="row">

        <div>
            <label for="">Tên Người Mua</label>
            <select class="form-select " aria-label="Default select example" name="user_id">
                @foreach ($list as $data)
                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                @endforeach;
            </select>
        </div>
        <div class="col-md-12">
            <input type="number" class="form-control" name="number" placeholder="Số Điện Thoại">
        </div>
        <div class="col-md-12">
            <input type="text" class="form-control" name="address" placeholder="Địa Chỉ">
        </div>
        <div class="col-md-12">
            <input type="number" class="form-control" name="total_price" placeholder="Tổng Tiền">
        </div>
    </div>
    <button class="mt-2" type="submit">Tạo Mới</button>
</form>
@endsection
