<?php
include_once 'includes/layout/head.php';
require 'includes/conf/general_parameters.php';
ini_set('display_errors', false);
ini_set('display_startup_errors', false);
if ($_GET[logaut] == '1') {
  session_cache_limiter('nocache,private');
  session_name($sess_name);
  session_start();
  $sid = session_id();
  session_destroy();
}
?>
<div class="">
  <div id="banner" class="fondo"></div>
  <div class="center-content">
    <form action="index2.php" id="login-validation" class="col-md-3 center-margin" method="post" enctype="multipart/form-data">
      <!-- notificacion de error -->
      <?php if (isset($_GET['error_login'])) {
        $error = $_GET['error_login']; ?>
        <ul class="noty-wrapper i-am-new" id="noty_bottom">
          <li class="bg-red" style="cursor: pointer;">
            <div class="noty_bar" id="noty_1047669272175724900">
              <div class="noty_message"> <span class="noty_text">
                <i class="glyph-icon icon-cog mrg5R"></i><?php echo $error_login_ms[$error]; ?>
              </span> </div>
            </div>
          </li>
        </ul>
        <?php
      }
      ?>
      <!-- fin notificacion de error -->
      <div id="login-form" class="content-box bg-default">
        <div class="content-box-wrapper pad20A">
          <!--  <img class="mrg25B center-margin radius-all-100 display-block" id="icon_perfil" src="assets/images/icono_perfil.gif" alt="">
        -->
        <br>
        <div class="form-group">
          <div class="input-group"> <span class="input-group-addon addon-inside bg-gray">
            <i class="glyph-icon icon-user"></i>
          </span>
          <input title="Ingrese su Usuario de Acceso" type="text" name="user" id="user" class="form-control" id="exampleInputEmail1" placeholder="Ingresa tu usuario" required="required"> </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon addon-inside bg-gray">
              <i class="glyph-icon icon-unlock-alt"></i>
            </span>
            <input title="Ingrese su Clave de Acceso" type="password" name="pass" id="pass" class="form-control" id="exampleInputPassword1" placeholder="Ingresa tu clave" required="required">
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-block btn-primary">Ingresar</button>
        </div>
        <div class="row">
          <div class="checkbox-primary col-md-6" id="check_remember">
            <label>
              <input type="checkbox" id="loginCheckbox1" class="custom-checkbox"> Recordarme </label>
            </div>
            <div class="text-right col-md-6"> <a href="#" class="switch-button" switch-target="#login-forgot" switch-parent="#login-form" title="Recover password">Recuperar la clave?</a> </div>
          </div>
        </div>
      </div>

      <div id="login-forgot" class="content-box bg-default hide">
        <div class="content-box-wrapper pad20A">
          <div class="form-group">
            <label for="exampleInputEmail2">Ingresa tu correo:</label>
            <div class="input-group"> <span class="input-group-addon addon-inside bg-gray">
              <i class="glyph-icon icon-envelope-o"></i>
            </span>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Ingresa tu correo"> </div>
          </div>
        </div>
        <div class="button-pane text-center">
          <button type="submit" class="btn btn-md btn-primary">Recuperar la clave</button> <a href="#" class="btn btn-md btn-link switch-button" switch-target="#login-form" switch-parent="#login-forgot" title="Cancel">Cancel</a> </div>
        </div>
      </form>
    </div>
  </div>
  <?php
  //include_once("includes/layout/foot.php");
  ?>
