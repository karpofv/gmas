<?php

    $count = 0;
    $codigo = $_POST['codigo'];
    $codproduc = $_POST['codprod'];
    $desde = $_POST['desde'];
    $hasta = $_POST['hasta'];
    $ciclo = $_POST['ciclo'];
    $anual = $_POST['anual'];
    $periodo = $_POST['periodo'];
    $observ = trim($_POST['observacion']);
    $entes = $_POST['entes'];
    $explica = $_POST['explica'];
    $reflex = $_POST['reflex'];
    $accion = $_POST['accion'];
    $step = $_POST['step'];
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
    <link rel="stylesheet" type="text/css" href="<?php echo $ruta_base; ?>assets-minified/widgets/wizard/wizard.css">
    <script type="text/javascript" src="<?php echo $ruta_base; ?>assets-minified/widgets/wizard/wizard.js"></script>
    <div class="panel panel-default">
        <div class="panel-body" id="panelgen">
            <div id="form-wizard-3" class="form-wizard">
                <ul>
                    <li class="active" id="tab-datgen">
                        <a href="#step-1" data-toggle="tab">
                            <label class="wizard-step">1</label><span class="wizard-description">Datos Generales <small>Plan de Siembra</small></span></a>
                    </li>
                    <li class="" id="tab-entes">
                        <a href="#step-2" data-toggle="tab">
                            <label class="wizard-step">2</label><span class="wizard-description">Entes Ejecutores<small>Agregue Entes que participaron en la Siembra</small></span></a>
                    </li>
                    <li class="" id="tab-rub">
                        <a href="#step-3" data-toggle="tab">
                            <label class="wizard-step">3</label><span class="wizard-description">Rubros<small>Ingrese Rubros a Sembrar y sus resultados</small></span></a>
                    </li>
                    <li class="" id="tab-analisis" onclick="$.ajax({
                                                                type: 'POST',
                                                                url: 'accion.php',
                                                                data: {
                                                                    opcion: 'tbanalisis',
                                                                    produc: '<?php if ($mostrar==''){echo $cod;}else{ echo $mostrar;};?>',
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
                            <label class="wizard-step">4</label><span class="wizard-description">Análisis de Resultados<small>Ingrese, Explicación Reflexión y Acción</small></span></a>
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
									ciclo: $('#ciclo').val(),                                               
									anual: $('#anual').val(),                                               
									periodo: $('#periodo').val(),                                               
									observacion: $('#observ').val(),                                               
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
                                            <input type="date" id="hasta" class="form-control" placeholder="dd/mm/aaaa" required value="<?php echo $hasta;?>"> </div>
                                        <div class="col-sm-4 col-md-3">
                                            <label>Ciclo</label>
                                            <select id="ciclo" class="form-control">
                                                <option value="0">Seleccione el Ciclo</option>
                                                <?php
                                                    combos::CombosSelect("1", "$ciclo","cicl_codigo, cicl_descripcion", "ciclo", "cicl_codigo", "cicl_descripcion", "1=1");
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-2 col-md-1">
                                            <label>Año</label>
                                            <input type="number" id="anual" class="form-control" value="<?php echo $anual;?>" required> 
                                        </div>
                                        <div class="col-sm-2 col-md-2">
                                            <label>Periodo</label>
                                            <select id="periodo" class="form-control">
                                                <option value="0">Seleccione el Periodo</option>
                                                <?php
                                                    combos::CombosSelect("1", "$periodo","perio_codigo, perio_descripcion", "periodo", "perio_codigo", "perio_descripcion", "1=1");
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Observación</label>
                                            <textarea id="observ" class="form-control" cols="27">
                                                <?php echo trim($observacion);?>
                                            </textarea>
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
                                                <option value="0">Seleccione los Entes que particiaparon en la Acción</option>
                                                <?php
                                                combos::CombosSelect("1", "0","vert_entecodigo,ente_descrip", "entes_eje ee, vertices_ente ve", "vert_entecodigo", "ente_descrip", "ve.vert_entecodigo=ee.ente_codigo and ve.vert_vertice=1");
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
                                                <tbody id="body-entes">
                                                    <?php
                                                        $consulta = paraTodos::arrayconsulta("*", "vertice_gen vg, vertice_ente ve, entes_eje ee", "ve.verte_vergcodigo=vg.verg_codigo and ve.verte_entecodigo=ee.ente_codigo and vg.verg_codigo=$mostrar");
                                                        foreach($consulta as $row){
                                                            ?>
                                                            <tr>
                                                                <td value='<?php echo $row['ente_codigo ']; ?>'>
                                                                    <?php echo $row['ente_descrip']; ?>
                                                                </td>
                                                                <td><a href='javascript: void(0);' onclick="$.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'accion.php',
                                                                                                                data: {
                                                                                                                    opcion: 'deleteentes',
                                                                                                                    vertice: <?php echo $row['verte_vergcodigo']; ?>,
                                                                                                                    entes: <?php echo $row['ente_codigo']; ?>,
                                                                                                                    ver: 1,
                                                                                                                    dmn: 352
                                                                                                                },  
                                                                                                                success: function (html) {
                                                                                                                    $('#body-entes').html(html);
                                                                                                                },
                                                                                                                error: function (xhr, msg, excep) {
                                                                                                                    alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                                                                                                }
                                                                                                            });
                                                                                                            return false">Eliminar</a> </td>
        </tr>
                                                            <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="step-3">
                        <div class="content-box">
                            <div class="panel-heading"> <a href="#"><h4 id="datosgen"><b>Rubros planificados para Siembra</b></h4></a> </div>
                            <div class="col-xs-12">
                                <form class="form-horizontal" id="frmrub">
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            <label>Rubros</label>
                                            <select id="rubros" class="form-control">
                                                <option id="0">Seleccione el rubro sembrado</option>
                                                <?php
                                                combos::CombosSelect("1", "ru_codigo","ru_codigo,ru_descripcion", "rubros r, rubro_tipo rt", "ru_codigo", "ru_descripcion", "r.ru_codigo=rt.rut_codigo and ru_clasificacion='VEGETAL'");
                                            ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Tipo de Rubro</label>
                                            <select id="tiprubro" class="form-control">
                                                <option id="0">Seleccione el tipo de Rubro</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Clase</label>
                                            <select id="clasrubro" class="form-control">
                                                <option id="0">Seleccione la clase de Rubro</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Hectareas a Sembrar</label>
                                            <input class="form-control" type="number" step="0.01" id="asemb"> </div>
                                        <div class="col-sm-3">
                                            <label>Hectareas Sembradas</label>
                                            <input class="form-control" type="number" step="0.01" id="semb"> </div>
                                        <div class="col-sm-2">
                                            <br>
                                            <button type="button" class="btn btn-default" id="btnaggrubro" onclick="$.ajax({
                                                                                                   type: 'POST',
                                                                                                   url: 'accion.php',
                                                                                                   data: {
                                                                                                    opcion: 'aggrub',
                                                                                                    tipo: 'SIEMBRA',
                                                                                                    vertice: '<?php echo $cod;?>',
                                                                                                    rubro : $('#rubros').val(),
                                                                                                    tiprubro : $('#tiprubro').val(),
                                                                                                    clasrubro : $('#clasrubro').val(),
                                                                                                    hasem : $('#asemb').val(),
                                                                                                    hsem : $('#semb').val(),
                                                                                                    ver: 1,
                                                                                                    dmn   : 352
                                                                                                   },
                                                                                                   success: function(html) {
                                                                                                        count=count+1;
                                                                                                        alert(count);
                                                                                                        if(count!='0'){
                                                                                                            $('#tab-analisis').css('display', '');
                                                                                                        }else{
                                                                                                            $('#tab-analisis').css('display', 'none');
                                                                                                        }
                                                                                                        $('#body-prodrub').html(html);
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
                                                        <th>Rubro</th>
                                                        <th>Tipo</th>
                                                        <th>Clase</th>
                                                        <th>Has. a Sembrar</th>
                                                        <th>Has. Sembradas</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="body-prodrub">
                                                    <?php
                                                    $consulta = paraTodos::arrayConsulta("*", "rubros r, rubro_tipo rt,vertice_produccion vp
                                            left join rubro_clase rc on  vp.vertp_clasrubro=rc.ruc_codigo", "vp.vertp_rubro=r.ru_codigo and vp.vertp_tiprubro=rt.rut_codigo and vp.vertp_vergcodigo=$mostrar");
                                                    foreach ($consulta as $row) {
                                                    ?>
                                                    <tr class="itemtr">
                                                        <td>
                                                            <?php echo $row['ru_descripcion']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['rut_descripcion']; ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($row['ruc_descripcion'] != '') {
                                                                $row['ruc_descripcion'];
                                                            } else {
                                                                echo "Sin Clase";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['vertp_hasemb']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['vertp_hsem']; ?>
                                                        </td>
                                                        <td><a href='javascript: void(0);' onclick="$.ajax({
                                                                        type: 'POST',
                                                                        url: 'accion.php',
                                                                        data: {
                                                                            opcion: 'deleterub',
                                                                            vertice: <?php echo $row['vertp_vergcodigo']; ?>,
                                                                            produc: <?php echo $row['vertp_codigo']; ?>,
                                                                            ver: 1,
                                                                            dmn: 352
                                                                        },
                                                                        success: function (html) {
                                                                            count = count - 1;
                                                                            if (count != '0') {
                                                                                $('#tab-analisis').css('display', '');
                                                                            } else {
                                                                                $('#tab-analisis').css('display', 'none');
                                                                            }
                                                                            $('#body-prodrub').html(html);
                                                                        },
                                                                        error: function (xhr, msg, excep) {
                                                                            alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                                                        }
                                                                    });
                                                                    return false">Eliminar</a> </td>
                                                    </tr>
                                                    <?php
                                                }      
                                                    ?>
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
                            <div class="panel-heading"> <a href="#"><h4 id="datosgen"><b>Resultados del Plan de Siembra</b></h4></a> </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Rubro</th>
                                                    <th>Tipo</th>
                                                    <th>Clase</th>
                                                    <th>Has. a Sembrar</th>
                                                    <th>Has. Sembradas</th>
                                                    <th>Agg. Análisis</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbasiganali">
                                                <?php
                                                $consulta = paraTodos::arrayConsulta("*", "rubros r, rubro_tipo rt,vertice_produccion vp
                                            left join rubro_clase rc on  vp.vertp_clasrubro=rc.ruc_codigo", "vp.vertp_rubro=r.ru_codigo and vp.vertp_tiprubro=rt.rut_codigo and vp.vertp_vergcodigo=$mostrar");
                                                foreach ($consulta as $row) {
                                                    ?>
                                                    <tr class="itemtr">
                                                        <td>
                                                    <?php echo $row['ru_descripcion']; ?>
                                                        </td>
                                                        <td>
                                                    <?php echo $row['rut_descripcion']; ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($row['ruc_descripcion'] != '') {
                                                                $row['ruc_descripcion'];
                                                            } else {
                                                                echo "Sin Clase";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['vertp_hasemb']; ?>
                                                        </td>
                                                        <td>
                                                        <?php echo $row['vertp_hsem']; ?>
                                                        </td>
                                                        <td><a href='javascript: void(0);' onclick="agganalisis(<?php echo $row['vertp_codigo']; ?>);
                                                                    return false">Agregar</a> </td>
                                                    </tr>
                                                    <?php
                                                }                                                
                                                ?>
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
                                                    opcion: 'saveanalisis',
									                explica: $('#explica').val(),
									                reflex: $('#reflex').val(),
                                                    accion: $('#accion').val(),
                                                    codprod: $('#codproduc').val(),
                                                    ver: 1,
                                                    dmn   : 352,
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
                                                            opcion: 'acttabanalisis',
                                                            codigo: <?php echo $cod;?>,
                                                            ver: 1,
                                                            dmn   : 352,
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
                                                    <th>Rubro</th>
                                                    <th>Tipo</th>
                                                    <th>Clase</th>
                                                    <th>Explicación</th>
                                                    <th>Reflexión</th>
                                                    <th>Acción</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbanalisisasig">
                                            <?php
                                                $consulta = paraTodos::arrayConsulta("*", "vertice_analisis va, vertice_gen vg, rubro_tipo rt,rubros r, vertice_produccion vp
                                                left join  rubro_clase rc on rc.ruc_rucodigo=vp.vertp_clasrubro", "va.verta_verpcodigo=vp.vertp_codigo and vp.vertp_vergcodigo=vg.verg_codigo and vp.vertp_vergcodigo=$mostrar and vp.vertp_rubro=r.ru_codigo and vp.vertp_tiprubro=rt.rut_codigo");
                                                    foreach($consulta as $row){
                                                ?>
                                                        <tr class="itemtr"><td><?php echo $row['ru_descripcion'];?></td>
                                                            <td><?php echo $row['rut_descripcion'];?></td>
                                                            <td><?php echo $row['ruc_descripcion'];?></td>
                                                            <td><?php echo $row['verta_explicacion'];?></td>
                                                            <td><?php echo $row['verta_reflexion'];?></td>
                                                            <td><?php echo $row['verta_accion'];?></td>
                                                            <td><a href='javascript: void(0);' onclick="$.ajax({
                                                                            type: 'POST',
                                                                            url: 'accion.php',
                                                                            data: {
                                                                                opcion: 'deleteanalisis',
                                                                                codigo: <?php echo $row['verta_codigo']; ?>,
                                                                                ver: 1,
                                                                                dmn: 352
                                                                            },
                                                                            success: function (html) {
                                                                                $.ajax({
                                                                                    type: 'POST',
                                                                                    url: 'accion.php',
                                                                                    data: {
                                                                                        opcion: 'acttabanalisis',
                                                                                        codigo: <?php echo $mostrar;?>,
                                                                                        ver: 1,
                                                                                        dmn   : 352,
                                                                                    },
                                                                                    success: function(html) {
                                                                                        $('#tbanalisisasig').html(html);                                        
                                                                                    },
                                                                                    error: function(xhr,msg,excep) {
                                                                                        alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                                                                    }
                                                                                });                                 
                                                                            },
                                                                            error: function (xhr, msg, excep) {
                                                                                alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                                                            }
                                                                        });
                                                                        return false">Eliminar</a>
                                                                </td>
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