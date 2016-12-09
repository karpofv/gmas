<?php

    $count = 0;
    $codigo = $_POST['codigo'];
    $codproduc = $_POST['codprod'];
    $desde = $_POST['desde'];
    $hasta = $_POST['hasta'];
    $descrip = trim($_POST['descripcion']);
    $observacion = trim($_POST['observacion']);
    $entes = $_POST['entes'];
    $explica = $_POST['explica'];
    $reflex = $_POST['reflex'];
    $accion = $_POST['accion'];
    $step = $_POST['step'];
    $dmn = $_POST['dmn'];
    $mostrar = $_POST['mostrar'];
    $editarrt = $_POST['editarrt'];
    /*Se verifican los permisos del usuario*/
    if ($step == '1') {
        if ($accPermisos['S']==1 and $accPermisos['I']==1 and $accPermisos['U']==1 and $accPermisos['D']==1) {
            /*GUARDAR -----------Se verifica que $editarrt=="" y las variables no  se encuentren vacias para proceder a guardar  */
            if ($mostrar == "" and $editarrt=="" and $desde!="" and $hasta!="") {
                $insert = paraTodos::arrayInserte("verg_desde, verg_hasta, verg_observacion, verg_vertice", "vertice_gen", "'$desde', '$hasta', '$observ', '1'");
                $consul_codigo = paraTodos::arrayConsulta("max(verg_codigo) as codigo", "vertice_gen", "verg_desde='$desde' and verg_hasta='$hasta'");
                foreach ($consul_codigo as $rowcod) {
                    $cod = $rowcod['codigo'];
                }
                $insert = paraTodos::arrayInserte("vertdes_vergcodigo, vertdes_descrip", "vertice_descripcion", "'$cod', '$descrip'");
                $consul_codigo = paraTodos::arrayConsulta("vertdes_codigo", "vertice_descripcion", "vertdes_vergcodigo=$cod");
                foreach ($consul_codigo as $rowcod) {
                    $coddes = $rowcod['vertdes_codigo'];
                }
                if ($insert) {
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
?>
    <link rel="stylesheet" type="text/css" href="<?php echo $ruta_base; ?>assets-minified/widgets/wizard/wizard.css">
    <script type="text/javascript" src="<?php echo $ruta_base; ?>assets-minified/widgets/wizard/wizard.js"></script>
    <div class="panel panel-default">
        <div class="panel-body" id="panelgen">
            <div id="form-wizard-3" class="form-wizard">
                <ul>
                    <li class="active" id="tab-datgen">
                        <a href="#step-1" data-toggle="tab">
                            <label class="wizard-step">1</label><span class="wizard-description">Datos Generales <small></small></span></a>
                    </li>
                    <li class="" id="tab-entes">
                        <a href="#step-2" data-toggle="tab">
                            <label class="wizard-step">2</label><span class="wizard-description">Entes Ejecutores<small>Agregue Entes que participaron en la Actividad</small></span></a>
                    </li>
                    <li class="" id="tab-rub">
                        <a href="#step-3" data-toggle="tab">
                            <label class="wizard-step">3</label><span class="wizard-description">Resultados<small>Ingrese Resultados</small></span></a>
                    </li>
                    <li class="" id="tab-analisis" onclick="$.ajax({
                                                                type: 'POST',
                                                                url: 'accion.php',
                                                                data: {
                                                                    opcion: 'tbanalisisgen',
                                                                    codigo: '<?php echo $coddes; ?>',
                                                                    ver: 1,
                                                                    dmn   : 352
                                                                },
                                                                success: function(html) {
                                                                    $('#tbasiganali').html(html);
                                                                },
                                                                error: function(xhr,msg,excep) {
                                                                    alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                                                }
                                                            }); return false">
                        <a href="#step-4" data-toggle="tab">
                            <label class="wizard-step">4</label>
                            <span class="wizard-description">Análisis de Resultados<small>Ingrese, Explicación Reflexión y Acción</small>
                            </span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="step-1">
                        <div class="content-box">
                            <div class="panel-heading"> <a href="#"><h4 id="datosgen"><b>Datos Generales</b></h4></a> </div>
                            <div class="col-xs-12">
                                <form class="form-horizontal" onsubmit="$.ajax({
                                type: 'POST',
                                url: 'accion.php',
                                data: {
									desde: $('#desde').val(),
									hasta: $('#hasta').val(),
									observacion: $('#observacion').val(),
									descripcion: $('#descripcion').val(),
									step: 1,
									ver: 2,
                                    dmn   : <?php echo $dmn; ?>,
                                },
                                success: function(html) {
                                    $('#verContenido').html(html);
                                    $('#tab-entes').css('display', '');
                                    $('#tab-rub').css('display', '');
                                    $('#tab-entes').addClass('active');
                                    $('#tab-datgen').removeClass('active');
                                    $('#step-1').removeClass('active');
                                    $('#step-2').addClass('active');
                                },
                                error: function(xhr,msg,excep) {
                                	alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                }
							}); return false" action="javascript: void(0);" method="post">
                                    <div class="form-group">
                                        <div class="col-sm-4 col-md-3">
                                            <label>Desde</label>
                                            <input type="date" id="desde" class="form-control" placeholder="dd/mm/aaaa" required value="<?php echo $desde;?>">
                                        </div>
                                        <div class="col-sm-4 col-md-3">
                                            <label>Hasta</label>
                                            <input type="date" id="hasta" class="form-control" placeholder="dd/mm/aaaa" required value="<?php echo $hasta;?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Descripción</label>
                                            <textarea id="descripcion" class="form-control"><?php echo trim($descrip);?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Observacion</label>
                                            <textarea id="observ" class="form-control"><?php echo trim($observacion);?></textarea>
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
                    </div>
                    <div class="tab-pane" id="step-2">
                        <div class="content-box">
                            <div class="panel-heading"> <a href="#"><h4 id="datosgen"><b>Entes Ejecutores</b></h4></a> </div>
                            <div class="col-xs-12">
                                <form class="form-horizontal" id="frmentes">
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <label>Entes Ejecutores</label>
                                            <select id="entes" class="form-control">
                                                <option value="0">Seleccione los Entes que participaron en la Acción</option>
                                                <?php
                                                combos::CombosSelect("1", "0", "vert_entecodigo,ente_descrip", "entes_eje ee, vertices_ente ve", "vert_entecodigo", "ente_descrip", "ve.vert_entecodigo=ee.ente_codigo and ve.vert_vertice=1");
                                            ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <br>
                                            <button type="button" class="btn btn-default" onclick="
                                                                                                $.ajax({
                                                                                                   type: 'POST',
                                                                                                   url: 'accion.php',
                                                                                                   data: {
                                                                                                    opcion: 'aggentes',
                                                                                                    vertice: '<?php echo $cod;?>',
                                                                                                    entes: $('#entes').val(),
                                                                                                    ver: 1,
                                                                                                    dmn   : 352
                                                                                                   },
                                                                                                   success: function(html) {
                                                                                                        $('#body-entes').html(html);
                                                                                                   },
                                                                                                   error: function(xhr,msg,excep) {
                                                                                                    alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                                                                                   }
                                                                                                }); return false">Agregar </button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Ente</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="body-entes"> </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="step-3">
                        <div class="content-box">
                            <div class="panel-heading"> <a href="#"><h4 id="datosgen"><b>Descricpión de la Actividad</b></h4></a> </div>
                            <div class="col-xs-12">
                                <form class="form-horizontal" id="frmrub">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="label-control">Resultados</label>
                                            <textarea id="result" class="form-control"></textarea>
                                        </div>
                                        <div class="col-sm-2">
                                            <br>
                                            <button type="button" class="btn btn-default" id="btnaggresult" onclick="
                                                                                                                    $.ajax({
                                                                                                   type: 'POST',
                                                                                                   url: 'accion.php',
                                                                                                   data: {
                                                                                                    opcion: 'aggresult',
                                                                                                    vertice: '<?php echo $coddes;?>',
                                                                                                    result : $('#result').val(),
                                                                                                    ver: 1,
                                                                                                    dmn   : 352
                                                                                                   },
                                                                                                   success: function(html) {
                                                                                                        count=count+1;
                                                                                                        if(count!='0'){
                                                                                                            $('#tab-analisis').css('display', '');
                                                                                                        }else{
                                                                                                            $('#tab-analisis').css('display', 'none');
                                                                                                        }
                                                                                                        $('#body-resultado').html(html);
                                                                                                   },
                                                                                                   error: function(xhr,msg,excep) {
                                                                                                    alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                                                                                   }
                                                                                                }); return false">Agregar</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Descripción</th>
                                                        <th>Resultado</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="body-resultado">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="step-4">
                        <div class="content-box">
                            <div class="panel-heading"> <a href="#"><h4 id="datosgen"><b>Resultados de la Actividad</b></h4></a> </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Descripcion</th>
                                                    <th>Resultado</th>
                                                    <th>Agg. Análisis</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbasiganali">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group collapse" id="analisis">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input id="codproduc" name="codproduc" class="collapse">
                                            <label>Explicación</label>
                                            <textarea id="explica" class="form-control"></textarea>
                                        </div>
                                        <div class="col-sm-12">
                                            <label>Reflexión</label>
                                            <textarea id="reflex" class="form-control"></textarea>
                                        </div>
                                        <div class="col-sm-12">
                                            <label>Acción</label>
                                            <textarea id="accion" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="button" onclick="
                                            $.ajax({
                                                type: 'POST',
                                                url: 'accion.php',
                                                data: {
                                                    opcion: 'saveanalisisgen',
									                explica: $('#explica').val(),
									                reflex: $('#reflex').val(),
                                                    accion: $('#accion').val(),
                                                    codigo: $('#codproduc').val(),
                                                    descrip: <?php echo $coddes; ?>,
                                                    ver: 1,
                                                    dmn   : 352
                                                },
                                                success: function(msg) {
                                                    $('#analisis').addClass('collapse');
                                                    $('#explica').val('');
                                                    $('#reflex').val('');
                                                    $('#accion').val('');
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: 'accion.php',
                                                        data: {
                                                            opcion: 'acttabanalisisgen',
                                                            codigo: $('#codproduc').val(),
                                                            descrip: <?php echo $cod; ?>,
                                                            ver: 1,
                                                            dmn   : 352
                                                        },
                                                        success: function(html) {
                                                            $('#tbanalisisasig').html(html);
                                                        },
                                                        error: function(xhr,msg,excep) {
                                                            alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                                        }
                                                    });
                                                },
                                                error: function(xhr,msg,excep) {
                                                    alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                                }
                                            }); return false" class="btn btn-default">GUARDAR</button>
                                            </div>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Descripción</th>
                                                    <th>Resultados</th>
                                                    <th>Explicación</th>
                                                    <th>Reflexión</th>
                                                    <th>Acción</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbanalisisasig">
                                                <?php
                                                    $consulta = paraTodos::arrayConsulta("vd.vertdes_descrip, vr.vertres_resultado, va.verta_explicacion, va.verta_reflexion, va.verta_accion", "vertice_gen vg, vertice_descripcion vd, vertice_resultados vr, vertice_analisis va", "vg.verg_codigo=vd.vertdes_vergcodigo and vr.vertres_vertdescodigo=vd.vertdes_codigo and va.verta_verpcodigo=vr.vertres_codigo
and vg.verg_codigo=$cod");
                                                    foreach ($consulta as $row) {
                                                        ?>
                                                        <tr class="itemtr">
                                                            <td><?php echo $row['vertdes_descrip']; ?></td>
                                                            <td><?php echo $row['vertres_resultado']; ?></td>
                                                            <td><?php echo $row['verta_explicacion']; ?></td>
                                                            <td><?php echo $row['verta_reflexion']; ?></td>
                                                            <td><?php echo $row['verta_accion']; ?></td>
                                                            <td>ELIMINAR</td>
                                                        </tr>
                                                <?php

                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="datosgen"> </div>
            <div id="datosdet" class="collapse"> </div>
        </div>
    </div>
    <!--footer-->
    <div class="footer"> </div>
    <!--//footer-->
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
