@extends("layout")
@section('title', "update Categories")
@section('content')
<form class="pt-2" method="POST" action="{{route('admin.categories.update',['id'=>$data->id])}}">
  @csrf
    <div class="row">
      <div class="col-md-12">
        <input type="text" class="form-control" value="{{$data->name}}" name="name" placeholder="Tên">
      </div>
     
    <button class="mt-2"type="submit">Update</button>
  </form>
@endsection 
