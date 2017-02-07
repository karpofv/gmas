<link rel="stylesheet" type="text/css" href="<?php echo $ruta_base; ?>assets-minified/widgets/datatable/datatable.css">
<script type="text/javascript" src="<?php echo $ruta_base; ?>assets-minified/widgets/datatable/datatable.js"></script>
<script type="text/javascript" src="<?php echo $ruta_base; ?>assets-minified/widgets/datatable/datatable-bootstrap.js"></script>
<?php
    $codigo =       $_POST[codigo];
    $ci =           $_POST[cedula];
    $nombre =       $_POST[nombre];
    $apellido =     $_POST[apellido];
    $correo =       $_POST[correo];
    $usuario =      $_POST[usuario];
    $pass =         md5($_POST[pass]);
    $idperfil =     $_POST[perfil];
    $editar =       $_POST[editar];
    $borrar =       $_POST[borrar];
    /*GUARDAR*/
    if ($accPermisos['I']==1) {
        if($editar=="" and $borrar=="" and $ci!=""){
            /*Se valida la cedula no se encuentre ya registrada*/
            $validaced = paraTodos::arrayConsultanum("*", "usuarios", "Cedula=$ci");
            if($validaced>0){
                paraTodos::showMsg("Usuario ya registrado", "alert-danger", "6");
                $validaced = null;
            } else {
                /*Se valida el usuario no se encuentre ya registrado*/
                $validausu = paraTodos::arrayConsultanum("*", "usuarios", "Usuarios='$usuario'");
                if($validausu>0){
                    paraTodos::showMsg("Usuario no disponible", "alert-danger", "6");
                    $validausu = null;
                } else {
                    $insertar = paraTodos::arrayInserte("Cedula, Usuario, contrasena, Tipo, Nivel", "usuarios", "$ci, '$usuario', '$pass', 'Empleado', $idperfil");
                    if($insertar){
                        $insertar = paraTodos::arrayInserte("Usuario, cedula, Nombres, Apellidos, correo", "registrados", "'$usuario', $ci, '$nombre', '$apellido', '$correo'");                        
                        paraTodos::showMsg("Usuario registrado", "alert-success", "6");                           
                    }
                }   
            }
        }
    }
    /*MOSTAR Y EDITAR*/
    if($accPermisos['U']==1){
        /*EDITAR*/
        if($editar==1 and $ci!=""){
            /*Se valida la cedula no se encuentre ya registrada*/
            $validaced = paraTodos::arrayConsultanum("*", "usuarios", "Cedula=$ci and id<>$codigo");        
            if($validaced>0){
                paraTodos::showMsg("Usuario ya registrado", "alert-danger", "6");
            } else {
                /*Se valida el usuario no se encuentre ya registrado*/
                $validausu = paraTodos::arrayConsultanum("*", "usuarios", "Usuarios='$usuario' and id<>$codigo");
                if($validausu>0){
                    paraTodos::showMsg("Usuario no disponible", "alert-danger", "6");
                } else {
                    $update = paraTodos::arrayUpdate("Usuario='$usuario', Nivel=$idperfil", "usuarios", "id=$codigo");
                    $update = paraTodos::arrayUpdate("Usuario='$usuario', Nombres='$nombre', Apellidos='$apellido', correo='$correo'", "registrados", "cedula=$ci");                    
                    if($update){
                        paraTodos::showMsg("Modificación exitosa", "alert-success", "6");                           
                    }
                }
            }            
        }                
        /*MOSTRAR*/
        if($editar==1 and $ci==""){
            $consul = paraTodos::arrayConsulta("r.Nombres, r.Apellidos, u.Usuario, r.cedula, r.correo, u.Nivel", "registrados r, usuarios u, perfiles p", "r.cedula=u.Cedula and u.Nivel=p.CodPerfil and u.id=$codigo");
            foreach($consul as $row){
                $ci = $row[cedula];
                $nombre = $row[Nombres];
                $apellido = $row[Apellidos];
                $usuario = $row[Usuario];
                $idperfil = $row[Nivel];
                $correo = $row[correo];
            }
        }
    }
    /*BORRAR*/
    if($accPermisos['D']==1){
        if($borrar==1){            
            $delete = paraTodos::arrayDelete("Cedula=$ci", "usuarios");
            $delete = paraTodos::arrayDelete("cedula=$ci", "registrados");
            if($delete){
                paraTodos::showMsg("Registro eliminado", "alert-success", "6");
            }
        }
    }
?>
<div class="rm-from-production">
    <div class="content-box">
        <h3 class="content-box-header bg-azul">Usuarios</h3>
        <div class="content-box-wrapper">
            <div class="pad10B">
