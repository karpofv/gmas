<div class="col-md-12" style="background-color: #FFF">
        <form class="" onsubmit="$.ajax({
                                            type: 'POST',
                                            url: 'accion.php',
                                            data: {
                                                desde: $('#desde').val(),
                                                hasta: $('#hasta').val(),
                                                ciclo: $('#ciclo').val(),
                                                anual: $('#anual').val(),
                                                periodo: $('#periodo').val(),
                                                observacion: $('#observ').val(),
                                                step: 1,
                                                ver: 2,
                                                dmn: <?php echo $dmn; ?>,
                                            },
                                            success: function (html) {
                                                $('#verContenido').html(html);
                                                $('#tab-entes').css('display', '');
                                                $('#tab-rub').css('display', '');
                                                $('#tab-entes').addClass('active');
                                                $('#tab-datgen').removeClass('active');
                                                $('#step-1').removeClass('active');
                                                $('#step-2').addClass('active');
                                            },
                                            error: function (xhr, msg, excep) {
                                                alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                            }
                                        }); return false" action="javascript: void(0);" method="post">
    <div class="example-box-wrapper">
        <div class="panel-heading bg-yellow"> 
            <a href="#">
                <h4 id="datosgen"><b>Datos Generales</b>
                </h4>
            </a> 
        </div><br>
        
        <div class="row col-lg-12">
            <div class="form-group">
                
                    <div class="col-sm-2 col-md-2">
                        <label>Numero de denuncia</label>
                        <input type="number" id="desde" class="form-control"> 
                    </div>
                    <div class="col-sm-2 col-md-2">
                        <label>Estado</label>
                        <select id="estados" class="form-control">
                            <option value='0'>Estado</option>
                            <?php
                            combos::CombosSelect("1", "0", "id,idCiudad,Estado", 'c_estados', "id", "Estado", "Estado <> ''");
                            ?>
                        </select>
                        <select id="municipio" class="form-control">
                            <option id="0"></option>
                        </select>
                        <select id="parroquia" class="form-control">
                            <option id="0"></option>
                        </select>
                    </div>

                    <div class="col-sm-2 col-md-2">
                        <label>Alimentacion</label>
                        <select id="alimentacion" class="form-control">
                            <option value="#">Seleccione una opcion</option>
                            <?php
                            combos::CombosSelect('1', '0', 'b.id,b.nombre_alimentacion', 'alimentacion b', 'id', 'nombre_alimentacion', 'nombre_alimentacion <> ""');
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <label>Actividad comercial</label>
                        <select id="actividad_comercial" class="form-control">
                            <option>Seleccione una opcion</option>
                            <?php
                            combos::CombosSelect('1', '0', 'a.id,a.nombre_actividad', 'actividad_comercial a', 'id', 'nombre_actividad', 'nombre_actividad <> ""');
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <label>Tipo de operativo</label>
                        <select id="tipoOperativo" class="form-control">
                            <option value="#">Seleccione una opcion</option>
                            <?php
                            combos::CombosSelect('1', '0', 'c.id,c.nombre_operativo', 'operativo c', 'id', 'nombre_operativo', 'nombre_operativo <>""');
                            ?>
                        </select>
                    </div>

            </div>
        </div><br>
    </div>


    <div class="example-box-wrapper">
        <div class="panel-heading bg-yellow"> 
            <a href="#">
                <h4 id="datosgen"><b>Datos del Local</b></h4>
            </a> 
        </div><br>
        <div class="row col-lg-12">
            <div class="col-md-2 col-sm-2">
                <div class="form-group">
                    <strong>RIF</strong>
                    <input type="text" class="form-control" id="exampleInputEmail2" placeholder="">
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                <div class="form-group">

                    <strong>OBJETIVO</strong>
                    <input type="text" class="form-control" id="exampleInputPassword2" placeholder="">
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-group">

                    <strong>DIRECCION</strong>
                    <textarea name="" id="" placeholder="" rows="3" class="form-control textarea-sm"></textarea>

                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                <div class="form-group">

                    <strong>FISCAL</strong>
                    <input type="text" class="form-control" id="exampleInputPassword2" placeholder="">
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                <div class="form-group">

                    <strong>TELEFONO</strong>
                    <input type="text" class="form-control" id="exampleInputPassword2" placeholder="">
                </div>
            </div>
        </div>
    </div>
    <div class="example-box-wrapper">
        <div class="row col-lg-12">
            <div class="col-md-2 col-sm-2">
                <div class="form-group">
                    <strong>N° ACTA DE INICIO</strong>
                    <input type="number" class="form-control" id="exampleInputEmail2" placeholder="" required="Si no posee por favor coloque 0">
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="form-group">
                    <strong>FECHA EMISION DEL ACTA DE INICIO</strong>
                    <input class="form-control" type="date" name="fecemi">
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                <div class="form-group">
                    <strong>FECHA NOTIFICACION</strong>
                    <input class="form-control" type="date" name="fecnoti">
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="form-group">
                    <strong>FECHA DE DENUNCIA</strong>
                    <input  class="form-control"  type="date" name="fecdenu">
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                <div class="form-group">
                    <strong>FECHA DE REPORTE</strong>
                    <input class="form-control" type="date" name="fecrep">
                </div>
            </div>
        </div>
        <br>

        <div class="row col-lg-12">
            <div class="col-md-4 col-sm-4">
                <div class="form-group">
                    <strong>REPORTE</strong>
                    <textarea  class="form-control" id="exampleInputEmail2" placeholder="" ></textarea>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="form-group">
                    <strong>INCIDENCA-INCUMPLIMIENTO</strong>
                    <select name="inc_inc" class="form-control">
                        <option value="incidencia">
                            Incidencia
                        </option>
                        <option value="incumplimiento">
                            Incumplimiento
                        </option>
                        <option value="especulacion">
                            Especulacion
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                <div class="form-group">
                    <strong>BASAMENTO LEGAL</strong>
                    <input class="form-control" type="text" name="baselegal" value="ART ">
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="form-group">
                    <strong>MEDIDA PREVENTIVA APLICADA</strong>
                    <select name="med_prev" class="form-control">
                        <option value="ajuste">
                            AJUSTE INMEDIATO  DE PRECIO 
                        </option>
                    </select>
                </div>
            </div>

        </div>
        <!-- ------------------------------------------------------- -->
        <div class="row col-lg-12">
            <div class="col-md-4 col-sm-4">
                <div class="form-group">
                    <strong>OBSERVACIONES</strong>
                    <textarea  class="form-control" id="exampleInputEmail2" placeholder="" ></textarea>
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                <div class="form-group">
                    <strong>UT</strong>
                    <input class="form-control" type="text" name="ut">
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                <div class="form-group">
                    <strong>Bs.</strong>
                    <input class="form-control" type="text" name="baselegal">
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-group">
                    <strong>REMISION A OTROS ORGANISMOS</strong>
                    <input type="text" name="remision" class="form-control">
                </div>
            </div>
        </div>
        <div class="row col-lg-12">
            <div class="col-md-4 col-sm-4">
                <div class="form-group">
                    <strong>NOMBRE DE LA FISCALIA (CUANDO SE REMITA AL MP)</strong>
                    <input type="text" name="nom_fiscalia" class="form-control">
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="form-group">
                    <strong>DETENIDOS</strong>
                    <textarea  name="detenidos" class="form-control" id="exampleInputEmail2" placeholder="" ></textarea>
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                <div class="form-group">
                    <strong>ENVIADO A CARACAS</strong>
                    <input class="form-control" type="text" name="baselegal">
                </div>
            </div>
        </div>

    </div>
    <div class="row col-lg-12">
        <button class="form-control" type="submit" >Guardar Registro</button>
    </div>
       </form>
