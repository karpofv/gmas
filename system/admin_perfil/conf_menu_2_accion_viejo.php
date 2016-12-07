<?php
if ($_POST[permiso]!='') {
    if ($_POST[idsubmenupp]!='') {
        if ($_POST[accC]!='') { $acc=$_POST[accC]; $campo='Consultar'; $iddiv='consultartd'; $accb='accC'; if($_POST[accC]==0) { $accbb=1; }else{ $accbb=0; } }
        if ($_POST[accI]!='') { $acc=$_POST[accI]; $campo='Insertar'; $iddiv='insertartd'; $accb='accI'; if($_POST[accI]==0) { $accbb=1; }else{ $accbb=0; } }
        if ($_POST[accM]!='') { $acc=$_POST[accM]; $campo='Modificar'; $iddiv='modificartd'; $accb='accM'; if($_POST[accM]==0) { $accbb=1; }else{ $accbb=0; } }
        if ($_POST[accE]!='') { $acc=$_POST[accE]; $campo='Eliminar'; $iddiv='eliminartd'; $accb='accE'; if($_POST[accE]==0) { $accbb=1; }else{ $accbb=0; } }
        if ($_POST[accImp]!='') { $acc=$_POST[accImp]; $campo='Imprimir'; $iddiv='imprimirtd'; $accb='accImp'; if($_POST[accImp]==0) { $accbb=1; }else{ $accbb=0; } }
        if ($acc==1) { $imgper='seleccionado.png'; }else{ $imgper='elim.jpg'; }
        
        $consulta_insertamenu=mysql_query("INSERT INTO detalleperfiles(submenu,menus,idperfil) VALUES ('$_POST[submenu]','$_POST[menus]','$_POST[idperfil]')");
        $actualiza_submenu=mysql_query("UPDATE detalleperfiles SET $campo=$acc WHERE idperfil='$_POST[idperfil]' and menus='$_POST[menus]' and submenu='$_POST[submenu]'");
        
        ?>
        <a onclick="$.ajax({ type: 'POST', url: 'adminarse.php', ajaxSend: $('#<?php echo $iddiv.$_POST[idsubmenupp]; ?>').html(cargando),
        data: 'Nv=3&fun=<?php echo $buscart; ?>&idsubmenupp=<?php echo $_POST[idsubmenupp]; ?>&<?php echo $accb; ?>=<?php echo $accbb; ?>&permiso=1',
        success: function(html) { $('#<?php echo $iddiv.$_POST[idsubmenupp]; ?>').html(html); $('#thebutton').click(); },
        error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
        });  return false;" href="javascript: void(0);">
        <img src="images/<?php echo $imgper; ?>" style="width: 20px;margin-left: 5px;" border="0">
        </a>
        <?php
    }else{
        
        if ($_POST[accC]!='') { $acc=$_POST[accC]; $campo='Consultar'; $iddiv='consultartd'; $accb='accC'; if($_POST[accC]==0) { $accbb=1; }else{ $accbb=0; } }
        if ($_POST[accI]!='') { $acc=$_POST[accI]; $campo='Imsertar'; $iddiv='insertartd'; $accb='accI'; if($_POST[accI]==0) { $accbb=1; }else{ $accbb=0; } }
        if ($_POST[accM]!='') { $acc=$_POST[accM]; $campo='Modificar'; $iddiv='modificartd'; $accb='accM'; if($_POST[accM]==0) { $accbb=1; }else{ $accbb=0; } }
        if ($_POST[accE]!='') { $acc=$_POST[accE]; $campo='Eliminar'; $iddiv='elimiinartd'; $accb='accE'; if($_POST[accE]==0) { $accbb=1; }else{ $accbb=0; } }
        if ($_POST[accImp]!='') { $acc=$_POST[accImp]; $campo='Imprimir'; $iddiv='imprimirtd'; $accb='accImp'; if($_POST[accImp]==0) { $accbb=1; }else{ $accbb=0; } }
        if ($acc==1) { $imgper='seleccionado.png'; }else{ $imgper='elim.jpg'; }
        $consulta_insertamenu=mysql_query("INSERT INTO detalleperfiles(submenu,menus,idperfil) VALUES ('$_POST[submenu]','$_POST[menus]','$_POST[idperfil]')");
        $actualiza_submenu=mysql_query("UPDATE detalleperfiles SET $campo=$acc WHERE idperfil='$_POST[idperfil]' and menus='$_POST[menus]' and submenu='$_POST[submenu]'");
        ?><img src="images/<?php echo $imgper; ?>" style="width: 20px;margin-left: 5px;" border="0"><?php
    }
}
?>
