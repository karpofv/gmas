<?php  
class Inspecciones {
    public function obtenerInspecciones($periodo){
        if ($periodo == 0){
            $campos = 'vi.vertins_fechaains,vi.vertins_fechains, e.est_nombre,est_codigo,vertins_vergcodigo,vertins_codigo,vertins_observ';
            $tabla = 'vertice_inspeccion vi, vertice_gen vg, establecimiento e';
            $condicion = "";            
            if ($_SESSION[usuario_perfil] != 1 && $_SESSION[usuario_perfil] != 9){
                $condicion = "vi.vertins_vertcodigo=$_SESSION[usuario_perfil] and ";
            }
            $condicion .= " vi.vertins_fechaains<(current_date) and vi.vertins_fechains='00-00-0000' and vi.vertins_vergcodigo=vg.verg_codigo and vg.verg_establec=e.est_codigo order by vi.vertins_fechaains limit 20";
            $ress_       = paraTodos::arrayConsulta("$campos","$tabla","$condicion");
            foreach ($ress_ as $key) {
            ?>
                <a href="javascript:void(0)" data-toggle="modal" data-target=".bs-example-modal-lg" id="itemins" onclick="$.ajax({
                                            type: 'POST',
                                            url: 'recargar.php',
                                            ajaxSend: $('#ventanaVer').html(cargando),
                                            data: {
                                                dmn:355,
                                                ver:9,
                                                est:'<?php echo $key ['est_codigo']; ?>',
                                                vertice:'<?php echo $key ['vertins_vergcodigo']; ?>',
                                                ins:'<?php echo $key ['vertins_codigo']; ?>',
                                                observ:'<?php echo $key ['vertins_observ'] ?>',
                                                fecha:'<?php echo $key ['vertins_fechaains'] ?>',
                                                fechai:'<?php echo $key ['vertins_fechains'] ?>'
                                            },
                                            success: function(html) {$('#ventanaVer').html(html); },
                                            error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
                                        }); return false;">
                    <li>
                        <span class="bg-red icon-notification glyph-icon icon-random"></span>
                        <span class="notification-text"><?php echo $key ['est_nombre'] ?></span>
                        <div class="notification-time"><?php echo $key ['vertins_fechaains'] ?>
                            <span class="glyph-icon icon-clock-o"></span>
                        </div>
                    </li>
                </a>
                <a href="javascript:void(0)"><p class="bg-red text-center">Ignorar</p></a>
            <?php
            }            
        };
        if ($periodo == 1){
            $campos = 'vi.vertins_fechaains,vi.vertins_fechains, e.est_nombre,est_codigo,vertins_vergcodigo,vertins_codigo,vertins_observ';
            $tabla = 'vertice_inspeccion vi, vertice_gen vg, establecimiento e';
            $condicion = "";            
            if ($_SESSION[usuario_perfil] != 1 && $_SESSION[usuario_perfil] != 9){
                $condicion = "vi.vertins_vertcodigo=$_SESSION[usuario_perfil] and ";
            }
            $condicion .= " vi.vertins_fechaains>current_date and vi.vertins_fechaains<=DATE_ADD(current_date, INTERVAL 30 DAY) and vi.vertins_fechains='00-00-0000' and vi.vertins_vergcodigo=vg.verg_codigo and vg.verg_establec=e.est_codigo order by vi.vertins_fechaains limit 20"; 
            $ress_       = paraTodos::arrayConsulta("$campos","$tabla","$condicion");
            foreach ($ress_ as $key) {
            ?>
                <a href="javascript:void(0)" data-toggle="modal" data-target=".bs-example-modal-lg" id="itemins" onclick="$.ajax({
                                            type: 'POST',
                                            url: 'recargar.php',
                                            ajaxSend: $('#ventanaVer').html(cargando),
                                            data: {
                                                dmn:355,
                                                ver:9,
                                                est:'<?php echo $key ['est_codigo'] ?>',
                                                vertice:'<?php echo $key ['vertins_vergcodigo'] ?>',
                                                ins:'<?php echo $key ['vertins_codigo'] ?>',
                                                observ:'<?php echo $key ['vertins_observ'] ?>',
                                                fecha:'<?php echo $key ['vertins_fechaains'] ?>',
                                                fechai:'<?php echo $key ['vertins_fechains'] ?>'
                                            },
                                            success: function(html) {$('#ventanaVer').html(html); },
                                            error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
                                        }); return false;">
                    <li>
                        <span class="bg-azure icon-notification glyph-icon icon-random"></span>
                        <span class="notification-text"><?php echo $key ['est_nombre'] ?></span>
                        <div class="notification-time">
                            <?php echo $key ['vertins_fechaains'] ?>
                            <span class="glyph-icon icon-clock-o"></span>
                        </div>
                    </li>
                </a>
                <a href="javascript:void(0)"><p class="bg-green text-center">Ignorar</p></a>
            <?php
            }        
        }
    }   
    public function menuInspeccion(){
        $campos = 'vi.vertins_fechaains';
        $tabla = 'vertice_inspeccion vi';
        $condicion = "";        
        if ($_SESSION[usuario_perfil] != 1 && $_SESSION[usuario_perfil] != 9){
            $condicion = "vi.vertins_vertcodigo=$_SESSION[usuario_perfil] and ";
        }
        $condicion .= " vi.vertins_fechaains<(current_date) and vi.vertins_fechains='00-00-0000'";
        $ress_       = paraTodos::arrayConsultanum("$campos","$tabla","$condicion");
        if ($ress_ > 0){
            $campos = 'vi.vertins_fechaains';
            $tabla = 'vertice_inspeccion vi, vertice_gen vg, establecimiento e';
            $condicion = "";
            if ($_SESSION[usuario_perfil] != 1 && $_SESSION[usuario_perfil] != 9){
                $condicion = "vi.vertins_vertcodigo=$_SESSION[usuario_perfil] and ";
            }
            $condicion .= " vi.vertins_fechaains<(current_date) and vi.vertins_fechains='00-00-0000' and vi.vertins_vergcodigo=vg.verg_codigo and vg.verg_establec=e.est_codigo limit 20"; 
            $cant = paraTodos::arrayConsultanum("$campos","$tabla","$condicion"); 
    ?>
            <div class="dropdown"><a data-toggle="dropdown" href="#" title="" aria-expanded="false"><span class="bs-badge badge-absolute bg-red"><?php echo $cant; ?></span><i class="glyph-icon icon-info"></i></a>
                <div class="dropdown-menu float-right">
                    <div class="popover-title display-block clearfix pad10A">Inspecciones no Ejecutadas</div>
                    <div class="scrollable-content scrollable-nice box-md scrollable-small" tabindex="5000">
                        <ul class="no-border notifications-box">
                            <?php
                                Inspecciones::obtenerInspecciones(0);
                            ?>
                        </ul>
                    </div>
                    <div class="pad10A button-pane button-pane-alt text-center">
                        <a href="#" class="btn btn-primary" title="View all notifications" onclick="$.ajax({
          type: 'POST',
          url:  'recargar.php', 
          data: '&dmn=355&ver=9&act=2',
          success: function(html) {$('#ventanaVer').html(html);}
        });">Ver Todas las Inspecciones Asignadas</a>
                    </div>
                    <div id="ascrail2000" class="nicescroll-rails" style="width: 6px; z-index: 5555; background: rgb(205, 205, 205); cursor: default; position: absolute; top: 41px; left: 394px; height: 300px; display: block; opacity: 0;">
                        <div style="position: relative; top: 0px; float: right; width: 6px; height: 170px; background-color: rgb(54, 54, 54); border: 0px; background-clip: padding-box; border-radius: 0px;"></div>
                    </div>
                </div>
            </div>
            <?php
                $campos = 'vi.vertins_fechaains';
                $tabla = 'vertice_inspeccion vi, vertice_gen vg, establecimiento e';
                $condicion = "";
                if ($_SESSION[usuario_perfil] != 1 && $_SESSION[usuario_perfil] != 9){
                    $condicion = "vi.vertins_vertcodigo=$_SESSION[usuario_perfil] and ";
                }
                $condicion .= " vi.vertins_fechaains>current_date and vi.vertins_fechaains<=DATE_ADD(current_date, INTERVAL 30 DAY) and vi.vertins_fechains='00-00-0000' and vi.vertins_vergcodigo=vg.verg_codigo and vg.verg_establec=e.est_codigo limit 20"; 
                $cant       = paraTodos::arrayConsultanum("$campos","$tabla","$condicion");  
