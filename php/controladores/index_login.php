<?php error_reporting(E_ERROR | E_PARSE); ?>
<?php
include('controlador_login.php');
$usuario=$_POST['txtusuario'];
$clave=$_POST['txtcontra'];

//DECLARAMOS LAS VARIABLES NECESARIAS PARA HACER LA CONEXION A LA BASE DE DATOS
$servidor= "localhost";
$usu="root";
$cla="";
$base="proyectodental";


//GUARDARMOS EN UNA VARIABLE LLAMADA CONEXION LA INSTRUCCION PARA CONECTAR A LA BASE DE DATOS
$conexion=@mysql_connect($servidor,$usu,$cla);
//SI LA INSTRUCCION ALMACENADA EN LA VARIABLE CONEXION SE EJECUTO CORRECTAMENTE
if($conexion)
{
    //SELECCIONAMOS LA BASE DE DATOS CON LA QUE TRABAJAREMOS

    mysql_select_db($base);
}
//

$tipo = mysql_query("select TipoUsuario from usuarios where nombre_usuario='$usuario' and contrasena='$clave'");
$row = mysql_fetch_array($tipo);

if(conexiones($usuario,$clave))
{

if($row['TipoUsuario']=="1") {
    $sql="select idPacientes from pacientes
    inner join usuarios
    on usuarios.idUsuarios=pacientes.idUsuarios
    where nombre_usuario='$usuario' and contrasena ='$clave' ";

    $result=mysql_query($sql);
    $id=mysql_fetch_array($result);
    $_SESSION['idPacientes']=$id['idPacientes'];

    header("refresh:1;url=../PrincipalPaciente.php");
}

    if($row['TipoUsuario']=="2") {
         $sql="select  CONCAT(Nombre_Dentista,' ',Apellido_Dentista) as nombre from dentistas
    inner join usuarios
    on usuarios.idUsuarios=dentistas.idUsuarios
    where nombre_usuario='$usuario' and contrasena ='$clave' ";
    $result=mysql_query($sql);
    $id=mysql_fetch_array($result);
    $_SESSION['dentista']=$id['nombre'];
    header("location:../PrincipalDentista.php");
    }

    if($row['TipoUsuario']=="3") {
        header("location:../PrincipalRecepcionista.php");
    }

    if($row['TipoUsuario']=="4") {
        header("location:../PrincipalAdministrador.php");
    }
}

else
{
    header("location:../../index.php");
}