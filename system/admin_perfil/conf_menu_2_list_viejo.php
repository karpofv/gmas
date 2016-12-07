<br>
<?php
        $campos    = "nombre";
          $tablas    = "perfiles";
          $consultas = "id =$_POST[idperfil]";
          $res_car =Como::arrayConsulta($campos,$tablas,$consultas);
          foreach ($res_car as $row ) {
              $nombre_pefil=$row['nombre'];
          }
	$resultx=mysql_query("select * from menuemp order by menu" );?>
        <div class="buscarT" style="width: 90%;">
        Configuraci&oacute;n del Menu <?php echo $nombre_pefil;?> 
        <a style="float:right" onclick="var msg = confirm('Esta seguro que desea eliminar este Perfil?');
        if (msg) { $.ajax({ type: 'POST', url: 'adminarse.php', ajaxSend: $('#contenido').html(cargando),
        data: 'eliminar=<?=$_POST[idperfil]?>&Nv=1&fun=<?php echo $buscart;?>',
        success: function(html) { $('#contenido').html(html); $('#veroferta').click(); },
        error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
});  } return false;" href="javascript: void(0);">Eliminar</a>
        </div>
	<table width="90%" height="20" border="1">
<?php
	$indicemenu=1;
	while($row = mysql_fetch_array($resultx)) {
		$indicesubmenu=1;
   		$idmenus=$row["id"];
   		$menu=$row["menu"];
   		$conexx=$row["conex"];
                ?><tr style="background: #EEEEEE;font-weight: bold;font-size: 13px;"><td class="CeldaRecojeDatos" height="20"> <?php
  		if ($_POST[idperfil]<>''){
			//Se busca los menus que ya tenga ese perfil, si existen se chequean
			$consulta_menu_perfiles=mysql_query("SELECT menus,Insertar,Consultar,Modificar,Eliminar,Imprimir FROM detalleperfiles WHERE idperfil=$_POST[idperfil]");		
			while ($resultado=mysql_fetch_array($consulta_menu_perfiles))
			{
				$menu_del_perfil=$resultado["menus"];
                                $insertar=$resultado["Insertar"];
                                $modificar=$resultado["Modificar"];
                                $consultar=$resultado["Consultar"];
                                $eliminar=$resultado["Eliminar"];
                                $imprimir=$resultado["Imprimir"];
				if  ($idmenus==$menu_del_perfil){ $idmenu= "true";}
			}
			mysql_free_result($consulta_menu_perfiles);
		}
                ?>
                <span style="width: 250px;"><b><?php printf("%s",$menu);?></b>
                </span>
                </td>
                <td style="padding: 5px;">Consultar</td>
                <td>Insertar</td>
                <td>Modificar</td>
                <td>Eliminar</td>
                <td>Imprimir</td>
                </tr>
                <div id="idmenuPert"><?php
		$contc=="1";
                $resultxw=mysql_query("select * from submenuemp where ((enlace='$idmenus')) order by menu");
                while($roww = mysql_fetch_array($resultxw)) {
                        $submenu1=$roww["menu"];
                        $submenuID=$roww["id"];
                        $submenuconexion=$roww["enlace"];
                        $idSubMenuP='';
				$psubMenu1='elim.jpg';
                            $psubMenu2='elim.jpg';
                            $psubMenu3='elim.jpg';
                            $psubMenu4='elim.jpg';
                            $psubMenu5='elim.jpg';
                         $contc=$contc+1;
                                if($contc=="1"){
                                        echo "	<tr class=\"item_claro\">";
                                  $color="#F6F6F6";
                                }else{
                                        echo "	<tr class=\"item_oscuro\">";
                                 $color="#FFFFFF";
                                 $contc="0";
                                } ?>
				<td class="CeldaRecojeDatos" height="20" style="padding: 5px;"> <?php
				$entre='';
                        if ($_POST[idperfil]<>'') {

                        $consulta_sub_menu_perfiles=mysql_query("SELECT * FROM detalleperfiles WHERE submenu='$submenuID' and menus='$idmenus' and idperfil = $_POST[idperfil]");
                        while ($resultado2=mysql_fetch_array($consulta_sub_menu_perfiles))  {
                                $submen=$resultado2["submenu"];
                                $menu_del_perfil=$resultado["menus"];
                                //$idSubMenuP=$resultado2["id"];
					$entre='1';
                                $consultar=$resultado2["Consultar"];
                                if  ($consultar==1){$psubMenu1= "seleccionado.png"; $accC=0;}
                                if  ($consultar==0){$psubMenu1= "elim.jpg"; $accC=1;}

                                $insertar=$resultado2["Insertar"];
                                if  ($insertar==1){$psubMenu2= "seleccionado.png"; $accI=0;}
                                if  ($insertar==0){$psubMenu2= "elim.jpg"; $accI=1;}

                                $modificar=$resultado2["Modificar"];
                                if  ($modificar==1){$psubMenu3= "seleccionado.png"; $accM=0;}
                                if  ($modificar==0){$psubMenu3= "elim.jpg"; $accM=1;}

                                $eliminar=$resultado2["Eliminar"];
                                if  ($eliminar==1){$psubMenu4= "seleccionado.png"; $accE=0;}
                                if  ($eliminar==0){$psubMenu4= "elim.jpg"; $accE=1;}

                                $imprimir=$resultado2["Imprimir"];
                                if  ($imprimir==1){$psubMenu5= "seleccionado.png"; $accImp=0;}
                                if  ($imprimir==0){$psubMenu5= "elim.jpg"; $accImp=1;}
                        } 

                        }
                        if ($entre=='') {
                            $accC=1; $accI=1;$accM=1;$accE=1;$accImp=1;                           

                        }
			   if ($idSubMenuP=='') {
                            $idSubMenuP=$submenuID;                            

                        }
                        
                        if($submenuID==$submen){ ?> <font style="color:blue; font-weight:bold;"> <?php }
                        echo $submenu1;
                        if($submenuID==$submen){ ?> </font> <?php }
                        ?></td>
                        <td id="consultartd<?php echo $idSubMenuP; ?>" class="CeldaRecojeDatos" height="20">
                            <?php
                            if ($datas[Cs]==1 AND $datas[Int]==1 AND $datas[Eli]==1 AND $datas[Mod]==1) { ?>
                            <a title="<?php echo 'Seleccionar '.$menu.'('.$submenu1.')'; ?>" onclick="$.ajax({ type: 'POST', url: 'adminarse.php', ajaxSend: $('#consultartd<?php echo $idSubMenuP; ?>').html(cargando),
                            data: 'Nv=3&fun=<?php echo $buscart; ?>&idsubmenupp=<?php echo $idSubMenuP; ?>&accC=<?php echo $accC; ?>&permiso=1&submenu=<?php echo $submenuID; ?>&menus=<?php echo $idmenus; ?>&idperfil=<?php echo $_POST[idperfil]; ?>',
                            success: function(html) { $('#consultartd<?php echo $idSubMenuP; ?>').html(html); $('#thebutton').click(); },
                            error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
                            });  return false;" href="javascript: void(0);">
                            <img src="images/<?php echo $psubMenu1; ?>" style="width: 20px;margin-left: 5px;" border="0">
                            </a>
                            <?php
                            }else{ ?>
                                <img src="images/<?php echo $psubMenu1; ?>" style="width: 20px;margin-left: 5px;" border="0">
                                <?php
                            } ?>
                        </td>
                        <td id="insertartd<?php echo $idSubMenuP; ?>" class="CeldaRecojeDatos" height="20">
                            <?php
                            if ($datas[Cs]==1 AND $datas[Int]==1 AND $datas[Eli]==1 AND $datas[Mod]==1) { ?>
                        <a title="<?php echo 'Seleccionar '.$menu.'('.$submenu1.')'; ?>" onclick="$.ajax({ type: 'POST', url: 'adminarse.php', ajaxSend: $('#insertartd<?php echo $idSubMenuP; ?>').html(cargando),
                            data: 'Nv=3&fun=<?php echo $buscart; ?>&idsubmenupp=<?php echo $idSubMenuP; ?>&accI=<?php echo $accI; ?>&permiso=1&submenu=<?php echo $submenuID; ?>&menus=<?php echo $idmenus; ?>&idperfil=<?php echo $_POST[idperfil]; ?>',
                            success: function(html) { $('#insertartd<?php echo $idSubMenuP; ?>').html(html); $('#thebutton').click(); },
                            error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
                            });  return false;" href="javascript: void(0);">
                            <img src="images/<?php echo $psubMenu2; ?>" style="width: 20px;margin-left: 5px;" border="0">
                            </a>
				<?php
                            }else{ ?>
                                <img src="images/<?php echo $psubMenu1; ?>" style="width: 20px;margin-left: 5px;" border="0">
                                <?php
                            } ?>
                        </td>
                        <td id="modificartd<?php echo $idSubMenuP; ?>" class="CeldaRecojeDatos" height="20">
                            <?php
                            if ($datas[Cs]==1 AND $datas[Int]==1 AND $datas[Eli]==1 AND $datas[Mod]==1) { ?>
                        <a title="<?php echo 'Seleccionar '.$menu.'('.$submenu1.')'; ?>" onclick="$.ajax({ type: 'POST', url: 'adminarse.php', ajaxSend: $('#modificartd<?php echo $idSubMenuP; ?>').html(cargando),
                            data: 'Nv=3&fun=<?php echo $buscart; ?>&idsubmenupp=<?php echo $idSubMenuP; ?>&accM=<?php echo $accM; ?>&permiso=1&submenu=<?php echo $submenuID; ?>&menus=<?php echo $idmenus; ?>&idperfil=<?php echo $_POST[idperfil]; ?>',
                            success: function(html) { $('#modificartd<?php echo $idSubMenuP; ?>').html(html); $('#thebutton').click(); },
                            error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
                            });  return false;" href="javascript: void(0);">
                            <img src="images/<?php echo $psubMenu3; ?>" style="width: 20px;margin-left: 5px;" border="0">
                            </a>
                            <?php
                            }else{ ?>
                                <img src="images/<?php echo $psubMenu3; ?>" style="width: 20px;margin-left: 5px;" border="0">
                                <?php
                            } ?>
                        </td>
                        <td id="eliminartd<?php echo $idSubMenuP; ?>" class="CeldaRecojeDatos" height="20">
                            <?php
                            if ($datas[Cs]==1 AND $datas[Int]==1 AND $datas[Eli]==1 AND $datas[Mod]==1) { ?>
                        <a title="<?php echo 'Seleccionar '.$menu.'('.$submenu1.')'; ?>" onclick="$.ajax({ type: 'POST', url: 'adminarse.php', ajaxSend: $('#eliminartd<?php echo $idSubMenuP; ?>').html(cargando),
                            data: 'Nv=3&fun=<?php echo $buscart; ?>&idsubmenupp=<?php echo $idSubMenuP; ?>&accE=<?php echo $accE; ?>&permiso=1&submenu=<?php echo $submenuID; ?>&menus=<?php echo $idmenus; ?>&idperfil=<?php echo $_POST[idperfil]; ?>',
                            success: function(html) { $('#eliminartd<?php echo $idSubMenuP; ?>').html(html); $('#thebutton').click(); },
                            error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
                            });  return false;" href="javascript: void(0);">
                            <img src="images/<?php echo $psubMenu4; ?>" style="width: 20px;margin-left: 5px;" border="0">
                            </a>
                            <?php
                            }else{ ?>
                                <img src="images/<?php echo $psubMenu4; ?>" style="width: 20px;margin-left: 5px;" border="0">
                                <?php
                            } ?>
                        </td>
                        <td id="imprimirtd<?php echo $idSubMenuP; ?>" class="CeldaRecojeDatos" height="20">
                             <?php
                            if ($datas[Cs]==1 AND $datas[Int]==1 AND $datas[Eli]==1 AND $datas[Mod]==1) { ?>
                        <a title="<?php echo 'Seleccionar '.$menu.'('.$submenu1.')'; ?>" onclick="$.ajax({ type: 'POST', url: 'adminarse.php', ajaxSend: $('#imprimirtd<?php echo $idSubMenuP; ?>').html(cargando),
                            data: 'Nv=3&fun=<?php echo $buscart; ?>&idsubmenupp=<?php echo $idSubMenuP; ?>&accImp=<?php echo $accImp; ?>&permiso=1&submenu=<?php echo $submenuID; ?>&menus=<?php echo $idmenus; ?>&idperfil=<?php echo $_POST[idperfil]; ?>',
                            success: function(html) { $('#imprimirtd<?php echo $idSubMenuP; ?>').html(html); $('#thebutton').click(); },
                            error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
                            });  return false;" href="javascript: void(0);">
                            <img src="images/<?php echo $psubMenu5; ?>" style="width: 20px;margin-left: 5px;" border="0">
                            </a>
                            <?php
                            }else{ ?>
                                <img src="images/<?php echo $psubMenu5; ?>" style="width: 20px;margin-left: 5px;" border="0">
                                <?php
                            } ?>
                        </td>
                    </tr>
                    <?php
                }
                mysql_free_result($resultxw);
                ?></div><?php
}//No hay mas menus del menuemp
mysql_free_result($resultx);
?> </table>
