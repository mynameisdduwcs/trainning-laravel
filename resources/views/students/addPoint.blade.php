@extends('layouts.java')

@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4>ADD POINT</h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('students.index')}}" class="btn btn-primary float-end">Student list</a>
                        {!! Form::button('Add Subject', ['class'=>['btn2','btn btn-danger float-end'],'style'=>'margin-right: 10px']) !!}

                        <p id="count-subject" style="display: none">{{count($subject)}}</p>


                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            {{Form::open(['route'=>['students.savePoint',$student], 'method'=>'POST','enctype' => "multipart/form-data" ])}}
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="text-align: center">Môn</th>
                    <th style="text-align: center">Điểm</th>
                </tr>
                </thead>

                <tbody id="formadd">
                <tr>
                    <td>

{{--                        <select name="subject_id[]" class='form-select'>--}}
{{--                            @foreach($subject as $item)--}}
{{--                                <option value="{{$item->id}} {{$item->id?'selected' : ''}}">{{$item->name}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
                        {!! Form::select('subject_id[]', $point,'', ['class'=>'form-select']) !!}

                    </td>
                    <td>
                        {!! Form::text('point[]', $value = null, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                        {!! Form::button('DELETE', ['class'=>['delete','btn btn-danger']]) !!}
                    </td>
                </tr>


{{--                <tr class="addform" style="display: none">--}}
{{--                    <td>--}}
{{--                        <select name="subject_id[]" class='form-select'>--}}
{{--                            @foreach($subject as $item)--}}
{{--                                <option value="{{$item->id}}">{{$item->name}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        {!! Form::text('point[]', $value = null, ['class' => 'form-control']) !!}--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        {!! Form::button('DELETE', ['class'=>['delete','btn btn-danger']]) !!}--}}
{{--                    </td>--}}
{{--                </tr>--}}

                </tbody>

            </table>
            {!! Form::submit('Submit', ['class' => 'btn btn-info','id'=>'saveform']) !!}
            {!! Form::close() !!}

        </div>

    </div>
@endsection
