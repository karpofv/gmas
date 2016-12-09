  <?php
  error_reporting(E_ALL);
  ini_set('display_errors', true);
  ini_set('display_startup_errors', true);

  require('../includes/conf/auth.php');

  $nivel_acceso='Empleado';
   if ($nivel_acceso!=$_SESSION['usuario_nivel']) {
       header("Location: $redir?error_login=5");
       exit;
   }

  $permiso = $_SESSION['usuario_login'];
  include_once('../includes/conexion.php');


   if ($nivel_acceso!=$_SESSION['usuario_nivel']) {
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
  include_once('modelo/vertice4/class.vertice4.php');



  $consultasMenu = new paraTodos();

  $permiso    =   $_SESSION['usuario_login'];
  $nivel      =   $_SESSION['usuario_permisos'];

  /**
  * Esto trae los datos del empleado
  */

  $cedula=$_SESSION['ci'];
  $sid = session_id($sid);
  //$update=update_sessions();

  $idMenut=$_POST[dmn];

  if ($idMenut=='') {
      $idMenut=$_GET[dmn];
      if ($idMenut=='') {
          $idMenut=$_SESSION[dmn];
      } else {
          $_SESSION[dmn]=$_GET[dmn];
      }
  }

  //$ruta = "http://www.unellez.edu.ve/portal/servicios/siproma/sistema/fotos/".$_SESSION[ci].".jpg";
  //$urlexists = paraTodos::url_exists($ruta);
  //
  if ($urlexists == 'true') {
      //  $FOTO = "http://www.unellez.edu.ve/portal/servicios/siproma/sistema/fotos/".$_SESSION[ci].".jpg";
  } else {
      $FOTO="../assets-minified/images/icono_perfil.png";
  }

  $act=$_POST[act];
  if ($act=='') {
      $act=$_GET[act];
  }
  $res = $consultasMenu->arrayConsulta("S,U,D,I,P", "perfiles_det", "IdPerfil = '$_SESSION[usuario_permisos]' AND SubMenu = '$idMenut'");
  foreach ($res as $arr) {
      $accPermisos=array(S=> $arr[S],U=> $arr[U],I=> $arr[I],D=> $arr[D],P=> $arr[P]);
  }
  if ($_POST[ver]=='' or $_GET[ver]==0) {
      $bMenu='menu_emp_sub';
  }
  if ($_POST[ver]=='2') {
      $bMenu='m_menu_emp_sub_menj';
  }


  $res_ = $consultasMenu->arrayConsulta("Url_1,Url_2,Url_3,Url_4,Url_5,Url_6,Url_7,Url_8,Url_9,Url_10", "$bMenu", "id=$idMenut");

  foreach ($res_ as $rownivel) {
      if ($act=='' or $act=='1') {
          $conexf=$rownivel["Url_1"];
      }
      if ($act=='2') {
          $conexf=$rownivel["Url_2"];
      }
      if ($act=='3') {
          $conexf=$rownivel["Url_3"];
      }
      if ($act=='4') {
          $conexf=$rownivel["Url_4"];
      }
      if ($act=='5') {
          $conexf=$rownivel["Url_5"];
      }
      if ($act=='6') {
          $conexf=$rownivel["Url_6"];
      }
      if ($act=='7') {
          $conexf=$rownivel["Url_7"];
      }
      if ($act=='8') {
          $conexf=$rownivel["Url_8"];
      }
      if ($act=='9') {
          $conexf=$rownivel["Url_9"];
      }
      if ($act=='10') {
          $conexf=$rownivel["Url_10"];
      }
  }
  if ($_POST[ver]=='1' or $_GET[ver]=='1' or $_SESSION[ver]=='1') {
      $res_ = $consultasMenu->arrayConsulta("URL", "recargar", "id=$idMenut");
      foreach ($res_ as $rownivel) {
          $conexf=$rownivel["URL"];
      }
  }
  if ($conexf!='') {
      include_once($conexf);
  }
  ?>
	<script type="text/javascript">    
	 $.ajax({
          type: 'POST',
          url:  'recargar.php', 
          data: '&dmn=354&ver=9&act=2',
          success: function(html) {$('#notif').html(html);}
        });        
	</script>
    <script type="text/javascript">
        var cargando = '<center><img style="margin-top: 10px;height:30px;width:30px;" src="../assets-minified/images/spinner/loader-dark.gif" border="0"> Cargando...</center>';
    </script>
