<h2>Odontograma de <?php echo($_GET['nombre']); ?></h2>
<div id='odo'><img src="../IMG/odo.jpg"></div>
	
<script>
	$(document).ready(function(e) {
    $('#odo').click(function(e) {
      //alert(e.pageX+ ' , ' + e.pageY);
      if((e.pageX>=680&&e.pageX<=710)&&(e.pageY>=343&&e.pageY<=375))
      {
       mostrarDetalle(1,<?php echo($_GET['id']) ?>);
     

      }

       if((e.pageX>=680&&e.pageX<=710)&&(e.pageY>=301&&e.pageY<=334))
      {
      mostrarDetalle(2,<?php echo($_GET['id']) ?>);

      }

       if((e.pageX>=680&&e.pageX<=726)&&(e.pageY>=262&&e.pageY<=292))
      {
       mostrarDetalle(3,<?php echo($_GET['id']) ?>);
      }

      if((e.pageX>=680&&e.pageX<=726)&&(e.pageY>=232&&e.pageY<=258))
      {
       mostrarDetalle(4,<?php echo($_GET['id']) ?>);
      
      }

      if((e.pageX>=706&&e.pageX<=730)&&(e.pageY>=202&&e.pageY<=223))
      {
       mostrarDetalle(5,<?php echo($_GET['id']) ?>);
      }

      if((e.pageX>=722&&e.pageX<=747)&&(e.pageY>=171&&e.pageY<=196))
      {
       mostrarDetalle(6,<?php echo($_GET['id']) ?>);
      }

      if((e.pageX>=748&&e.pageX<=774)&&(e.pageY>=163&&e.pageY<=184))
      {
       mostrarDetalle(7,<?php echo($_GET['id']) ?>);
     
      }

      if((e.pageX>=780&&e.pageX<=804)&&(e.pageY>=153&&e.pageY<=184))
      {
       mostrarDetalle(8,<?php echo($_GET['id']) ?>);
      }

      if((e.pageX>=817&&e.pageX<=841)&&(e.pageY>=156&&e.pageY<=152))
      {
       mostrarDetalle(9,<?php echo($_GET['id']) ?>);
      }

      if((e.pageX>=848&&e.pageX<=871)&&(e.pageY>=165&&e.pageY<=186))
      {
       mostrarDetalle(10,<?php echo($_GET['id']) ?>);
      }

      if((e.pageX>=680&&e.pageX<=726)&&(e.pageY>=262&&e.pageY<=292))
      {
       mostrarDetalle(11,<?php echo($_GET['id']) ?>);
      }
      if((e.pageX>=871&&e.pageX<=897)&&(e.pageY>=174&&e.pageY<=194))
      {
       mostrarDetalle(12,<?php echo($_GET['id']) ?>);
      }

      if((e.pageX>=893&&e.pageX<=910)&&(e.pageY>=230&&e.pageY<=250))
      {
       mostrarDetalle(13,<?php echo($_GET['id']) ?>);
       
      }

      if((e.pageX>=900&&e.pageX<=930)&&(e.pageY>=260&&e.pageY<=292))
      {
       mostrarDetalle(14,<?php echo($_GET['id']) ?>);
       
      }

      if((e.pageX>=911&&e.pageX<=941)&&(e.pageY>=305&&e.pageY<=330))
      {
       mostrarDetalle(15,<?php echo($_GET['id']) ?>);
        
      
      }

        if((e.pageX>=911&&e.pageX<=947)&&(e.pageY>=343&&e.pageY<=370))
      {
       mostrarDetalle(16,<?php echo($_GET['id']) ?>);
      }
      
      

    });   


    function mostrarDetalle(diente,idPaciente)
{

	$('#detalleDiente').animate({

		top:'0%'
	});

	var formData=new FormData();
	formData.append("diente",diente);
	formData.append("idPaciente",idPaciente);
	$.ajax({
		url:"odontograma/obtenDetalle.php",
		type:"post",
		dataType:"html",
		data:formData,
		cache:false,
		contentType:false,
		processData:false
	})

	.done(function(res){
		var padre=document.getElementById('cuerpoDetalle');
		padre.innerHTML=res;
	});
} 
    
});

</script>

  <script>
$(document).ready(main); 
function main(){
  $('#detalle').click(function(){

      });

  $('#cerrarDetalle').click(function(){

    // $('nav').toggle(); 
        $('#detalleDiente').animate({
        top: '-100%'
      });
     
      });
};
</script>