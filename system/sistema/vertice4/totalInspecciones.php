<div id="content-box mrg25T mrg25B" class="rm-transition">
    <div id="page-nav">
        <ul id="page-subnav">
            <li><a href="" title="Social boxes"><span>Graficos de inspecciones</span></a></li>
            <li><a href="" title="Loading spinners"><span>Total inspecciones</span></a></li>
            <li><a href="" title="Tile boxes"><span>Inspecciones pendientes</span></a></li>
            <li><a href="" title="Timeline"><span>Reporte</span></a></li>
        </ul>
        <div id="page-nav-right"><a href="#" title="" class="btn sb-open-right no-shadow updateEasyPieChart"><i class="glyph-icon icon-cogs"></i> Statistics</a> <a href="#" title="" class="btn sb-open-left no-shadow updateEasyPieChart"><i class="glyph-icon icon-bullhorn"></i> Chat</a></div>
    </div>
    <link rel="stylesheet" type="text/css" href="assets-minified/widgets/charts/xcharts/xcharts.css">
    <script type="text/javascript" src="assets-minified/js-core/d3.js"></script>
    <script type="text/javascript" src="assets-minified/widgets/charts/xcharts/xcharts.js"></script>
    <div id="page-content" style="min-height: 362px;">
        <div class="content-box mrg25T mrg25B">
            <h3 class="content-box-header content-box-header-alt bg-azul"><span class="icon-separator"><i class="glyph-icon icon-table"></i></span>
              <div class="header-wrapper">Datos de Inspeccion <small>Inspecciones realizadas</small></div><div class="header-buttons"></div></h3>
            <div class="content-box-wrapper">
                <div id="dynamic-table-example-1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable no-footer" id="tablaVertice4" role="grid" aria-describedby="dynamic-table-example-1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 181px;">N° Denuncia<i class="glyph-icon"></i></th>
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 228px;">Objetivo<i class="glyph-icon"></i></th>
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 111px;">Act. Comercial<i class="glyph-icon"></i></th>
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 208px;">Tipo Operativo<i class="glyph-icon"></i></th>
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 154px;">Fiscal<i class="glyph-icon"></i></th>
                                <th class="sorting" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 111px;">CSS grade<i class="glyph-icon"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $datosInspeccion = Vertice4::totalInspecciones();
                              foreach($datosInspeccion as $total){
                        ?>
                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1">
                                        <?php echo $total['num_denuncia'];?>
                                    </td>
                                    <td>
                                        <?php echo $total['ids'];?>
                                    </td>
                                    <td>
                                        <?php echo $total['alimentacion'];?>
                                    </td>
                                    <td class="center">
                                        <?php echo $total['id'];?>
                                    </td>
                                    <td class="center">
                                        <?php echo $total['id'];?>
                                    </td>
                                    <td class="center">
                                        <?php echo $total['id'];?>
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
    <script type="text/javascript" src="<?php echo $ruta_base;?>assets-minified/widgets/datatable/datatable.js"></script>
    <script type="text/javascript" src="<?php echo $ruta_base;?>assets-minified/widgets/datatable/datatable-bootstrap.js"></script>
    <script type="text/javascript">
        /* Datatables init */
        $('#tablaVertice4').dataTable({
            "language": {
                "url": "<?php echo $ruta_base;?>assets-minified/widgets/datatable/Spanish.json"
            }
        });
    </script>
</div>
