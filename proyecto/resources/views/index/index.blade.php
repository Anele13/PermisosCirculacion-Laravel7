@extends('layout_base')


@section('content')
@inject('superiores', 'App\Superior  ')
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<!-- TODO: MEJORAR ESTILOS. NO VAN ACA-->
<style>
    .wizard {
    margin: 20px auto;
    background: #fff;
    width: 80%;
}

    .wizard .nav-tabs {
        position: relative;
        margin: 40px auto;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard > div.wizard-inner {
        position: relative;
    }

.connecting-line {
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 80%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
}

.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
}

span.round-tab {
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #e0e0e0;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}
span.round-tab i{
    color:#555555;
}
.wizard li.active span.round-tab {
    background: #fff;
    border: 2px solid #5bc0de;
    
}
.wizard li.active span.round-tab i{
    color: #5bc0de;
}

span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
}

.wizard .nav-tabs > li {
    width: 25%;
}

.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #5bc0de;
    transition: 0.1s ease-in-out;
}

.wizard li.active:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #5bc0de;
}

.wizard .nav-tabs > li a {
    width: 70px;
    height: 70px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
}

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

.wizard .tab-pane {
    position: relative;
    padding-top: 50px;
}

.wizard h3 {
    margin-top: 0;
}

@media( max-width : 585px ) {

    .wizard {
        width: 100%;
        height: auto !important;
    }

    span.round-tab {
        font-size: 16px;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard .nav-tabs > li a {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }
}
</style>

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
    


    <div class="row">
        <div class="col-md-12 text-center">
            <img width="300px" id="logo">
        </div>
    </div>
    
    <div class="container2">
        <div class="row">
            <div class="wizard">
                
                <div class="wizard-inner">
                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs justify-content-center" role="tablist">    

                        <li role="presentation" class="active">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Datos Personales">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </span>
                            </a>
                        </li>

                        <li role="presentation" class="disabled">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Datos de la Organizacion">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-pencil"></i>

                                </span>
                            </a>
                        </li>

                        <li role="presentation" class="disabled">
                            <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Ultimo paso">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-ok"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <form method="POST" action="{{ route('permisos_store') }}">
                {{csrf_field()}}
                <form >
                
                    <div class="tab-content ">

                        <div class="tab-pane active " role="tabpanel" id="step1" >
                            
                        </div>

                        <div class="tab-pane" role="tabpanel" id="step2">
                        </div>

                        <div class="tab-pane" role="tabpanel" id="complete">
                            <h3>Complete steps</h3>
                            <p>You have successfully completed every steps.</p>
                            <ul class="list-inline pull-right">
                                <li><button type="button" class="btn btn-default prev-step">Anterior</button></li>
                                <li><button type="submit" class="btn btn-primary  ">Guardar</button></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
   
        </div>












        
    </div>




<script>
    

    function actualizar_datos_persona(){
        var cambios = {}
        var dataArray = []
        var json = {!!$requerimientos->datos_persona!!}
        var contenido = "<div class='form-group row justify-content-center'><h3>Datos Personales</h3></div><div class='form-group row justify-content-center'><p>Ingrese todos los datos personales requeridos</p></div>"
        var superior =""
        jQuery.each(json, function(i, val) {
            console.log(i)
            console.log(val)
            cambios[i]=val
            if(val == "true"){
                dataArray.push({"nombre":i, "disponible":val})
                if(i =='superior'){
                    superior="<div class='form-group row justify-content-center'> <label for='superior'>Personal Responable Superior<label/> <select id ='superior'type='text' class='form-control' name='superior'></select></div>"
                    
                }else{
                    contenido+="<div class='form-group row justify-content-center'> <label for='"+i+"'>"+i+"<label/> <input id ='"+i+"'type='text' class='form-control{{ $errors->has('"+i+"') ? ' is-invalid' : '' }}' name='"+i+"' value='{{old('"+i+"')}}'>@if ($errors->has('"+i+"'))<span class='invalid-feedback' role='alert'><strong>{{ $errors->first('"+i+"') }}</strong></span>@endif</div>"
                }
            }
            else{
                dataArray.push({"nombre":i, "disponible":val,"selected": true})
            }
        });
        contenido+=superior;
        contenido+="<ul class='list-inline pull-right'><li><button id='step1' type='button' class='btn btn-primary next-step'>Siguiente</button></li></ul>"
        $('#step1').html(contenido)
    }

    function actualizar_datos_organizacion(){
        var cambios = {}
        var dataArray = []
        var json = {!!$requerimientos->datos_organizacion!!}
        var contenido = "<div class='form-group row justify-content-center'><h3>Datos de la Organizacion</h3></div><div class='form-group row justify-content-center'><p>Ingrese todos los datos requeridos</p></div>"
        jQuery.each(json, function(i, val) {
            console.log(i)
            console.log(val)
            cambios[i]=val
            if(val == "false"){
                dataArray.push({"nombre":i, "disponible":val})
                contenido+="<div class='form-group row justify-content-center'> <label for='"+i+"'>"+i+"<label/> <input id ='"+i+"'type='text' class='form-control' name='"+i+"'></div>"
            }
            else{
                dataArray.push({"nombre":i, "disponible":val,"selected": true})
            }
        });
        contenido+="<ul class='list-inline pull-right'><li><button type='button' class='btn btn-default prev-step'>Anterior</button></li><li><button type='button' class='btn btn-primary next-step'>Siguiente</button></li></ul>"
        $('#step2').html(contenido)
    }

    function actualizar_datos_sitio(){
        var cambios = {}
        var dataArray = []
        var json = {!!$requerimientos->datos_sitio!!}
        console.log(json.imagen)
        $("#logo").attr("src","images/"+json.imagen)
        $(".navbar").css('background-color',json.colorBarra)
        $(document.body).css('background-color',json.colorFondo)
    }


    $(document).ready(function () {
        
        actualizar_datos_persona()
        actualizar_datos_sitio()
        actualizar_datos_organizacion()

        $('.nav-tabs > li a[title]').tooltip();
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
            var $target = $(e.target);
            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function (e) {
            var $active = $('.wizard .nav-tabs li.active');
            console.log($active)
            $active.next().removeClass('disabled');
            //var $step = $()
            nextTab($active);
        });
        
        $(".prev-step").click(function (e) {
            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);
        });
    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
        
    }
    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }

</script>


@endsection