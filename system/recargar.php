  <?php
  require('../../includes/conf/auth.php');
  $nivel_acceso='Empleado';
  if ($nivel_acceso!=$_SESSION['usuario_nivel']) {
      header("Location: $redir?error_login=5");
      exit;
  }

  $permiso = $_SESSION['usuario_login'];
  include_once '../../includes/conexion.php';
  include_once('../../includes/conf/general_parameters.php');
  $conexion = new Conexion;
  $conectar = $conexion->obtenerConexionMy();

  if ($nivel_acceso!=$_SESSION['usuario_nivel']) {
      header("Location: ../../index.php?error_login=5");
      exit;
  }
  ?>

  <script type="text/javascript"> var cargando = '<center><img style="margin-top: 10px;height:30px;width:30px;" src="sistema/images/camera-loader.gif" border="0"> Cargando...</center>';</script>
  <?php
  include_once '../../includes/tools.php';
  include_once '../../includes/validation.php';
  include_once 'includes/datospers.php';
  include_once 'includes/menu.php';
  include_once 'includes/mensajes.php';
  include_once 'includes/combos.php';

  $result = exec("set names utf8");
  $cedula = $_SESSION['ci'];
  $permiso    = $_SESSION['usuario_login'];
  $nivel      =$_SESSION['usuario_perfil'];

  $idMenut=$_POST[dmn];
  if ($idMenut=='') {
      $idMenut=$_GET[dmn];
  }
  $idMenutd=$_POST[dmnd];
  if ($idMenutd=='') {
      $idMenutd=$_GET[dmnd];
  }
  $campos="URL";
  $tablas="recargar";
  $consultas="id=$idMenutd";
  $res_ =paraTodos::arrayConsulta($campos, $tablas, $consultas);
  foreach ($res_ as $rownivel) {
      $conexf=$rownivel["URL"];
      $menuPrin=$rownivel["menu"];
  }

  include_once($conexf);

  ?>
