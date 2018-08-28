@extends('layouts.app')

@section('content')
    <h2>Edit asset</h2>
    <hr>
    {!! Form::open(['action' => ['AssetController@update', $asset->id], 'method' => 'POST']) !!}
    <div class="form-row">
        <div class="col-md-6 form-group">
                {{Form::label('asset_type', 'Type')}}
                {{Form::select('assettypes[]', $assettypes, $asset->assettype_id, ['class' => 'col-md-6 form-control', 'placeholder' => 'Select Type...'])}}
        </div>
        <div class="col-md-6 form-group">
                {{Form::label('asset_model', 'Model')}}
                {{Form::select('assetmodels[]', $assetmodels, $asset->assetmodel_id, ['class' => 'col-md-6 form-control', 'placeholder' => 'Select Model...'])}}
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-3 form-group">
                {{Form::label('inventorytag', 'Inventory Tag')}}
                {{Form::text('inventorytag', $asset->inventorytag, ['class' => 'col-md-6 form-control', 'placeholder' => 'Inventory Tag'])}}
        </div>
        <div class="col-md-3 form-group">
            {{Form::label('AMRnumber', 'AMR Number')}}
            {{Form::text('AMRnumber', $asset->amr, [ 'class' => 'col-md-6 form-control', 'placeholder' => 'AMR Number'])}}
        </div>
        <div class="col-md form-group">
                {{Form::label('serialnumber', 'Serial Number')}}
                {{Form::text('serialnumber', $asset->serialnumber, [ 'class' => 'col-md-6 form-control', 'placeholder' => 'Serial Number'])}}
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6 form-group">
                {{Form::label('po', 'Purchase Order')}}
                {{Form::select('pos[]', $pos, $asset->po_id, ['class' => 'col-md-6 form-control', 'placeholder' => 'Select PO...'])}}
        </div>
        <div class="col-md-6 form-group">
            {{Form::label('price', 'Price')}}
            {{Form::text('price', $asset->price, [ 'class' => 'col-md-6 form-control', 'placeholder' => 'Price'])}}
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6 form-group">
                {{Form::label('holder', 'Holder')}}
                {{Form::select('holders[]', $holders, $asset->holder_id, ['class' => 'col-md-6 form-control', 'placeholder' => 'Select Holder...'])}}
        </div>
        <div class="col-md-6 form-group">
                {{Form::label('comment', 'Comment')}}
                {{Form::textarea('comment', $asset->comment, [ 'class' => 'col-md-6 form-control', 'placeholder' => 'Comment'])}}
        </div>
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
