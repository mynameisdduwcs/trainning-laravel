@extends('layout.layout')

@section('content')

<div class="container">
   <div class="card">
      <div class="card-header">
         <div class="row">
            <div class="col-md-6">
               <h4>Thêm môn học</h4>
            
            </div>
            <div class="col-md-6">
               <a href="{{route('subjects.index')}}" class="btn btn-primary float-end">Danh sách môn học</a>
            </div>
         </div>
      </div>
   </div>
   <div class="card-body">
      <form action="{{route('subjects.store')}}" method="POST">
         @csrf
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <strong>Tên môn học</strong>
                  <input type="text" name='name' class="form-control" placeholder="Nhập tên môn học">
               </div>

            </div>
         </div>
         <button type="submit" class="btn btn-success mt-2">Lưu</button>
      </form>
   </div>
</div>
@endsection()