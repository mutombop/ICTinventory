@extends('layouts.app')

@section('content')
<h2>Assets on the PO: <strong>{{$po->ponumber}}</strong></h2>
    <br/>
    <a href="/pos" class="btn btn-primary">Go back</a>
    <br>
    <br/>
    <input class="form-control" id="myInput" type="text" placeasset="Search.." size="50">
    @if(count($assets) > 0)
            <div class="container">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>Inventory Tag</th>
                    <th>AMR</th>
                    <th>Model</th>
                    <th>Serial Number</th>
                    <th>Current holder / location</th>
                </tr>
                </thead>
                <tbody id="assetsTable">
                @foreach($assets as $asset)
                <tr>
                    <td>{{$asset->inventorytag}}</td>
                    <td>{{$asset->amr}}</td>
                    <td>{{$asset->assetmodel->modelname}}</td>
                    <td>{{$asset->serialnumber}}</td>
                    <td>{{$asset->holder->firstName}} {{$asset->holder->lastName}}</td>
                    {{-- <td>{{$holder->firstName}} {{$holder->lastName}}</td> --}}
                </tr>
                @endforeach
                </tbody>
            <table>
            </div>
            <script>
                    $(document).ready(function(){
                      $("#myInput").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#assetsTable tr").filter(function() {
                          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                      });
                    });
                    </script>
{{--         @endforeach--}}
        {{-- {{$assets->links()}} --}}
    @else
        <p>No asset found</p>
    @endif
@endsection
