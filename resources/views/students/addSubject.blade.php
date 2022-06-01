@extends('layouts.layout')

@section('content')

    <div class="container">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4>UPDATE SUBJECT</h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('students.index')}}" class="btn btn-primary float-end">Student list</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            {{Form::open(['route'=>['student.saveSubject',$student], 'method'=>'POST' ])}}
            @foreach($subjects as $item)
                <div class="form-check">
                    {!! Form::checkbox('subject_id[]',$item->id,$student->subjects->contains($item->id)?'checked':'',['class' => 'form-check-input']) !!}
                    {!! Form::label($item->name,null, ['class'=>'form-check-label', 'for'=>'flexCheckDefault']) !!}
                </div>
            @endforeach
            {!! Form::submit('Submit',['class'=>'btn btn-success mt-2']) !!}
            {!! Form::close() !!}
        </div>

    </div>

@endsection

{{--<form action="{{route('student.saveSubject',$student)}}" method="POST">--}}
{{--    <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
{{--    @foreach($subjects as $item)--}}
{{--        <div class="form-check">--}}
{{--            <input name="subject_id[]" class="form-check-input" type="checkbox"--}}
{{--                   value="{{$item->id}}" {{$student->subjects->contains($item->id)?'checked':''}} >--}}
{{--            <label class="form-check-label" for="flexCheckDefault">--}}
{{--                {{$item->name}}--}}
{{--            </label>--}}
{{--        </div>--}}
{{--    @endforeach--}}

{{--    <button type="submit" class="btn btn-success mt-2">Submit</button>--}}
{{--</form>--}}
