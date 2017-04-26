<?php 	
include('../pdf/fpdf.php');
include('../conexion.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Image('../../IMG/cabecera.png' , 20 ,0, 165 , 37,'PNG', 'http://www.desarrolloweb.com');
//ESPACIOS EN BLANCO DESPUES DE LA IMAGEN
$pdf->Cell(40,10,'',0,2);
$pdf->Cell(40,10,'',0,2);
$pdf->Cell(40,10,'',0,2);

$pdf->SetFont('Arial','B',12);
$pdf->setX(80);
$pdf->Cell(40,10,'RECETA MEDICA',0,2);

$pdf->SetFont('Arial','B',10);
$pdf->setX(135);
$pdf->Cell(40,10,'Tepic, Nayarit a '.date("d/m/Y"),0,2);



$pdf->SetFont('Arial','',10);
$pdf->setX(10);
$pdf->Cell(40,10,'Datos del medico:',0,2);


      $pdf->Cell(30,5,"Nombre",1);
      $pdf->Cell(159,5,utf8_decode(  $_POST['dentista'] ),1);
     
      
         $pdf->Ln();
         $pdf->Ln();
$pdf->Cell(40,10,'Datos del paciente:',0,2);
      $pdf->Cell(30,5,"Nombre:",1);
      $pdf->Cell(159,5,utf8_decode(   $_POST['nombre']." ".$_POST['apelido'] ),1);
      $pdf->Ln();
      $pdf->Cell(36,5,"Telefono:",1);
      $pdf->Cell(153,5,$_POST['telefono'] ,1);
      $pdf->Ln();
      
       $pdf->Ln();
       $pdf->Ln();

$pdf->SetFont('Arial','',10);
$pdf->setX(10);
$pdf->Cell(40,10,'Prescripcion medica',0,2);
$pastillas=explode(",", $_POST['medicamento']);
   
   foreach ($pastillas as $lineaMedicamento) 
   {
        $pdf->Cell(189,8, $lineaMedicamento ,1);
        $pdf->Ln();
   }
     
     
        
         $pdf->Ln();


$pdf->setY(190);
$pdf->setX(80);
          $pdf->Cell(48,5,"Firma del medico:",0,2);
 $pdf->Ln();

         $pdf->Ln();
          $pdf->setX(50);
         $pdf->Cell(48,5,"_________________________________________________",0,2);
     

$filename="impresos/".date("d-m-Y")."_".date("h-i-sa").".pdf";
$pdf->Output($filename,'I');
$pdf->Output($filename,'F');
$sql="insert into recetas(ruta,paciente,fecha)values('$filename','".$_POST['nombre']." ".$_POST['apelido']."',NOW())";
mysql_query($sql);
?>