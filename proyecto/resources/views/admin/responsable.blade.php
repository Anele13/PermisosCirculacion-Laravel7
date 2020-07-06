@extends('layout_base')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <div class="container">
    <div class="col-md-6">
    <h4>Agregar Responsable</h4>
    <hr> 
    <form class="form" method="POST" action="{{ route('alta_reponsable') }}" >
                @csrf
                <input required type="text" class="form-control sm-2 mr-sm-2"  name="nombre" placeholder="Nombre">
                <br>
                <input required type="mail" class="form-control sm-2 mr-sm-2"  name="email" placeholder="Email">
                <br>
                <button type="submit" class="btn btn-info">Alta</button>
            </form>
            <br>
            <br>
            <div class="d-inline-block">
            <a class="btn btn-info" href="/admin"><i class="fa fa-home" aria-hidden="true"></i> Volver<span class="sr-only">(current)</span></a>
        </div>
            </div>
       
    </div>
@endsection