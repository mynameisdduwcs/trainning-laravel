@extends('layout.layout')

@section('content')
<div class="container">
   <div class="card">
      <div class="card-header">
         <div class="row">
            <div class="col-md-6">
               <h3>Quản lý sinh viên</h3>

            </div>

            <div class="col-md-6">
               <a href="{{route('students.create')}}" class="btn btn-primary float-end">THÊM</a>
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
                  <th style="text-align: center;width:10px;font-size: 70%">STT</th>
                  <th style="text-align: center;width:65px;font-size: 70%">Tên xinh viên</th>
                  <th style="text-align: center;width:65px;font-size: 70%">Avatar</th>
                  <th style="text-align: center;width:65px;font-size: 70%">Giới tính</th>
                  <th style="text-align: center;width:65px;font-size: 70%">Ngày sinh</th>
                  <th style="text-align: center;width:50px;font-size: 70%">Dân tộc</th>
                  <th style="text-align: center;width:65px;font-size: 70%">Quê quán</th>
                  <th style="text-align: center;width:65px;font-size: 70%">Số điện thoại</th>
                  <th style="text-align: center;width:65px;font-size: 70%">Email</th>
                  <th style="text-align: center;width:65px;font-size: 70%">Khoa</th>
                  <th style="text-align: center;width:65px;font-size: 70%">Ghi chú</th>
                  <th style="text-align: center;width:65px;font-size: 70%">Thao tác</th>
               </tr>
            </thead>

            <tbody>
               @foreach ($students as $student)
               <tr>

                  <td> {{++$i}}</td>
                  <td>{{$student->full_name}}</td>
                  <td> <img style="width:60px; height:80px ;" src="{{$student->avatar}}"> </td>
                  <td>{{$student->gender===1 ? "Nam" : "Nữ";}}</td>
                  <td>{{$student->birthdate}}</td>
                  <td>{{$student->ethnic}}</td>
                  <td>{{$student->hometown}}</td>
                  <td>{{$student->phone}}</td>
                  <td>{{$student->email}}</td>
                  <td>{{$student->id}}</td>
                  <td>{{$student->description}}</td>

                  <td>
                     <form action="{{route('students.destroy', $student->id)}}" method="POST"
                        style="text-align: center;">
                        <a href="{{route('students.edit', $student->id)}}" class="btn btn-info"> Sửa</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xoá</button>

                        @method('GET')
                        <a href="{{route('students.addsubject', $student->id)}}" class="btn btn-success"> Thêm môn</a>
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