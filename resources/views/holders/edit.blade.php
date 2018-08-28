@extends('layouts.app')

@section('content')
    <h2>Edit holder</h2>
    <hr>
    {!! Form::open(['action' => ['HolderController@update', $holder->id], 'method' => 'POST']) !!}
    <div class="form-row">
        <div class="col-md-6 form-group">
                {{Form::label('firstName', 'First Name')}}
                {{Form::text('firstName', $holder->firstName, ['class' => 'col-md-6 form-control', 'placeholder' => 'First Name'])}}
        </div>
        <div class="col-md-6 form-group">
            {{Form::label('lastName', 'Last Name')}}
            {{Form::text('lastName', $holder->lastName, [ 'class' => 'col-md-6 form-control', 'placeholder' => 'Last Name'])}}
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', $holder->title, [ 'class' => 'col-md-6 form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="col-md-6 form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', $holder->emailAddress, [ 'class' => 'col-md-6 form-control', 'placeholder' => 'Email'])}}
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 form-group">
                {{Form::label('section', 'Section')}}
                {{Form::select('sections[]', $sections, $holder->section_id, ['class' => 'col-md-6 form-control', 'placeholder' => 'Select Section...'])}}
        </div>
        <div class="col-md-6 form-group">
                {{Form::label('dutystation', 'Dutystation')}}
                {{Form::select('dutystations[]', $dutystations, $holder->dutystation_id, ['class' => 'col-md-6 form-control', 'placeholder' => 'Select Duty station...'])}}
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 form-group">
            {{Form::label('mobile', 'Mobile number')}}
            {{Form::text('mobile', $holder->mobileNumber, [ 'class' => 'col-md-6 form-control', 'placeholder' => 'Mobile number'])}}
        </div>
        <div class="col-md-6 form-group">
            {{Form::label('extension', 'Extension')}}
            {{Form::text('extension', $holder->extension, [ 'class' => 'col-md-6 form-control', 'placeholder' => 'Extension'])}}
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 form-group">
            {{Form::label('callsign', 'Callsign')}}
            {{Form::text('callsign', $holder->callsign, [ 'class' => 'col-md-6 form-control', 'placeholder' => 'Callsign'])}}
        </div>
        <div class="col-md-6 form-group">
            {{Form::label('roomnumber', 'Room number')}}
            {{Form::text('roomnumber', $holder->roomNumber, [ 'class' => 'col-md-6 form-control', 'placeholder' => 'Room number'])}}
        </div>
    </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
