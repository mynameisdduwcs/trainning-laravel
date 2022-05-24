@extends('layout.layout')

@section('content')
<div class="container">
   <div class="card">
      <div class="card-header">
         <div class="row">
            <div class="col-md-6">
               <h3>Quản lý môn học</h3>
              
            </div>

            <div class="col-md-6">
               <a href="{{route('subjects.create')}}" class="btn btn-primary float-end">Thêm</a>
            </div>

         </div>
      </div>

      <div class="card-body">
         @if(Session::has('notification'))
         <div class="alert alert-success">
            {{Session::get('notification')}}
         </div>

         @endif
         <table class="table table-bordered">

            <thead>
               <tr>
                  <th style="text-align: center;width:100px">STT</th>
                  <th style="text-align: center;">Tên khoa</th>
                  <th style="width: 180px;text-align: center;">Thao tác</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($subjects as $subject)
               <tr>

                  <td> {{++$i}}</td>
                  <td>{{$subject->name}}</td>
                  <td>
                     <form action="{{route('subjects.destroy', $subject->id)}}" method="POST"
                        style="text-align: center;">
                        <a href="{{route('subjects.edit', $subject->id)}}" class="btn btn-info"> Sửa</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xoá</button>
                     </form>
                  </td>
               </tr>
               @endforeach

            </tbody>

         </table>
      </div>

   </div>
</div>

@endsection