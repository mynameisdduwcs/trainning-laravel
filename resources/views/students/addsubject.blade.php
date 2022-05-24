@extends('layout.layout')

@section('content')

<div class="container">
   <h1>Thêm môn học </h1>



   <form action="{{route('student.savesubject')}}" method="POST">

      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <fieldset>
         <input name="student_id" readonly class="mb-3" type="text" value="{{$student->id}}">
      </fieldset>

      @foreach($subject as $item)
      <div class="form-check">
         <input name="subject_id[]" class="form-check-input" type="checkbox" value="{{$item->id}}" id="flexCheckDefault">
         <label class="form-check-label" for="flexCheckDefault">
            {{$item->name}}
         </label>


      </div>
      @endforeach


      <button type="submit" class="btn btn-success mt-2">Lưu</button>
   </form>

</div>

@endsection