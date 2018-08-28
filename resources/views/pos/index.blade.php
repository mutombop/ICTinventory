@extends('layouts.app')

@section('content')
    <h2>Purchase Orders</h2>
    <br/>
    <a class="btn btn-primary btn-sm" href="/pos/create" role="button">Create new PO</a>
    <br/>
    <br/>
    <input class="form-control" id="myInput" type="text" placepo="Search.." size="50">
    @if(count($pos) > 0)
            <div class="container">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>PO Number</th>
                    <th>Section</th>
                    <th>Delivery Date</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody id="posTable">
                @foreach($pos as $po)
                <tr>
                    <td>{{$po->ponumber}}</td>
                    <td>{{$po->section->sectionname}}</td>
                    <td>{{$po->deliveryDate}}</td>
                <td><a href="/pos/{{$po->id}}/edit" class="btn btn-outline-secondary btn-sm">Show / Edit</a></td>
                <td><a href="/po/assets/{{$po->id}}" class="btn btn-outline-info btn-sm">View assets</a></td>
                </tr>
                @endforeach
                </tbody>
            <table>
            </div>
            <script>
                    $(document).ready(function(){
                      $("#myInput").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#posTable tr").filter(function() {
                          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                      });
                    });
                    </script>
{{--         @endforeach--}}
        {{$pos->links()}}
    @else
        <p>No po found</p>
    @endif
@endsection
