<?php
class ConfMenu {
    public function Cabecera($idperfil){
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
            <h4>Configuración del perfil: <?php echo $nombre_pefil;?><a href="javascript:void(0);" class="pull-right">Eliminar perfil</a></h4>
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
        $menu = paraTodos::arrayConsulta("distinct(m.menu)", "perfiles_det pd, m_menu_emp_menj m", "pd.IdPerfil=$idperfil and pd.Menu=m.id
order by menu");
        foreach($menu as $row){
    ?>            
                <tr><?php echo $row[menu];?></tr>
                <tr>Consultar</tr>
                <tr>Insertar</tr>
                <tr>Modificar</tr>
                <tr>Eliminar</tr>
                <tr>Imprimir</tr>
    <?php
        }
      
    }
}
?>