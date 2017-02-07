<?php
class ConfMenu {
    public function Cabecera($idperfil, $dmn){
        $campos    = "Nombre";
        $tablas    = "perfiles";
        $consultas = "CodPerfil =$idperfil";
        $res_car =paraTodos::arrayConsulta($campos,$tablas,$consultas);
        foreach ($res_car as $row ) {
            $nombre_pefil=$row['Nombre'];
        }
?>
    <div class="panel panel-default">
        <div class="panel-heading bg-negro">
            <h4>Configuración del perfil: <u><?php echo $nombre_pefil;?></u><a href="javascript:void(0);" class="pull-right" onclick="var msg = confirm('Esta seguro que desea eliminar este perfil?');
                    if (msg) {
                    	$.ajax({
                    		type: 'POST',
                    		url: 'accion.php',
        					data: {
        						ver:2,
        						eliminar:<?php echo $idperfil;?>,
        						dmn:<?php echo $dmn; ?>
        					},
        					success: function(html) {
        						$('#page-content').html(html);
        					},
        					error: function(xhr,msg,excep) {
        						alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
        					}
        				});
        			} return false;">Eliminar perfil</a></h4>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered dataTable no-footer">
        <?php
            ConfMenu::Menu($idperfil);        
        ?>
            </table>                
        </div>
    </div>
    <?php
    }
    public function Menu($idperfil){
        $menu = paraTodos::arrayConsulta("distinct(m.menu), m.id", "perfiles_det pd, m_menu_emp_menj m", "pd.IdPerfil=$idperfil and pd.Menu=m.id
order by menu");
        foreach($menu as $row){
    ?>          
            <thead>
                <tr>
                    <th><?php echo $row[menu];?></th>
                    <th>Consultar</th>
                    <th>Insertar</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                    <th>Imprimir</th>
                </tr> 
            </thead>
    <?php
            ConfMenu::SubMenu($idperfil, $row[id]);                    
        }
      
    }
    public function SubMenu($idperfil, $idMenu){
        $menu = paraTodos::arrayConsulta("ms.menu, pd.S, pd.U, pd.D, pd.I, pd.P", "perfiles_det pd, m_menu_emp_sub_menj ms", "pd.Submenu=ms.id and pd.idPerfil=$idperfil and pd.menu=$idMenu order by ms.menu");
        foreach($menu as $row){
            $trues = "<i class='glyph-icon tooltip-button icon-remove font-red'></i>";
            $truei = "<i class='glyph-icon tooltip-button icon-remove font-red'></i>";            
            $trueu = "<i class='glyph-icon tooltip-button icon-remove font-red'></i>";            
            $trued = "<i class='glyph-icon tooltip-button icon-remove font-red'></i>";            
            $truep = "<i class='glyph-icon tooltip-button icon-remove font-red'></i>";            
            if ($row[S]=='1'){
                $trues = "<i class='glyph-icon tooltip-button icon-check font-green'></i>";
            }
            if ($row[I]=='1'){
                $truei = "<i class='glyph-icon tooltip-button icon-check font-green'></i>";
            }
            if ($row[U]=='1'){
                $trueu = "<i class='glyph-icon tooltip-button icon-check font-green'></i>";                
            }
            if ($row[D]=='1'){
                $trued = "<i class='glyph-icon tooltip-button icon-check font-green'></i>";                
            }
            if ($row[P]=='1'){
                $truep = "<i class='glyph-icon  tooltip-button icon-check font-green'></i>";                
            }
    ?>          
            <tbody>
                <tr>
                    <td class="text-center"><?php echo $row[menu];?></td>
                    <td class="text-center"><?php echo $trues;?></td>
                    <td class="text-center"><?php echo $truei;?></td>
                    <td class="text-center"><?php echo $trueu;?></td>
                    <td class="text-center"><?php echo $trued;?></td>
                    <td class="text-center"><?php echo $truep;?></td>
                </tr> 
            </tbody>
    <?php
        }
    }
}
?>