<html>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        padding: .75rem 1.25rem;
        background-color: rgba(0,0,0,.03);
        border-top: 1px solid rgba(0,0,0,.125);
    }
    </style>
  
   
        <div>
            <h1><center>Permiso de Circulacion</center></h1>
            <hr>
            <div class="row ustify-content-center">
                <div class="col-md-10 offset-md-1">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Campo</th>
                                <th scope="col">Descripcion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ultimoPermiso->getAttributes() as $key => $value)
                                @if ($value)
                                    @if ($key !== 'id' & $key !== 'superior' & $key !== 'autorizado' & $key !== 'created_at' & $key !== 'updated_at')
                                        <tr>
                                            <td>{{$key}}
                                            </td>
                                            <td>{{$value}}
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    <footer class="footer">
        <div class="container">
            <span class="text-muted">Autorizado por la seccion de permisos.</span>
        </div>
    </footer>
</html>