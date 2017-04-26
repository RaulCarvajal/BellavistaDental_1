<?php
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_PARSE);
//FUNCION QUE RECIBE LAS VARIABLES QUE CONTIENEN EL USUARIO  Y LA CONTRASENA
function conexiones($user,$contra)
{
//DECLARAMOS LAS VARIABLES NECESARIAS PARA HACER LA CONEXION A LA BASE DE DATOS
    $servidor= "localhost";
    $usuario="root";
    $clave="";
    $base="proyectodental";


//GUARDARMOS EN UNA VARIABLE LLAMADA CONEXION LA INSTRUCCION PARA CONECTAR A LA BASE DE DATOS
    $conexion=@mysql_connect($servidor,$usuario,$clave);
//SI LA INSTRUCCION ALMACENADA EN LA VARIABLE CONEXION SE EJECUTO CORRECTAMENTE
    if($conexion)
    {
        //SELECCIONAMOS LA BASE DE DATOS CON LA QUE TRABAJAREMOS

        mysql_select_db($base);
    }
    //CREAMOS UN QUERY QUE SELECCIONARA TODOS LOS REGISTROS QUE CONTENGAN EL USUARIO Y LA CLAVE QUE PROPORCIONAMOS
    $sql="select * from usuarios where nombre_usuario='$user' and contrasena='$contra'";

    // GUARDAMOS EN UNA VARIABLE LA INSTRUCCION PARA EJECUTAR EL QUERY
    $ejecutar_sql=mysql_query($sql);
    //CON LA FUNCION MYSQL_NUM_ROWS CONTAMOS LA CANTIDAD DE REGISTROS QUE NOS DIO LA CONSULTA
    //SI EL NUMERO DE REGISTRO ES DIFERENTE A CERO
    if(mysql_num_rows($ejecutar_sql)!=0)
    {
        session_start();
     //   $_SESSION['sesion_iniciada']=true;

        $sql="select nombre_usuario from usuarios where where nombre_usuario='$user' and contrasena='$contra'";


        $result=mysql_query($sql);
        while($array=mysql_fetch_assoc($result))
        {
            $arreglo[]=$array;
        }

        foreach ($row as $arreglo)
        {
            $_SESSION['nombre']=$row['nombre_usuario'];
        }

        while(mysql_fetch_array($ejecutar_sql))
        {
            $_SESSION['usuario']=$usuario;

        }
        return true;
    }

    else
    {
        return false;
    }
}

function verificar_usuario()
{
    session_start();
    if($_SESSION['usuario'])
    {
        return true;
    }
}

?>