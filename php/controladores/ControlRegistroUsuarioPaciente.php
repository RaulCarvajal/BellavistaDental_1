<?php
include('../conexion.php');
$txtuser=$_POST['txtuser']; /*nombre para iniciar sesión tabla usuarios*/
$txtcontrasena=$_POST['txtcontrasena'];
//TABLA PACIENTES
$txtnombrepac=strtoupper($_POST['txtnombrepac']);
$txtapellido=strtoupper($_POST['txtapellido']);
$txtcorreo=$_POST['txtcorreo'];
$txttelefono=$_POST['txttelefono'];
$txtfecnac=$_POST['txtfecnac'];
$sexo=$_POST['sexo'];
//como hacer una variable autoincrementable sin necesidad

$sqlE="SELECT * FROM Usuarios WHERE Nombre_Usuario = '$txtuser';";

$num=mysql_num_rows(mysql_query($sqlE));

if($num==0){
    $sql="insert into Usuarios(Contrasena, Nombre_Usuario, FechaRegistro, TipoUsuario,Status )
	values ('$txtcontrasena','$txtuser', now(),1,'activo')";
    mysql_query($sql);


    $sql2= "select idUsuarios from Usuarios order by FechaRegistro desc limit 1";
    $resultado=mysql_query($sql2);
    while ($arreglo=mysql_fetch_array($resultado)) {
        $idUsuario=$arreglo['idUsuarios'];
    }
    $sql3="insert into Pacientes (Pac_Nombre, Pac_Apellido, Pac_correo, Pac_telefono, Pac_FecNac, Pac_sexo,idUsuarios)
		values ('$txtnombrepac','$txtapellido','$txtcorreo','$txttelefono','$txtfecnac','$sexo',$idUsuario)";
//echo $sql3;
    if(mysql_query($sql3)){
        echo("Usuario Registrado Correctamente-../index.php");
    }
    else {echo " ERROR";}
}else{
    echo "El usuario '$txtuser' ya existe en nuestra base de datos";
}
?>
