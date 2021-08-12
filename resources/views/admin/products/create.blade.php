@extends("layout")
@section('title', 'Tạo Mới products')
@section('content')
<form class="pt-2" method="POST" enctype="multipart/form-data" action="{{ route('admin.products.store') }}">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <input type="text" class="form-control" name="name" placeholder="Tên">
            @error('name')
            <span class="">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-12">
            <input type="number" class="form-control" name="price" placeholder="Giá" min="1" max="500000">
            @error('price')
            <span class="">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-12">
            <input type="number" class="form-control" placeholder="Số Lượng" name="quantity" >
            @error('quantity')
            <span class="">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-12">
           <input type="file" name="image" placeholder="Ảnh" id="">
           @error('image')
           <span class="">{{ $message }}</span>
           @enderror
        </div>
        <div class="col-md-6">
            <select class="form-select " aria-label="Default select example" name="category_id">
                @foreach ($data as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>

                @endforeach;
            </select>
        </div>
        <div class="col-8">
            <button type="submit">Tạo Mới</button>
        </div>
</form>
@endsection
