<?php
function validarinscrant($sumat,$conse,$bcarrera1,$ucaf,$codigo,$sedesan='') { 
$sumatind=$sumat;

$resulthp=mysql_query("select Sede from carreras_est  where ConexEst='$conse' and CodCar='$bcarrera1'");
while($rowhp = mysql_fetch_array($resulthp)) {
     $SEDE_est=$rowhp["Sede"];
}
mysql_free_result($resulthp);

$resultpp=mysql_query("select Semestre from semestreabierto where ((CodCar='$bcarrera1' and Sede='$SEDE_est'))");
while($rowpp = mysql_fetch_array($resultpp)) {
    $conperiod=$rowpp["Semestre"];
}
mysql_free_result($resultpp);
if ($sedesan=='297' and $bcarrera1=='012') { $conperiod='20121'; }
        
/////////////////////////////////////////////////////////Comienzo del Proceso

if($conperiod<>"" and $bcarrera1<>"") {

    $contt="0";
/////////////////////////////////////////////////////////////////////////////////
    $valresp="";
    $vali_electiva="";
   // $resultins=mysql_query("select * from inscripcion_historica
    //where ((ConexEst='$conse') and (Periodo_Acad='$conperiod') and (CodCar='$bcarrera1'))");
//while($rowins = mysql_fetch_array($resultins)) {
  // $confq	=$rowins["id"];
   //$observ	=$rowins["Observacion"];
   //$codig	=$rowins["Codigo"];
   $hever	=$codigo;
   //$conx	=$rowins["Conexion_Insc"];
if ($observ!="33") {
   $validd="";
   //$resulthp=mysql_query("select Valid from condicion  where ((CodCond='$observ'))");
   //while($rowhp = mysql_fetch_array($resulthp)) {
     // 	$validd=$rowhp["Valid"];
   //}
   //mysql_free_result($resulthp);
//if ($validd!="" Or $observ=="") {
   $preladoo='';
   $resulthp=mysql_query("select Cond from oferta_relacion  where ((Conexion_Insc='$conx'))");
   while($rowhp = mysql_fetch_array($resulthp)) {
      	$condic=$rowhp["Cond"];
   }
   mysql_free_result($resulthp);
    $vali_electiva="";
    $nova="";
    $entro="";
    $semMat="";
    $apass="";
    //$fomaOE="";
    //echo "d".$sumat."/".$conse."/".$bcarrera1."/".$codigo;
   $resulth=mysql_query("select * from prelacion  where (codigo='$codigo') order by id");
   while($rowh = mysql_fetch_array($resulth)) {
        $prelac=$rowh["prelacion"];
        $enlac=$rowh["enlace"];
   	   $ucprel=$rowh["uc"];
            $resultsedef=mysql_query("select materias.OE,carrera_materia.Semestre from materias,carrera_materia
            where (materias.CodMateria='$prelac' and carrera_materia.CodMateria=materias.CodMateria
            and carrera_materia.CodCar='$bcarrera1') Order by carrera_materia.Semestre");
            while($rowdef = mysql_fetch_array($resultsedef)) {
                 $fomaOE=$rowdef["OE"];
                 if ($fomaOE=="E") { $semMat=$rowdef["Semestre"]; }
            }
            mysql_free_result($resultsedef);
            $resultinsc=mysql_query("select * from inscripcion_historica
            where ((ConexEst='$conse') and (Periodo_Acad='$conperiod') and (CodCar='$bcarrera1') and (Codigo='$prelac'))");
            while($rowinsc = mysql_fetch_array($resultinsc)) {
                $conxgt	=$rowinsc["Conexion_Insc"];
               $resulthp=mysql_query("select Cond from oferta_relacion  where ((Conexion_Insc='$conxgt'))");
               while($rowhp = mysql_fetch_array($resulthp)) {
                    $condicx=$rowhp["Cond"];
               }
               mysql_free_result($resulthp);
            }mysql_free_result($resultinsc);
            $notat="";
        $resulthp=mysql_query("select Nota, Observacion,Pra from notas_historica
        where ((Codigo='$prelac') and (ConexEst='$conse'))");
        while($rowhp = mysql_fetch_array($resulthp)) {
            $nota	=$rowhp["Nota"];
	    $pnota	=$rowhp["Pra"];
	    $veraspss	=$rowhp["Observacion"];
            $entro="si";
            if (($nota>"2.99" and $veraspss=="") Or ($pnota>"2.99" and $veraspss=="")){
                $verasp=$rowhp["Observacion"];
                $notat="si";
            }
        }
        mysql_free_result($resulthp);
	if ($conse=='19881360') {
	//echo $prelac.'-'.$notat.'<br>';
	}
        if ($fomaOE=="E" and $notat=="si" and $novaa=="") {
            $apass="si";
            $preladoo='';
            //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
           //$resultcarest = mysql_query ($modificarcarest);
        }
        if ($notat=="" and $enlac=="y" and $fomaOE=="O") {
           $nova="si"; $novaa="si"; $fomaOE=""; $preladoo='1';
           //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='20' WHERE id=$confq";
           //$resultcarest = mysql_query ($modificarcarest);
           break;
        }
        if ($notat=="si" and $enlac=="y" ) {
            $nova="si";
            $preladoo='';
           //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
           //$resultcarest = mysql_query ($modificarcarest);
        }
        if ($notat=="" and $enlac=="o") {
            $nova="si";
        }
        if ($fomaOE=="E" and $notat=="si") {
            $vali_electiva="si";
        }
        if ($fomaOE=="E" and $vali_electiva=="si") {
            $notat="si";
            //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
              //  $resultcarest = mysql_query ($modificarcarest);
        }
        if ($vistapre == "vtv") { $notat="si"; }
        //echo $ucaf;
        if($ucprel<>"") {
                if($ucprel<=$ucaf){
                    $preladoo='';
                    //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
                    //$resultcarest = mysql_query ($modificarcarest);
                }
                if($ucprel>$ucaf){
                    $preladoo='1';
                    //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='48' WHERE id=$confq";
                    //$resultcarest = mysql_query ($modificarcarest);
                }
	}

if($ucprel=="") {
        if ($fomaOE=="E" and $vali_electiva=="si") {
            $notat="si";
        }
        if ($enlac=="" and $relac==""  and $aprob==""){
          if ($notat=="si"){
              $preladoo='';
                //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
                //$resultcarest = mysql_query ($modificarcarest);
            }
            if ($notat==""){
                $preladoo='1';
                if ($condicx=="2"){
                    $preladoo='';
                }
                //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='20' WHERE id=$confq";
                //$resultcarest = mysql_query ($modificarcarest);
            }

        }

        if ($relac=="pas") {
          if ($notat=="si" and $relacw<>"pasn"){
              $preladoo='';
                //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
                //$resultcarest = mysql_query ($modificarcarest);
                $cump="si";
            }
            if ($notat==""){
                $preladoo='1';
                //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='20' WHERE id=$confq";
                //$resultcarest = mysql_query ($modificarcarest);
            }
            $relac="";
            if($enlac<>"y"){
                $relacw="";
            }
            if($enlac=="o"){
              $her="no";
            }
        }

        if ($enlac=="y" and $nova=="") {
          if ($notat=="si" and $relacw==""){
                $preladoo='';
                //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
                //$resultcarest = mysql_query ($modificarcarest);
            }
            if ($notat==""){
                $preladoo='1';
                //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='20' WHERE id=$confq";
                //$resultcarest = mysql_query ($modificarcarest);
                $relacw="pasn";
            }
            $relac="pas";
        }

        if ($aprob=="desp"){
          if ($notat=="si"){
              $preladoo='';
                //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
                //$resultcarest = mysql_query ($modificarcarest);
            }
            if ($notat=="" and $bie=="" and $cump==""){
                $preladoo='1';
                //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='20' WHERE id=$confq";
                //$resultcarest = mysql_query ($modificarcarest);
            }
            $aprob="";
            $bie="";
        }

        if ($enlac=="o") {
          if ($notat=="si" and $her==""){
              $preladoo='';
                //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
                //$resultcarest = mysql_query ($modificarcarest);
                $bie="si";
            }
            if ($notat=="" and $her==""){
                $preladoo='1';
                //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='20' WHERE id=$confq";
                //$resultcarest = mysql_query ($modificarcarest);
            }
            $aprob="desp";
        }
	}
       $notat="";
    }
    mysql_free_result($resulth);
    ////////////////////////////////////////////////////////////

//if ($preladoo==1) { echo $prelac; }

        $resulthp=mysql_query("select Nota,Codigo,Observacion, Condicion from notas_historica
        where ((CodCar='$bcarrera1')
        and (Codigo='$hever') and (ConexEst='$conse'))");
        while($rowhp = mysql_fetch_array($resulthp)) {
            $obserparr='';
            $notass=$rowhp["Nota"];
            $codigoc=$rowhp["Codigo"];
            $obserpar=$rowhp["Observacion"];
            $condicc2=$rowhp["Condicion"];
            $busca_negado=mysql_query("SELECT CodCond FROM condneg WHERE CodCond='$condicc2'");
            while ($resulten=mysql_fetch_array($busca_negado)) {
               $obserparr="CONDICION NEGADA";
            }
            @mysql_free_result($resulten);
            if ($notass>"1.00" and $notass<"3.00" and $obserpar==""){
     	        $asig="si";
            }
            if ($notass>"1.00" and $notass<"3.00" and $obserpar=="" and $verlid=="" and $obserparr==''){
			$verlid="si";
 			$nae="si";
            }
            if ($notass>"2.99" and $obserpas==""){
               $naei="si";
            }
        }
        mysql_free_result($resulthp);
         //////////////////////////////////////////////////////////////////////////////
	   $verlid="";
        if($condic=="7" and $preladoo=='') {
        if($sumatind<3.00 and $asig==""){
            $preladoo='2';
                //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='26' WHERE id=$confq";
                //$resultcarest = mysql_query ($modificarcarest);
         }

       if($sumatind>2.99){
                $preladoo='';
                //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
                //$resultcarest = mysql_query ($modificarcarest);
         }
        if ($naei=="si"){
//                $modificarcarest = "UPDATE inscripcion SET observacion ='21' WHERE id=$confq";
//                $resultcarest = mysql_query ($modificarcarest);
            }
        if ($naei==""){
                $preladoo='';
                //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
                //$resultcarest = mysql_query ($modificarcarest);
            }
        if ($asig=="si"){
             $preladoo='';
            //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
             //$resultcarest = mysql_query ($modificarcarest);
        }
        }
        if($condic=="5" and $preladoo==''){
        if($sumatind<3.00 and $asig==""){
            $preladoo='2';
                //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='26' WHERE id=$confq";
                //$resultcarest = mysql_query ($modificarcarest);
         }

       if($sumatind>2.99 ){
               $preladoo='';
               // $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
               // $resultcarest = mysql_query ($modificarcarest);
         }
        if ($naei=="si"){
//                $modificarcarest = "UPDATE inscripcion SET observacion ='21' WHERE id=$confq";
//                $resultcarest = mysql_query ($modificarcarest);
            }
        if ($naei=="" ){
            $preladoo='';
               // $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
               // $resultcarest = mysql_query ($modificarcarest);
            }
        if ($asig=="si"){
            $preladoo='';
            //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
            // $resultcarest = mysql_query ($modificarcarest);
        }
        }
//echo "$condic /";

        if($condic=="2" and $preladoo=='') {

        if($codigoc=="") {
            $preladoo='2';
            //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='23' WHERE id=$confq";
            //$resultcarest = mysql_query ($modificarcarest);
        }
        if($codigoc<>"" and $nae=="") {
            $preladoo='2';
            //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='23' WHERE id=$confq";
            //$resultcarest = mysql_query ($modificarcarest);
        }
        if($codigoc<>"" and $nae=="si"){
            $preladoo='';
            //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
            //$resultcarest = mysql_query ($modificarcarest);
        }
//        if($codigoc<>"" and $naei=="si"){
  //          $modificarcarest = "UPDATE inscripcion SET observacion ='21' WHERE id=$confq";
  //          $resultcarest = mysql_query ($modificarcarest);
//        }
        if($codigoc<>"" and $naei=="" and $observ=="21"){
            //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
            //$resultcarest = mysql_query ($modificarcarest);
        }
        }

        if($condic=="33"){
            //$modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
            //$resultcarest = mysql_query ($modificarcarest);
        }

        $naei="";
        $nae="";
        $condicion="";
        $codigop="";
        $codigoc="";
        $obser="";
        $ob="";
        $asig="";
        $cump="";
        $her="";
   // }
    }
  //}
  //mysql_free_result($resultins);
////////////////////////////////////////////////////////////////////////////////////7
}

$tcond=0;  
                $evprelc=0;
                $resultfw = mysql_query("SELECT id,prelacion FROM prelacion WHERE codigo='$codigo'");
                while ($rowfw = mysql_fetch_array($resultfw)) {
                     $prelacc = $rowfw['prelacion'];
                     $evprelc= $evprelac + 1;
                }mysql_free_result($resultfw);
                if ($evprelc == 1){
                $resultfws=mysql_query("select id,Conexion_Insc from inscripcion_historica where ((ConexEst='$conse')
                and (Periodo_Acad='$conperiod') and (CodCar='$bcarrera1') and (Codigo='$prelacc')) order by Codigo");
                while ($rowfws = mysql_fetch_array($resultfws)) {
                        $prelaccss = $rowfws['Conexion_Insc'];
                }mysql_free_result($resultfws);
                 $resultsedxs=mysql_query("select Cond from oferta_relacion where ((Conexion_Insc='$prelaccss'))");
                 while($rowsxs = mysql_fetch_array($resultsedxs)) {
                        $tcond = $rowsxs['Cond'];
                 }mysql_free_result($resultsedxs);
                }

 ///////////////////////////////////////////////////////////Evaluar Prelac
                if ($codigo == 'ED-540220806' or $codigo == 'EC-540220806' or $codigo == 'EG-540220806' or $codigo == 'EI-540220806' or $codigo == 'EM-540220806' or $codigo == 'EM-540230801' OR $codigo == 'EA-540220806') {
                $seprec="0";
                $semMat='';
                $resulth=mysql_query("select prelacion from prelacion  where (codigo='$codigo') order by id");
                while($rowh = mysql_fetch_array($resulth)) {
                        $prelacod=$rowh["prelacion"];

                         $resultsedef=mysql_query("select materias.OE,carrera_materia.Semestre from materias,carrera_materia
                        where (materias.CodMateria='$prelacod' and carrera_materia.CodMateria=materias.CodMateria
                        and carrera_materia.CodCar='$bcarrera1') Order by carrera_materia.Semestre");
                        while($rowdef = mysql_fetch_array($resultsedef)) {
                                $fomaOE=$rowdef["OE"];
                                if ($fomaOE=="E") { $semMat=$rowdef["Semestre"]; }
                        }
                        mysql_free_result($resultsedef);

                        if ($semMat!=$matSem and $fomaOE=="E") { $matSem=$semMat; }
                        if ($fomaOE!="E") {
                        $resulthpr=mysql_query("select conexper from validarperiodo  where ((periodo='$conperiod'))");
                        while($rowhpr = mysql_fetch_array($resulthpr)) {
                        $bper=$rowhpr["conexper"];
                           $notat="";
                           $resulthp=mysql_query("select Nota, Observacion,Pra from notas_historica
                           where ((Periodo_Acad='$bper') and (Codigo='$prelacod') and (ConexEst='$conse'))");
                           while($rowhp = mysql_fetch_array($resulthp)) {
                                $nota       =$rowhp["Nota"];
                                $pnota      =$rowhp["Pra"];
                                $veraspss   =$rowhp["Observacion"];
                                $entro="si";
                                if (($nota>"2.99" and $veraspss=="") Or ($pnota>"2.99" and $veraspss=="")){
                                $notat="si";
                                }
                                if (($nota<"3.00" and $veraspss=="" and $notat=="") Or ($pnota<"3.00" and $veraspss=="" and $notat=="")){
                                        $notat="";
                                }

                           }
                           mysql_free_result($resulthp);
                        }
                        if (($codigo == 'EA-540220806' and $notat=="" and $codigo=="EA-540220501") or ($codigo == 'EA-540220806' and $notat=="" and $codigo=="EA-540220602") or ($codigo == 'ED-540220806' and $notat=="" and $codigo=="ED-540220501") or ($codigo == 'ED-540220806' and $notat=="" and $codigo=="ED-540220602") or ($codigo == 'EC-540220806' and $notat=="" and $codigo=="EC-540220501") or ($codigo == 'EC-540220806' and $notat=="" and $codigo=="EC-540220602") or ($codigo == 'EG-540220806' and $notat=="" and $codigo=="EG-540220501") or ($codigo == 'EG-540220806' and $notat=="" and $codigo=="EG-540220602") or ($codigo == 'EI-540220806' and $notat=="" and $codigo=="EI-540220501") or ($codigo == 'EI-540220806' and $notat=="" and $codigo=="EI-540220602") or ($codigo == 'EM-540220806' and $notat=="" and $codigo=="EM-540220501") or ($codigo == 'EM-540220806' and $notat=="" and $codigo=="EM-540220602") or ($codigo == 'EF-540230801' and $notat=="" and $codigo=="EF-540220603") or ($codigo == 'EF-540230801' and $notat=="" and $codigo=="EF-540220502")) { $seprec=5; }
                        if ($notat=="") { $seprec=$seprec+1;  }
                        if ($seprec>2) { break; }
                        }
                }
                if ($seprec<3) { $tcond=2; }
		
                }
                /////////Vali.... diferente a Educacion///////////////777
                if ($codigo=='55010010' Or $codigo=='56023602' Or $codigo == '35047901' Or $codigo == '35047902' Or $codigo == 'PA220241001' Or $codigo == 'EA521350709' Or $codigo == 'EA520350609' Or $codigo == 'PV210261001') {
		$seprec="0";
		$semMat='';
		$resulth=mysql_query("select prelacion from prelacion  where (codigo='$codigo') order by id");
  	 	while($rowh = mysql_fetch_array($resulth)) {
        		$prelacod=$rowh["prelacion"];

			 $resultsedef=mysql_query("select materias.OE,carrera_materia.Semestre from materias,carrera_materia
            		where (materias.CodMateria='$prelacod' and carrera_materia.CodMateria=materias.CodMateria
            		and carrera_materia.CodCar='$bcarrera1') Order by carrera_materia.Semestre");
            		while($rowdef = mysql_fetch_array($resultsedef)) {
                	 	$fomaOE=$rowdef["OE"];
                 		if ($fomaOE=="E") { $semMat=$rowdef["Semestre"]; }
            		}
          		mysql_free_result($resultsedef);

			if ($semMat!=$matSem and $fomaOE=="E") { $matSem=$semMat; }
			if ($fomaOE!="E") {
			$resulthpr=mysql_query("select conexper from validarperiodo  where ((periodo='$conperiodo'))");
        		while($rowhpr = mysql_fetch_array($resulthpr)) {
            		$bper=$rowhpr["conexper"];
          		   $notat="";
        		   $resulthp=mysql_query("select Nota, Observacion,Pra from notas_historica
        		   where ((Periodo_Acad='$bper') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
        		   while($rowhp = mysql_fetch_array($resulthp)) {
            			$nota       =$rowhp["Nota"];
            			$pnota      =$rowhp["Pra"];
            			$veraspss   =$rowhp["Observacion"];
            			$entro="si";
            			if (($nota>"2.99" and $veraspss=="") Or ($pnota>"2.99" and $veraspss=="")){
               			$notat="si";
            			}
            			if (($nota<"3.00" and $veraspss=="" and $notat=="") Or ($pnota<"3.00" and $veraspss=="" and $notat=="")){
                			$notat="";
            			}
        		   }
        		   mysql_free_result($resulthp);
			}
			if ($notat=="") { $seprec=$seprec+1;  }
			if ($seprec>2) { break; }
			}
		}
		if ($seprec<3) { $tcond=2; }
		}
                ///////////////////////////////////////////////////////////////////////////
                /////////Vali.... diferente a Educacion Ingles///////////////777
                if ($codigo == 'TRG096') {
		$seprec="0";
		$semMat='';
		$resulth=mysql_query("select prelacion from prelacion  where (codigo='$codigo') order by id");
  	 	while($rowh = mysql_fetch_array($resulth)) {
        		$prelacod=$rowh["prelacion"];

			 $resultsedef=mysql_query("select materias.OE,carrera_materia.Semestre from materias,carrera_materia
            		where (materias.CodMateria='$prelacod' and carrera_materia.CodMateria=materias.CodMateria
            		and carrera_materia.CodCar='$bcarrera1') Order by carrera_materia.Semestre");
            		while($rowdef = mysql_fetch_array($resultsedef)) {
                	 	$fomaOE=$rowdef["OE"];
                 		if ($fomaOE=="E") { $semMat=$rowdef["Semestre"]; }
            		}
          		mysql_free_result($resultsedef);

			if ($semMat!=$matSem and $fomaOE=="E") { $matSem=$semMat; }
			if ($fomaOE!="E") {
                        //$prelacod=trim($prelacod);
                         $notatt="";
                        $resulthpr=mysql_query("select conexper from validarperiodo  where ((periodo='$conperiod'))");
        		while($rowhpr = mysql_fetch_array($resulthpr)) {
            		$bper=$rowhpr["conexper"];
          		   
        		   $resulthp=mysql_query("select Nota, Observacion,Pra from notas_historica
        		   where ((Periodo_Acad='$bper') and (Codigo='$prelacod') and (ConexEst='$conse'))");
        		   while($rowhp = mysql_fetch_array($resulthp)) {
            			$nota       =$rowhp["Nota"];
            			$pnota      =$rowhp["Pra"];
            			$veraspss   =$rowhp["Observacion"];
            			$entro="si";
            			if (($nota>"2.99" and $veraspss=="") Or ($pnota>"2.99" and $veraspss=="")){
               			$notatt="si";
            			}
            			if (($nota<"3.00" and $veraspss=="" and $notatt=="") Or ($pnota<"3.00" and $veraspss=="" and $notatt=="")){
                			$notatt="";
            			}
                                if ($prelacod=='INF 132 ')  { //echo "z".$nota.'//'.$notat;

                                }
        		   }
        		   mysql_free_result($resulthp);
			}
                        if ($prelacod=='INF 132 ')  { //echo 'f'.$notatt;

                        }
			if ($notatt=="") { //echo $prelacod.'<br>';
                        $seprec=$seprec+1;  }
			if ($seprec>2) { break; }
			}
		}
		if ($seprec<3) { $tcond=2; }
		}
                //echo $tcond;
                ///////////////////////////////////////////////////////////////////////////
if ($tcond!=2 AND $tcond!='0') { 
Return $preladoo;
}
//////////////////////////////////////////////////////////////Fin del Proceso
}


?>
