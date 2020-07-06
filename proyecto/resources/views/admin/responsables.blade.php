@extends('layout_base')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <div class="container">
        <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($superiores as $superior)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$superior->id}}</td>
                <td>{{$superior->nombre}}</td>
                <td>{{$superior->email}}</td>
               
            </tr>
            @endforeach
        </tbody>
        </table>
        {{$superiores->links()}}
        <div class="d-inline-block">
            <a class="btn btn-info" href="/admin"><i class="fa fa-home" aria-hidden="true"></i> Volver<span class="sr-only">(current)</span></a>
        </div>
    </div>
@endsection