<div id="loading"><img src="<?php echo  $ruta_base; ?>assets-minified/images/spinner/loader-dark.gif" alt="Loading..."></div>
<div id="ventanaVer"></div>
<div id="sb-site">
  <div id="page-wrapper">
    <div id="page-header" class="clearfix">
      <div id="header-logo" class="rm-transition">
        <a href="#" class="tooltip-button hidden-desktop" title="Navigation Menu" id="responsive-open-menu">
          <i class="glyph-icon icon-align-justify"></i>
        </a>
        <span>Sistema GMAS <i class="opacity-80">1.0</i>
        </span>
        <a id="collapse-sidebar" href="#" title="">
          <i class="glyph-icon icon-chevron-left"></i>
        </a>
      </div>
      <!-- #header-logo -->
      <!--<div id="sidebar-search">
      <input type="text" placeholder="Search..." class="autocomplete-input input tooltip-button" data-placement="bottom" title="Type &apos;jav&apos; to see the available tags..." id="" name="">
      <i class="glyph-icon icon-search"></i>
    </div> -->
    <div id="header-right">
      <div class="user-profile dropdown">
        <a href="#" title="" class="user-ico clearfix" data-toggle="dropdown">
          <img width="36" src="<?php echo $FOTO; ?>" alt="">
          <i class="glyph-icon icon-chevron-down"></i>
        </a>
        <div class="dropdown-menu pad0B float-right">
          <div class="box-sm">
            <div class="login-box clearfix">
              <div class="user-img">
                <a href="#" title="" class="change-img">Change photo</a>
                <img src="<?php echo $FOTO; ?>" alt="">
              </div>
              <div class="user-info">
                <span>
                  <?php
                  if (strlen($datosEmp[0][nomemp]) > 17) {
                    echo $empresaNomb = substr($datosEmp[0][nomemp],0,17).'... ';
                  } else {
                    echo $empresaNomb = $datosEmp[0][nomemp];
                  }
                  ?>
                  <i>Perfil</i>
                </span>
                <a href="#" title="">Cambiar Clave</a>
              </div>
            </div>
            <div class="divider"></div>
            <div class="pad5A button-pane button-pane-alt text-center">
              <a href="../../index.php?logaut=1" class="btn display-block font-normal btn-danger">
                <i class="glyph-icon icon-power-off"></i>
                Logout
              </a>
            </div>
          </div>
        </div>
      </div>
      <?php  include_once 'sistema/header_menu.php'; ?>
    </div>
  </div>
  <!-- #page-header -->