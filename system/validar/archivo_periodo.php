<?php
if ((($conperiod=="20101" and $codig=="EF-540230801") or ($conperiod=="20092" and $codig=="EF-540230801") or ($conperiod=="20101" and $codig=="ED-540220806") or ($conperiod=="20092" and $codig=="ED-540220806") or ($conperiod=="20092" and $codig=="EM-540220806") or ($conperiod=="20101" and $codig=="EM-540220806") or ($conperiod=="20091" and $codig=="EM-540220806") or ($conperiod=="20091" and $codig=="EC-540220806") or ($conperiod=="20092" and $codig=="EC-540220806") or ($conperiod=="20101" and $codig=="EC-v540220806") or ($conperiod=="20091" and $codig=="EI-540220806") or ($conperiod=="20092" and $codig=="EI-540220806") or ($conperiod=="20101" and $codig=="EI-540220806") or ($conperiod=="20092" and $codig=="EA-540220806") or ($conperiod=="20101" and $codig=="EA-540220806") or ($conperiod=="20092" and $codig=="EG-540220806") or ($conperiod=="20101" and $codig=="EG-540220806"))) {
             $resulthi=mysql_query("select Codigo from inscripcion_historica
               where Periodo_Acad='$conperiod' and ConexEst='$est' and CodCar='$bcarrera1' order by id");
                while($rowhi = mysql_fetch_array($resulthi)) {
                    $codigs=$rowhi["Codigo"];
             $resulth=mysql_query("select prelacion,enlace,uc from prelacion
               where codigo='$codigs' order by id");
                while($rowh = mysql_fetch_array($resulth)) {
                            $tieneprelacion="si";
                            $prelac=$rowh["prelacion"];
                            $enlac=$rowh["enlace"];
                            $ucprela=$rowh["uc"];
                            $resultsedef=mysql_query("select OE from materias where (CodMateria='$prelac')");
                            while($rowdef = mysql_fetch_array($resultsedef)) {
                                 $fomaOE=$rowdef["OE"];
                            }
                            mysql_free_result($resultsedef);
                            $notat="";
                            ////
                            foreach ($notas_historica as $rowhp) {
                                if($rowhp[Codigo]==$prelac){
                                    $nota=$rowhp["Nota"];
                                    $praee=$rowhp["Pra"];
                                    $obstet=$rowhp["Observacion"];
                                    $perddp=$rowhp["Periodo_Acad"];
                                    $condddp=$rowhp["Condicion"];
                                    //if ($conperiod==$perddp) {
                                    $resultseder=mysql_query("select CodCond from condap where (CodCond='$condddp')");
                                    while($rowser = mysql_fetch_array($resultseder)) {
                                        $notat="si";
                                    }
                                    mysql_free_result($resultseder);
                                    //if ($est=="19069788" and $prelac=="EI-540150402"){ echo "sdsd"; }

                                    if (($nota>2.99 and $obstet==0) or ($praee>2.99 and $obstet==0)) {
                                        $notat="si";
                                        $obst=$rowhp["Observacion"];
                                        //$confq=$rowhp["id"];
                                    }
                                }
                            }
                            ////
//            $resulthp=mysql_query("select Condicion,Pra,Nota,Observacion,Periodo_Acad,id from notas_historica
//            where Codigo='$prelac' and ConexEst='$est'");
//            while($rowhp = mysql_fetch_array($resulthp)) {
//                $nota=$rowhp["Nota"];
//                $praee=$rowhp["Pra"];
//                $obstet=$rowhp["Observacion"];
//                $perddp=$rowhp["Periodo_Acad"];
//                $condddp=$rowhp["Condicion"];
//                //if ($conperiod==$perddp) {
//                $resultseder=mysql_query("select CodCond from condap where (CodCond='$condddp')");
//                while($rowser = mysql_fetch_array($resultseder)) {
//                    $notat="si";
//                }
//                mysql_free_result($resultseder);
//                //if ($est=="19069788" and $prelac=="EI-540150402"){ echo "sdsd"; }
//
//                if (($nota>2.99 and $obstet==0) or ($praee>2.99 and $obstet==0)) {
//                    $notat="si";
//                    $obst=$rowhp["Observacion"];
//                    //$confq=$rowhp["id"];
//                }
//                //}
//            }
//            mysql_free_result($resulthp);
	if ($notat=='') {
		$mns=$mns.$prelac.'<br>';
	}

            //if ($conperiod==$perddp) {
                if ($notat=="" and $enlac=="y" and $fomaOE=="O") {
                    $nova="si";
                    $observer="20";

                    //$modificarcarest = "UPDATE notas_historica SET Observacion ='20' WHERE id=$confq";
                    //$resultcarest = mysql_query ($modificarcarest);
                }
                if ($notat=="si" and $enlac=="y" and $fomaOE=="O") {
                    $nova="";
                    $observer="";

                    //$modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
                    //$resultcarest = mysql_query ($modificarcarest);
                }
                if ($fomaOE=="E" and $notat=="si") {
                       $vali_electiva="si";
                    }
          // }
           }
          mysql_free_result($resulth);
           }
          mysql_free_result($resulthi);
          $resulthi=mysql_query("select Codigo from inscripcion_historica
               where Periodo_Acad='$conperiod' and ConexEst='$est' and CodCar='$bcarrera1' and Codigo='$codig' order by id");
                while($rowhi = mysql_fetch_array($resulthi)) {
                    $codigs=$rowhi["Codigo"];
                    $notat="";
             $resulth=mysql_query("select prelacion,enlace,uc from prelacion
               where ((codigo='$codigs')) order by id");
                while($rowh = mysql_fetch_array($resulth)) {
                            $tieneprelacion="si";
                            $prelac=$rowh["prelacion"];
                            $enlac=$rowh["enlace"];
                            $ucprela=$rowh["uc"];
                             $resultsedef=mysql_query("select OE from materias where (CodMateria='$prelac')");
                            while($rowdef = mysql_fetch_array($resultsedef)) {
                                 $fomaOE=$rowdef["OE"];
                            }
                            mysql_free_result($resultsedef);
                $notat="";
            
            foreach ($notas_historica as $rowhp) {
                if($rowhp[Codigo]==$prelac){
                    $nota=$rowhp["Nota"];
                    $praee=$rowhp["Pra"];
                    $obstet=$rowhp["Observacion"];
                    $perddp=$rowhp["Periodo_Acad"];
                    $condddp=$rowhp["Condicion"];
                    //if ($conperiod==$perddp) {
                    $resultseder=mysql_query("select CodCond from condap where (CodCond='$condddp')");
                    while($rowser = mysql_fetch_array($resultseder)) {
                        $notat="si";
                    }
                    mysql_free_result($resultseder);
                    //if ($est=="19069788" and $prelac=="EI-540150402"){ echo "sdsd"; }

                    if (($nota>2.99 and $obstet==0) or ($praee>2.99 and $obstet==0)) {
                        $notat="si";
                        $obst=$rowhp["Observacion"];
                    }
                }   
            }
            
//            $resulthp=mysql_query("select Condicion,Pra,Nota,Observacion,Periodo_Acad,id from notas_historica
//            where Codigo='$prelac' and ConexEst='$est'");
//            while($rowhp = mysql_fetch_array($resulthp)) {
//                $nota=$rowhp["Nota"];
//                $praee=$rowhp["Pra"];
//                $obstet=$rowhp["Observacion"];
//                $perddp=$rowhp["Periodo_Acad"];
//                $condddp=$rowhp["Condicion"];
//                //if ($conperiod==$perddp) {
//                $resultseder=mysql_query("select CodCond from condap where (CodCond='$condddp')");
//                while($rowser = mysql_fetch_array($resultseder)) {
//                    $notat="si";
//                }
//                mysql_free_result($resultseder);
//                //if ($est=="19069788" and $prelac=="EI-540150402"){ echo "sdsd"; }
//
//                if (($nota>2.99 and $obstet==0) or ($praee>2.99 and $obstet==0)) {
//                    $notat="si";
//                    $obst=$rowhp["Observacion"];
//                }
//                //}
//            }
//            mysql_free_result($resulthp);
            //if ($conperiod==$perddp) {
                if ($notat=="" and $enlac=="y" and $fomaOE=="O") {
                    //echo $prelac;
                    $nova="si";
                    $observer="20";

                    //$modificarcarest = "UPDATE notas_historica SET Observacion ='20' WHERE id=$confq";
                    //$resultcarest = mysql_query ($modificarcarest);
                }
                if ($notat=="si" and $nova=="" and $enlac=="y" and $fomaOE=="O") {
                    $nova="";
                    $observer="";
                    //$modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
                    //$resultcarest = mysql_query ($modificarcarest);
                }
                if ($fomaOE=="E" and $notat=="si") {
                       $vali_electiva="si";
                    }
          // }
           }
          mysql_free_result($resulth);
           }
          mysql_free_result($resulthi);
          $mmmme="s";
        }
        ////////////////////////////////////////77
        if ((($conperiod=="20092" and $codig=="EM-540220806") or ($conperiod=="20101" and $codig=="EM-540220806") or ($conperiod=="20091" and $codig=="EM-540220806") or ($conperiod=="20091" and $codig=="EC-540220806") or ($conperiod=="20092" and $codig=="EC-540220806") or ($conperiod=="20101" and $codig=="EC-540220806") or ($conperiod=="20091" and $codig=="EI-540220806") or ($conperiod=="20092" and $codig=="EI-540220806") or ($conperiod=="20101" and $codig=="EI-540220806"))) {
            /*$resulthi=mysql_query("select Codigo from inscripcion_historica
               where ((Periodo_Acad='20102' and ConexEst='$est' and CodCar='$bcarrera1')) order by id");
                while($rowhi = mysql_fetch_array($resulthi)) {
                    echo $cualq="s";
                }mysql_free_result($resulthi); */
            if ($cualq=="")  {
                foreach ($notas_historica as $rowhp) {
                    if($rowhp[Codigo]==$prelac){
                        $nota=$rowhp["Nota"];
                        $praee=$rowhp["Pra"];
                        $obstet=$rowhp["Observacion"];
                        $perddp=$rowhp["Periodo_Acad"];
                        $condddp=$rowhp["Condicion"];
                        if ($conperiod==$perddp) {
                        $resultseder=mysql_query("select CodCond from condap where (CodCond='$condddp')");
                        while($rowser = mysql_fetch_array($resultseder)) {
                            $notat="si";
                        }
                        mysql_free_result($resultseder);

                        if (($nota>2.99 and $obstet==0) or ($praee>2.99 and $obstet==0)) {
                            $notat="si";
                            $obst=$rowhp["Observacion"];
                            //$confq=$rowhp["id"];
                        }
                        }
                    }
                }
//            $resulthp=mysql_query("select Condicion,Pra,Nota,Observacion,Periodo_Acad,id from notas_historica
//            where Codigo='$prelac' and ConexEst='$est'");
//            while($rowhp = mysql_fetch_array($resulthp)) {
//                $nota=$rowhp["Nota"];
//                $praee=$rowhp["Pra"];
//                $obstet=$rowhp["Observacion"];
//                $perddp=$rowhp["Periodo_Acad"];
//                $condddp=$rowhp["Condicion"];
//                if ($conperiod==$perddp) {
//                $resultseder=mysql_query("select CodCond from condap where (CodCond='$condddp')");
//                while($rowser = mysql_fetch_array($resultseder)) {
//                    $notat="si";
//                }
//                mysql_free_result($resultseder);
//
//                if (($nota>2.99 and $obstet==0) or ($praee>2.99 and $obstet==0)) {
//                    $notat="si";
//                    $obst=$rowhp["Observacion"];
//                    //$confq=$rowhp["id"];
//                }
//                }
//            }
//            mysql_free_result($resulthp);
            if ($conperiod==$perddp) {
                if ($notat=="si" and $enlac=="y" and $fomaOE=="O") {

                    //$modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
                    //$resultcarest = mysql_query ($modificarcarest);
                }
                if ($notat=="" and $enlac=="y" and $fomaOE=="O") {
                    $nova="si";
                    $observer="20";

                    //$modificarcarest = "UPDATE notas_historica SET Observacion ='20' WHERE id=$confq";
                    //$resultcarest = mysql_query ($modificarcarest);
                }
                if ($notat=="" and $enlac=="o" and $fomaOE=="O") {
                        $nova="";

                    }
                if ($codig=="EM-540220806") { //echo $prelac;

                }
                if ($fomaOE=="E" and $notat=="si") {
                       $vali_electiva="si";
                    }
           }
           }
           $mmmme="";$notat="";
        }

        ///////////////////////////7777
        if ((($conperiod=="20101" and $codig=="63047802") or ($conperiod=="20092" and $codig=="63047802") or ($conperiod=="20101" and $codig=="63047801") or ($conperiod=="20092" and $codig=="63047801") or ($conperiod=="20101" and $codig=="64047804") or ($conperiod=="20092" and $codig=="64047804") or ($conperiod=="20101" and $codig=="64047802") or ($conperiod=="20092" and $codig=="64047802"))) {
             $resulthi=mysql_query("select Codigo from inscripcion_historica
               where Periodo_Acad='$conperiod' and ConexEst='$est' order by id");
                while($rowhi = mysql_fetch_array($resulthi)) {
                    $codigs=$rowhi["Codigo"];
             $resulth=mysql_query("select prelacion,enlace,uc from prelacion
               where ((codigo='$codigs')) order by id");
                while($rowh = mysql_fetch_array($resulth)) {
                            $tieneprelacion="si";
                            $prelac=$rowh["prelacion"];
                            $enlac=$rowh["enlace"];
                            $ucprela=$rowh["uc"];
                            $resultsedef=mysql_query("select OE from materias where (CodMateria='$prelac')");
                            while($rowdef = mysql_fetch_array($resultsedef)) {
                                 $fomaOE=$rowdef["OE"];
                            }
                            mysql_free_result($resultsedef);
                foreach ($notas_historica as $rowhp) {
                    if($rowhp[Codigo]==$prelac){
                        $nota=$rowhp["Nota"];
                        $praee=$rowhp["Pra"];
                        $obstet=$rowhp["Observacion"];
                        $perddp=$rowhp["Periodo_Acad"];
                        $condddp=$rowhp["Condicion"];
                        if ($conperiod==$perddp) {
                        $resultseder=mysql_query("select CodCond from condap where (CodCond='$condddp')");
                        while($rowser = mysql_fetch_array($resultseder)) {
                            $notat="si";
                        }
                        mysql_free_result($resultseder);

                        if (($nota>2.99 and $obstet==0) or ($praee>2.99 and $obstet==0)) {
                            $notat="si";
                            $obst=$rowhp["Observacion"];
                        }
                        }
                    }   
                }
//            $resulthp=mysql_query("select Condicion,Pra,Nota,Observacion,Periodo_Acad from notas_historica
//            where Codigo='$prelac' and ConexEst='$est'");
//            while($rowhp = mysql_fetch_array($resulthp)) {
//                $nota=$rowhp["Nota"];
//                $praee=$rowhp["Pra"];
//                $obstet=$rowhp["Observacion"];
//                $perddp=$rowhp["Periodo_Acad"];
//                $condddp=$rowhp["Condicion"];
//                if ($conperiod==$perddp) {
//                $resultseder=mysql_query("select CodCond from condap where (CodCond='$condddp')");
//                while($rowser = mysql_fetch_array($resultseder)) {
//                    $notat="si";
//                }
//                mysql_free_result($resultseder);
//
//                if (($nota>2.99 and $obstet==0) or ($praee>2.99 and $obstet==0)) {
//                    $notat="si";
//                    $obst=$rowhp["Observacion"];
//                }
//                }
//            }
//            mysql_free_result($resulthp);
            if ($conperiod==$perddp) {
                if ($notat=="" and $enlac=="y" and $fomaOE=="O") {
                    $nova="si";
                    $observer="20";

                    //$modificarcarest = "UPDATE notas_historica SET Observacion ='20' WHERE id=$confq";
                    //$resultcarest = mysql_query ($modificarcarest);
                }
                if ($notat=="" and $enlac=="o" and $fomaOE=="O") {
                        $nova="";

                    }
                if ($codig=="EM-540220806") { //echo $prelac;

                }
                if ($fomaOE=="E" and $notat=="si") {
                       $vali_electiva="si";
                    }
           }
           }
          mysql_free_result($resulth);
           }
          mysql_free_result($resulthi);
          $resulthi=mysql_query("select Codigo from inscripcion_historica
               where Periodo_Acad='$conperiod' and ConexEst='$est' and CodCar='$bcarrera1' and Codigo='$codig' order by id");
                while($rowhi = mysql_fetch_array($resulthi)) {
                    $codigs=$rowhi["Codigo"];
                    $notat="";
             $resulth=mysql_query("select prelacion,enlace,uc from prelacion
               where ((codigo='$codigs')) order by id");
                while($rowh = mysql_fetch_array($resulth)) {
                            $tieneprelacion="si";
                            $prelac=$rowh["prelacion"];
                            $enlac=$rowh["enlace"];
                            $ucprela=$rowh["uc"];
                             $resultsedef=mysql_query("select OE from materias where (CodMateria='$prelac')");
                            while($rowdef = mysql_fetch_array($resultsedef)) {
                                 $fomaOE=$rowdef["OE"];
                            }
                            mysql_free_result($resultsedef);
                $notat="";
                foreach ($notas_historica as $rowhp) {
                    if($rowhp[Codigo]==$prelac){
                        $nota=$rowhp["Nota"];
                        $praee=$rowhp["Pra"];
                        $obstet=$rowhp["Observacion"];
                        $perddp=$rowhp["Periodo_Acad"];
                        $condddp=$rowhp["Condicion"];
                        //if ($conperiod==$perddp) {
                        $resultseder=mysql_query("select CodCond from condap where CodCond='$condddp'");
                        while($rowser = mysql_fetch_array($resultseder)) {
                            $notat="si";
                        }
                        mysql_free_result($resultseder);
                        //if ($est=="19069788" and $prelac=="EI-540150402"){ echo "sdsd"; }

                        if (($nota>2.99 and $obstet==0) or ($praee>2.99 and $obstet==0)) {
                            $notat="si";
                            $obst=$rowhp["Observacion"];
                        }
                    }
                }
//            $resulthp=mysql_query("select Condicion,Pra,Nota,Observacion,Periodo_Acad,id from notas_historica
//            where Codigo='$prelac' and ConexEst='$est'");
//            while($rowhp = mysql_fetch_array($resulthp)) {
//                $nota=$rowhp["Nota"];
//                $praee=$rowhp["Pra"];
//                $obstet=$rowhp["Observacion"];
//                $perddp=$rowhp["Periodo_Acad"];
//                $condddp=$rowhp["Condicion"];
//                //if ($conperiod==$perddp) {
//                $resultseder=mysql_query("select CodCond from condap where CodCond='$condddp'");
//                while($rowser = mysql_fetch_array($resultseder)) {
//                    $notat="si";
//                }
//                mysql_free_result($resultseder);
//                //if ($est=="19069788" and $prelac=="EI-540150402"){ echo "sdsd"; }
//
//                if (($nota>2.99 and $obstet==0) or ($praee>2.99 and $obstet==0)) {
//                    $notat="si";
//                    $obst=$rowhp["Observacion"];
//                }
//                //}
//            }
//            mysql_free_result($resulthp);
            //if ($conperiod==$perddp) {
                if ($notat=="" and $enlac=="y" and $fomaOE=="O") {
                    //echo $prelac;
                    $nova="si";
                    $observer="20";
                    //$modificarcarest = "UPDATE notas_historica SET Observacion ='20' WHERE id=$confq";
                    //$resultcarest = mysql_query ($modificarcarest);
                }
                if ($notat=="si" and $nova=="" and $enlac=="y" and $fomaOE=="O") {
                    $nova="";
                    $observer="";
                    //$modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
                    //$resultcarest = mysql_query ($modificarcarest);
                }
                if ($fomaOE=="E" and $notat=="si") {
                       $vali_electiva="si";
                    }
          // }
           }
          mysql_free_result($resulth);
           }
          mysql_free_result($resulthi);
          $mmmme="s";
        }

?>
