<html>
    <div>
        <h1><center>Permiso de Circulacion</center></h1>
        @foreach($ultimoPermiso->getAttributes() as $key => $value)
            @if ($value !== '')
                <div>{{$key}}</div>
                <div>{{$value}}</div>
            @endif
        @endforeach
    </div>
</html>