</div>

    <script>


        $("#tab-rub").css("display", "none");
        //$("#tab-analisis").css("display", "none");
        $("#tab-entes").css("display", "none");
        localStorage.setItem("count", "0");
        var count = localStorage.getItem('count');
        //+---------------------------------------------
        //Busca los municioios dependiendo del estado
        //-----------------------------------------------       
        $("#estados").change(function () {
            $.ajax({
                type: 'POST',
                url: 'accion.php',
                data: {
                    opcion: 'aggmunicipio',
                    estado: $('#estados').val(),
                    ver: 1,
                    dmn: 352
                },
                success: function (html) {
                    $('#municipio').html("<option value='0'>Seleccione un Municipio</option>" + html);
                },
                error: function (xhr, msg, excep) {
                    alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                }
            });
            return false
        });

        //+---------------------------------------------
        //Busca las parroquias dependiendo del municipio
        //-----------------------------------------------       
        $("#municipio").change(function () {
            $.ajax({
                type: 'POST',
                url: 'accion.php',
                data: {
                    opcion: 'aggparroquia',
                    municipio: $('#municipio').val(),
                    ver: 1,
                    dmn: 352
                },
                success: function (html) {
                    $('#parroquia').html("<option value='0'>Seleccione una parroquia</option>" + html);
                },
                error: function (xhr, msg, excep) {
                    alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                }
            });
            return false
        });
    </script>