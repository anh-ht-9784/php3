@extends("layout")
@section('title', 'Tạo Mới products')
@section('content')
    <form class="pt-2" method="POST" action="{{ route('admin.products.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control" name="name" placeholder="Tên">
            </div>
            <div class="col-md-12">
                <input type="number" class="form-control" name="price" placeholder="Giá" min="1" max="500000">
            </div>
            <div class="col-md-12">
                <input type="number" class="form-control" placeholder="Số Lượng" name="quantity" min="1" max="500000">
            </div>
            <div class="col-md-6">
                <select class="form-select " aria-label="Default select example" name="category_id">
                    @foreach ($data as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>

                    @endforeach;
                </select>
            </div>
            <button class="mt-2" type="submit">Tạo Mới</button>
    </form>
@endsection
