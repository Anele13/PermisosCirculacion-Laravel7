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
                <th>Apellido</th>
                <th>DNI</th>
                <th>Legajo</th>
                <th>Email</th>
                <th>Responsable Superior</th>

                <th>Autorizado</th>
            
            </tr>
        </thead>
        <tbody>
            @foreach($permisos as $permiso)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$permiso->id}}</td>
                <td>{{$permiso->nombre}}</td>
                <td>{{$permiso->apellido}}</td>
                <td>{{$permiso->dni}}</td>
                <td>{{$permiso->legajo}}</td>
                <td>{{$permiso->email}}</td>



                @if($permiso->superior != "")
                    @foreach($superiores as $superior)
                        @if($superior->id == $permiso->superior)
                            <td>{{$superior->nombre}}</td>
                        @endif
                    @endforeach
                @else
                    <td>{{$permiso->superior}}</td>
                @endif
                
                

                @if($permiso->habilitado == True)
                    <td>Si</td>
                @else
                    <td>No</td>
                @endif
            </tr>
            @endforeach
        </tbody>
        </table>
        {{$permisos->links()}}
            
        <div class="d-inline-block">
            <a class="btn btn-info" href="/admin"><i class="fa fa-home" aria-hidden="true"></i> Volver<span class="sr-only">(current)</span></a>
        </div>
        <br>
        <br>
    </div>
@endsection