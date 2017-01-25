<link rel="stylesheet" type="text/css" href="<?php echo $ruta_base; ?>assets-minified/widgets/datatable/dataTable.css">
<script type="text/javascript" src="<?php echo $ruta_base; ?>assets-minified/widgets/datatable/dataTable.js"></script>
<?php
    $count = 0;
    $codigo = $_POST['codigo'];
    $rif = $_POST['rif'];
    $nombre = $_POST['nombre'];
    $propietario = $_POST['propietario'];
    $tipo = $_POST['tipo'];
    $estado = $_POST['estado'];
    $municipio = $_POST['municipio'];
    $parroquia = $_POST['parroquia'];
    $direccion = $_POST['direccion'];
    $dmn = $_POST['dmn'];
    $editarrt = $_POST['editar'];
    $borrar = $_POST['borrar'];
	/*Se verifican los permisos del usuario*/
    if ($accPermisos['S']==1 AND $accPermisos['I']==1 AND $accPermisos['U']==1 AND $accPermisos['D']==1) {
        /*GUARDAR -----------Se verifica que $editarrt=="" y las variables no se encuentren vacias para proceder a guardar  */
        if ($editarrt=="" and $rif!="" and $nombre!="" and $propietario!="" and $tipo!="" and $estado!="" and $municipio!="" and $parroquia!="" and $direccion!=""){
            $insert = paraTodos::arrayInserte("est_nombre, est_rif, est_propietario, est_tipo, est_estado,est_muncodigo, est_parcodigo, est_direccion", "establecimiento", "'$nombre', '$rif', '$propietario', '$tipo', '$estado', '$municipio', '$parroquia', '$direccion'");
            if ($insert) {
                echo "<ul class='noty-wrapper' id='noty_bottom'>
                    <li class='bg-green' style='cursor: pointer;'>
                        <div class='noty_bar' id='noty_454273614135399300'>
                            <div class='noty_message'><span class='noty_text'>
                                <i class='glyph-icon icon-cog mrg5R'></i>Registro Exitoso.</span>
                            </div>
                        </div>
                    </li>
                </ul>";
            }
        }
		/*UPDATE--------------Se verifica que $editarrt!="" y las variables no se encuentren vacias para proceder a Editar*/				
        if ($rif!="" and $editarrt!=""){
			//------------------------------------------------------------------------------------------------------------
			/*Se modifica los datos de registro del Usuario*/			
			$modifico = paraTodos::arrayUpdate("est_nombre='$nombre',est_rif='$rif',est_propietario='$propietario',est_tipo='$tipo',est_estado='$estado',est_muncodigo='$municipio',est_parcodigo='$parroquia',est_direccion='$direccion'", "establecimiento", "est_codigo='$editarrt'");			
            if($modifico){
                echo "<ul class='noty-wrapper' id='noty_bottom'>
                    <li class='bg-green' style='cursor: pointer;'>
                        <div class='noty_bar' id='noty_454273614135399300'>
                            <div class='noty_message'><span class='noty_text'>
                                <i class='glyph-icon icon-cog mrg5R'></i>Registro Modificado.</span>
                            </div>
                        </div>
                    </li>
                </ul>";
            }
			//------------------------------------------------------------------------------------------------------------			
        }
		/*MOSTRAR---------------------Se verifica si la variable $editarr!="" para proceder a Mostrar los datos guardados del usuario*/		
        if ($editarrt!="" and $rif==""){
			$resultsedes = paraTodos::arrayConsulta("*", "establecimiento", "est_codigo = '$editarrt'");
            foreach ($resultsedes as $row){
                $rif_p = explode("-", $row['est_rif']);
                $rif1 = $rif_p[0];
                $rif2 = $rif_p[1];
                $rif3 = $rif_p[2];
                $nombre = $row['est_nombre'];
                $propietario = $row['est_propietario'];
                $tipo = $row['est_tipo'];
                $municipio = $row['est_muncodigo'];
                $parroquia = $row['est_parcodigo'];
                $estado = $row['est_estado'];
                $direccion = $row['est_direccion'];
			}
        }
		/*BORRAR-----------------Se verifica si la variable $borrar!="" para proceder a eliminar el usuario*/
        if ($borrar > 0) {
			$delete = paraTodos::arrayDelete("est_codigo = '$borrar'","establecimiento");
            if ($delete) {
                echo "<ul class='noty-wrapper' id='noty_bottom'>
                    <li class='bg-green' style='cursor: pointer;'>
                        <div class='noty_bar' id='noty_454273614135399300'>
                            <div class='noty_message'><span class='noty_text'>
                                <i class='glyph-icon icon-cog mrg5R'></i>Registro Eliminado.</span>
                            </div>
                        </div>
                    </li>
                </ul>";
            }
        }        
    }
