@extends('layout.layout')

@section('content')

<div class="container">
   <div class="card">
      <div class="card-header">
         <div class="row">
            <div class="col-md-6">
               <h4>Thêm Khoa</h4>
            </div>
            <div class="col-md-6">
               <a href="{{route('faculties.index')}}" class="btn btn-primary float-end">Danh sách khoa</a>
            </div>
         </div>
      </div>
   </div>
   <div class="card-body">
      <form action="{{route('faculties.store')}}" method="POST">
         @csrf
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <strong>Tên khoa</strong>
                  <input type="text" name='name' class="form-control" placeholder="Nhập tên khoa">
               </div>

            </div>
         </div>
         <button type="submit" class="btn btn-success mt-2">Lưu</button>
      </form>
   </div>
</div>
@endsection()