@extends('layouts.app')

@section('content')
    <h2>Create new holder</h2>
    <hr>
    {!! Form::open(['action' => 'HolderController@store', 'method' => 'POST']) !!}
    <div class="form-row">
        <div class="col-md-6 form-group">
                {{Form::label('firstname', 'First Name')}}
                {{Form::text('firstName', '', ['class' => 'col-md-6 form-control', 'placeholder' => 'First Name'])}}
        </div>
        <div class="col-md-6 form-group">
            {{Form::label('lastname', 'Last Name')}}
            {{Form::text('lastName', '', [ 'class' => 'col-md-6 form-control', 'placeholder' => 'Last Name'])}}
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', [ 'class' => 'col-md-6 form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="col-md-6 form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', '', [ 'class' => 'col-md-6 form-control', 'placeholder' => 'Email'])}}
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 form-group">
                {{Form::label('section', 'Section')}}
                {{Form::select('sections[]', $sections, null, ['class' => 'col-md-6 form-control', 'placeholder' => 'Select Section...'])}}
        </div>
        <div class="col-md-6 form-group">
                {{Form::label('dutystation', 'Dutystation')}}
                {{Form::select('dutystations[]', $dutystations, null, ['class' => 'col-md-6 form-control', 'placeholder' => 'Select Duty station...'])}}
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 form-group">
            {{Form::label('mobile', 'Mobile number')}}
            {{Form::text('mobile', '', [ 'class' => 'col-md-6 form-control', 'placeholder' => 'Mobile number'])}}
        </div>
        <div class="col-md-6 form-group">
            {{Form::label('extension', 'Extension')}}
            {{Form::text('extension', '', [ 'class' => 'col-md-6 form-control', 'placeholder' => 'Extension'])}}
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 form-group">
            {{Form::label('callsign', 'Callsign')}}
            {{Form::text('callsign', '', [ 'class' => 'col-md-6 form-control', 'placeholder' => 'Callsign'])}}
        </div>
        <div class="col-md-6 form-group">
            {{Form::label('roomnumber', 'Room number')}}
            {{Form::text('roomnumber', '', [ 'class' => 'col-md-6 form-control', 'placeholder' => 'Room number'])}}
        </div>
    </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
