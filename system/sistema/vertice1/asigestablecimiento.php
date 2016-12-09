<link rel="stylesheet" type="text/css" href="<?php echo $ruta_base; ?>assets-minified/widgets/datatable/dataTable.css">
<script type="text/javascript" src="<?php echo $ruta_base; ?>assets-minified/widgets/datatable/dataTable.js"></script>
<script type="text/javascript" src="assets-minified/widgets/datatable/datatable-bootstrap.js"></script>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header bg-azul">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:white">×</button>
            <h4 class="modal-title">Establecimientos</h4>
        </div>
        <div class="modal-body">
            <table id="tbestab" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" role="grid">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" style="width: 181px;" aria-sort="ascending">Rif<i class="glyph-icon"></i></th>
                        <th class="sorting" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 228px;">Nombre<i class="glyph-icon"></i></th>
                        <th class="sorting" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 10px;">Propietario<i class="glyph-icon"></i></th>
                        <th class="sorting" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 10px;">Tipo<i class="glyph-icon"></i></th>         
                        <th class="collapse" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 10px;">Direccion<i class="glyph-icon"></i></th>         
                        <th class="sorting" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 10px;">Seleccionar<i class="glyph-icon"></i></th>
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
                        <td class="collapse"><?php echo $lista['est_direccion']; ?></td>                        
                        <td>
                            <a href="javascript:void(0);" onclick="
                                    $('#lblrif').html('<?php echo $lista['est_rif']?>');
                                    $('#lblnombre').html('<?php echo $lista['est_nombre']?>');
                                    $('#lbldireccion').html('<?php echo $lista['est_direccion']?>');
                                    $('#codigoest').val(<?php echo $lista['est_codigo']?>)" data-dismiss="modal"><i class="glyph-icon icon-plus icon-xs"></i>
                            </a>
                        </td>
                    </tr>
                <?php  }?>
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#tbestab').DataTable();
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
    $('#tbestab').DataTable();
</script>
</div>