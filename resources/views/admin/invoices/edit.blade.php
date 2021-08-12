@extends("layout")
@section('title', 'update Categories')
@section('content')
<form class="pt-2" method="POST" action="{{ route('admin.invoices.update', ['id' => $data->id]) }}">
    @csrf
    <div class="row">

        <label for="category_id">Tên Người Mua</label>
        <select class="form-select " aria-label="Default select example" name="user_id">
            @foreach ($list as $data_user)
                <option value="{{ $data_user->id }}">{{ $data_user->name }}</option>
            @endforeach;
        </select>
    </div>
    <div class="col-md-12">
        <input type="number" class="form-control" value="{{ $data->number }}" name="number"
            placeholder="Số Điện Thoại">
    </div>
    <div class="col-md-12">
        <input type="text" class="form-control" value="{{ $data->address }}" name="address" placeholder="Địa Chỉ">
    </div>
    <div class="col-md-12">
        <input type="number" class="form-control" value="{{ $data->total_price }}" name="total_price"
            placeholder="Tổng Tiền">
    </div>
    <div>
        <label for="">Tên Người Mua</label>
        <select class="form-select " aria-label="Default select example" name="status">
            @foreach (config('common.invoice.status') as $key => $value)

                <option {{ $data->status == $value ? 'selected' : '' }} value="{{ $value }}" name="status">
                    {{ $key }}</option>

            @endforeach


        </select>
    </div>
    <button class="mt-2" type="submit">Update</button>
</form>
@endsection
