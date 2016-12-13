<?php
    $codigoest = $_POST['est'];
    $codigoins = $_POST['ins'];
    $vertice = $_POST['vertice'];
    $fecha = $_POST['fecha'];
    $fechai = $_POST['fechai'];
    $observ = $_POST['observ'];
    $consulta = paraTodos::arrayConsulta("*", "establecimiento", "est_codigo='$codigoest'");
    foreach ($consulta as $row){
        $rif = $row[est_rif];
        $nomestab = $row[est_nombre];
        $direcestab = $row[est_direccion];
    }
?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header bg-azul">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:white">×</button>
            <h4 class="modal-title">Cargar Inspeccion</h4>
        </div>
        <div class="modal-body">
            <div class="content-box">
                <h3 class="content-box-header bg-azul col-xs-8">Datos del Establecimiento a Inspeccionar</h3>
                <h4 class="content-box-header bg-azul col-xs-2">Fecha:</h4>
                <h5 class="content-box-header bg-azul col-xs-2"><?php echo $fecha;?></h5>
                <div class="content-box-wrapper">
                    <div class="col-sm-2">
                        <label>Rif.:</label>
                        <input type="text" id="codigoest" class="collapse" value="<?php echo $codigoest;?>">
                        <p id="lblrif">
                            <?php echo $rif;?>
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <label>Nombre o Razon Social.:</label>
                        <p id="lblnombre">
                            <?php echo $nomestab;?>
                        </p>
                    </div>
                    <div class="col-sm-12">
                        <label>Dirección:</label>
                        <p id="lbldireccion">
                            <?php echo $direcestab;?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="content-box">
                <h3 class="content-box-header bg-azul">Plan de Siembra y Cosecha</h3>
                <div class="content-box-wrapper">
                    <div class="form-group">
                        <label class="label-control" for="fechains">Fecha de la Inspección</label>
                        <input type="date" class="form-control" id="fechains" value="<?php echo $fechai; ?>" onchange="guardar(0)" required>                      
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Producción</th>
                                <th>Sembrado ult. Inspección</th>
                                <th>Sembrado Actual</th>
                                <th>Cosechado ult. Inspección</th>
                                <th>Cosechado Actual</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $rubros = paraTodos::arrayConsulta("vp.vertp_codigo,r.ru_descripcion, rt.rut_descripcion, rc.ruc_descripcion", "vertice_gen vg, vertice_produccion vp
left join rubros r on r.ru_codigo=vp.vertp_rubro
left join rubro_tipo rt on rt.rut_codigo=vp.vertp_tiprubro
left join rubro_clase rc on rc.ruc_rucodigo=vp.vertp_clasrubro", "vg.verg_codigo=vp.vertp_vergcodigo and vg.verg_codigo=$vertice");
                            foreach($rubros as $row){
                                $inspeccionant = paraTodos::arrayConsulta("verinsdet_sembrado,verinsdet_cosechado", "vertice_inspeccion vi, vertice_inspeccion_det vd", "vi.vertins_codigo=vd.verinsdet_vertinscodigo and vi.vertins_vergcodigo='$vertice' and verinsdet_vertpcodigo='$row[vertp_codigo]'
order by vertins_fechains limit 1");
                                foreach($inspeccionant as $row2){
                                    $sembradoant =$row2[verinsdet_sembrado];
                                    $cosechadoant=$row2[verinsdet_cosechado];
                                }
                        ?>
                        <tr>
                        <td><span class="bs-label label-blue-alt"><?php echo $row['ru_descripcion'].' / '.$row['rut_descripcion'].' / '.$row['ruc_descripcion']?></span></td>
                        <td class="text-center"><label><?php echo $sembradoant?></label></td>
                        <td><input type="number" class="form-control" value="0" onchange="guardar(<?php echo $row[vertp_codigo];?>)" id="sembrado<?php echo $row[vertp_codigo];?>"></td>
                        <td class="text-center"><?php echo $cosechadoant;?></td>
                        <td><input type="number" class="form-control" onchange="guardar(<?php echo $row[vertp_codigo];?>)" id="cosechado<?php echo $row[vertp_codigo];?>" value="0"></td>
                        </tr>                        
                        <?php
                            }
                        ?>
                        </tbody>                            
                    </table>
                    <label>Observación</label>
                    <textarea class="form-control col-xs-6"  onchange="guardar(0)" id="observ"><?php echo $observ;?></textarea>
                    <label>Problemáticas y limitaciones</label>                    
                    <textarea class="form-control col-xs-6" id="problem"></textarea>
                    <label>Solicitar Asistencia</label>                    
                    <select class="form-control" id="vertice">
                        <option>Seleccione el vertice</option>
                        <?php
                            combos::CombosSelect("0", 'vert_codigo', "*", "vertice", "vert_codigo", "vert_descripcion", "1=1")
                        ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function guardar(prod){
        var produccion, sembrado, cosechado, observacion;
        produccion = prod;
        sembrado = $('#sembrado'+prod).val();
        cosechado = $('#cosechado'+prod).val();
        observacion = $('#observ').val();            
        fecha = $('#fechains').val();            
        codigo = <?php echo $codigoins; ?>;
        if (fecha !=""){
            $("#fechains").removeClass("parsley-error");            
            $.ajax({
                type: 'POST'
                , url: 'accion.php'
                , data: {
                    opcion: 'agginspeccion'
                    , produccion: prod
                    , sembrado: sembrado
                    , cosechado: cosechado
                    , observacion: observacion
                    , fecha: fecha
                    , ver: 1
                    , dmn: 352
                    , codigo: codigo                  
                }
                , success: function (html) {
                    $('#sembrado'+prod).addClass("parsley-success");
                    $('#cosechado'+prod).addClass("parsley-success");
                }
                , error: function (xhr, msg, excep) {
                    alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                }
            }).done( function() {
                $.ajax({
                    type: 'POST',
                    url:  'recargar.php', 
                    data: '&dmn=354&ver=9&act=2',
                    success: function(html) {$('#notif').html(html);}
                });   
            });
        } else {
            $("#fechains").addClass("parsley-error");
        }
    }
    $("#cerrarVentana").click(function () {
        $('[id^=ventanaVer]').html('');
        $.ajax({
            type: 'POST'
            , url: 'accion.php'
            , ajaxSend: $('#verContenido').html(cargando)
            , data: '&dmn=<?php echo $idMenut; ?>&ver=2'
            , success: function (html) {
                $('#verContenido').html(html);
            }
        });
    });
</script>