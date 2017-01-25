<div id="page-sidebar" class="rm-transition fade">
    <div id="page-sidebar-wrapper">
        <div id="sidebar-top">
            <ul class="nav nav-pills nav-justified">
                <li class="active"><a href="#tab-example-1" data-toggle="tab"><i class="glyph-icon icon-users"></i></a></li>
                <li><a href="#tab-example-2" data-toggle="tab"><i class="glyph-icon icon-bell"></i></a></li>
                <li><a href="#tab-example-3" data-toggle="tab"><span class="small-badge bg-red"></span><i class="glyph-icon icon-bar-chart-o"></i></a></li>
                <li><a href="#tab-example-4" data-toggle="tab"><i class="glyph-icon icon-cogs"></i></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane clearfix fade active in " id="tab-example-1">
                    <div class="user-profile-sm clearfix">
                        <img width="45" class="img-rounded" src="<?php echo $FOTO; ?>" alt="">
                        <div class="user-welcome">
                            Bienvenido a,
                            <b><?php 
                            if (strlen($datosEmp[0][nomemp]) > 17) {
                    			echo $empresaNomb = substr($datosEmp[0][nomemp],0,17).'... ';
                  		} else {
                    			echo $empresaNomb = $datosEmp[0][nomemp];
                  		}
                            ?></b>
                        </div>
                        <a href="#" title="" class="btn btn-sm btn-black-opacity-alt">
                            <i class="glyph-icon icon-cog"></i>
                        </a>
                    </div>

                </div>
                <div class="tab-pane clearfix fade" id="tab-example-2">
                    <ul class="notifications-box notifications-box-alt">
                        <li>
                            <span class="bg-purple icon-notification glyph-icon icon-users"></span>
                            <span class="notification-text">This is an error notification</span>
                            <div class="notification-time">
                                a few seconds ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                            <a href="#" class="notification-btn btn btn-xs btn-black tooltip-button" data-placement="right" title="View details">
                                <i class="glyph-icon icon-arrow-right"></i>
                            </a>
                        </li>
                        <li>
                            <span class="bg-warning icon-notification glyph-icon icon-ticket"></span>
                            <span class="notification-text">This is a warning notification</span>
                            <div class="notification-time">
                                <b>15</b> minutes ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                            <a href="#" class="notification-btn btn btn-xs btn-black tooltip-button" data-placement="right" title="View details">
                                <i class="glyph-icon icon-arrow-right"></i>
                            </a>
                        </li>
                        <li>
                            <span class="bg-green icon-notification glyph-icon icon-random"></span>
                            <span class="notification-text font-green">A success message example.</span>
                            <div class="notification-time">
                                <b>2 hours</b> ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                            <a href="#" class="notification-btn btn btn-xs btn-black tooltip-button" data-placement="right" title="View details">
                                <i class="glyph-icon icon-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane clearfix fade" id="tab-example-3">
                    <div class="info-box remove-border">
                        <div class="chart-icon">
                            <div class="infobox-sparkline"></div>
                        </div>
                        <b>Exchange rate</b>
                        <span class="stats">
                            <i class="glyph-icon icon-chevron-down font-red"></i>
                            43.79
                            <span class="font-green">+0.9</span>
                        </span>
                    </div>
                </div>
                <div class="tab-pane clearfix fade" id="tab-example-4">
                    <div class="complete-user-profile">
                        <h4>Complete your profile</h4>
                        <div class="progressbar-small progressbar" data-value="75">
                            <div class="progressbar-value bg-azure tooltip-button" title="" data-original-title="45%"></div>
                        </div>
                        <b>Next step:</b> <a href="#" title="Verify identity">Verify identity</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- #sidebar-menu -->
        <div class="divider"></div>
        <?php include_once 'sistema/opcion_perfil_der.php'; ?>
    </div>
    <!-- #page-sidebar-wrapper -->
</div>
<!-- #page-sidebar -->
<div id="page-sidebar" class="rm-transition">
    <div id="page-sidebar-wrapper">
        <?php include_once 'sistema/opcion_perfil_tab.php'; ?>
            <!-- #sidebar-menu -->

            <div class="divider"></div>
            <?php include_once 'sistema/opcion_perfil_der.php'; ?>
    </div>
    <!-- #page-sidebar-wrapper -->
</div>
<!-- #page-sidebar -->