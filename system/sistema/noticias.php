<!DOCTYPE html> 
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title> Sistem-DUX </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Favicons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets-minified/images/icons/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets-minified/images/icons/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets-minified/images/icons/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets-minified/images/icons/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets-minified/images/icons/favicon.png">
    <!-- JS Core -->
    <script type="text/javascript" src="assets-minified/js-core.js"></script>
    <script type="text/javascript">
        $(window).load(function(){
            setTimeout(function() {
                $('#loading').fadeOut( 400, "linear" );
            }, 300);
        });
    </script>
    <style>
        #loading {position: fixed;width: 100%;height: 100%;left: 0;top: 0;right: 0;bottom: 0;display: block;background: #fff;z-index: 10000;}
        #loading img {position: absolute;top: 50%;left: 50%;margin: -23px 0 0 -23px;}
    </style>
    <!-- HELPERS -->
<link rel="stylesheet" type="text/css" href="assets-minified/helpers/helpers-all.css">
<!-- ELEMENTS -->
<link rel="stylesheet" type="text/css" href="assets-minified/elements/elements-all.css">
<!-- Icons -->
<link rel="stylesheet" type="text/css" href="assets-minified/icons/fontawesome/fontawesome.css">
<link rel="stylesheet" type="text/css" href="assets-minified/icons/linecons/linecons.css">
<!-- SNIPPETS -->
<link rel="stylesheet" type="text/css" href="assets-minified/snippets/snippets-all.css">
<!-- APPLICATIONS -->
<link rel="stylesheet" type="text/css" href="assets-minified/applications/mailbox.css">
<!-- Admin Theme -->
<link rel="stylesheet" type="text/css" href="assets-minified/themes/supina/layout.css">
<link id="layout-color" rel="stylesheet" type="text/css" href="assets-minified/themes/supina/default/layout-color.css">
<link id="framework-color" rel="stylesheet" type="text/css" href="assets-minified/themes/supina/default/framework-color.css">
<link rel="stylesheet" type="text/css" href="assets-minified/themes/supina/border-radius.css">
<!-- Color Helpers CSS -->
<link rel="stylesheet" type="text/css" href="assets-minified/helpers/colors.css">

</head>
<?php
if (is_file("../estmovil/apps/portadas/$cedula_est.jpg")) {
    $PORTADA= "../estmovil/apps/portadas/$cedula_est.jpg";
} elseif (is_file("../estmovil/apps/portadas/$cedula_est.jpeg")) {
                    $PORTADA= "../estmovil/apps/portadas/$cedula_est.jpeg";
            } elseif (is_file("../estmovil/apps/portadas/$cedula_est.JPG")) {
                    $PORTADA= "../estmovil/apps/portadas/$cedula_est.JPG";
            } elseif (is_file("../estmovil/apps/portadas/0$cedula_est.jpg")) {
                    $PORTADA= "../estmovil/apps/portadas/0$cedula_est.jpg";
            } elseif (is_file("../estmovil/apps/portadas/0$cedula_est.JPG")) {
                    $PORTADA= "../estmovil/apps/portadas/0$cedula_est.JPG";
            } else {

       $PORTADA= 'images/slide1.jpg';

}
if (is_file("../estmovil/apps/fotos/$cedula_est.jpg")) {
    $FOTO= "../estmovil/apps/fotos/$cedula_est.jpg";
} elseif (is_file("../estmovil/apps/fotos/$cedula_est.jpeg")) {
        $FOTO= "../estmovil/apps/fotos/$cedula_est.jpeg";
} elseif (is_file("../estmovil/apps/fotos/$cedula_est.JPG")) {
        $FOTO= "../estmovil/apps/fotos/$cedula_est.JPG";
} elseif (is_file("../estmovil/apps/fotos/0$cedula_est.jpg")) {
        $FOTO= "../estmovil/apps/fotos/0$cedula_est.jpg";
} elseif (is_file("../estmovil/apps/fotos/0$cedula_est.JPG")) {
        $FOTO= "../estmovil/apps/fotos/0$cedula_est.JPG";
} else {
    $FOTO= 'images/icono_perfil.gif';
} ?>
<body>
    <div id="loading"><img src="assets-minified/images/spinner/loader-dark.gif" alt="Loading..."></div>
    <div id="ventanaVer" style="background:url(images/fondoventana.png) no-repeat;background-size:100%;height: 100%;position: fixed;margin: auto auto auto;width: 100%;z-index: 9000;height: auto;"></div>
    <div id="sb-site">
    <div id="page-wrapper">

    <div id="page-header" class="clearfix" style="background: url('<?php echo "images/fondoheader.png"; ?>') center center no-repeat;background-size: cover;">
    <div id="header-logo" class="rm-transition">
        <a href="#" class="tooltip-button hidden-desktop" title="Navigation Menu" id="responsive-open-menu">
            <i class="glyph-icon icon-align-justify"></i>
        </a>
        <span>Sistema DUX <i class="opacity-80">1.4</i>
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
                                if (strlen($datosEst[Nombres].', '.$datosEst[Apellidos]) > 17) {
                                  echo $empresaNomb = substr($datosEst[Nombres].', '.$datosEst[Apellidos],0,17).'... ';
                                } else {
                                  echo $empresaNomb = $datosEst[Nombres].', '.$datosEst[Apellidos];
                                }
                                ?>
                                <i>Perfil Estudiante</i>
                            </span>
                            <a href="#" title="">Ir a Mi Profile</a>
                            <a href="#" title="">Cambiar Clave</a>
                        </div>
                    </div>
                    <div class="divider"></div>                    
                    <div class="pad5A button-pane button-pane-alt text-center">
                        <a href="../../aut_logout.php" class="btn display-block font-normal btn-danger">
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

