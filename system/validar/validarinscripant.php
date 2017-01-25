<?php
function validarinscrant($sumat,$conse,$bcarrera1,$ucaf,$sedesan=''){
$sumatind=$sumat;
$resulthp=mysql_query("select Sede from carreras_est  where ConexEst='$conse' and CodCar='$bcarrera1'");
while($rowhp = mysql_fetch_array($resulthp)) {
     $SEDE_est=$rowhp["Sede"];
}
mysql_free_result($resulthp);
$resultpp=mysql_query("select Anterior from semestreabierto where ((CodCar='$bcarrera1' and Sede='$SEDE_est'))");
while($rowpp = mysql_fetch_array($resultpp)) {
    $conperiod=$rowpp["Anterior"];
}
mysql_free_result($resultpp);
 if ($sedesan=='297' and $bcarrera1=='012') { $conperiod='2011D'; }
/////////////////////////////////////////////////////////Comienzo del Proceso

if($conperiod<>"" and $bcarrera1<>"") {

    $contt="0";
/////////////////////////////////////////////////////////////////////////////////
    $valresp="";
    $vali_electiva="";
    $resultins=mysql_query("select * from inscripcion_historica
    where ((ConexEst='$conse') and (Periodo_Acad='$conperiod') and (CodCar='$bcarrera1'))");
while($rowins = mysql_fetch_array($resultins)) {
   $confq	=$rowins["id"];
   $observ	=$rowins["Observacion"];
   $codig	=$rowins["Codigo"];
   $hever	=$rowins["Codigo"];
   $conx	=$rowins["Conexion_Insc"];
if ($observ!="33") {
   $validd="";
   $resulthp=mysql_query("select Valid from condicion  where ((CodCond='$observ'))");
   while($rowhp = mysql_fetch_array($resulthp)) {
      	$validd=$rowhp["Valid"];
   }
   mysql_free_result($resulthp);
if ($validd!="" Or $observ=="") {
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
   $resulth=mysql_query("select * from prelacion  where (codigo='$codig') order by id");
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
        if ($fomaOE=="E" and $notat=="si" and $novaa=="") {
            $apass="si";
            $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
           $resultcarest = mysql_query ($modificarcarest);
        }
        if ($notat=="" and $enlac=="y" and $fomaOE=="O") {
           $nova="si"; $novaa="si"; $fomaOE="";
           $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='20' WHERE id=$confq";
           $resultcarest = mysql_query ($modificarcarest);
           break;
        }
        if ($notat=="si" and $enlac=="y" ) {
            $nova="si";
           $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
           $resultcarest = mysql_query ($modificarcarest);
        }
        if ($notat=="" and $enlac=="o") {
            $nova="si";
        }
        if ($fomaOE=="E" and $notat=="si") {
            $vali_electiva="si";
        }
        if ($fomaOE=="E" and $vali_electiva=="si") {
            $notat="si";
            $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
        }
        if ($vistapre == "vtv") { $notat="si"; }
        //echo $ucaf;
        if($ucprel<>""){
                if($ucprel<=$ucaf){
                    $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
                    $resultcarest = mysql_query ($modificarcarest);
                }
                if($ucprel>$ucaf){
                    $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='48' WHERE id=$confq";
                    $resultcarest = mysql_query ($modificarcarest);
                }
	}

if($ucprel=="") {
        if ($fomaOE=="E" and $vali_electiva=="si") {
            $notat="si";
        }
        if ($enlac=="" and $relac==""  and $aprob==""){
          if ($notat=="si"){
                $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
            }
            if ($notat==""){
                $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='20' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
            }

        }

        if ($relac=="pas"){
          if ($notat=="si" and $relacw<>"pasn"){
                $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
                $cump="si";
            }
            if ($notat==""){
                $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='20' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
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
                $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
            }
            if ($notat==""){
                $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='20' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
                $relacw="pasn";
            }
            $relac="pas";
        }

        if ($aprob=="desp"){
          if ($notat=="si"){
                $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
            }
            if ($notat=="" and $bie=="" and $cump==""){
                $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='20' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
            }
            $aprob="";
            $bie="";
        }

        if ($enlac=="o") {
          if ($notat=="si" and $her==""){
                $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
                $bie="si";
            }
            if ($notat=="" and $her==""){
                $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='20' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
            }
            $aprob="desp";
        }
	}
       $notat="";
    }
    mysql_free_result($resulth);
    ////////////////////////////////////////////////////////////

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
        if($condic=="7"){
        if($sumatind<3.00 and $asig==""){
                $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='26' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
         }

       if($sumatind>2.99 and $observ=="26"){
                $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
         }
        if ($naei=="si"){
//                $modificarcarest = "UPDATE inscripcion SET observacion ='21' WHERE id=$confq";
//                $resultcarest = mysql_query ($modificarcarest);
            }
        if ($naei=="" and $observ=="21"){
                $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
            }
        if ($asig=="si" and $observ=="26"){
            $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
             $resultcarest = mysql_query ($modificarcarest);
        }
        }
        if($condic=="5"){
        if($sumatind<3.00 and $asig==""){
                $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='26' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
         }

       if($sumatind>2.99 and $observ=="55"){
                $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
         }
        if ($naei=="si"){
//                $modificarcarest = "UPDATE inscripcion SET observacion ='21' WHERE id=$confq";
//                $resultcarest = mysql_query ($modificarcarest);
            }
        if ($naei=="" and $observ=="21"){
                $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
            }
        if ($asig=="si" and $observ=="55"){
            $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
             $resultcarest = mysql_query ($modificarcarest);
        }
        }
//echo "$condic /";

        if($condic=="2") {

        if($codigoc=="") {
            $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='23' WHERE id=$confq";
            $resultcarest = mysql_query ($modificarcarest);
        }
        if($codigoc<>"" and $nae=="") {
            $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='23' WHERE id=$confq";
            $resultcarest = mysql_query ($modificarcarest);
        }
        if($codigoc<>"" and $nae=="si" and $observ=="23"){

            $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
            $resultcarest = mysql_query ($modificarcarest);
        }
//        if($codigoc<>"" and $naei=="si"){
  //          $modificarcarest = "UPDATE inscripcion SET observacion ='21' WHERE id=$confq";
  //          $resultcarest = mysql_query ($modificarcarest);
//        }
        if($codigoc<>"" and $naei=="" and $observ=="21"){
            $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
            $resultcarest = mysql_query ($modificarcarest);
        }
        }
        if($condic=="33"){
            $modificarcarest = "UPDATE inscripcion_historica SET Observacion ='' WHERE id=$confq";
            $resultcarest = mysql_query ($modificarcarest);
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
    }
    }
  }
  mysql_free_result($resultins);
////////////////////////////////////////////////////////////////////////////////////7
}

//////////////////////////////////////////////////////////////Fin del Proceso
}

