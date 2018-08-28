@extends('layouts.app')

@section('content')
<h2>Assets in the custody of: <strong>{{$holder->firstName}} {{$holder->lastName}}</strong></h2>
    <br/>
    <a href="/holders" class="btn btn-primary btn-sm">Go back</a>
<a href="/receipt/{{$holder->id}}" class="btn btn-outline-success btn-sm">Generate receipt sheet in PDF</a>
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
                    <th>Type</th>
                    <th>Model</th>
                    <th>Serial Number</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody id="assetsTable">
                @foreach($assets as $asset)
                <tr>
                    <td>{{$asset->inventorytag}}</td>
                    <td>{{$asset->amr}}</td>
                    <td>{{$asset->assettype->typename}}</td>
                    <td>{{$asset->assetmodel->modelname}}</td>
                    <td>{{$asset->serialnumber}}</td>
                    <td><form action="/ICTreturn" method="POST">@csrf<input type="hidden" name="assetID" value="{{$asset->id}}"/>
                        <button class="btn btn-sm btn-outline-secondary" type="submit">Return asset to ICT</button>
                    </form></td>
                    <td><form action="/ADMINreturn" method="POST">@csrf<input type="hidden" name="assetID" value="{{$asset->id}}"/>
                        <button class="btn btn-sm btn-outline-secondary" type="submit">Return asset to ADMIN</button>
                    </form></td>
                </tr>
                @endforeach
                </tbody>
            </table>
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