<div id="page-sidebar" class="rm-transition">
    <div id="page-sidebar-wrapper">
        <div id="sidebar-top">
            <ul class="nav nav-pills nav-justified">
                <li class="active"><a href="#tab-example-1" data-toggle="tab"><i class="glyph-icon icon-users"></i></a></li>
                <li><a href="#tab-example-2" data-toggle="tab"><i class="glyph-icon icon-bell"></i></a></li>
                <li><a href="#tab-example-3" data-toggle="tab"><span class="small-badge bg-red"></span><i class="glyph-icon icon-bar-chart-o"></i></a></li>
                <li><a href="#tab-example-4" data-toggle="tab"><i class="glyph-icon icon-cogs"></i></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane clearfix fade active in" id="tab-example-1">

                    <div class="user-profile-sm clearfix">
                        <img width="45" class="img-rounded" src="<?php echo $FOTO; ?>" alt="">
                        <div class="user-welcome">
                            Bienvenido a DUX,
                            <b><?php 
                            if (strlen($datosEst[Nombres].', '.$datosEst[Apellidos]) > 15) {
                              echo $empresaNomb = substr($datosEst[Nombres].', '.$datosEst[Apellidos],0,15).'... ';
                            } else {
                              echo $empresaNomb = $datosEst[Nombres].', '.$datosEst[Apellidos];
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
    </div><!-- #page-sidebar-wrapper -->
</div><!-- #page-sidebar -->

<div id="page-content-wrapper" class="rm-transition">

    <!-- #page-nav -->

                    

<!-- xCharts charts -->

<link rel="stylesheet" type="text/css" href="assets-minified/widgets/charts/xcharts/xcharts.css">
<script type="text/javascript" src="assets-minified/js-core/d3.js"></script>
<script type="text/javascript" src="assets-minified/widgets/charts/xcharts/xcharts.js"></script>

<script type="text/javascript">
    $(function(){
        $('body').addClass('sidebar-collapsed');
    });
</script>

<div id="page-content" style="background: #fff;margin: -75px 0px 0px -20px;">

<div class="row" style="margin-top: 0px;">
    <div class="col-lg-12" style="margin-top: 0px;">
        <div class="panel-layout">
            <div class="panel-box">

                <div class="panel-content bg-white" style="background: url('<?php echo $PORTADA; ?>') center center no-repeat;height: 380px;background-size: cover;">

                    <div class="" style="margin-top: 10%;">
                        <img src="<?php echo $FOTO; ?>" alt="" style="width: 105px;height: 105px;" class="img-bordered border-red img-circle mrg10B">
                        <h5 class="font-bold" style="width: 40%;margin: 0px auto 0px auto;padding: 7px;background: url('<?php echo "images/fondoheader.png"; ?>') center center no-repeat;background-size: cover;"><?php echo $datosEst[Nombres].', '.$datosEst[Apellidos]; ?></h5>
                    </div>

                </div>
                <div class="panel-content pad15A bg-white" style="text-align: left;background: url('images/barra1.png') left repeat-x;">
                    <div style="color: #FFFFFF;font-weight: 800;font-size: 1.400em;">Noticias</div>
                </div>

            </div>
        </div>
    </div>
    <div id="verContenido">
    <div class="col-lg-12">

        <?php
        $resultxp=mysql_query("select * from mensajes where ((mensaje='Todos') and (destino='$nivel'))");
        while($rowp = mysql_fetch_array($resultxp)) {
            $conex= $rowp["id"];
            $titulo= $rowp["titulo"];
            ?>
            <div style="height: auto;width: 900px;margin: 5px auto 5px auto;">
            <div style="height: auto;width: 900px;margin:6px;background: #FFFFFF;border: 1px solid #EEEEEE;">
                <div style="height: auto;padding: 5px;width: 98.7%;background: #FAFAFA;border: 1px solid #DDDDDD;font-weight: 700;"><? printf("%s",$titulo);?></div><?php
                $resultnivel=mysql_query("select * from mensajespub where (conex='$conex')");
                while($rownivel = mysql_fetch_array($resultnivel)) {
                    ?><div style="height: auto;width: 98%;background: #FFFFFF;padding: 8px 5px 15px 5px;"> <?php echo $rownivel["mensajep"]; ?></div> <?php
                }
                mysql_free_result($resultnivel);
                ?>
            </div>
            </div>
            <?php
        }
        mysql_free_result($resultxp);
        ?>

    </div>  
    
    </div>
</div>


</div><!-- #page-content -->

<script type="text/javascript">

    $(function () {

        var tt = document.createElement('div'),
                leftOffset = -(~~$('html').css('padding-left').replace('px', '') + ~~$('body').css('margin-left').replace('px', '')),
                topOffset = -32;
        tt.className = 'tooltip top fade in';
        document.body.appendChild(tt);

        var data = [{"xScale":"ordinal","comp":[],"main":[{"className":".main.l1","data":[{"y":15,"x":"2012-11-19T00:00:00"},{"y":11,"x":"2012-11-20T00:00:00"},{"y":8,"x":"2012-11-21T00:00:00"},{"y":10,"x":"2012-11-22T00:00:00"},{"y":1,"x":"2012-11-23T00:00:00"},{"y":6,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]},{"className":".main.l2","data":[{"y":29,"x":"2012-11-19T00:00:00"},{"y":33,"x":"2012-11-20T00:00:00"},{"y":13,"x":"2012-11-21T00:00:00"},{"y":16,"x":"2012-11-22T00:00:00"},{"y":7,"x":"2012-11-23T00:00:00"},{"y":18,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]}],"type":"line-dotted","yScale":"linear"},{"xScale":"ordinal","comp":[],"main":[{"className":".main.l1","data":[{"y":12,"x":"2012-11-19T00:00:00"},{"y":18,"x":"2012-11-20T00:00:00"},{"y":8,"x":"2012-11-21T00:00:00"},{"y":7,"x":"2012-11-22T00:00:00"},{"y":6,"x":"2012-11-23T00:00:00"},{"y":12,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]},{"className":".main.l2","data":[{"y":29,"x":"2012-11-19T00:00:00"},{"y":33,"x":"2012-11-20T00:00:00"},{"y":13,"x":"2012-11-21T00:00:00"},{"y":16,"x":"2012-11-22T00:00:00"},{"y":7,"x":"2012-11-23T00:00:00"},{"y":18,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]}],"type":"cumulative","yScale":"linear"},{"xScale":"ordinal","comp":[],"main":[{"className":".main.l1","data":[{"y":12,"x":"2012-11-19T00:00:00"},{"y":18,"x":"2012-11-20T00:00:00"},{"y":8,"x":"2012-11-21T00:00:00"},{"y":7,"x":"2012-11-22T00:00:00"},{"y":6,"x":"2012-11-23T00:00:00"},{"y":12,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]},{"className":".main.l2","data":[{"y":29,"x":"2012-11-19T00:00:00"},{"y":33,"x":"2012-11-20T00:00:00"},{"y":13,"x":"2012-11-21T00:00:00"},{"y":16,"x":"2012-11-22T00:00:00"},{"y":7,"x":"2012-11-23T00:00:00"},{"y":18,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]}],"type":"bar","yScale":"linear"}];
        var order = [0, 1, 0, 2],
                i = 0,
                xFormat = d3.time.format('%A'),
                chart = new xChart('line-dotted', data[order[i]], '#chart-example', {
                    axisPaddingTop: 5,
                    dataFormatX: function (x) {
                        return new Date(x);
                    },
                    tickFormatX: function (x) {
                        return xFormat(x);
                    },
                    mouseover: function (d, i) {
                        var pos = $(this).offset();
                        $(tt).html('<div class="arrow"></div><div class="tooltip-inner">'+d3.time.format('%A')(d.x) + ': ' + d.y+'</div>')
                                .css({top: topOffset + pos.top, left: pos.left + leftOffset})
                                .show();
                    },
                    mouseout: function (x) {
                        $(tt).hide();
                    },
                    timing: 1250
                }),
                rotateTimer,
                toggles = d3.selectAll('#upd-chart a'),
                t = 3500;

        function updateChart(i) {
            var d = data[i];
            chart.setData(d);
            toggles.classed('active', function () {
                return (d3.select(this).attr('data-type') === d.type);
            });
            return d;
        }

        toggles.on('click', function (d, i) {
            clearTimeout(rotateTimer);
            updateChart(i);
        });

        function rotateChart() {
            i += 1;
            i = (i >= order.length) ? 0 : i;
            var d = updateChart(order[i]);
            rotateTimer = setTimeout(rotateChart, t);
        }
        rotateTimer = setTimeout(rotateChart, t);
    }());
</script>

                </div><!-- #page-content-wrapper -->
            </div><!-- #page-wrapper -->

        </div><!-- #sb-site -->

        
<div class="sb-slidebar sb-left sb-style-overlay">
    <div class="scrollable-content scrollable-nice">
        <div class="divider-header">Online</div>
        <ul class="chat-box">
            <li>
                <div class="status-badge">
                    <img class="img-circle" width="40" src="assets-minified/dummy-images/people/testimonial1.jpg" alt="">
                    <div class="small-badge bg-green"></div>
                </div>
                <b>
                    Grace Padilla
                </b>
                <p>On the other hand, we denounce...</p>
                <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
            </li>
            <li>
                <div class="status-badge">
                    <img class="img-circle" width="40" src="assets-minified/dummy-images/people/testimonial2.jpg" alt="">
                    <div class="small-badge bg-green"></div>
                </div>
                <b>
                    Carl Gamble
                </b>
                <p>Dislike men who are so beguiled...</p>
                <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
            </li>
            <li>
                <div class="status-badge">
                    <img class="img-circle" width="40" src="assets-minified/dummy-images/people/testimonial3.jpg" alt="">
                    <div class="small-badge bg-green"></div>
                </div>
                <b>
                    Michael Poole
                </b>
                <p>Of pleasure of the moment, so...</p>
                <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
            </li>
            <li>
                <div class="status-badge">
                    <img class="img-circle" width="40" src="assets-minified/dummy-images/people/testimonial4.jpg" alt="">
                    <div class="small-badge bg-green"></div>
                </div>
                <b>
                    Bill Green
                </b>
                <p>That they cannot foresee the...</p>
                <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
            </li>
            <li>
                <div class="status-badge">
                    <img class="img-circle" width="40" src="assets-minified/dummy-images/people/testimonial5.jpg" alt="">
                    <div class="small-badge bg-green"></div>
                </div>
                <b>
                    Cheryl Soucy
                </b>
                <p>Pain and trouble that are bound...</p>
                <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
            </li>
        </ul>
        <div class="divider-header">Idle</div>
        <ul class="chat-box">
            <li>
                <div class="status-badge">
                    <img class="img-circle" width="40" src="assets-minified/dummy-images/people/testimonial6.jpg" alt="">
                    <div class="small-badge bg-orange"></div>
                </div>
                <b>
                    Jose Kramer
                </b>
                <p>Equal blame belongs to those...</p>
                <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
            </li>
            <li>
                <div class="status-badge">
                    <img class="img-circle" width="40" src="assets-minified/dummy-images/people/testimonial7.jpg" alt="">
                    <div class="small-badge bg-orange"></div>
                </div>
                <b>
                    Dan Garcia
                </b>
                <p>Weakness of will, which is same...</p>
                <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
            </li>
            <li>
                <div class="status-badge">
                    <img class="img-circle" width="40" src="assets-minified/dummy-images/people/testimonial8.jpg" alt="">
                    <div class="small-badge bg-orange"></div>
                </div>
                <b>
                    Edward Bridges
                </b>
                <p>These cases are perfectly simple...</p>
                <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
            </li>
        </ul>
        <div class="divider-header">Offline</div>
        <ul class="chat-box">
            <li>
                <div class="status-badge">
                    <img class="img-circle" width="40" src="assets-minified/dummy-images/people/testimonial1.jpg" alt="">
                    <div class="small-badge bg-red"></div>
                </div>
                <b>
                    Randy Herod
                </b>
                <p>In a free hour, when our power...</p>
                <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
            </li>
            <li>
                <div class="status-badge">
                    <img class="img-circle" width="40" src="assets-minified/dummy-images/people/testimonial2.jpg" alt="">
                    <div class="small-badge bg-red"></div>
                </div>
                <b>
                    Patricia Bagley
                </b>
                <p>when nothing prevents our being...</p>
                <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
            </li>
        </ul>
    </div>
</div>

<?php  include_once 'sistema/opcion_opciones_izq.php'; ?>



    <!-- WIDGETS -->



    <!-- WIDGETS -->

    <!-- Bootstrap Dropdown -->

    <link rel="stylesheet" type="text/css" href="assets-minified/widgets/dropdown/dropdown.css">
    <script type="text/javascript" src="assets-minified/widgets/dropdown/dropdown.js"></script>

    <!-- PieGage charts -->

    <link rel="stylesheet" type="text/css" href="assets-minified/widgets/charts/piegage/piegage.css">
    <script type="text/javascript" src="assets-minified/widgets/charts/piegage/piegage.js"></script>
    <script type="text/javascript" src="assets-minified/widgets/charts/piegage/piegage-demo.js"></script>

    <!-- Bootstrap Tooltip -->

    <link rel="stylesheet" type="text/css" href="assets-minified/widgets/tooltip/tooltip.css">
    <script type="text/javascript" src="assets-minified/widgets/tooltip/tooltip.js"></script>

    <!-- Bootstrap Popover -->

    <link rel="stylesheet" type="text/css" href="assets-minified/widgets/popover/popover.css">
    <script type="text/javascript" src="assets-minified/widgets/popover/popover.js"></script>


    <!-- Bootstrap Buttons -->

    <script type="text/javascript" src="assets-minified/widgets/button/button.js"></script>

    <!-- Bootstrap Collapse -->

    <script type="text/javascript" src="assets-minified/widgets/collapse/collapse.js"></script>

    <!-- Bootstrap Progress Bar -->

    <link rel="stylesheet" type="text/css" href="assets-minified/widgets/progressbar/progressbar.css">
    <script type="text/javascript" src="assets-minified/widgets/progressbar/progressbar.js"></script>

    <!-- Uniform -->

    <link rel="stylesheet" type="text/css" href="assets-minified/widgets/uniform/uniform.css">
    <script type="text/javascript" src="assets-minified/widgets/uniform/uniform.js"></script>

    <!-- Chosen -->

    <link rel="stylesheet" type="text/css" href="assets-minified/widgets/chosen/chosen.css">
    <script type="text/javascript" src="assets-minified/widgets/chosen/chosen.js"></script>

    <!-- Superfish -->

    <script type="text/javascript" src="assets-minified/widgets/superfish/superfish.js"></script>

    <!-- Superclick -->

    <script type="text/javascript" src="assets-minified/widgets/superclick/superclick.js"></script>

    <!-- Nice scroll -->

    <script type="text/javascript" src="assets-minified/widgets/nicescroll/nicescroll.js"></script>

    <!-- Overlay -->

    <script type="text/javascript" src="assets-minified/widgets/overlay/overlay.js"></script>

    <!-- jQueryUI Autocomplete -->

    <script type="text/javascript" src="assets-minified/widgets/autocomplete/autocomplete.js"></script>
    <script type="text/javascript" src="assets-minified/widgets/autocomplete/menu.js"></script>

    <!-- Skycons -->

    <script type="text/javascript" src="assets-minified/widgets/skycons/skycons.js"></script>

    <!-- Content box -->

    <script type="text/javascript" src="assets-minified/widgets/content-box/contentbox.js"></script>

    <!-- Bootstrap Tabs -->

    <script type="text/javascript" src="assets-minified/widgets/tabs/tabs.js"></script>

    <!-- Sparklines charts -->

    <script type="text/javascript" src="assets-minified/widgets/charts/sparklines/sparklines.js"></script>
    <script type="text/javascript" src="assets-minified/widgets/charts/sparklines/sparklines-demo.js"></script>

    <!-- Slidebars -->

    <link rel="stylesheet" type="text/css" href="assets-minified/widgets/slidebars/slidebars.css">
    <script type="text/javascript" src="assets-minified/widgets/slidebars/slidebars.js"></script>

    <!-- Widgets init for demo -->

    <script type="text/javascript" src="assets-minified/widgets-init.js"></script>

    <!-- Theme layout -->

    <script type="text/javascript" src="assets-minified/themes/supina/js/layout.js"></script>






</body>
</html>
