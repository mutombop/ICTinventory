@extends('layouts.app')

@section('content')
    <h2>Create new asset</h2>
    <hr>
    {!! Form::open(['action' => 'AssetController@store', 'method' => 'POST']) !!}
    <div class="form-row">
        <div class="col-md-6 form-group">
                {{Form::label('asset_type', 'Type')}}
                {{Form::select('assettypes[]', $assettypes, null, ['class' => 'col-md-6 form-control', 'placeholder' => 'Select Type...'])}}
        </div>
        <div class="col-md-6 form-group">
                {{Form::label('asset_model', 'Model')}}
                {{Form::select('assetmodels[]', $assetmodels, null, ['class' => 'col-md-6 form-control', 'placeholder' => 'Select Model...'])}}
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-3 form-group">
                {{Form::label('inventorytag', 'Inventory Tag')}}
                {{Form::text('inventorytag', '', ['class' => 'col-md-6 form-control', 'placeholder' => 'Inventory Tag'])}}
        </div>
        <div class="col-md-3 form-group">
            {{Form::label('AMRnumber', 'AMR Number')}}
            {{Form::text('AMRnumber', '', [ 'class' => 'col-md-6 form-control', 'placeholder' => 'AMR Number'])}}
        </div>
        <div class="col-md form-group">
                {{Form::label('serialnumber', 'Serial Number')}}
                {{Form::text('serialnumber', '', [ 'class' => 'col-md-6 form-control', 'placeholder' => 'Serial Number'])}}
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6 form-group">
                {{Form::label('po', 'Purchase Order')}}
                {{Form::select('pos[]', $pos, null, ['class' => 'col-md-6 form-control', 'placeholder' => 'Select PO...'])}}
        </div>
        <div class="col-md-6 form-group">
            {{Form::label('price', 'Price')}}
            {{Form::text('price', '', [ 'class' => 'col-md-6 form-control', 'placeholder' => 'Price'])}}
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6 form-group">
                {{Form::label('holder', 'Holder')}}
                {{Form::select('holders[]', $holders, null, ['class' => 'col-md-6 form-control', 'placeholder' => 'Select Holder...'])}}
        </div>
        <div class="col-md-6 form-group">
                {{Form::label('comment', 'Comment')}}
                {{Form::textarea('comment', '', [ 'class' => 'col-md-6 form-control', 'placeholder' => 'Comment'])}}
        </div>
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
    <br/>
    <div class="form-group pull-right">
        <a href="/assets/" class="btn btn-outline-danger btn-sm">Cancel</a>
    </div>
@endsection
