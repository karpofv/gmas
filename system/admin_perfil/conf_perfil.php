<?php
    ini_set('display_errors', false);
    ini_set('display_startup_errors', false);
	$idperfil=$_POST['eliminar'];
	$mody=$_POST['mody'];	
    /*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/	
    if (isset($_POST['eliminar'])) {
        $consulta_nombre_perfil=mysqli_query("SELECT Nombre FROM perfiles WHERE CodPerfil=$idperfil");
        while ($resultado_nombre=mysqli_fetch_array($consulta_nombre_perfil)) {
 	      $nombre_perfil=$resultado_nombre["Nombre"];
        }	
        $verifica_perfil=mysqli_query("SELECT * FROM usuarios WHERE Nivel='$nombre_perfil'") or die ('No se pudo validar el uso del perfil'.mysqli_error());
        if (mysqli_num_rows($verifica_perfil)==0) {
            $consulta_eliminar=mysqli_query("DELETE FROM perfiles_det WHERE IdPerfil=$idperfil");
            $consulta_eliminar=mysqli_query("DELETE FROM perfiles WHERE CodPerfil=$idperfil");
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
                    $consulta_nombre_perfil=mysqli_query("SELECT Nombre FROM perfiles WHERE Nombre like '%".$nuevoperfil."%'");
                    if (mysqli_num_rows($consulta_nombre_perfil)> 0) {
                        die ('<h3 class="error">El nombre de perfil seleccionado no puede usarse, intente con otro</h3>');
                    }
                    @mysqli_free_result($consulta_nombre_perfil);
		}
		if ($nuevoperfil<>'') {
			$id=time();
			$insertar_perfil=mysqli_query("INSERT INTO perfiles(CodPerfil,Nombre)
                        VALUES ('$id','$nuevoperfil')");
			$idperfil=$id;
		}
		
    }

?>
    <form onsubmit="$.ajax({ type: 'POST', url: 'accion.php',
                    data: 'sede=<?php echo $sede;?>&idsubmenu=<?php echo $idsubmenu;?>&nuevoperfil='+$('#nuevoperfil').val(),
                    success: function(html) {   $('#page-content').html(html); },
                    error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
                    }); return false" action="javascript: void(0);" method="post" name="enviar">
        <div class="container" style="margin: 57px auto 0 auto;background: #FFFFFF;border: 1px solid #DDDDDD;width: 60%;">
            <div style="color: #A50000;width: 100%;padding: 8px 0px 8px 0px; text-align: center;height: 45px;font-weight: bold;overflow: hidden;font-size: 11pt;border: 1px solid #DDDDDD;background: #FAFAFA;;"> Administraci&oacute;n de Perfiles </div>
            <div style="height: auto;overflow: hidden;padding: 10px;">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Perfil</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="idperfil" name="idperfil" style=" border: 1px solid #DDDDDD;height: 32px;width: 60%;">
                            <option value="">Selecciona un perfil</option>
                            <?php  Combos::CombosSelect($permiso, $id, 'DISTINCT CodPerfil,Nombre', 'perfiles', 'CodPerfil', 'Nombre', "CodPerfil<>'' ORDER BY Nombre");   ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre del Nuevo Perfil</label>
                    <div class="col-sm-10">
                        <input class="gen_input" maxLength="150" size="30" name="nuevoperfil" id="nuevoperfil" type="text" title="Ingrese nuevo perfil" style=" border: 1px solid #DDDDDD;height: 32px;" onchange="ApagaTexto();" required="required"> </div>
                </div>
            </div>
            <div style="color: #A50000;width: 100%;padding: 8px 0px 8px 0px; text-align: center;height: auto;font-weight: bold;overflow: hidden;font-size: 11pt;border: 1px solid #DDDDDD;background: #FAFAFA;;">
                <button class="btn btn-primary popover-button" type="submit">Crear Perfil</button>
            </div>
        </div>
    </form>
    <div id="perfilver"></div>
    <script type="text/javascript">
        $('#idperfil').change(function () {
            var perf = $('#idperfil').val();
            alert(<?php echo $idMenut; ?>);
            if (perf != '') {
                $.ajax({
                    type: 'POST'
                    , url: 'accion.php'
                    , ajaxSend: $('#perfilver').html(cargando)
                    , data: 'idperfil=' + perf + '&act=2&dmn=<?php echo $idMenut; ?>'
                    , success: function (html) {
                        $('#perfilver').html(html);
                    }
                });
            }
        });
    </script>