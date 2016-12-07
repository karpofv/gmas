<?php
$conexion=$_POST['conexion'];
$permiso=$_POST['very'];
if ($permiso=="") {
	$permiso=$_GET['very'];
  	$compid=$_GET['idmenu'];
  	$restr=$_GET['confr'];
}
	$idperfil=$_POST['idperfil'];
	$mody=$_POST['mody'];	

/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
	
if (isset($_POST['eliminar'])) {
    $consulta_nombre_perfil=mysql_query("SELECT nombre FROM perfiles WHERE id=$idperfil");
    while ($resultado_nombre=mysql_fetch_array($consulta_nombre_perfil)) {
 	$nombre_perfil=$resultado_nombre["nombre"];
    }	
    $verifica_perfil=mysql_query("SELECT * FROM confirmar WHERE
    Nivel='$nombre_perfil'") or die ('No se pudo validar el uso del perfil'.mysql_error());
    if (mysql_num_rows($verifica_perfil)==0) {
 	$consulta_eliminar=mysql_query("DELETE FROM detalleperfiles WHERE idperfil=$idperfil");
	$consulta_eliminar=mysql_query("DELETE FROM perfiles WHERE id=$idperfil");
    } else {
 	echo "<h3 class=\"error\">El perfil no puede ser eliminado porque se encuentra en uso</h3>";
    }
}

if ($_POST['nuevoperfil']<>"") {
    
		//Si el texto tiene algo es porque se va a crear un nuevo perfil
		$indicemenu=$_POST['indicemenu'];	
		$nuevoperfil=$_POST['nuevoperfil'];
                //Validar si el perfil solapa a otro
		if ($nuevoperfil<>'') {		
                    $consulta_nombre_perfil=mysql_query("SELECT nombre FROM perfiles
                    WHERE nombre like '%".$nuevoperfil."%'");
                    if (mysql_num_rows($consulta_nombre_perfil)> 0) {
                        die ('<h3 class="error">El nombre de perfil seleccionado no puede usarse, intente con otro</h3>');
                    }
                    @mysql_free_result($consulta_nombre_perfil);
		}
		if ($nuevoperfil<>'') {
			$id=time();
			$insertar_perfil=mysql_query("INSERT INTO perfiles(id,nombre)
                        VALUES ('$id','$nuevoperfil')");
			$idperfil=$id;
		}
		
    }

?>
<br>
<form onsubmit="$.ajax({ type: 'POST', url: 'adminarse.php',
                  data: 'sede=<?php echo $sede;?>&Nv=1&fun=<?php echo $buscart;?>&nuevoperfil='+$('#nuevoperfil').val(),
                  success: function(html) {   $('#contenido').html(html); },
                  error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
                }); return false" action="javascript: void(0);" method="post" name="enviar">
    <div class="buscar" style="width: 600px;height: auto;overflow: hidden;font-size: 13px;">
    <!-- Box Head -->
    <div class="buscarT" style="width: 98%;">
        Administraci&oacute;n de Perfiles
    </div>
    <table  cellSpacing="1" cellPadding="2" width="600" border="0" height="10">
    <tr><td   width="172" height="22"><b>Perfil</b></td>
    <td   height="22">
    <select class="field size3" id="idperfil" name="idperfil" style=" border: 1px solid #EEEEEE;">
    <option value="">Selecciona un perfil</option>
    <?php
    $sql = "SELECT DISTINCT id,nombre FROM perfiles WHERE id<>'' ORDER BY nombre";
    $res = mysql_query($sql);
    while ($fila = mysql_fetch_array($res)) {
    if ($idperf == $fila['id']) {
    echo '<option value="'.$fila['id'].'" selected>'.$fila['nombre']."</option> \n";
    } else {
    echo '<option value="'.$fila['id'].'">'.$fila['nombre']."</option> \n";
    }
    }
    mysql_free_result($res);
    ?>
    </select>
    </td>
    </tr>

    <tr><td   width="172" height="22"><b>Nombre del Nuevo Perfil<b></td>
    <td   width="489" height="22">
    <input class="gen_input" maxLength="150" size="30" name="nuevoperfil" id="nuevoperfil" type="text" onchange="ApagaTexto();">
    </td>
    </tr>
</table>
    <div class="buscarT" style="width: 98%;height: 23px;overflow: hidden;text-align: center;">
    <input  type="submit" style="font-family: MS Sans Serif; font-size: 10px;margin-top: -1px;cursor: pointer;" value="Enviar" name="enviar" >
    </div>
</div>
</FORM>
<div id="perfilver"></div>
<script type="text/javascript">
    $('#idperfil').change(function() {
      var perf = $('#idperfil').val();
      if (perf != '')
      {
        $.ajax({
          type: 'POST',
          url:  'adminarse.php', ajaxSend: $('#perfilver').html(cargando),
          data: 'idperfil='+perf+'&Nv=2&fun=<?php echo $buscart; ?>',
          success: function(html) { $('#perfilver').html(html);}
        });
      }
    });
</script>