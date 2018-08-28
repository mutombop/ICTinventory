@extends('layouts.app')

@section('content')
    <h2>Holders</h2>
    <br/>
    <a class="btn btn-primary btn-sm" href="/holders/create" role="button">Create new holder</a>
    <br/>
    <br/>
    <input class="form-control" id="myInput" type="text" placeholder="Search.." size="50">
    @if(count($holders) > 0)
            <div class="container">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Title</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody id="holdersTable">
                @foreach($holders as $holder)
                <tr>
                    <td>{{$holder->firstName}}</td>
                    <td>{{$holder->lastName}}</td>
                    <td>{{$holder->title}}</td>
                    <td><a href="/holders/{{$holder->id}}/edit" class="btn btn-outline-primary btn-sm">Show / Edit</a></td>
                    <td><a href="/holders/assets/{{$holder->id}}" class="btn btn-outline-info btn-sm">View assets</a></td>
                </tr>
                @endforeach
                </tbody>
            <table>
            </div>
            <script>
                    $(document).ready(function(){
                      $("#myInput").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#holdersTable tr").filter(function() {
                          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                      });
                    });
                    </script>
{{--         @endforeach--}}
        {{$holders->links()}}
    @else
        <p>No holder found</p>
    @endif
@endsection
