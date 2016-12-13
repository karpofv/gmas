<?php

/**
* Recuperando los valores enviados por formulario
*/
$submit = $_POST['op'];
$num_denuncia = $_POST['num_denuncia'];
$estado = $_POST['estado'];
$municipio  = $_POST['municipio'];
$parroquia  = $_POST['parroquia'];
$alimentacion = $_POST['alimentacion'];
$actividad_comercial  = $_POST['actividad_comercial'];
$tipoOperativo  = $_POST['tipoOperativo'];
$rif  = $_POST['rif'];
$objetivo = $_POST['objetivo'];
$direccion  = $_POST['direccion'];
$fiscal = $_POST['fiscal'];
$telefono = $_POST['telefono'];
$dmn = $_POST['dmn'];

$num_acta_inicio  = $_POST['num_acta_inicio'];
$fech_emi_acta  = $_POST['fech_emi_acta'];
$fech_notificacion  = $_POST['fech_notificacion'];
$fech_denuncia  = $_POST['fech_denuncia'];
$fech_reporte = $_POST['fech_reporte'];
$reporte  = $_POST['reporte'];
$incump_inciden = $_POST['incump_inciden'];
$baselegal  = $_POST['baselegal'];
$medida_prev_apli = $_POST['medida_prev_apli'];
$observaciones  = $_POST['observaciones'];
$ut = $_POST['ut'];
$bs = $_POST['bs'];
$remision = $_POST['remision'];
$nom_fiscalia = $_POST['nom_fiscalia'];
$detenidos  = $_POST['detenidos'];
$env_caracas  = $_POST['env_caracas'];

