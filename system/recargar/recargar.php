<?php
//-------------------------------------------------------
// GENERAL********************************************
//-------------------------------------------------------
$opcion = $_POST['opcion'];

//-----------------------------------------------------
// Agrega la descripcion de la Actividad modulo de Otras Actividades
//-------------------------------------------------------
if ($opcion == 'aggresult') {
    $codigo = $codigo + 1;
    $vertice = $_POST['vertice'];
    $result = $_POST['result'];
    $insert = paraTodos::arrayInserte("vertres_vertdescodigo, vertres_resultado", "vertice_resultados", "'$vertice', '$result'");
    $consulta = paraTodos::arrayConsulta("*", "vertice_descripcion vd, vertice_resultados vr"," vr.vertres_vertdescodigo=vd.vertdes_codigo and vd.vertdes_codigo=$vertice");
    foreach ($consulta as $row) {
        ?>
        <tr class="itemtr">
            <td>
                <?php echo $row['vertdes_descrip']; ?>
            </td>
            <td>
                <?php echo $row['vertres_resultado']; ?>
            </td>
            <td><a href='javascript: void(0);' onclick="$.ajax({
                            type: 'POST',
                            url: 'accion.php',
                            data: {
                                opcion: 'deleteresult',
                                vertice: <?php echo $row['vertdes_codigo']; ?>,
                                codigo: <?php echo $row['vertres_codigo']; ?>,
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
                                $('#body-resultado').html(html);
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
}
//-----------------------------------------------------
// Muestra los resultados asignados a las descripcion cargada
//-------------------------------------------------------
if ($opcion == 'tbanalisisgen') {
    $codigo = $_POST['codigo'];
    $count = $count - 1;
    $consulta = paraTodos::arrayConsulta("*", "vertice_descripcion vd, vertice_resultados vr"," vr.vertres_vertdescodigo=vd.vertdes_codigo and vd.vertdes_codigo=$codigo");
    foreach ($consulta as $row) {
        ?>
        <tr class="itemtr">
            <td>
                <?php echo $row['vertdes_descrip']; ?>
            </td>
            <td>
                <?php echo $row['vertres_resultado']; ?>
            </td>
            <td><a href='javascript: void(0);' onclick="agganalisis(<?php echo $row['vertres_codigo']; ?>); return false">Agregar</a> </td>
        </tr>
        <?php
    }
}
//-----------------------------------------------------
// Eliminar la descripcion de la actividad seleccionada
//-------------------------------------------------------
if ($opcion == 'deleteresult') {
    $codigo = $_POST['codigo'];
    $vertice = $_POST['vertice'];
    paraTodos::arrayDelete("vertres_codigo='$codigo'", "vertice_resultados");
    $consulta = paraTodos::arrayConsulta("*", "vertice_descripcion vd, vertice_resultados vr"," vr.vertres_vertdescodigo=vd.vertdes_codigo and vd.vertdes_codigo=$vertice");
    foreach ($consulta as $row) {
        ?>
        <tr class="itemtr">
            <td>
                <?php echo $row['vertdes_descrip']; ?>
            </td>
            <td>
                <?php echo $row['vertres_resultado']; ?>
            </td>
            <td><a href='javascript: void(0);' onclick="$.ajax({
                            type: 'POST',
                            url: 'accion.php',
                            data: {
                                opcion: 'deleteresult',
                                vertice: <?php echo $row['vertdes_codigo']; ?>,                
                                codigo: <?php echo $row['vertres_codigo']; ?>,
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
                                $('#body-resultado').html(html);
                            },
                            error: function (xhr, msg, excep) {
                                alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                            }
                        });
                        return false">Eliminar</a> </td>
        </tr>
        <?php
    }
}
//-----------------------------------------------------
// Llena de forma automatica los municipios depende a la ciudad seleccionada
//-------------------------------------------------------
if ($opcion == 'aggmunicipio') {
    $estado = $_POST['estado'];
    combos::CombosSelect('1', ' idmun', 'Municipio, m.id as idmun', 'c_estados e, c_municipios m', 'idmun', 'Municipio', " e.id=m.IdEstado and e.id=$estado");
}

