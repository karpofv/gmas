<?php

    $count = 0;
    $codigo = $_POST['codigo'];
    $organismo = $_POST['organismo'];
    $cant = $_POST['cant'];
    $tipoveh = $_POST['vehiculo'];
    $dmn = $_POST['dmn'];
    $mostrar = $_POST['mostrar'];
    $editarrt = $_POST['editarrt'];
	/*Se verifican los permisos del usuario*/
    if ($step == '1'){
        if ($accPermisos['S']==1 AND $accPermisos['I']==1 AND $accPermisos['U']==1 AND $accPermisos['D']==1) {
            /*GUARDAR -----------Se verifica que $editarrt=="" y las variables no se encuentren vacias para proceder a guardar  */
            if ($mostrar == "" and $editarrt=="" and $desde!="" and $hasta!="" and $ciclo!="" and $anual!="" and $periodo!="" and $observ!=""){
                $insert = paraTodos::arrayInserte("verg_desde, verg_hasta, verg_ciclo, verg_anual, verg_periodo, verg_observacion, verg_vertice", "vertice_gen", "'$desde', '$hasta', '$ciclo', '$anual', '$periodo', '$observ', '1'");
                $consul_codigo = paraTodos::arrayConsulta("max(verg_codigo) as codigo", "vertice_gen", "verg_desde='$desde' and verg_hasta='$hasta' and verg_ciclo='$ciclo'");
                foreach ($consul_codigo as $rowcod){
                    $cod = $rowcod['codigo'];
                }
                if ($insertar) {
                    echo "<ul class='noty-wrapper' id='noty_top'>
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
        }
    }
    if ($mostrar!=""){
        $consulta = paraTodos::arrayConsulta("*", "vertice_gen vg", "verg_codigo=$mostrar");
        foreach($consulta as $row){
            $desde = $row['verg_desde'];
            $hasta = $row['verg_hasta'];
            $ciclo = $row['verg_ciclo'];
            $anual = $row['verg_anual'];
            $periodo = $row['verg_periodo'];
            $observacion = $row['verg_observacion'];
        }
    }
?>
<link rel="stylesheet" type="text/css" href="<?php echo $ruta_base;?>assets-minified/widgets/datatable/datatable.css">
    <div class="panel panel-default">
        <div class="panel-body" id="panelgen">
            <div class="content-box">
                <div class="panel-heading"> <a href="#"><h4 id="datosgen"><b>Diágnostico Vehicular</b></h4></a> </div>
                    <div class="col-xs-12">
                        <?php
                        if ($editarrt!='') {
                        ?>
                        <form class="form-horizontal" onsubmit="$.ajax({
                            type: 'POST',
                            url: 'accion.php',
                            data: {
								organismo: $('#desde').val(),                                               
								cant: $('#hasta').val(),                                               
								vehiculo: $('#ciclo').val(),                                               
								codigo: $('#anual').val(),
								ver: 2,
                                dmn   : <?php echo $dmn; ?>,
                            },
                            success: function(html) {
                                $('#verContenido').html(html);                                
                            },
                            error: function(xhr,msg,excep) {
                            	alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                            }
				        }); return false" action="javascript: void(0);" method="post">
                        } else {
                            <form class="form-horizontal" onsubmit="$.ajax({
                                type: 'POST',
                                url: 'accion.php',
                                data: {
                                    organismo: $('#desde').val(),                                               
                                    cant: $('#hasta').val(),                                               
                                    vehiculo: $('#ciclo').val(),                                               
                                    codigo: $('#anual').val(),
                                    editarrt:  <?php echo $editarrt; ?>,
                                    ver: 2,
                                    dmn   : <?php echo $dmn; ?>,
                                },
                                success: function(html) {
                                    $('#verContenido').html(html);                                
                                },
                                error: function(xhr,msg,excep) {
                                    alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                }
                            }); return false" action="javascript: void(0);" method="post">
                        }
                        <div class="form-group">
                            <div class="col-sm-4 col-md-3">
                                <label>Organismos</label>
                                    <select id="org" class="form-control">
                                        <option value="0">Seleccione el Organismo</option>
                                        <?php
                                            combos::CombosSelect("1", "$org","vert_entecodigo,ente_descrip", "entes_eje ee, vertices_ente ve", "vert_entecodigo", "ente_descrip", "ve.vert_entecodigo=ee.ente_codigo and ve.vert_vertice=2");
                                        ?>
                                    </select>
                            </div>                            
                            <div class="col-sm-4 col-md-3">
                                <label>Cantidad</label>
                                <input type="number" id="cant" class="form-control" required value="<?php echo $cant;?>"> 
                            </div>
                            <div class="col-sm-4 col-md-3">
                                <label>Tipo de Vehículo</label>
                                <select id="vehiculo" class="form-control">
                                    <option value="0">Seleccione el Vehículo</option>
                                    <?php
                                        combos::CombosSelect("1", "$vehiculo","veh_codigo, veh_descripcion", "vehiculo", "veh_codigo", "veh_descripcion", "1=1");
                                    ?>
                                </select>
                            </div>                            
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" id="btnsavedg" class="btn btn-default">GUARDAR</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="tbdiagnostico">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable no-footer" id="tbconsul" role="grid" aria-describedby="dynamic-table-example-1_info">  
                    <?php
                        $consulta = paraTodos::arrayConsulta("*", "vertice_diagvehi vd, vehiculo v, entes_eje ee", "vd.verdiag_vehcodigo=v.veh_codigo and vd.verdiag_entecodigo=ee.ente_codigo");
                    ?>
                    <thead>
                        <tr>
                            <th>Organismo</th>
                            <th>Cantidad</th>
                            <th>Tipo de Vehiculo</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                foreach($consulta as $row){
                            ?>
                            <td><?php echo $row['ente_descrip'];?></td>
                            <td><?php echo $row['verdiag_cantidad'];?></td>
                            <td><?php echo $row['veh_descripcion'];?></td>
                            <td><a href="" onclick="">Editar</a></td>
                            <td><a href="" onclick="">Eliminar</a></td>
                        </tr>
                            <?php
                                }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--footer-->
    <div class="footer"> </div>
    <!--//footer-->
    <script type="text/javascript" src="<?php echo $ruta_base;?>assets-minified/widgets/datatable/datatable.js"></script>
    <script type="text/javascript" src="<?php echo $ruta_base;?>assets-minified/widgets/datatable/datatable-bootstrap.js"></script>
    <script type="text/javascript">
        /* Datatables init */
            $('#tbconsul').dataTable({
                "language": {
                    "url": "<?php echo $ruta_base;?>assets-minified/widgets/datatable/Spanish.json"
                }                
            });
    </script>
    <script>
        $("#tab-rub").css("display", "none");
        $("#tab-analisis").css("display", "none");
        $("#tab-entes").css("display", "none");
        localStorage.setItem("count", "0");        
        var count = localStorage.getItem('count');        
        //+---------------------------------------------
        //Busca los Tipos de Rubro depende al rubro seleccionado
        //-----------------------------------------------        
        $("#rubros").change(function(){
            $.ajax({
                type: 'POST',
                url: 'accion.php',
                data: {
                    opcion: 'aggtiprub',
                    rubro: $('#rubros').val(),
                    ver: 1,
                    dmn: 352
                },
                success: function (html) {
                    $('#tiprubro').html("<option value='0'>Seleccione un Tipo</option>" + html);
                },
                error: function (xhr, msg, excep) {
                    alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                }
            });
            return false
        });
        //+---------------------------------------------
        //Busca las Clases de Rubro depende al tipo de rubro seleccionado
        //-----------------------------------------------
        $("#tiprubro").change(function(){
            $.ajax({
                type: 'POST',
                url: 'accion.php',
                data: {
                    opcion: 'aggclasrub',
                    clasrub: $('#tiprubro').val(),
                    ver: 1,
                    dmn: 352
                },
                success: function (html) {
                    $('#clasrubro').html("<option value='0'>Seleccione una Clase</option>" + html);
                },
                error: function (xhr, msg, excep) {
                    alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                }
            });
            return false
        });
        //+---------------------------------------------
        //Busca las Clases de Rubro depende al tipo de rubro seleccionado
        //-----------------------------------------------        
        function agganalisis(codprod){
            $("#analisis").removeClass("collapse");
            $("#codproduc").val(codprod);
        }
    </script>