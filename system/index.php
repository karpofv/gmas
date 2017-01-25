  <?php
  ini_set('display_errors', false);
  ini_set('display_startup_errors', false);
  // $confInv = $_GET["confInv"];
  //
  //  if ($_SESSION['usuario_nivel'] != 'Empleado') {
  //      header("Location: ../index.php?error_login=5");
  //      exit;
  //  } else {
  //      $permiso = $_SESSION['usuario_login'];
  //  }
  require_once("../includes/layout/head.php");
  require_once '../includes/tools.php';
  require_once '../includes/conexion.php';
  require_once("../includes/conf/auth.php");
  require_once('modelo/class.consultas.php');

  $consultas = new Consultas();
  $consultasPermiso = new paraTodos();
  $filas = $consultas->evaluarCodigo();
  foreach ($filas as $fila) {
      $cod = $fila[Codigo];
  }
  $intento = $_POST[sube] + 1;
  if ($_POST[searchbox]) {
      if ($cod == $_POST[searchbox]) {
          $modifico = "UPDATE usuarios SET Registro='1', Fecha=Now() WHERE Cedula='$_SESSION[ci]'";
          $conexion = new Conexion;
          $conectar = $conexion->obtenerConexionMy();
          $q = $conectar->query($modifico);
          $res_ = $consultasPermiso->arrayConsulta("Nivel", "usuarios", "Cedula=$_SESSION[ci]");
          foreach ($res_ as $rownivelEmp) {
              $_SESSION['usuario_permisos'] = "$rownivelEmp[Nivel]";
              $_SESSION['dmn'] = "351";
              $_SESSION['ver'] = "1";
          }
          header("Location: accion.php");
      } else {
          $mssg = "C&oacute;digo es incorrecto, intentos fallidos: " . $intento;
          if ($intento == 2) {
              $modifico = "UPDATE usuarios SET Codigo='kjfhdk;fjhs;fkjs', Registro='0' WHERE Cedula='$_SESSION[ci]'";
              $sql = $conectar->query($modifico);
              header("Location: ../index.php?error_login=5");
          }
      }
  }
  //$ruta = "http://www.unellez.edu.ve/portal/servicios/siproma/sistema/fotos/" . $_SESSION[ci] . ".jpg";
  $urlexists = paraTodos::url_exists($ruta);
  if ($urlexists == 'true') {
      //$FOTO = "http://www.unellez.edu.ve/portal/servicios/siproma/sistema/fotos/" . $_SESSION[ci] . ".jpg";
  } else {
      $FOTO = "../assets-minified/images/icono_perfil.png";
  }
  ?>

  <body class="loading">
    <div id="wrapper">

      <script type="text/javascript" src="<?php echo $ruta_base; ?>assets-minified/widgets/wow/wow.js"></script>
      <script type="text/javascript">
      /* WOW animations */

      wow = new WOW({
        animateClass: 'animated',
        offset: 100
      });
      wow.init();
      </script><img src="<?php echo $ruta_base; ?>assets-minified/images/fondoadmin.png" class="login-img wow fadeIn" alt="">
      <div class="center-vertical">
        <div class="center-content" id="panel-inicses">
          <div class="col-md-3 center-margin">
            <div class="panel-layout wow bounceInDown">
              <div class="panel-content pad0A">
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <div class="center-content">
                  <div class="center-margin">
                    <div class="panel-layout wow bounceInDown animated" style="visibility: visible; animation-name: bounceInDown;">
                      <div class="panel-content pad0A bg-white">
                        <div class="meta-box meta-box-offset">
                          <img src="<?php echo $FOTO; ?>" alt="" class="img-bordered border-orange img-circle" width="115px" height="115px">
                          <h3 class="meta-heading font-size-16"><?php echo "Bienvenido, "; ?></h3>
                          <h4 class="meta-subheading font-size-13 font-black"><?php echo $_SESSION['usuario_nombre']; ?></h4>
                        </div>
                        <form class="form-inline" method="post" action="index.php" name="login" id="form">
                          <div class="content-box-wrapper pad20A">
                            <div class="form-group">
                              <div class="input-group">
                                <input type="hidden" name="dmn" id="dmn" value="351">
                                <input type="hidden" name="ver" id="ver" value="1">
                                <input type="hidden" name="sube" id="sube" value="<?php echo $intento; ?>">
                                <input type="text" id="searchbox" maxlength="5" name="searchbox" class="form-control" value="<?php echo $cod; ?>">
                                <span class="input-group-btn">
                                  <button class="btn btn-primary" type="submit">
                                    <i class="glyph-icon icon-unlock-alt"></i>
                                  </button>
                                </span>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>
      </div>            <?php if ($mssg != '') {
      ?>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
          <ul class="noty-wrapperr i-am-new" id="noty_top">
            <li class="bg-red" style="cursor: pointer;">
              <div class="noty_bar" id="noty_1145500552142139600">
                <div class="noty_message">
                  <span class="noty_text">
                    <i class="glyph-icon icon-cog mrg5R"></i><?php if ($mssg != '') {
          echo $mssg;
      } ?></span>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="col-sm-4">
          </div>
          <?php

  } ?>
          <link rel="stylesheet" type="text/css" href="<?php echo $ruta_base; ?>assets-minified/demo-widgets.css">
          <script type="text/javascript" src="<?php echo $ruta_base; ?>assets-minified/demo-widgets.js"></script>
          <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
          <script src="<?php echo $ruta_base; ?>assets-minified/js/skel.min.js"></script>
          <script src="<?php echo $ruta_base; ?>assets-minified/js/init.js"></script>
          <?php
          include_once("../includes/layout/foot.php");
          ?>























          <div id="verFotoEmp" style="-moz-border-radius: 120px 120px 120px 120px;-webkit-border-radius: 120px 120px 120px 120px;border-radius: 120px 120px 120px 120px;">
            <img src="<?php
            if (is_file("../arseest/fotos/$cedula_est.jpg")) {
                echo "../arseest/fotos/$cedula_est.jpg";
            } elseif (is_file("../arseest/fotos/$cedula_est.jpeg")) {
                echo "../arseest/fotos/$cedula_est.jpeg";
            } elseif (is_file("../arseest/fotos/$cedula_est.JPG")) {
                echo "../arseest/fotos/$cedula_est.JPG";
            } elseif (is_file("../arseest/fotos/0$cedula_est.jpg")) {
                echo "../arseest/fotos/0$cedula_est.jpg";
            } elseif (is_file("../arseest/fotos/0$cedula_est.JPG")) {
                echo "../arseest/fotos/0$cedula_est.JPG";
            } else {
                if ($sexoc == 'm' or $sexoc == 'M') {
                    echo $ruta_base . 'assets-minified/images/icono_perfil.gif';
                } else {
                    echo $ruta_base . 'assets-minified/images/icono_perfil.gif';
                }
            }
            ?>" border="0" name="Image_Encab" style="height: 200px;-moz-border-radius: 120px 120px 120px 120px;-webkit-border-radius: 120px 120px 120px 120px;border-radius: 120px 120px 120px 120px;">
          </div>
        </div>
        <?php
        include_once("../includes/layout/foot.php");
        ?>
