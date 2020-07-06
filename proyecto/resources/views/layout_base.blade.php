<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('icon_font/css/icon_font.css')}}">
    <link rel="stylesheet" href="{{ asset('css/jquery.transfer.css')}}">
    <script src="{{ asset('js/jquery.transfer.js')}}"></script>
</head>
<style>
/*Estilos del sitio general*/

/*Barra de navegacion*/
.navbar{
    position: sticky;
    min-height: 4rem;
    background-color: #337ab7;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.05),inset 0 -1px 0 rgba(0,0,0,.1);
    /*background-image: linear-gradient(89.81deg, #F4060699 41.01%, #FF47006B 99.64%);*/
}
/* Principal */
html {
    position: relative;
    min-height: 100%;
    }
body {
    margin-bottom: 60px;
    background: #706e6e05;
}

/*Footer*/
.footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    padding: .75rem 1.25rem;
    background-color: rgba(0,0,0,.03);
    border-top: 1px solid rgba(0,0,0,.125);
}

/*FooterText*/
span .text-muted{
    color: #6c757d !important;
}

.zoom {
    padding: 50px;
    transition: transform .2s; /* Animation */
}

.zoom:hover {
    transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}

.zoom2 {
    max-height: 50%;
    max-width: 50%;
    align-content: center;
}


</style>

<body>
    <header>
    <!-- Navbar de la pagina-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="col-md-10">
                    <a class="btn btn-outline-dark" href="/"><i class="fa fa-home" aria-hidden="true"></i> Home<span class="sr-only">(current)</span></a>
                </div>
                <div class="col-md-2">
                    <div class="d-inline-block">
                        <a class="btn btn-outline-dark" href="/admin"><i class="fa fa-home" aria-hidden="true"></i> ADMIN<span class="sr-only">(current)</span></a>
                    </div>
                    <div id="container_login" class="d-inline-block">
                    </div>
                </div>                        
            </div>
        </nav>
    </header>
    <main role="main">
        <div class="container-fluid">
            <br>    
            @yield('content')
        </div>
    </main>
    <footer class="footer">
        <div class="container">
            <span class="text-muted">Garibaldi-Aranda.</span>
        </div>
    </footer>

</body>

</html>