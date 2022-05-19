@extends('layout.layout')

@section('content')

<div class="container">
   <div class="card">
      <div class="card-header">
         <div class="col-md-6">
            <h3>Sửa Khoa</h3>
         </div>
         <div class="col-md-6">
            <a href="{{route('faculties.index')}}" class="btn btn-primary float-end">Danh sách khoa</a>
         </div>
      </div>
   </div>
   <div class="card-body">
      <form action="{{route('faculties.update', $faculties->id)}}" method="POST">
         @csrf
         @method('PUT')
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <strong>Tên khoa</strong>
                  <input type="text" name='name' value="{{$faculties->name}}" class="form-control"
                     placeholder="Nhập tên khoa">
               </div>
            </div>
         </div>
         <button type="submit" class="btn btn-success mt-2">Cập nhật</button>
      </form>
   </div>
</div>
@endsection()