<?php
            if($editar==1){
?>
                <form class="form-horizontal" action="javascript:void(0)" method="post" 
                      onsubmit="$.ajax({ 
                                    type: 'POST',
                                    url: 'accion.php',
                                    data: {
                                        codigo : <?php echo $codigo;?>,
                                        cedula : $('#txtcedula').val(),
                                        nombre : $('#txtnombre').val(),
                                        apellido : $('#txtapellido').val(),
                                        correo : $('#txtcorreo').val(), 
                                        usuario : $('#txtusu').val(),
                                        pass : $('#txtclave').val(),
                                        perfil : $('#idperfil').val(),
                                        dmn: <?php echo $idMenut;?>,
                                        editar : 1
                                    },
                                    success: function(html) {   
                                        $('#verContenido').html(html);
                                    },
                                    error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
                                }); return false">
<?php
                    
            } else {
?>
                <form class="form-horizontal" action="javascript:void(0)" method="post" 
                      onsubmit="$.ajax({ 
                                    type: 'POST',
                                    url: 'accion.php',
                                    data: {
                                        cedula : $('#txtcedula').val(),
                                        nombre : $('#txtnombre').val(),
                                        apellido : $('#txtapellido').val(),
                                        correo : $('#txtcorreo').val(),
                                        usuario : $('#txtusu').val(),
                                        pass : $('#txtclave').val(),
                                        perfil : $('#idperfil').val(),
                                        dmn: <?php echo $idMenut;?>
                                    },
                                    success: function(html) {   
                                        $('#verContenido').html(html);
                                    },
                                    error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
                                }); return false">                    
<?php
                   }
?>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label class="control-label" for="txtcedula">Cédula</label>
                            <input type="number" id="txtcedula" class="form-control" value="<?php echo $ci;?>" min="1" required>
                            <input type="number" id="codigo" class="collapse" value="<?php echo $codigo;?>">
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="control-label" for="txtnombre">Nombres</label>
                            <input type="text" id="txtnombre" class="form-control" value="<?php echo $nombre;?>" required>
                        </div>
                        <div class="col-sm-6">
                            <label class="control-label" for="txtapellido">Apellidos</label>
                            <input type="text" id="txtapellido" class="form-control" value="<?php echo $apellido;?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="control-label" for="txtcorreo">Correo</label>
                            <input type="mail" id="txtcorreo" class="form-control" value="<?php echo $correo;?>" required>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label class="control-label" for="txtusu">Usuario</label>
                            <input type="text" id="txtusu" class="form-control" value="<?php echo $usuario;?>" required>
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label" for="txtclave">Contraseña</label>
                            <input type="password" id="txtclave" class="form-control" value="<?php echo $pass;?>" required>
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label" for="idperfil">Perfil</label>
                            <select class="form-control" id="idperfil">
                                <option>Seleccione un perfil</option>
                                <?php
                                    combos::CombosSelect("1","$idperfil","CodPerfil, Nombre", "perfiles", "CodPerfil", "Nombre", "1=1");
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <br>
                            <button class="btn btn-default bg-azul" type="submit" value="Guardar" id="btnguardar">Guardar</button>
                        </div>
                    </div>                    
                </form>
            </div>            
        </div>
    </div>
</div>
<div class="rm-from-production">
    <div class="content-box">
        <h3 class="content-box-header bg-azul">Usuarios</h3>
        <div class="content-box-wrapper">
            <div class="pad10B">
                <table class="table" id="usuario">
                    <thead>
                        <tr>
                            <th>Cédula</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Usuario</th>
                            <th>Nivel</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $consul = paraTodos::arrayConsulta("u.id, r.Nombres, r.Apellidos, u.Usuario, r.cedula, r.correo, p.Nombre", "registrados r, usuarios u, perfiles p", "r.cedula=u.Cedula and u.Nivel=p.CodPerfil");
                            foreach($consul as $row){
                        ?>
                        <tr>
                            <td><?php echo $row[cedula];?></td>
                            <td><?php echo $row[Nombres];?></td>
                            <td><?php echo $row[Apellidos];?></td>
                            <td><?php echo $row[Usuario];?></td>
                            <td class="text-center"><?php echo $row[Nombre];?></td>
                            <td class="text-center"><a href="javascript::void(0)" onclick="$.ajax({ 
                                    type: 'POST',
                                    url: 'accion.php',
                                    data: {
                                        codigo : <?php echo $row[id];?>,
                                        editar : 1,
                                        dmn: <?php echo $idMenut;?>
                                    },
                                    success: function(html) {   
                                        $('#verContenido').html(html);
                                    },
                                    error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
                                }); return false"><i class="glyph-icon tooltip-button icon-pencil font-green"></i></a></td>
                            <td class="text-center"><a href="javascript::void(0)" onclick="$.ajax({ 
                                    type: 'POST',
                                    url: 'accion.php',
                                    data: {
                                        cedula : <?php echo $row[cedula];?>,
                                        borrar : 1,
                                        dmn: <?php echo $idMenut;?>
                                    },
                                    success: function(html) {   
                                        $('#verContenido').html(html);
                                    },
                                    error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
                                }); return false"><i class="glyph-icon tooltip-button icon-times font-red"></i></a></td>
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
<script>
    $(document).ready(function () {
        $('#usuario').DataTable();
    });
</script>