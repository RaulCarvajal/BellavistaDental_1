<?php error_reporting(E_ERROR | E_PARSE); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido Dentista</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/menuVerticalDentista.css">
    <link rel="stylesheet" href="../CSS/styleIcons.css">
    <link type="text/css" rel="stylesheet" href="../CSS/imagen.css">
    <link rel="icon" href="../IMG/blue.ico" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="consultas/funciones/manejador.js"></script>
</head>
<body>
<h1>Bienvenido Dentista <span><img src="../IMG/logo.jpg" class="imagen"></span></h1>
<nav>
    <ul>
        <li><a href="PrincipalDentista.php"><span><i class="icon icon-home"></i></span> Inicio </a></li>
        <li> <a href="PrincipalDentista.php?action=verAgendaDentista"><span><i class="icon icon-address-book"></i></span>Citas</a> </li>
        <li> <a href="PrincipalDentista.php?action=registros_paciente"><span><i class="icon icon-user"></i></span>Pacientes</a></li>
        <li> <a href="PrincipalDentista.php?action=registros_receta"><span><i class="icon icon-file-text2"></i></span>Recetas</a></li>
        <li> <a href="#"><span><i class="icon icon-drawer2"></i></span>Inventario</a></li>
        <li> <a href="controladores/salir.php"><span><i class="icon-cancel-circle"></i></span>Cerrar Sesión</a></li>
    </ul>
    <img src="">
</nav>
<?php 
include('odontograma/detalle_diente.php');
 ?>
<div id="areaFuncion">
    <?php
    include ('Mensaje.php');
    switch ($_GET['action']) {

        case 'registros_paciente':
            echo("<h2>Pacientes Registrados</h2>");
            include('pacientesDentista/plantillas/tabla.php');
            break;

            case 'expide_receta':
            echo("<h2>Expide una receta</h2>");
            include('receta/llena_receta.php');
            break;

        case 'verAgendaDentista':
            include('citas/verAgendaDentista.php');
            break;
        case 'verRecetas':
            include('citas/verReceta');
            break;

            case 'registros_receta':
            include('receta/registros_receta.php');
            break;

             case 'odontograma':
            
            include('odontograma/odo.php');
            break;
        default:
            # code..
            break;
    }
    ?>
</div>

</body>
</html>