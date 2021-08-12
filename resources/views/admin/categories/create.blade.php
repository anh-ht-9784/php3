@extends("layout")
@section('title', "Tạo Mới Categories")
@section('content')
<form class="pt-2" method="POST" action="{{route('admin.categories.store')}}">
  @csrf
    <div class="row">
      <div class="col-md-12">
        <input type="text" class="form-control" name="name" placeholder="Tên">
      </div>
      @error('name')
      <span class="">{{ $message }}</span>
      @enderror
     
    </div>
    <button class="mt-2"type="submit">Tạo Mới</button>
  </form>
@endsection 
