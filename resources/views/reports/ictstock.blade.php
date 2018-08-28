@extends('layouts.app')

@section('content')
<h2>Assets in stock with ICT</h2>
<hr>
<br/>
{{-- <input class="form-control" id="myInput" type="text" placeasset="Search.." size="50"> --}}
@if(count($assets) > 0)
        <div class="container">
            @foreach ($assets->groupBy('typename') as $type => $assets)
                <h2>{{$type}}</h2>
            <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Inventory Tag</th>
                <th>AMR</th>
                <th>Model</th>
                <th>Serial Number</th>
                <th>PO Number</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody id="assetsTable">
            @foreach($assets as $asset)
            <tr>
                <td>{{$asset->inventorytag}}</td>
                <td>{{$asset->amr}}</td>
                <td>{{$asset->assetmodel->modelname}}</td>
                <td>{{$asset->serialnumber}}</td>
                <td>{{$asset->po->ponumber}}</td>
                <td><a href="#" class="btn btn-outline-secondary btn-sm">Edit</a></td>
                <td><a href="/audits/asset/{{$asset->id}}" class="btn btn-outline-info btn-sm">View audit trail</td>
                <td><a href="#" class="btn btn-outline-danger btn-sm">Mark for PSB</a></td>
            </tr>
            @endforeach
            </tbody>
        <table>
            @endforeach
        </div>
{{--         @endforeach--}}
    {{-- {{$assets->links()}} --}}
@else
    <p>No asset found</p>
@endif
@endsection
