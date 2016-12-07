<div style="width: 100%;height: 1500px;overflow: hidden;margin-top: 5%;">
    
    <div class="fondoConsultas" style="color: #333333;background: #FFF;height: auto;overflow: hidden;margin: 10px auto 10px auto;width: 740px;-moz-border-radius: 8px 8px 8px 8px; -webkit-border-radius: 8px 8px 8px 8px; border-radius: 8px 8px 8px 8px;border: 1px solid #DDD;;box-shadow: 0px 0px 8px #C6C6C6;-webkit-box-shadow: 0px 0px 8px #C6C6C6;-moz-box-shadow: 0px 0px 8px #C6C6C6;">
    <div style="background: #F6F6F6;width: 100%;background:url(images/imprimir.jpg) no-repeat;background-size:100%;height: 150px;margin-bottom: 3px;overflow: hidden;color: #5A5A5A;font-size: 14px;text-align: center;font-weight: bold;border: 1px solid #EEE;">
        <a id="cerrarVentana" title="Cerrar la ventana"><div style="font-weight: 800;cursor: pointer;float: right;margin: 0px 7px 6px 0;color: #222222;background: #FFFFFF;padding: 2px 7px 2px 7px;-moz-border-radius: 50px 50px 50px 50px;-webkit-border-radius: 50px 50px 50px 50px;border-radius: 50px 50px 50px 50px;">X</div></a>
        <div style="margin-top: 100px;color: #FFFFFF;font-weight: 800;font-size: 1.600em;">Imprimir Situaciones Academicas y Constancias</div>
    </div>
     <div style="margin: 15px 0 15px 20px;width: 98%;height: auto;color: #5A5A5A;font-size: 16px;">
           <?php
           $resultnivel=mysql_query("select menu,id from menuest where actd='1' and nivel='Estudiante'");
           while($rownivel = mysql_fetch_array($resultnivel)) {
               ?>
               <a target="_blank" href="accion.php?act=2&dmn=<?php echo $rownivel[id]; ?>&bcarrera=<?php echo $_POST[bcarrera]; ?>&sede=<?php echo $_POST[CSede]; ?>&turno=<?php echo $rownivel[Turno]; ?>&Et=Et">
                <div style="float: left;padding: 7px;margin-right: 15px;width: 200px;background: #FAFAFA;border: 1px solid #DDDDDD;margin-bottom: 10px;text-align: center;"><?php echo $rownivel[menu]; ?></div>
               </a>
               <?php
           }
           mysql_free_result($resultnivel);
           ?>
     </div>
    </div>
    
</div>
<script type="text/javascript">
    $("#cerrarVentana").click(function(){
        $('[id^=ventanaVer]').html('');
    });
</script>