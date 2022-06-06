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


