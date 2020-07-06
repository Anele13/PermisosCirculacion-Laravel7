@extends('layout_base')


@section('content')

    @isset($success)
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Permiso dado de alta exitosamente!</strong>
        </div>
    @endif

    @isset($error)
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Error dando de alta el permiso</strong>
        </div>
    @endif
@endsection