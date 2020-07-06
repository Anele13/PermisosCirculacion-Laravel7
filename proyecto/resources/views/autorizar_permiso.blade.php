


@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
    </div>
@endif
@if(count($errors)>0)
        <div class="alert alert-danger alert-block" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            
        </div>
@endif
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="container">
        <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Legajo</th>
                <th>Email</th>
                <th>Sector</th>
                <th>Responsable Superior</th>
                <th>Dependencia</th>
                <th>Espacio </th>
                <th>Autorizado</th>   
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$permiso->id}}</td>
                <td>{{$permiso->nombre}}</td>
                <td>{{$permiso->apellido}}</td>
                <td>{{$permiso->dni}}</td>
                <td>{{$permiso->legajo}}</td>
                <td>{{$permiso->email}}</td>
                <td>{{$permiso->sector}}</td>
                @if($permiso->superior != "")
                    @foreach($superiores as $superior)
                        @if($superior->id == $permiso->superior)
                            <td>{{$superior->nombre}}</td>
                        @endif
                    @endforeach
                @else
                    <td>{{$permiso->superior}}</td>
                @endif
                <td>{{$permiso->dependencia}}</td>
                <td>{{$permiso->espacio}}</td>
                @if($permiso->autorizado == True)
                    <td>Si</td>
                @else
                    <td>No</td>
                @endif
            </tr>
        </tbody>
        </table>
        @if($permiso->autorizado != True)
        
        <form class="form" method="POST" action="{{ route('autorizar',36) }}" >
                @csrf
                <button type="submit" class="btn btn-success pull-right">Autorizar</button>
            </form>
        
        @endif
    </div>
