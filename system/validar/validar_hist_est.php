<?php
function procesarvchist($base,$sumatt,$bcarrera1,$periodo1,$est,$codig,$observ,$conperiod,$nota,$prae,$migracion,$confq,$condic,$sede=''){
  	/*include 'ver/lecentrar.php';
	$baset_sql = mysql_connect($local,$usuariodb,$clavedb);
	mysql_select_db($baset);*/
/////////////////////////////////////////////////////////Comienzo del Proceso
////////////////////////////////////////////////////////
///////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
 
	if($bcarrera1<>"") { 
		$contt="0";
		/////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////
		$valresp="";
$codcarrerarq=$bcarrera1;
$cedulaestcar=$est;
if ($est=='18834498zz' and $conperiod=='20082') {
    //echo "$migracion /";
}
include 'calcular_uc.php';
$resultseder=mysql_query("select Condicion from carreras_est where (CodCar='$bcarrera1' and ConexEst='$est')");
	while($rowser = mysql_fetch_array($resultseder)) {
            $condest=$rowser["Condicion"];
	}
	mysql_free_result($resultseder);
        $comentt=''; 
if ($condest!="GRA") { 
   $tieneprelacion="";
   $hever=$codig;
   //if ($migracion=="0" or $migracion=="8"  or $migracion=="9") {
	$resultseder=mysql_query("select Valid from condicion where (CodCond='$observ')");
	while($rowser = mysql_fetch_array($resultseder)) {
            $cvalid=$rowser["Valid"];
	}
	mysql_free_result($resultseder);
	echo mysql_error();
	
//if ($cvalid=="1" or $observ=='') {
    $vali_electiva="";
    $nova="";
    $notatev="";
    //echo $codig."<br>";
    $bie="";
   $resulth=mysql_query("select prelacion,enlace,uc from prelacion  
   where ((codigo='$codig')) order by id");
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
                $mie="";
/////////////////////////////////////////////////////////////////////////////////////////
	$resulthp=mysql_query("select Nota,Observacion,Periodo_Acad from notas_historica  
	where ((Codigo='$prelac') and (ConexEst='$est') and (Periodo_Acad='$conperiod') 
	and (Condicion='2'))");
        while($rowhp = mysql_fetch_array($resulthp)) {
            $nota  =$rowhp["Nota"];
            $obstt =$rowhp["Observacion"];
            $perddp=$rowhp["Periodo_Acad"];
                if (($nota>"2.99" and $obstt=="")){
                    $obst=$rowhp["Observacion"];
                    $notat="si";
                    $mie="a";
                }
        }
        mysql_free_result($resulthp);
        $resulthp=mysql_query("select Nota,Observacion,Periodo_Acad from notas_historica
	where ((Codigo='$prelac') and (ConexEst='$est') and (Periodo_Acad='$conperiod')
	and (Condicion='3'))");
        while($rowhp = mysql_fetch_array($resulthp)) {
            $nota  =$rowhp["Nota"];
            $obstt =$rowhp["Observacion"];
            $perddp=$rowhp["Periodo_Acad"];
                if (($nota>"2.99" and $obstt=="")){
                    $obst=$rowhp["Observacion"];
                    $notat="si";
                }
        }
        mysql_free_result($resulthp);
        $mmmme="";
        //echo $notat;
        $bper="";
        if ($notat=="" and $mmmme=="") {
            $comentt='';

        $resulthpr=mysql_query("select conexper from validarperiodo  where ((periodo='$conperiod'))");
        while($rowhpr = mysql_fetch_array($resulthpr)) {
            $bper=$rowhpr["conexper"]; $co=$co+1;
                 //if ($est=="20406301" and $codig=="LA430120504" and $co=="1") {
                  //  echo "qw".$conperiod."//".$bper."//".$prelac."<br>";
                //}
                if ($notat=="") {
                    $resulthp=mysql_query("select Condicion,Pra,Nota,Observacion,Periodo_Acad from notas_historica
                    where ((Periodo_Acad='$bper') and (Codigo='$prelac') and (ConexEst='$est'))");
                    while($rowhp = mysql_fetch_array($resulthp)) {
                        $nota=$rowhp["Nota"];
                        $praee=$rowhp["Pra"];
                        $obstet=$rowhp["Observacion"];
                        $perddp=$rowhp["Periodo_Acad"];
                        $condddp=$rowhp["Condicion"];
                        $resultseder=mysql_query("select CodCond from condap where (CodCond='$condddp')");
                        while($rowser = mysql_fetch_array($resultseder)) {
                            $notat="si";
                        }
                        mysql_free_result($resultseder);
                        if (($nota>2.99 and $obstet=="") or ($praee>2.99 and $obstet=="")) {
                            $notat="si";
                            $obst=$rowhp["Observacion"];
                        }
                        
                    }
                    mysql_free_result($resulthp);
                }
                //if ($codig=="51023407" and $est=="12204111") { echo $prelac." : ".$notat."<br>"; }
                if ($notat=="si" and $enlac=="y" and $fomaOE=="O") {
//                    $nova="si";
//			$observer="20";
//                    $modificarcarest = "UPDATE notas_historica SET Observacion ='20' WHERE id=$confq";
//                    $resultcarest = mysql_query ($modificarcarest);
                      break;
                }
                if ($notat=="" and $enlac=="o" and $fomaOE=="O") {
                    $nova="";
                }
                if ($fomaOE=="E" and $notat=="si") {
                    //$vali_electiva="si";
                }
        }
        mysql_free_result($resulthpr);
        }
        
        $notatval="";
        if ($notat=="si" and $enlac=="y" and $notatev=="" and $obstet=="20") {
            $notatval="si";  $nova=""; if ($codig=="EC-540220806" and $est=="19070hh846") { }
		$observer="";
            $modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
        }
        if ($notat=="" and $enlac=="y" and $notatval=="" and $fomaOE=="O") { 
            //if ($est=="17816060oii") { echo $prelac; }
            $notatev="si"; $observer="20";
            $comentt=$comentt.'/'.$prelac;
            $modificarcarest = "UPDATE notas_historica SET Observacion ='20' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
                break;
        }
        if ($nova=="si"  and $notatval=="") {
            $notat=""; $observer="20";
            //if ($est=='17661971bnnn') { echo "$prelac <br>"; }
            $comentt=$comentt.'/'.$prelac;
            $modificarcarest = "UPDATE notas_historica SET Observacion ='20' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
        }
        if ($fomaOE=="E" and $vali_electiva=="si") {
            $notat="si";
        }
        if ($enlac=="o") {
          if ($notat=="si" and $her=="" and $obstet=="20") {
		$observer="";
                $modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
				$pret="";
                $bie="si";
                break;
            }
            if ($notat=="" and $her=="" and $bie==""){
                $observer="20";
                //if ($est=='17661971ss') { echo "$prelac <br>"; }
                    $comentt=$comentt.'/'.$prelac;
                $modificarcarest = "UPDATE notas_historica SET Observacion ='20' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
				$pret="20";
            }
            $aprob="desp";
        }
///////////////////////////////////////////////////////////////////////////////////
	$ucpl="";
		 if ($ucprela!="" and $prelac=="") {
         	if ($uca_est>=$ucprela) {
			$observer="";
         			$modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
                	$resultcarest = mysql_query ($modificarcarest);
                	$ucpl="si";
         	}
         }
        if ($enlac=="" and $relac=="" and $aprob==""){
            
          if ($notat=="si" and $obstet=="20") {
              
		$observer="";
                $modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
				$pret="";
                                break;
            }
            if ($notat==""){
                $observer="20";
                //if ($est=='17661971iii') { echo "$prelac <br>";}
                $modificarcarest = "UPDATE notas_historica SET Observacion ='20' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
				$pret="20";
            }
        }
        

       $notat="";
    }
    mysql_free_result($resulth);

          if ($tieneprelacion=="" and $obstet=="20"){
		$observer="";
                $modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
				$pret="";
                                
            }
	
		//echo "$conperiod /// $codig /// $bcarrera1 //";




    ////////////////////////////////////////////////////////////
        $resulthp=mysql_query("select Periodo_Acad from notas_historica  where ((Codigo='$hever') and (ConexEst='$est'))");
        while($rowhp = mysql_fetch_array($resulthp)) {
		$pertta=$rowhp["Periodo_Acad"];	
		/////////////////////////////////////////////////////////////////////////////////////////
        	$bpera="";
                //if ($est=='10990332') { echo $pertta.'/'.$hever;}
        	$resulthpr=mysql_query("select distinct conexper from validarperiodo  where ((periodo='$pertta'))");
        	while($rowhpr = mysql_fetch_array($resulthpr)) {
                    $bpera=$rowhpr["conexper"];
                    $resulthpa=mysql_query("select Pra,Nota,Observacion,Periodo_Acad,Codigo from notas_historica  where ((Periodo_Acad='$bpera') and (Codigo='$hever') and (ConexEst='$est'))");
                    while($rowhpa = mysql_fetch_array($resulthpa)) {
                            $notass=$rowhpa["Nota"];
                            $codigoc=$rowhpa["Codigo"];
                            $obserpar=$rowhpa["Observacion"];

                            if ($notass>"1.00" and $notass<"3.00" and $obserpar=="") {
                                    $asig="si";
                            }
                            if ($notass>"1.00" and $notass<"3.00" and $obserpar==""){
                                    $nae="si";
                            //FRAN 15/04/2011 COMIENZO DE VALIDACIÓN DE AUTOESTUDIO SANCARLOS
                            } else if ($notass === '1.00' AND (substr($hever, 0, 2) == 'SC') and $obserpar=="") {
                                $cons_sem = mysql_query("SELECT Ano FROM semestre_acad
                          WHERE Sem_Acad='$bpera'");
                                while ($arr_sem = mysql_fetch_array($cons_sem)) {
                                    $ano_sem = $arr_sem['Ano'];
                                }
                                @mysql_free_result($cons_sem);
                                if ($ano_sem<='2010' AND $bpera<>'20102' ) {
                                    $nae="si";
                                }
                            }
                            if ($notass>"2.99"){
                                    //$naei="si";
                            }
                    }
                    mysql_free_result($resulthpa);
                    if ($asig=="si" Or $nae=="si"){
                    break;
                    }
        	}
        	mysql_free_result($resulthpr);
		///////////////////////////////////////////////////////////////////////////////////
                if ($asig=="si" Or $nae=="si"){
			break;
                }
        }
        mysql_free_result($resulthp);
        //$sumatt=number_format($sumatt,2,"."," ");
         //////////////////////////////////////////////////////////////////////////////
        //if ($est=='18871066') { echo "sd // $sumatt"; }

        if($condic=="7" Or $condic=="5") {
        //if ($est=='10990332') { echo " $sumatt";}
        if($sumatt<3.00 && $asig==""){  //if ($est=='18871066') { echo "sd // $sumatt"; }
		$observer="26";
                $modificarcarest = "UPDATE notas_historica SET Observacion ='26' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
				$pret="26";
         }
        if($sumatt>2.99 and $obserpar=="26"){ //if ($est=='18871066') { echo "sd2"; }
		$observer="";
                $modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
				$pret="";
         }
        if ($naei=="si" and $pertt<>"$conperiod"){
		$observer="21";
                $modificarcarest = "UPDATE notas_historica SET Observacion ='21' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
				$pret="21";
            }
        if ($naei=="" and $observ=="21"){
		$observer="";
                $modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
				$pret="";
            }
        if ($asig=="si" and $observ=="26"){
		$observer="";
            $modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
             $resultcarest = mysql_query ($modificarcarest);
			$pret=""; 
        }
        }
        if($condic=="2") {
            if($codigoc=="") {
                    $observer="23";
                $modificarcarest = "UPDATE notas_historica SET Observacion ='23' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
                            $pret="23";
            }
            if($codigoc<>"" and $nae=="") {
                $observer="23";
                $modificarcarest = "UPDATE notas_historica SET Observacion ='23' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
                $pret="23";
            }
            if($codigoc<>"" and $nae=="si" and $observ=="23"){ $observer="";
                $modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
                            $pret="";
            }
            if($codigoc<>"" and $naei=="si" and $pertt<>"$conperiod"){ $observer="21";
                $modificarcarest = "UPDATE notas_historica SET Observacion ='21' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
                            $pret="21";
            }
            if($codigoc<>"" and $naei=="" and $observ=="21"){ $observer="";
                $modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
                $resultcarest = mysql_query ($modificarcarest);
                            $pret="";
            }
        }


        if($condic=="33"){ $observer="";
            $modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
            $resultcarest = mysql_query ($modificarcarest);
			$pret="";
        }
        if($condic=="3ss"){ $observer="";
            $modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
            $resultcarest = mysql_query ($modificarcarest);
			$pret="";
        }
         if ($ucprela!="" and $prelac==""){
         	if ($uca_est>=$ucprela) { $observer="";
         			$modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
                	$resultcarest = mysql_query ($modificarcarest);
                	$ucpl="si";
         	}
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
          $pertt="";
 //}
 //}
         	
/////////////////////////////////////////////////////////////Vali
    if($condic=="33"){ $observer="";
            $modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
            $resultcarest = mysql_query ($modificarcarest);
			$pret="";
        }
  //echo $comentt;
 if ($observer!="") {
//return $observer;
 } else {
     //return $observer;
 }
 // }
 // mysql_free_result($resultins);
////////////////////////////////////////////////////////////////////////////////////
}
}
//////////////////////////////////////////////////////////////Fin del Proceso
}

/*
contaduria p3
64047804 PASANTIAS +5 materias
64047802  TRABAJO DE GRADO + 4 materias
*/
?>
