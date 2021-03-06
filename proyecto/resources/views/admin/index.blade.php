@extends('layout_base')

@section('content')

<style>
    .transfer-demo {
        width: 640px;
        height: 400px;
        margin: 0 auto;
    }
</style>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
    </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <h4>Datos Personales solicitados</h4>
            <hr>
            <div id="transfer1" class="transfer-demo"></div>
        </div>

        <div class="col-md-6">
            <h4>Datos de la Organizacion solicitados</h4>
            <hr>
            <div id="transfer2" class="transfer-demo"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h4>Datos Del Sitio</h4>
            <hr>   
            <!--<img src="images/{{ Session::get('image') }}">-->

            <form action="{{ route('update_campos_sitio') }}" method="POST" enctype="multipart/form-data">
                <label for="logotipo">Logotipo de la pagina</label>
                <div class="col-md-6">
                    <input type="file" name="image" class="form-control">
                </div>
                <br>
                <label for="colorBarra">Color de Fondo</label>
                <div id="grid1">
                    <input  name="colorFondo" id="colorFondo" type="color"/>
                </div>
                <br>
                <label for="colorBarra">Color Barra Navegacion</label>
                <div id="grid2">
                    <input  name="colorBarra" id="colorBarra" type="color" />
                </div> 
                <br>
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-info">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <h4>Mas Opciones</h4>
            <hr> 
            <form class="form" method="GET" action="{{ route('permisos') }}" >
                <button type="submit" class="btn btn-info">Listar Permisos</button>
            </form>
            <hr>
            <form class="form" method="GET" action="{{ route('responsable') }}" >
                <button type="submit" class="btn btn-info">Agregar Personal Responsable Superior</button>
            </form>
            <hr>
            <form class="form" method="GET" action="{{ route('responsables') }}" >
                <button type="submit" class="btn btn-info">Listar Personal Responsable Superior</button>
            </form>
            <hr>
            <form class="form" method="GET" action="{{ route('sector') }}" >
                <button type="submit" class="btn btn-info">Agregar Sector</button>
            </form>
            <hr>
            <form class="form" method="GET" action="{{ route('dependencia') }}" >
                <button type="submit" class="btn btn-info">Agregar Dependencia</button>
            </form>
            <hr>
            <form class="form" method="GET" action="{{ route('espacio') }}" >
                <button type="submit" class="btn btn-info">Agregar Espacio</button>
            </form>
        </div>
        
    </div>
    
    
    






<script>
    var dataArray1 = []
    var cambios1 = {}
    var json1 = {!!$requerimientos->datos_persona!!}

    function getElemento(arreglo, cambios){
        if(arreglo.length === 0){
            //recorrer cambios y ponerles a todos false creo.
            jQuery.each(cambios, function(i, val) {
                cambios[i] = false
            });
        }
        else{
            //recorrer camvios y a cada elemento ponerle false.
            //al que encuentra le pone true y al que no encuentra les pone false.
            arreglo_nombres = []
            jQuery.each(arreglo, function(i) {
                arreglo_nombres.push(arreglo[i].nombre)
            });
            jQuery.each(cambios, function(i, val) {
                if ($.inArray(i , arreglo_nombres) !== -1){
                    cambios[i] = true
                }
                else{
                    cambios[i] = false
                }
            });
        }
    }




    
    jQuery.each(json1, function(i, val) {
        console.log(i)
        console.log(val)
        cambios1[i]=val
        if(val != "true"){
            dataArray1.push({"nombre":i, "disponible":val})
        }
        else{
            dataArray1.push({"nombre":i, "disponible":val,"selected": true})
        }
    });
    var settings1 = {
        "dataArray": dataArray1,
        "itemName": "nombre",
        "valueName": "disponible",
        "callable": function (items) {
            getElemento(items,cambios1); 
            $.ajax({
                url: "{{ route('update_campos_persona') }}",
                method: 'GET',
                data: cambios1,
                success: function(data){
                    console.log(data)
                }
            });

        }
    };
    var transfer1 = $("#transfer1").transfer(settings1);




    var dataArray = []
    var cambios = {}
    var json = {!!$requerimientos->datos_organizacion!!}
    jQuery.each(json, function(i, val) {
        console.log(i)
        console.log(val)
        cambios[i]=val
        if(val != "true"){
            dataArray.push({"nombre":i, "disponible":val})
        }
        else{
            dataArray.push({"nombre":i, "disponible":val,"selected": true})
        }
    });
    var settings2 = {
        "dataArray": dataArray,
        "itemName": "nombre",
        "valueName": "disponible",
        "callable": function (items) {
            getElemento(items,cambios);
            $.ajax({
                url: "{{ route('update_campos_organizacion') }}",
                method: 'GET',
                data: cambios, 
                success: function(data){
                    console.log(data)
                }
            });

        }
    };
    var transfer2 = $("#transfer2").transfer(settings2);





    //cambia colores de la pagina y la barra
    var json = {!!$requerimientos->datos_sitio!!}
    var grid1 = document.getElementById("grid1");
    color_input1 = document.getElementById("colorFondo");
    $("#colorFondo").attr("value",json.colorFondo)
    color_input1.addEventListener("change", function() {
        var newdiv = document.createElement("div");
        grid1.appendChild(newdiv);
        newdiv.style.backgroundColor = color_input1.value;
    });

    var grid2 = document.getElementById("grid2");
    color_input = document.getElementById("colorBarra");
    $("#colorBarra").attr("value",json.colorBarra)
    color_input.addEventListener("change", function() {
        var newdiv = document.createElement("div");
        grid2.appendChild(newdiv);
        newdiv.style.backgroundColor = color_input.value;
    });
</script>


@endsection