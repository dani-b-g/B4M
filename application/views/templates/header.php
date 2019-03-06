<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
    </script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.3/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/template.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/header.css') ?>">
    <?php echo "<script> let baseurl='" . base_url() . "'</script>" ?>
    <title>
        <?php echo $titulo ?>
    </title>
</head>

<body class="fondo-blur">
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark purple darken-4 lighten-1">
        <a class="navbar-brand" href="<?php echo base_url(); ?>"><img id=logo
                src="<?php echo (base_url()); ?>/assets/img/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
            aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
            <?php if (isset($_SESSION['login']) && $_SESSION['login'] == true) : ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo (base_url()); ?>">Inicio
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="<?php echo (base_url()); ?>">Crear aviso</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo (base_url()); ?>">Ver avisos</a>
                </li> -->
                <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'a') : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-555" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Administración
                    </a>
                    <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-555">
                        <a class="dropdown-item" href="#">Listado de Usuarios</a>
                        <a class="dropdown-item" href="#">Revisar conversacion</a>
                        <a class="dropdown-item" href="#">Dar de alta administrador</a>
                    </div>
                </li>
                <?php endif; ?>
            </ul>
            <form class="form-inline" method="post" action="<?php echo base_url('buscador_c/') ?>">
                <div class="input-group md-form form-sm form-1 pl-0">
                    <div class="input-group-prepend">
                        <span class="input-group-text purple lighten-3" id="basic-text1"><i
                                class="fas fa-search text-white" aria-hidden="true"></i></span>
                    </div>
                    <input class="form-control my-0 py-1" type="text" id="busqueda" name='busqueda'
                        placeholder="Buscar usuarios">
                    <!-- <datalist id="usu" name="usu">

                    </datalist> -->

                </div>
            </form>
        </div>
        <ul class="navbar-nav ml-auto nav-flex-icons">
            <li class="nav-item">
                <a href="<?php echo base_url('mensajes_c/mensajes') ?>" class="nav-link waves-effect waves-light">
                    <span id="notificacion"></span>
                    <i class="fas fa-envelope"></i>
                </a>
            </li>
            <li class="nav-item avatar dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img id="avatar" src="<?php echo base_url('assets/img/usuario.jpg') ?>"
                        class="rounded-circle z-depth-0" alt="avatar image">
                </a>
                <div class="font-weight-bolder text-uppercase text-center text-primary">
                    <?php echo $_SESSION['usuario'] ?>
                </div>
                <div class="dropdown-menu dropdown-menu-right dropdown-secondary"
                    aria-labelledby="navbarDropdownMenuLink-55">
                    <a class="dropdown-item" href="<?php echo base_url("/usuarios_c/logout") ?>">Logout</a>
                    <a class="dropdown-item"
                        href="<?php echo base_url("/usuarios_c/perfil/{$_SESSION['usuario']}") ?>">Perfil</a>
                    <a class="dropdown-item" href="<?php echo base_url("/mensajes_c/mensajes/") ?>">Mensajes</a>
                </div>
            </li>
        </ul>
        <?php endif; ?>
    </nav>
    <script src="<?php echo base_url('assets/js/header.js') ?>"></script>
    <script>
    // NOTE: En el caso de querer poner sugerenicas en la barra de busqueda
    // $('#busqueda').on("keyup", function(event) {
    //     let buscar = $('#busqueda').val();
    //     console.log(buscar);

    //     $.post(baseurl + "usuarios_c/buscador/", {
    //         busqueda: buscar
    //     }).done(function(salida) {
    //         let sal = JSON.parse(salida);
    //         $('.opciones').remove();
    //         for (let i = 0; i < sal.length; i++) {
    //             $("#usu").append("<option class='opciones' value=" + sal[i].nombre_usu + ">" + sal[i]
    //                 .nombre_usu + "</option>");

    //         }

    //     });
    // })
    </script>