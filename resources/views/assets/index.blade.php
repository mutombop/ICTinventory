@extends('layouts.app')

@section('content')
    <h2>Assets</h2>
    <br/>
    @if(!Auth::guest())
    <a class="btn btn-primary btn-sm" href="/assets/create" role="button">Create new asset</a>
    @endif
    <br/>
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
                    <th>Current holder</th>
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
                    <td>{{$asset->holder->fullName}}</td>
                    @if(!Auth::guest())
                    <td><a href="/assets/{{$asset->id}}/edit" class="btn btn-outline-secondary btn-sm">Edit</a></td>
                    <td><a href="#" class="btn btn-outline-danger btn-sm">Mark for PSB</a></td>
                    @endif
                    <td><a href="/audits/asset/{{$asset->id}}" class="btn btn-outline-info btn-sm">View audit trail</a></td>
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
        {{$assets->links()}}
    @else
        <p>No asset found</p>
    @endif
@endsection