if ($submit) {
    $insertar = paraTodos::arrayInserte('
  id,
  num_denuncia,
  estado,
  municipio,
  parroquia,
  alimentacion,
  actividad_comercial,
  tipoOperativo,
  rif,
  objetivo,
  direccion,
  fiscal,
  telefono,
  no_act_ini,
  fec_emi_acta_in,
  fec_notificacion,
  fec_denuncia,
  fec_reporte,
  resultado,
  inci_incum,
  base_legal,
  medi_preven_aplica,
  observaciones,
  ut,
  bs,
  remision,
  nom_fiscalia,
  detenidos,
  env_caracas',

  'inspeccion',

  "
  '',
  '$num_denuncia',
  '$estado',
  '$municipio',
  '$parroquia',
  '$alimentacion',
  '$actividad_comercial',
  '$tipoOperativo',
  '$rif',
  '$objetivo',
  '$direccion',
  '$fiscal',
  '$telefono',
  '$num_acta_inicio',
  '$fech_emi_acta',
  '$fech_notificacion',
  '$fech_denuncia',
  '$fech_reporte',
  '$reporte',
  '$incump_inciden',
  '$baselegal',
  '$medida_prev_apli',
  '$observaciones',
  '$ut',
  '$bs',
  '$remision',
  '$nom_fiscalia',
  '$detenidos',
  '$env_caracas'
  "
);
}
// echo $num_denuncia;
// echo $estado;
// echo $municipio;
// echo $parroquia;
// echo $alimentacion;
// echo $actividad_comercial;
// echo $tipoOperativo;
// echo $rif;
// echo $objetivo;
// echo $direccion;
// echo $fiscal;
// echo $telefono;
// echo $num_acta_inicio;
// echo $fech_emi_acta;
// echo $fech_notificacion;
// echo $fech_denuncia;
// echo $fech_reporte;
// echo $reporte;
// echo $incump_inciden;
// echo $baselegal;
// echo $medida_prev_apli;
// echo $observaciones;
// echo $ut;
// echo $bs;
// echo $remision;
// echo $nom_fiscalia;
// echo $detenidos;
// echo $env_caracas;
?>
    <div class="col-md-12" style="background-color: #FFF">
        <form onsubmit="$.ajax({
    type: 'POST',
    url: 'accion.php',
    data: {
      op : $('#op').val(),
      num_denuncia : $('#num_denuncia').val(),
      estado: $('#estado').val(),
      municipio: $('#municipio').val(),
      parroquia: $('#parroquia').val(),
      alimentacion: $('#alimentacion').val(),
      actividad_comercial:$('#actividad_comercial').val(),
      tipoOperativo: $('#tipoOperativo').val(),
      rif: $('#rif').val(),
      objetivo: $('#objetivo').val(),
      direccion: $('#direccion').val(),
      fiscal: $('#fiscal').val(),
      telefono: $('#telefono').val(),
      num_acta_inicio: $('#num_acta_inicio').val(),
      fech_emi_acta: $('#fech_emi_acta').val(),
      fech_notificacion: $('#fech_notificacion').val(),
      fech_denuncia: $('#fech_denuncia').val(),
      fech_reporte: $('#fech_reporte').val(),
      reporte: $('#reporte').val(),
      incump_inciden: $('#incump_inciden').val(),
      baselegal: $('#baselegal').val(),
      medida_prev_apli: $('#medida_prev_apli').val(),
      observaciones: $('#observaciones').val(),
      ut: $('#ut').val(),
      bs: $('#bs').val(),
      remision: $('#remision').val(),
      nom_fiscalia: $('#nom_fiscalia').val(),
      detenidos: $('#detenidos').val(),
      env_caracas: $('#env_caracas').val(),
      ver: 2,
      dmn: <?php echo $dmn; ?>,
    },
    success: function (html) {
      $('#mostrardatos').html(html);
    },
    error: function (xhr, msg, excep) {
      alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
    }
  });" action="javascript: void(0)" method="post">
            <div id="mostrardatos">
                <div class="content-box">
                    <h3 class="content-box-header bg-azul">
                        <i class="glyph-icon icon-pencil"></i> Datos Generales
                    </h3>
                    <div class="content-box-wrapper">
                        <div class="row col-lg-12">
                            <div class="form-group">
                                <div class="col-sm-2 col-md-2">
                                    <label>Numero de denuncia</label>
                                    <input type="number" id="num_denuncia" class="form-control">
                                </div>
                                <div class="col-sm-2 col-md-2">
                                    <label>Estado</label>
                                    <select id="estado" class="form-control">
                                        <option value='0'>Seleccione un estado</option>
                                        <?php
                combos::CombosSelect("1", "0", "id, idCiudad,Estado", 'c_estados', "id", "Estado", "Estado <> ''");
                ?>
                                    </select>
                                    <select id="municipio" class="form-control">
                                        <option></option>
                                    </select>
                                    <select id="parroquia" class="form-control">
                                        <option></option>
                                    </select>
                                </div>
                                <div class="col-sm-2 col-md-2">
                                    <label>Alimentacion</label>
                                    <select id="alimentacion" class="form-control">
                                        <option value="#">Seleccione una opcion</option>
                                        <?php
                combos::CombosSelect('1', '0', 'b.id,b.nombre_alimentacion', 'alimentacion b', 'nombre_alimentacion', 'nombre_alimentacion', 'nombre_alimentacion <> ""');
                ?>
                                    </select>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <label>Actividad comercial</label>
                                    <select id="actividad_comercial" class="form-control">
                                        <option>Seleccione una opcion</option>
                                        <?php
                combos::CombosSelect('1', '0', 'a.id,a.nombre_actividad', 'actividad_comercial a', 'nombre_actividad', 'nombre_actividad', 'nombre_actividad <> ""');
                ?>
                                    </select>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label>Tipo de operativo</label>
                                    <select id="tipoOperativo" class="form-control">
                                        <option value="#">Seleccione una opcion</option>
                                        <?php
                combos::CombosSelect('1', '0', 'c.id,c.nombre_operativo', 'operativo c', 'id', 'nombre_operativo', 'nombre_operativo <>""');
                ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-box">
                    <h3 class="content-box-header bg-azul">
        <i class="glyph-icon icon-user"></i> Datos Personales
      </h3>
                    <div class="content-box-wrapper">
                        <div class="row col-lg-12">
                            <div class="col-md-2 col-sm-2">
                                <div class="form-group"> <strong>RIF</strong>
                                    <input type="text" class="form-control" id="rif" placeholder=""> </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="form-group"> <strong>OBJETIVO</strong>
                                    <input type="text" class="form-control" id="objetivo" placeholder=""> </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group"> <strong>DIRECCION</strong>
                                    <textarea name="" id="direccion" placeholder="" rows="3" class="form-control textarea-sm"></textarea>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="form-group"> <strong>FISCAL</strong>
                                    <input type="text" class="form-control" id="fiscal" placeholder=""> </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="form-group"> <strong>TELEFONO</strong>
                                    <input type="text" class="form-control" id="telefono" placeholder=""> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-box">
                    <h3 class="content-box-header bg-azul">
        <i class="glyph-icon icon-user"></i> Datos Personales
                    </h3>
                    <div class="content-box-wrapper">
                        <div class="row col-lg-12">
                            <div class="col-md-2 col-sm-2">
                                <div class="form-group"> <strong>N° ACTA DE INICIO</strong>
                                    <input type="number" class="form-control" id="num_acta_inicio" placeholder="" required="Si no posee por favor coloque 0"> </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="form-group"> <strong>FECHA EMISION DEL ACTA DE INICIO</strong>
                                    <input id="fech_emi_acta" class="form-control" type="date" name="fecemi"> </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="form-group"> <strong>FECHA NOTIFICACION</strong>
                                    <input id="fech_notificacion" class="form-control" type="date" name="fecnoti"> </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="form-group"> <strong>FECHA DE DENUNCIA</strong>
                                    <input id="fech_denuncia" class="form-control" type="date" name="fecdenu"> </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="form-group"> <strong>FECHA DE REPORTE</strong>
                                    <input id="fech_reporte" class="form-control" type="date" name="fecrep"> </div>
                            </div>
                        </div>
                        <br>
                        <div class="row col-lg-12">
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group"> <strong>REPORTE</strong>
                                    <textarea class="form-control" id="reporte" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="form-group"> <strong>INCIDENCA-INCUMPLIMIENTO</strong>
                                    <select id="incump_inciden" name="inc_inc" class="form-control">
                                        <option value="incidencia"> Incidencia </option>
                                        <option value="incumplimiento"> Incumplimiento </option>
                                        <option value="especulacion"> Especulacion </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="form-group"> <strong>BASAMENTO LEGAL</strong>
                                    <input id="baselegal" class="form-control" type="text" name="baselegal" value="ART "> </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="form-group"> <strong>MEDIDA PREVENTIVA APLICADA</strong>
                                    <select id="medida_prev_apli" name="med_prev" class="form-control">
                                        <option value="ajuste"> AJUSTE INMEDIATO DE PRECIO </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- ···································································· -->
                        <div class="row col-lg-12">
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group"> <strong>OBSERVACIONES</strong>
                                    <textarea class="form-control" id="observaciones" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="form-group"> <strong>UT</strong>
                                    <input id="ut" class="form-control" type="text" name="ut"> </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="form-group"> <strong>Bs.</strong>
                                    <input id="bs" class="form-control" type="text" name="bs"> </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group"> <strong>REMISION A OTROS ORGANISMOS</strong>
                                    <input id="remision" type="text" name="remision" class="form-control"> </div>
                            </div>
                        </div>
                        <div class="row col-lg-12">
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group"> <strong>NOMBRE DE LA FISCALIA (CUANDO SE REMITA AL MP)</strong>
                                    <input id="nom_fiscalia" type="text" name="nom_fiscalia" class="form-control"> </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="form-group"> <strong>DETENIDOS</strong>
                                    <textarea name="detenidos" class="form-control" id="detenidos" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="form-group"> <strong>ENVIADO A CARACAS</strong>
                                    <input id="env_caracas" class="form-control" type="text" name="env_caracas"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="row col-lg-12">
                        <input type="hidden" id="op" name="op" value="1">
                        <button class="form-control" type="submit">Guardar Registro</button>
                    </div>
        </form>
        </div>
        <?php if ($insertar) {
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
  ?>
            </div>
            <script>
                $("#tab-rub").css("display", "none");
                //$("#tab-analisis").css("display", "none");
                $("#tab-entes").css("display", "none");
                localStorage.setItem("count", "0");
                var count = localStorage.getItem('count');
                //+---------------------------------------------
                //Busca los municioios dependiendo del estado
                //-----------------------------------------------
                $("#estado").change(function () {
                    $.ajax({
                        type: 'POST'
                        , url: 'accion.php'
                        , data: {
                            opcion: 'aggmunicipio'
                            , estado: $('#estado').val()
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