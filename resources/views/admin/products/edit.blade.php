@extends("layout")
@section('title', 'Sửa products')
@section('content')
    <form class="pt-2" method="POST" action="{{ route('admin.products.update', ['id' => $data->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control" name="name" value="{{ $data->name }}" placeholder="Tên">
            </div>
            <div class="col-md-12">
                <input type="number" class="form-control" name="price" value="{{ $data->price }}" placeholder="Giá" min="1"
                    max="500000">
            </div>
            <div class="col-md-12">
                <input type="number" class="form-control" placeholder="Số Lượng" value="{{ $data->quantity }}"
                    name="quantity" min="1" max="500000">
            </div>
            <div class="col-md-12">
                <input type="file" name="image" placeholder="Ảnh" id="">
             </div>
             <div>
                <image src="{{asset("storage/images/products/$data->image")}}" with="100px" height="100px" width="100px">
                   
             </div>
             <div>
                <input type="hidden" name="image_old" placeholder="Ảnh" id="" value="{{ $data->image }}">
             </div>
            <div class="col-md-10">
                <select class="form-select col-md-6" aria-label="Default select example" name="category_id">
                    @foreach ($list as $c)
                        <option {{ $data->category_id == $c->id ? 'selected' : '' }} value="{{ $c->id }}">
                            {{ $c->name }}</option>

                    @endforeach;
                </select>
            </div>
            <button class="mt-2 col-4" type="submit">Tạo Mới</button>
    </form>
@endsection
 