<?php
error_reporting(E_ALL);
ini_set('display_errors', false);
ini_set('display_startup_errors', false);
require('../includes/conf/auth.php');
$nivel_acceso = 'Empleado';
if ($nivel_acceso != $_SESSION['usuario_nivel']) {
    header("Location: $redir?error_login=5");
    exit;
}

$permiso = $_SESSION['usuario_login'];
include_once ('../includes/conexion.php');
include_once ('../includes/chat.php');
//include_once('../includes/conf/general_parameters.php');
//conectar();
if ($nivel_acceso != $_SESSION['usuario_nivel']) {
    header("Location: ../index.php?error_login=5");
    exit;
}

  include_once '../includes/conexion.php';
  include_once '../includes/tools.php';
  include_once '../includes/validation.php';
  include_once('modelo/menu/class.menu.php');
  include_once('modelo/class.establecimiento.php');
  include_once('modelo/class.inspecciones.php');
  include_once '../includes/combos.php';

$consultasMenu = new paraTodos();

//$result=mysql_query("set names utf8");
$permiso = $_SESSION['usuario_login'];
$nivel = $_SESSION['usuario_permisos'];

/**
 * Esto trae los datos del empleado
 */
if ($_SESSION['tipoCliente'] == '1') {
    $cedula = $_SESSION['ci'];
    $datosEmp = DatosPersonales::datosEmpleado($cedula);
    $datosDep = DatosPersonales::datosDep($cedula);
}
if ($_SESSION['tipoCliente'] == '2') {
    $cedula = $_SESSION['usuario_cedu'];
    $datosEmp = DatosClinicas::datoslaClinicas($cedula);
}
$sid = session_id($sid);

$update = update_sessions();
//$consultasMenu->arrayInserte("time, sid, username, status, Cedula","chat_sessions","'time()', '$sid', '$permiso', '1', '$cedula'");

$idMenut = $_POST[dmn];
if ($idMenut == '') {
    $idMenut = $_GET[dmn];
    if ($idMenut == '') {
        $idMenut = $_SESSION[dmn];
    } else {
        $_SESSION[dmn] = $_GET[dmn];
    }
}
$ruta = "http://www.unellez.edu.ve/portal/servicios/siproma/sistema/fotos/" . $_SESSION[ci] . ".jpg";
$urlexists = paraTodos::url_exists($ruta);
if ($urlexists == 'true') {
    $FOTO = "http://www.unellez.edu.ve/portal/servicios/siproma/sistema/fotos/" . $_SESSION[ci] . ".jpg";
} else {
    $FOTO = "../assets-minified/images/icono_perfil.png";
}
$act = $_POST[act];
if ($act == '') {
    $act = $_GET[act];
}

$res = $consultasMenu->arrayConsulta("S,U,D,I,P", "perfiles_det", "IdPerfil = '$_SESSION[usuario_permisos]' AND SubMenu = '$idMenut'");
foreach ($res as $arr) {
    $accPermisos = array(Consultar => $arr[S], Actualizar => $arr[U], Insertar => $arr[I], Eliminar => $arr[D], Imprimir => $arr[P]);
}
if ($_POST[ver] == '' or $_GET[ver] == 0) {
    $bMenu = 'menu_emp_sub';
}
if ($_POST[ver] == '1' or $_GET[ver] == '1' or $_SESSION[ver] == '1') {
    $res_ = $consultasMenu->arrayConsulta("URL", "recargar", "id=$idMenut");
    foreach ($res_ as $rownivel) {
        $conexf = $rownivel["URL"];
    }
}
if ($_POST[ver] == '2' or $_GET[ver] == 2) {
    $bMenu = 'm_menu_emp_sub_menj';
}
if ($_POST[ver] == '9' or $_GET[ver] == 9) {
    $bMenu = 'recargar';
}


$res_ = $consultasMenu->arrayConsulta("Url_1,Url_2,Url_3,Url_4,Url_5,Url_6,Url_7,Url_8,Url_9,Url_10", "$bMenu", "id=$idMenut");
//echo "<br><br><br><br><br><br><br><br><br><br>//$idMenut//$bMenu<br>$res_ ";
foreach ($res_ as $rownivel) {
    //echo "<br><br><br><br><br><br><br><br><br><br>//$idMenut//$bMenu";
    if ($act == '' Or $act == '1') {
        $conexf = $rownivel["Url_1"];
    }
    if ($act == '2') {
        $conexf = $rownivel["Url_2"];
    }
    if ($act == '3') {
        $conexf = $rownivel["Url_3"];
    }
    if ($act == '4') {
        $conexf = $rownivel["Url_4"];
    }
    if ($act == '5') {
        $conexf = $rownivel["Url_5"];
    }
    if ($act == '6') {
        $conexf = $rownivel["Url_6"];
    }
    if ($act == '7') {
        $conexf = $rownivel["Url_7"];
    }
    if ($act == '8') {
        $conexf = $rownivel["Url_8"];
    }
    if ($act == '9') {
        $conexf = $rownivel["Url_9"];
    }
    if ($act == '10') {
        $conexf = $rownivel["Url_10"];
    }
}
if ($conexf != '') {
    include_once ($conexf);	
}
@mysql_close();

?>
<script type="text/javascript">
    var cargando = '<center><img style="margin-top: 10px;height:30px;width:30px;" src="../assets-minified/images/spinner/loader-dark.gif" border="0"> Cargando...</center>';
</script>