?>
            <div class="dropdown"><a data-toggle="dropdown" href="#" title="" aria-expanded="false"><span class="bs-badge badge-absolute bg-green"><?php echo $cant; ?></span><i class="glyph-icon icon-info"></i></a>
                <div class="dropdown-menu float-right">
                    <div class="popover-title display-block clearfix pad10A">Inspecciones Proximas</div>
                    <div class="scrollable-content scrollable-nice box-md scrollable-small" tabindex="5000">
                        <ul class="no-border notifications-box">
                            <?php
                                Inspecciones::obtenerInspecciones(1);
                            ?>
                        </ul>
                    </div>
                    <div class="pad10A button-pane button-pane-alt text-center">
                        <a href="#" class="btn btn-primary" title="View all notifications" onclick="$.ajax({
          type: 'POST',
          url:  'recargar.php', 
          data: '&dmn=355&ver=9&act=2',
          success: function(html) {$('#ventanaVer').html(html);}
        });">Ver Todas las Inspecciones Asignadas</a>
                    </div>
                    <div id="ascrail2000" class="nicescroll-rails" style="width: 6px; z-index: 5555; background: rgb(205, 205, 205); cursor: default; position: absolute; top: 41px; left: 394px; height: 300px; display: block; opacity: 0;">
                        <div style="position: relative; top: 0px; float: right; width: 6px; height: 170px; background-color: rgb(54, 54, 54); border: 0px; background-clip: padding-box; border-radius: 0px;"></div>
                    </div>
                </div>
            </div>
        <?php
        }
    }
}
?>