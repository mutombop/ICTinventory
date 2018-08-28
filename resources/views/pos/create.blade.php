@extends('layouts.app')

@section('content')
    <h2>Create new purchase order</h2>
    <hr>
    {!! Form::open(['action' => 'PoController@store', 'method' => 'POST']) !!}
    <div class="form-row">
        <div class="col-md-6 form-group">
            {{Form::label('ponumber', 'PO number')}}
            {{Form::text('ponumber', '', ['class' => 'col-md-6 form-control', 'placeholder' => 'PO Number'])}}
        </div>
        <div class="col-md-6 form-group">
            {{Form::label('section', 'Section')}}
            {{Form::select('sections[]', $sections, null, ['class' => 'col-md-6 form-control', 'placeholder' => 'Select Section...'])}}
        </div>
    </div>
        <div class="form-group">
                {{Form::label('deliverydate', 'Delivery Date')}}
                {{Form::date('deliverydate', '', [ 'class' => 'col-md-3 form-control', 'placeholder' => 'Delivery Date'])}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
