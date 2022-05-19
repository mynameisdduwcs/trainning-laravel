@extends('layout.layout')

@section('content')

<div class="container">
   <h1>Thêm môn học </h1>
   {{--
   <?php dd($student); ?> --}}
   <fieldset disabled>
      <input id="disabledTextInput" class="mb-3" type="text" value="{{$student->id}}">
   </fieldset>

   <form action="{{route('subjects.store')}}" method="POST">
      @foreach($subject as $item)
      <div class="form-check">

         <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
         <label class="form-check-label" for="flexCheckDefault">
            {{$item->name}}
         </label>

      </div>
      @endforeach
      <button type="submit" class="btn btn-success mt-2">Lưu</button>
   </form>

</div>

@endsection