
<?php error_reporting(E_ERROR | E_PARSE); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido Recepcionista</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/menuVerticalRecepcionista.css">
    <link rel="stylesheet" href="../CSS/styleIcons.css">
    <link type="text/css" rel="stylesheet" href="../CSS/imagen.css">
    <link rel="icon" href="../IMG/blue.ico" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="consultas/funciones/manejador.js"></script>

</head>
<body>
<h1>Bienvenido Recepcionista <span><img src="../IMG/logo.jpg" class="imagen"></h1>
<nav>
    <ul>
        <li><a href="PrincipalRecepcionista.php"><span><i class="icon icon-home"></i></span> Inicio </a></li>
        <li> <a href="PrincipalRecepcionista.php?action=verPacientes"><span><i class="icon icon-user"></i></span>Agendar Cita</a> </li>
        <li> <a href="#"><span></span>Registro</a>
            <ul>
                <li><a href="pantallasRecep/pacientes.php"><span><i class="icon icon-user"></i></span>Paciente</a></li>
                <li><a href="pantallasRecep/dentista.php"><span><i class="icon icon-aid-kit"></i></span>Dentista</a></li>
            </ul>
        </li>

        <li> <a href="#"><span><i class="icon icon-address-book"></i></span>Recetas</a></li>
        <li> <a href="#"><span><i class="icon icon-drawer2"></i></span>Inventario</a></li>
        <li> <a href="controladores/salir.php"><span><i class="icon icon-cancel-circle"></i></span>Cerrar Sesión</a></li>

    </ul>
</nav>

<div id="areaFuncion">
    <?php
    switch ($_GET['action'])
    {
        case 'verPacientes':
            echo("<h2>Pacientes Registrados</h2>");
            include('consultas/plantillas/tablare.php');
            break;

        case 'agenda_cita':
            echo("<h2>Agenda Cita</h2>");
            include('citas/agendaCita.php');
            break;

        default:
            # code...
            break;
    }
    ?>

</div>

</body>
</html>