if ($opcion == 'aggparroquia') {
    $municipio = $_POST['municipio'];
    combos::CombosSelect('1', 'idpar', 'p.id as idpar, p.Parroquia, p.idMunicipio, m.id', 'c_parroquia p, c_municipios m', 'idpar', 'Parroquia', " m.id=p.idMunicipio and m.id=$municipio");
}
//-----------------------------------------------------
// Agrega los entes correspondientes al vertice seleccionado
//-------------------------------------------------------
if ($opcion == 'aggentes') {
    $vertice = $_POST['vertice'];
    $entes = $_POST['entes'];
    $insert = paraTodos::arrayInserte("verte_vergcodigo, verte_entecodigo", "vertice_ente", "'$vertice', '$entes'");
    $consulta = paraTodos::arrayConsulta("*", "vertice_ente ve, entes_eje ee", "ve.verte_entecodigo=ee.ente_codigo and ve.verte_vergcodigo=$vertice");
    foreach ($consulta as $row) {
        ?>
        <tr>
            <td value='<?php echo $row[' ente_codigo ']; ?>'>
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
}
//-----------------------------------------------------
// Eliminar los entes asignados al vertice seleccionado
//-------------------------------------------------------
if ($opcion == 'deleteentes') {
    $vertice = $_POST['vertice'];
    $entes = $_POST['entes'];
    $insert = paraTodos::arrayDelete("verte_vergcodigo='$vertice' and verte_entecodigo='$entes'", "vertice_ente");
    $consulta = paraTodos::arrayConsulta("*", "vertice_ente ve, entes_eje ee", "ve.verte_entecodigo=ee.ente_codigo and ve.verte_vergcodigo=$vertice");
    foreach ($consulta as $row) {
        ?>
        <tr>
            <td value='<?php echo $row['ente_codigo']; ?>'>
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
                            return false">Eliminar</a>
            </td>
        </tr>
        <?php
    }
}
//-----------------------------------------------------
// Agregar analisis a los items de produccion selecccionado
//-------------------------------------------------------
if ($opcion == 'saveanalisisgen') {
    $explica = $_POST['explica'];
    $reflex = $_POST['reflex'];
    $accion = $_POST['accion'];
    $codproduc = $_POST['codigo'];
    $descrip = $_POST['descrip'];
    $insert = paraTodos::arrayInserte("verta_verpcodigo, verta_explicacion, verta_reflexion, verta_accion", "vertice_analisis", "$codproduc, '$explica', '$reflex', '$accion'");
    return $insert;
}
//-----------------------------------------------------
// Muestra los analisis de los resultados asignados a las actividad
//-------------------------------------------------------
if ($opcion == 'acttabanalisisgen') {
    $codigo = $_POST['codigo'];
    $descrip = $_POST['descrip'];
    $consulta = paraTodos::arrayConsulta("verta_codigo,vertdes_codigo, vd.vertdes_descrip, vr.vertres_resultado, va.verta_explicacion, va.verta_reflexion, va.verta_accion", "vertice_gen vg, vertice_descripcion vd, vertice_resultados vr, vertice_analisis va", "vg.verg_codigo=vd.vertdes_vergcodigo and vr.vertres_vertdescodigo=vd.vertdes_codigo and va.verta_verpcodigo=vr.vertres_codigo
and vg.verg_codigo=$descrip");
    foreach($consulta as $row){
?>
        <tr class="itemtr">
            <td><?php echo $row['vertdes_descrip'];?></td>
            <td><?php echo $row['vertres_resultado'];?></td>
            <td><?php echo $row['verta_explicacion'];?></td>
            <td><?php echo $row['verta_reflexion'];?></td>
            <td><?php echo $row['verta_accion'];?></td>
            <td><a href='javascript: void(0);' onclick="$.ajax({
                            type: 'POST',
                            url: 'accion.php',
                            data: {
                                opcion: 'deleteanalisisgen',
                                codigo: <?php echo $row['verta_codigo']; ?>,
                                ver: 1,
                                dmn: 352
                            },
                            success: function (html) {
                                $.ajax({
                                    type: 'POST',
                                    url: 'accion.php',
                                    data: {
                                        opcion: 'acttabanalisisgen',
                                        codigo: $('#codproduc').val(),            
                                        descrip: <?php echo $row['vertdes_codigo'];?>,                                                                    
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
}
//-----------------------------------------------------
// Eliminar el analisis seleccionado de un rubro de produccion del VERTICE 1
//-------------------------------------------------------
if ($opcion == 'deleteanalisisgen') {
    $codigo = $_POST['codigo'];
    paraTodos::arrayDelete("verta_codigo='$codigo'", "vertice_analisis");
}
//-------------------------------------------------------
// VERTICE 1********************************************
//-------------------------------------------------------
//-----------------------------------------------------
// Llena de forma automatica los tipos de rubro depende al rubro seleccionado
//-------------------------------------------------------
if ($opcion == 'aggtiprub') {
    $rubro = $_POST['rubro'];
    combos::CombosSelect('1', '0', 'rut_descripcion, rut_codigo', 'rubro_tipo rt, rubros r', 'rut_codigo', 'rut_descripcion', "r.ru_codigo=rt.rut_rucodigo and ru_codigo=$rubro");
}
//-----------------------------------------------------
// Llena de forma automatica las clases de rubro depende al tipo de rubro seleccionado
//-------------------------------------------------------
if ($opcion == 'aggclasrub') {
    $rubro = $_POST['clasrub'];
    combos::CombosSelect('1', '0', 'ruc_descripcion, ruc_codigo', 'rubro_clase rc, rubros r', 'ruc_codigo', 'ruc_descripcion', "r.ru_codigo=rc.ruc_rucodigo and ru_codigo=$rubro");
}
//-----------------------------------------------------
// Agrega el detalle de produccion del plan de siembra
//-------------------------------------------------------
if ($opcion == 'aggrub') {
    $codigo = $codigo + 1;
    $vertice = $_POST['vertice'];
    $rubro = $_POST['rubro'];
    $tiprubro = $_POST['tiprubro'];
    $clasrubro = $_POST['clasrubro'];
    $hasem = $_POST['hasem'];
    $hsem = $_POST['hsem'];
    $tipo = $_POST['tipo'];
    $insert = paraTodos::arrayInserte("vertp_vergcodigo, vertp_rubro,vertp_tiprubro,vertp_clasrubro,vertp_hasemb,vertp_hsem, vertp_tipo", "vertice_produccion", "'$vertice', '$rubro', '$tiprubro', '$clasrubro', '$hasem', '$hsem', '$tipo'");
    $consulta = paraTodos::arrayConsulta("*", "rubros r, rubro_tipo rt,vertice_produccion vp
left join rubro_clase rc on  vp.vertp_clasrubro=rc.ruc_codigo", "vp.vertp_rubro=r.ru_codigo and vp.vertp_tiprubro=rt.rut_codigo and vp.vertp_vergcodigo=$vertice");
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
}
//-----------------------------------------------------
// Eliminar los rubros asignados a la produccion
//-------------------------------------------------------
if ($opcion == 'deleterub') {
    $vertice = $_POST['vertice'];
    $produc = $_POST['produc'];
    paraTodos::arrayDelete("vertp_codigo='$produc'", "vertice_produccion");
    $consulta = paraTodos::arrayConsulta("*", "rubros r, rubro_tipo rt,vertice_produccion vp
left join rubro_clase rc on  vp.vertp_clasrubro=rc.ruc_codigo", "vp.vertp_rubro=r.ru_codigo and vp.vertp_tiprubro=rt.rut_codigo and vp.vertp_vergcodigo=$vertice");
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
}
//-----------------------------------------------------
// Muestra los items de Produccion cargados para el analisis VERTICE 1
//-------------------------------------------------------
if ($opcion == 'tbanalisis') {
    $produc = $_POST['produc'];
    $count = $count - 1;
    $consulta = paraTodos::arrayConsulta("*", "rubros r, rubro_tipo rt,vertice_produccion vp
left join rubro_clase rc on  vp.vertp_clasrubro=rc.ruc_codigo", "vp.vertp_rubro=r.ru_codigo and vp.vertp_tiprubro=rt.rut_codigo and vp.vertp_vergcodigo=$produc");
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
}
//-----------------------------------------------------
// Muestra los analisis de produccion caragados para cada item de produccion del VERTICE 1
//-------------------------------------------------------
if ($opcion == 'acttabanalisis') {
    $codigo = $_POST['codigo'];
    $consulta = paraTodos::arrayConsulta("*", "vertice_analisis va, vertice_gen vg, rubro_tipo rt,rubros r, vertice_produccion vp
left join  rubro_clase rc on rc.ruc_rucodigo=vp.vertp_clasrubro", "va.verta_verpcodigo=vp.vertp_codigo and vp.vertp_vergcodigo=vg.verg_codigo and vp.vertp_vergcodigo=$codigo and vp.vertp_rubro=r.ru_codigo and vp.vertp_tiprubro=rt.rut_codigo");
    foreach($consulta as $row){
?>
        <tr class="itemtr"><td><?php echo $row['ru_descripcion'];?></td><td><?php echo $row['rut_descripcion'];?></td><td><?php echo $row['ruc_descripcion'];?></td><td><?php echo $row['verta_explicacion'];?></td><td><?php echo $row['verta_reflexion'];?></td><td><?php echo $row['verta_accion'];?></td><td><a href='javascript: void(0);' onclick="$.ajax({
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
                                        codigo: <?php echo $codigo;?>,
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
                        return false">Eliminar</a></td></tr>
<?php
    }
}
//-----------------------------------------------------
// Eliminar el analisis seleccionado de un rubro de produccion del VERTICE 1
//-------------------------------------------------------
if ($opcion == 'deleteanalisis') {
    $codigo = $_POST['codigo'];
    paraTodos::arrayDelete("verta_codigo='$codigo'", "vertice_analisis");
}
//-----------------------------------------------------
// Agregar analisis a los items de produccion selecccionado
//-------------------------------------------------------
if ($opcion == 'saveanalisis') {
    $explica = $_POST['explica'];
    $reflex = $_POST['reflex'];
    $accion = $_POST['accion'];
    $codproduc = $_POST['codprod'];
    $insert = paraTodos::arrayInserte("verta_verpcodigo, verta_explicacion, verta_reflexion, verta_accion", "vertice_analisis", "$codproduc, '$explica', '$reflex', '$accion'");
    return $insert;
}
//-----------------------------------------------------
// Muestra los resultados formulario de consulta segun el item seleccionado
//-------------------------------------------------------
if ($opcion == 'tablaconsul') {
    $tipo = $_POST["tipo"];
    $desde = $_POST["desde"];
    $hasta = $_POST["hasta"];
    if ($tipo == "Plan de Siembra") {
        $consulta = paraTodos::arrayConsulta("*", "vertice_gen vg, vertice_produccion vp, rubro_tipo rt, rubros r
left join rubro_clase rc on rc.ruc_rucodigo=r.ru_codigo", " vg.verg_codigo=vp.vertp_vergcodigo and vp.vertp_rubro=r.ru_codigo and vp.vertp_tiprubro=rt.rut_codigo
and ru_clasificacion='VEGETAL' and vertp_tipo='SIEMBRA' and verg_desde>='$desde' and verg_hasta<='$hasta'");
      echo "<thead>
                <tr role='row'>
                    <th class='sorting_asc' tabindex='0' aria-controls='dynamic-table-example-1' rowspan='1' colspan='1' aria-sort='ascending' aria-        label='Rendering engine: activate to sort column ascending' style='width: 176px;'>
                Desde
                        <i class='glyph-icon'></i>
                    </th>
                    <th class='sorting' tabindex='0' aria-controls='dynamic-table-example-1' rowspan='1' colspan='1' aria-label='Browser: activate to sort  column ascending' style='width: 232px;'>Hasta<i class='glyph-icon'></i></th>
                    <th class='sorting' tabindex='0' aria-controls='dynamic-table-example-1' rowspan='1' colspan='1' aria-label='Platform(s): activate to sort column ascending' style='width: 212px;'>Rubro<i class='glyph-icon'></i></th>
                    <th class='sorting' tabindex='0' aria-controls='dynamic-table-example-1' rowspan='1' colspan='1' aria-label='Engine version: activate to sort column ascending' style='width: 151px;'>Tipo de Rubro<i class='glyph-icon'></i></th>
                    <th class='sorting' tabindex='0' aria-controls='dynamic-table-example-1' rowspan='1' colspan='1' aria-label='CSS grade: activate to sort column ascending' style='width: 109px;'>Clase de Rubro<i class='glyph-icon'></i></th>
                    <th class='sorting' tabindex='0' aria-controls='dynamic-table-example-1' rowspan='1' colspan='1' aria-label='CSS grade: activate to sort column ascending' style='width: 109px;'>Has. a Sembrar<i class='glyph-icon'></i></th>
                    <th class='sorting' tabindex='0' aria-controls='dynamic-table-example-1' rowspan='1' colspan='1' aria-label='CSS grade: activate to sort column ascending' style='width: 109px;'>Has. Sembradas<i class='glyph-icon'></i></th>
                    <th class='sorting' tabindex='0' aria-controls='dynamic-table-example-1' rowspan='1' colspan='1' aria-label='CSS grade: activate to sort column ascending' style='width: 109px;'>Editar<i class='glyph-icon'></i></th>
                        </tr>
                    </thead>
                    <tbody>";
        foreach($consulta as $row){
            echo "<tr class='gradeA even' role='row'>
                            <td class='sorting_1'>".$row['verg_desde']."</td>
                            <td>".$row['verg_hasta']."</td>
                            <td>".$row['ru_descripcion']."</td>
                            <td class='center'>".$row['rut_descripcion']."</td>
                            <td class='center'>".$row['ruc_descripcion']."</td>
                            <td class='center'>".$row['vertp_hasemb']."</td>
                            <td class='center'>".$row['vertp_hsem']."</td>
                            <td class='center'>".$row['verg_codigo']."</td>
                        </tr>
                   ";
        }
        echo "</tbody>";
    }
}
//-----------------------------------------------------
// Agrega las fechas de inspeccion al plan de siembra
//-------------------------------------------------------
if ($opcion == 'agginspeccion') {
    $codigo = $_POST['codigo'];
    $vertice = $_POST['vertice'];
    $fecha = $_POST['fecha'];
    $insert = paraTodos::arrayInserte("vertins_vergcodigo, vertins_vertcodigo, vertins_fechaains", "vertice_inspeccion", "'$codigo', '$vertice', '$fecha'");
    $consulta = paraTodos::arrayConsulta("*", "vertice_inspeccion vi, vertice v"," v.vert_codigo=vi.vertins_vertcodigo and vi.vertins_vergcodigo=$codigo");
    foreach ($consulta as $row) {
        ?>
        <tr class="itemtr">
            <td><?php echo $row['vert_descripcion']; ?></td>
            <td><?php echo $row['vertins_fechaains']; ?></td>
            <td><a href='javascript: void(0);' onclick="$.ajax({
                            type: 'POST',
                            url: 'accion.php',
                            data: {
                                opcion: 'deletefechains',
                                codigoins: <?php echo $row['vertins_codigo']; ?>,
                                codigo: <?php  echo $codigo;?>,
                                ver: 1,
                                dmn: 352
                            },
                            success: function (html) {
                                $('#tbasigfechains').html(html)                
                            },
                            error: function (xhr, msg, excep) {
                                alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                            }
                        });
                        return false"><i class="glyph-icon tooltip-button icon-remove icon-xs"></i></a> 
            </td>
        </tr>
        <?php
    }
}
//-----------------------------------------------------
// Elimina las fechas de inspeccion al plan de siembra seleccionado
//-------------------------------------------------------
if ($opcion == 'deletefechains') {
    $codigo = $_POST['codigo'];
    $codigoins = $_POST['codigoins'];
    $insert = paraTodos::arrayDelete("vertins_codigo=$codigoins", "vertice_inspeccion");
    $consulta = paraTodos::arrayConsulta("*", "vertice_inspeccion vi, vertice v"," v.vert_codigo=vi.vertins_vertcodigo and vi.vertins_vergcodigo=$codigo");
    foreach ($consulta as $row) {
        ?>
        <tr class="itemtr">
            <td><?php echo $row['vert_descripcion']; ?></td>
            <td><?php echo $row['vertins_fechaains']; ?></td>
            <td><a href='javascript: void(0);' onclick="
                $.ajax({
                            type: 'POST',
                            url: 'accion.php',
                            data: {
                                opcion: 'deletefechains',
                                codigoins: <?php echo $row['vertins_codigo']; ?>,
                                codigo: <?php  echo $codigo;?>,
                                ver: 1,
                                dmn: 352
                            },
                            success: function (html) {
                                $('#tbasigfechains').html(html)                
                            },
                            error: function (xhr, msg, excep) {
                                alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                            }
                        });
                        return false"><i class="glyph-icon tooltip-button icon-remove icon-xs"></i></a> 
            </td>
        </tr>
        <?php
    }
}
?>