?>
    <link rel="stylesheet" type="text/css" href="<?php echo $ruta_base; ?>assets-minified/widgets/wizard/wizard.css">
    <script type="text/javascript" src="<?php echo $ruta_base; ?>assets-minified/widgets/wizard/wizard.js"></script>
    <div class="panel panel-default">
        <div class="panel-body" id="panelgen">
            <div class="tab-content">
                <div class="tab-pane active" id="step-1">
                    <div class="content-box">
                        <h3 class="content-box-header bg-azul">Establecimiento</h3>
                        <div class="col-xs-12">
                            <?php
                            if ($editarrt!='') {
                            ?>
                            <form class="form-horizontal" onsubmit="
                                                                    if ($('#estados').val() == 0){
                                                                        alert('Seleccione el Estado');
                                                                    } else{
                                                                        if ($('#municipio').val() == 0){
                                                                            alert('Seleccione el Municipio');
                                                                        } else {
                                                                            if ($('#parroquia').val() == 0){
                                                                                alert('Seleccione la Parroquia');
                                                                            } else {
                                                                                var rif = ($('#rif-1').val()+'-'+$('#rif-2').val()+'-'+$('#rif-3').val());
                                                                        $.ajax({
                                type: 'POST',
                                url: 'accion.php',
                                data: {
									rif: rif,                                               
									nombre: $('#nombre').val(),                                               
									propietario: $('#propietario').val(),                                               
									tipo: $('#tipo').val(),                                               
									estado: $('#estados').val(),                                               
									municipio: $('#municipio').val(),                                               
									parroquia: $('#parroquia').val(),                                               
									direccion: $('#direccion').val(),
									ver: 2,
                                    dmn   : <?php echo $dmn; ?>,
                                    editar: <?php echo $editarrt; ?>                                                                    
                                },
                                success: function(html) {
                                    $('#verContenido').html(html);
                                },
                                error: function(xhr,msg,excep) {
                                	alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                }
							});
                                                                            }
                                                                        }
                                                                    }
                                                                     return false" action="javascript: void(0);" method="post">
                            <?php
                            } else {
                            ?>
                            <form class="form-horizontal" onsubmit="
                                                                    var rif = ($('#rif-1').val()+'-'+$('#rif-2').val()+'-'+$('#rif-3').val());
                                                                        $.ajax({
                                type: 'POST',
                                url: 'accion.php',
                                data: {
									rif: rif,                                               
									nombre: $('#nombre').val(),                                               
									propietario: $('#propietario').val(),                                               
									tipo: $('#tipo').val(),                                               
									estado: $('#estados').val(),                                               
									municipio: $('#municipio').val(),                                               
									parroquia: $('#parroquia').val(),                                               
									direccion: $('#direccion').val(),
									ver: 2,
                                    dmn   : <?php echo $dmn; ?>
                                },
                                success: function(html) {
                                    $('#verContenido').html(html);
                                },
                                error: function(xhr,msg,excep) {
                                	alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                }
							}); return false" action="javascript: void(0);" method="post">                                
                            <?php
                            }?>
                                <div class="form-group">
                                    <div class="col-sm-1 col-md-1">
                                        <label>Rif</label>
                                        <select id="rif-1" class="form-control">
                                            <option>J</option>
                                            <option>V</option>
                                            <option>E</option>
                                            <option>G</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2 col-md-2">
                                        <label>-</label>
                                        <input type="number" class="form-control" placeholder="0000000" id="rif-2" value="<?php echo $rif2;?>" required>
                                        <input type="number" class="collapse" id="codigo"> </div>
                                    <div class="col-sm-1 col-md-1">
                                        <label>-</label>
                                        <input type="number" class="form-control" placeholder="0" id="rif-3" value="<?php echo $rif3;?>" required> </div>
                                    <div class="col-sm-8 col-md-8">
                                        <label>Nombre o Razon Social</label>
                                        <input type="text" class="form-control" id="nombre" required value="<?php echo $nombre;?>"> </div>
                                    <div class="col-sm-6 col-md-6">
                                        <label>Propietario</label>
                                        <input type="text" class="form-control" id="propietario" required value="<?php echo $propietario;?>"> </div>
                                    <div class="col-sm-6 col-md-6">
                                        <label>Tipo</label>
                                        <input type="text" class="form-control" id="tipo" required value="<?php echo $tipo;?>"> </div>
                                    <div class="col-sm-2 col-md-2">
                                        <label>Estado</label>
                                        <select class="form-control" id="estados">
                                            <option value="0">Seleccione un Estado</option>
                                            <?php
                                                    combos::CombosSelect("1", "$estado", "id,idCiudad,Estado", 'c_estados', "id", "Estado", "Estado <> ''");
                                                ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-5 col-md-5">
                                        <label>Municipio</label>
                                        <select class="form-control" id="municipio">
                                            <option value="0">Seleccione un Municipio</option>
                                            <?php
                                                    combos::CombosSelect("1", "$municipio", "id,IdEstado,Municipio", 'c_municipios', "id", "Municipio", "Municipio <> ''");
                                                ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-5 col-md-5">
                                        <label>Parroquia</label>
                                        <select class="form-control" id="parroquia">
                                            <option value="0">Seleccione una Parroquia</option>
                                            <?php
                                                    combos::CombosSelect("1", "$parroquia", "id,idMunicipio,Parroquia", 'c_parroquia', "id", "Parroquia", "Parroquia <> ''");
                                                ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 col-md-12">
                                        <label>Dirección</label>
                                        <textarea id="direccion" class="form-control" required><?php echo $direccion;?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <button type="submit" class="btn btn-default" id="btnsave">GUARDAR</button>
                                        <button type="button" class="btn btn-danger" id="btncancel">CANCELAR</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body" id="panelestabreg">
            <div class="tab-content">
                <div class="tab-pane active" id="step-1">
                    <div class="content-box">
                        <h3 class="content-box-header bg-azul">Establecimientos Registrados</h3>
                        <div class="col-xs-12">
                            <table id="tbestab" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="dynamic-table-example-1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" style="width: 181px;" aria-sort="ascending">Rif<i class="glyph-icon"></i></th>
                                        <th class="sorting" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 228px;">Nombre<i class="glyph-icon"></i></th>
                                        <th class="sorting" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 10px;">Propietario<i class="glyph-icon"></i></th>
                                        <th class="sorting" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 10px;">Tipo<i class="glyph-icon"></i></th>
                                        <th class="sorting" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 10px;">Estado<i class="glyph-icon"></i></th>
                                        <th class="sorting" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 10px;">Municipio<i class="glyph-icon"></i></th>
                                        <th class="sorting" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 10px;">Parroquia<i class="glyph-icon"></i></th>
                                        <th class="sorting" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 10px;">Editar<i class="glyph-icon"></i></th>
                                        <th class="sorting" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 10px;">Eliminar<i class="glyph-icon"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $datosestablec = Establecimiento::obtenerDatosEstablec();
                                        foreach($datosestablec as $lista){?>
                                            <tr class="gradeA odd" role="row">
                                                <td class="sorting_1"><?php echo $lista['est_rif'];?></td>
                                                <td><?php echo $lista['est_nombre']; ?></td>
                                                <td><?php echo $lista['est_propietario']; ?></td>
                                                <td><?php echo $lista['est_tipo']; ?></td>
                                                <td><?php echo $lista['Estado']; ?></td>
                                                <td><?php echo $lista['Municipio']; ?></td>
                                                <td><?php echo $lista['Parroquia']; ?></td>
                                                <td>
                                                    <a href="javascript:void(0);" onclick="$.ajax({
                                type: 'POST',
                                url: 'accion.php',
                                data: {
                                    editar: <?php echo $lista['est_codigo'];?>,
									ver: 2,
                                    dmn   : <?php echo $dmn; ?>
                                },
                                success: function(html) {
                                    $('#verContenido').html(html);
                                },
                                error: function(xhr,msg,excep) {
                                	alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                }
							}); return false"><i class="glyph-icon icon_pencil"></i>Editar</a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" onclick="$.ajax({
                                type: 'POST',
                                url: 'accion.php',
                                data: {
                                    borrar: <?php echo $lista['est_codigo'];?>,
									ver: 2,
                                    dmn   : <?php echo $dmn; ?>
                                },
                                success: function(html) {
                                    $('#verContenido').html(html);
                                },
                                error: function(xhr,msg,excep) {
                                	alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                }
                                                                                           }); return false"><i class="glyph-icon icon_pencil"></i>Eliminar</a>
                                                </td>
                                            </tr>
                                        <?php  }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
          $('#tbestab').DataTable({
              "language": {
                  "url": "<?php echo $ruta_base;?>assets-minified/widgets/datatable/Spanish.json"
              }
          });
        });
        //+---------------------------------------------
        //Busca los municioios dependiendo del estado
        //-----------------------------------------------       
        $("#estados").change(function () {
            $.ajax({
                type: 'POST'
                , url: 'accion.php'
                , data: {
                    opcion: 'aggmunicipio'
                    , estado: $('#estados').val()
                    , ver: 1
                    , dmn: 352
                }
                , success: function (html) {
                    $('#municipio').html("<option value='0'>Seleccione un Municipio</option>" + html);
                }
                , error: function (xhr, msg, excep) {
                    alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                }
            });
            return false
        });
        //+---------------------------------------------
        //Busca las parroquias dependiendo del municipio
        //-----------------------------------------------       
        $("#municipio").change(function () {
            $.ajax({
                type: 'POST'
                , url: 'accion.php'
                , data: {
                    opcion: 'aggparroquia'
                    , municipio: $('#municipio').val()
                    , ver: 1
                    , dmn: 352
                }
                , success: function (html) {
                    $('#parroquia').html("<option value='0'>Seleccione una parroquia</option>" + html);
                }
                , error: function (xhr, msg, excep) {
                    alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                }
            });
            return false
        });
    </script>