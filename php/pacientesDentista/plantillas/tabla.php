<?php 
include('conexion.php');
 $sql="select Status,idPacientes,Pac_nombre,Pac_apellido,Pac_correo,Pac_telefono,Pac_FecNac,Pac_sexo, pacientes.idUsuarios from pacientes
 inner join usuarios 
 on usuarios.idUsuarios=pacientes.idUsuarios
 where Status like 'activo' ";

$result =mysql_query($sql);
while($array=mysql_fetch_assoc($result))
{
$arreglo[]=$array;
}


echo("<table>
	   <thead>
 <tr>
	<th>Nombre</th>
	<th>Apellido</th>
	<th>Correo</th>
	<th>Telefono</th>
	<th>Fecha de nacimiento</th>
	<th>Sexo</th>
	<th>Receta</th>
  <th>Odontograma</th>
	   </thead>
</tr>");

foreach ($arreglo as $row) {
    echo "<tr>
      <td>" . $row['Pac_nombre'] . "</td>
      <td>" . $row['Pac_apellido'] . "</td>
      <td>" . $row['Pac_correo'] . "</td>
      <td>" . $row['Pac_telefono'] . "</td>
       <td>" . $row['Pac_FecNac'] . "</td>
        <td>" . $row['Pac_sexo'] . "</td>";

    $Status=""; //
      
     echo("<td>
      <a href='PrincipalDentista.php?action=expide_receta&&id=" . $row['idPacientes'] . "&nombre=" . $row['Pac_nombre'] . "&apellido=" . $row['Pac_apellido'] . "&correo=" . $row['Pac_correo'] . "&telefono=" . $row['Pac_telefono'] . "&sexo=" . $row['Pac_sexo'] . "'>Expedir receta</a>
      </td>
      <td>
      <a href='PrincipalDentista.php?action=odontograma&&id=" . $row['idPacientes'] . "&nombre=" . $row['Pac_nombre'] . "&apellido=" . $row['Pac_apellido']."'>Ver odontograma</a>
     </td>
      </tr>");

}
echo("</table>");
?>



