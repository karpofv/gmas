<?php
        //print_r($notas_historica);
//	$resultsedef=mysql_query("select Nota,Observacion,Periodo_Acad,Condicion,Pra,Codigo,id,ConexEst,CodCar from notas_historica where ConexEst='$est' and CodCar='$bcarrera1'");
//        while($rowdef = mysql_fetch_array($resultsedef)) {
//             $notas_historica[]=array('Nota' => $rowdef[Nota], 
//                 'Observacion'=>$rowdef[Observacion], 
//                 'Periodo_Acad'=>$rowdef[Periodo_Acad], 
//                 'Condicion'=>$rowdef[Condicion], 
//                 'Pra'=>$rowdef[Pra], 
//                 'Codigo'=>$rowdef[Codigo], 
//                 'ConexEst'=>$rowdef[ConexEst], 
//                 'CodCar'=>$rowdef[CodCar], 
//                 'id'=>$rowdef[id]);
//        }
//        mysql_free_result($resultsedef);
	//////////////////////////////////////////////////////////////Inicio Vali
	if (($conperiod=="20102" and ($codig=="64047802" Or $codig=="64047804" Or $codig=="63047802" Or $codig=="63047801" Or $codig=="56023602" Or $codig=="55010010" Or $codig=="24047601" Or $codig=="61041804" Or $codig=="EM-540220806" Or $codig=="EI-540220806" Or $codig=="EG-540220806" Or $codig=="EF-540230801" Or $codig=="ED-540220806" Or $codig=="EC-540220806" Or $codig=="EA-540220806" Or $codig=="PA220241001" Or $codig=="51025002P" Or $codig=="EA521350709" Or $codig=="EA520350609"))) {
		$contuct=0;
	 	$resultvalhist=mysql_query("select materias.UC
		from notas_historica, materias, carrera_materia
		where (notas_historica='$conperiod') and (notas_historica.ConexEst='$est') and (carrera_materia.CodCar='$bcarrera1')
		and (materias.CodMateria=notas_historica.Codigo)
		and (carrera_materia.CodMateria=notas_historica.Codigo)");
            	while($rowhistt = mysql_fetch_array($resultvalhist)) {
                	$cantuc=$rowhistt[UC];
			$contuct=$contuct+$contuc;

            	}mysql_free_result($resultvalhist);
		$ucaut=2;
		if (($bcarrera1==113 and $cantuct < 10) Or ($bcarrera1==123 and $cantuct < 10)) {
			$ucaut=3;
		}
            $tieneuno='';
            $resulthi=mysql_query("select Codigo from inscripcion_historica
            where ((Periodo_Acad='20111' and ConexEst='$est')) order by id");
            while($rowhi = mysql_fetch_array($resulthi)) {
                $tieneuno='q';

            }mysql_free_result($resulthi);
            if ($tieneuno=='') {
                    $cantid=0;

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
                    foreach ($notas_historica as $rowhp) {
                        if($rowhp[Periodo_Acad]==$conperiod and $rowhp[Codigo]==$prelac and $rowhp[ConexEst]=$est){
                            $nota=$rowhp["Nota"];
                            $praee=$rowhp["Pra"];
                            $obstet=$rowhp["Observacion"];
                            $perddp=$rowhp["Periodo_Acad"];
                            $condddp=$rowhp["Condicion"];
                            $cantid=$cantid+1;

                            if ($conperiod==$perddp and $cantid <= $ucaut) {

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
                            if ($cantid > $ucaut) { $notat=''; }
                         //if ($conperiod==$perddp) {
                            if ($notat=="si" and $enlac=="y") {
                                $observer="";
                                    //	echo '/'.$confq.'//'.$codig.'//';

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
                            if ($fomaOE=="E" and $notat=="si") {
                                   $vali_electiva="si";
                            }
                        }
                    }
//                    $resulthp=mysql_query("select Condicion,Pra,Nota,Observacion,Periodo_Acad,id from notas_historica
//                    where ((Codigo='$prelac') and (ConexEst='$est') and (Periodo_Acad='$conperiod'))");
//                    while($rowhp = mysql_fetch_array($resulthp)) {
//                        
//                    //}
//                    }
//                    mysql_free_result($resulthp);

                }
                mysql_free_result($resulth);
            }
        }
        /////////////////////////////////////////////////////////////Vali
        ///////////////////////////////////////////////////////////Evaluar Prelac
        $codigo=$codig; $conperiodo=$conperiod; $concedula=$est;

		if (($conperiodo=='20111' Or $conperiodo=='2011D' Or $conperiodo=='20121' Or $conperiodo=='20122' Or $conperiodo=='20131' Or $conperiodo=='20132' Or $conperiodo=='20141' Or $conperiodo=='20142') and ($codigo == 'ED-540220806' or $codigo == 'EC-540220806' or $codigo == 'EG-540220806' or $codigo == 'EI-540220806' or $codigo == 'EM-540220806' or $codigo == 'EF-540230801' or $codigo == 'EA-540220806')) {

         //echo "/";
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
			$cuanto=0;
			// $resulthp=mysql_query("select Nota, Observacion,Pra from notas_historica
                        //   where ((Periodo_Acad='$conperiodo') and (ConexEst='$concedula'))");
                        //   while($rowhp = mysql_fetch_array($resulthp)) {
			//	$cuanto=$cuanto+1;
                        //   }
                        //   mysql_free_result($resulthp);

			if ($fomaOE!="E" and $cuanto<3) {
			$notat="";
			$resulthpr=mysql_query("select conexper from validarperiodo  where ((periodo='$conperiodo'))");
        		while($rowhpr = mysql_fetch_array($resulthpr)) {
            		$bper=$rowhpr["conexper"];
		           //if ($bper!='20111') {
                        foreach ($notas_historica as $rowhp) {
                            if($rowhp[Observacion]==0 and $rowhp[Periodo_Acad]==$bper and $rowhp[Codigo]==$prelacod and $rowhp[ConexEst]=$concedula){
                                $nota       =$rowhp["Nota"];
            			$pnota      =$rowhp["Pra"];
            			$veraspss   =$rowhp["Observacion"];
            			$entro="si";
            			if (($nota>"2.99" and $veraspss==0) Or ($pnota>"2.99" and $veraspss==0)){
               			$notat="si";
            			}
            			if (($nota<"3.00" and $veraspss==0 and $notat=="") Or ($pnota<"3.00" and $veraspss==0 and $notat=="")){
                			$notat="";
            			}
                            }
                            
                        }
//        		   $resulthp=mysql_query("select Nota, Observacion,Pra from notas_historica
//        		   where ((Observacion=0) and (Periodo_Acad='$bper') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
//        		   while($rowhp = mysql_fetch_array($resulthp)) {
//                           }
//        		   mysql_free_result($resulthp);
			   //}
			}
			//if ($codigo=="EC-540220806") {echo $prelacod.' '.$nota."//".$notat.'<br>';}
			$nova="";
			if (($codigo == 'EA-540220806' and $notat=="" and $codigo=="EA-540220501") or ($codigo == 'EA-540220806' and $notat=="" and $codigo=="EA-540220602") or ($codigo == 'ED-540220806' and $notat=="" and $codigo=="ED-540220501") or ($codigo == 'ED-540220806' and $notat=="" and $codigo=="ED-540220602") or ($codigo == 'EC-540220806' and $notat=="" and $codigo=="EC-540220501") or ($codigo == 'EC-540220806' and $notat=="" and $codigo=="EC-540220602") or ($codigo == 'EG-540220806' and $notat=="" and $codigo=="EG-540220501") or ($codigo == 'EG-540220806' and $notat=="" and $codigo=="EG-540220602") or ($codigo == 'EI-540220806' and $notat=="" and $codigo=="EI-540220501") or ($codigo == 'EI-540220806' and $notat=="" and $codigo=="EI-540220602") or ($codigo == 'EM-540220806' and $notat=="" and $codigo=="EM-540220501") or ($codigo == 'EM-540220806' and $notat=="" and $codigo=="EM-540220602") or ($codigo == 'EF-540230801' and $notat=="" and $codigo=="EF-540220603") or ($codigo == 'EF-540230801' and $notat=="" and $codigo=="EF-540220502")) { $seprec=5; $nova="n"; }
			if ($notat=="" and $nova=="") {
				$seprec=$seprec+1;
				 $mitt=0;
                            foreach ($notas_historica as $rowhp) {
                                if($rowhp[Periodo_Acad]==$conperiodo and $rowhp[Codigo]==$prelacod and $rowhp[ConexEst]=$concedula){
                                    $nota       =$rowhp["Nota"];
                                    $pnota      =$rowhp["Pra"];
                                    $veraspss   =$rowhp["Observacion"];
                                    $entro="si";
                                    if (($nota>"2.99" and $veraspss==0) Or ($pnota>"2.99" and $veraspss==0)){
                                    $mitt=1;
                                    }
                                    if (($nota<"3.00" and $veraspss==0 and $mitt=="") Or ($pnota<"3.00" and $veraspss==0 and $mitt=="")){
                                            $mitt=0; $seprec=5;
                                    }
                                }
                            }
                        
//                           $resulthp=mysql_query("select Nota, Observacion,Pra from notas_historica
//                           where ((Periodo_Acad='$conperiodo') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
//                           while($rowhp = mysql_fetch_array($resulthp)) {
//                           }
//                           mysql_free_result($resulthp);
				//echo $prelacod."<br>";
			//if ($prelacod=="EM-540150717") { echo $nota."//".$pnota."//".$notat;}

			if (($codigo == 'EA-540220806' and $prelacod=="EA-540220501") or ($codigo == 'EA-540220806' and $prelacod=="EA-540220602") or ($codigo == 'ED-540220806' and $prelacod=="ED-540220501") or ($codigo == 'ED-540220806' and $prelacod=="ED-540220602") or ($codigo == 'EC-540220806' and $prelacod=="EC-540220501") or ($codigo == 'EC-540220806' and $prelacod=="EC-540220602") or ($codigo == 'EG-540220806' and $prelacod=="EG-540220501") or ($codigo == 'EG-540220806' and $prelacod=="EG-540220602") or ($codigo == 'EI-540220806' and $prelacod=="EI-540220501") or ($codigo == 'EI-540220806' and $prelacod=="EI-540220602") or ($codigo == 'EM-540220806' and $prelacod=="EM-540220501") or ($codigo == 'EM-540220806' and $prelacod=="EM-540220602") or ($codigo == 'EF-540230801' and $prelacod=="EF-540220603") or ($codigo == 'EF-540230801' and $prelacod=="EF-540220502")) { $seprec=5; $nova="n"; }
                        if ($mitt==0 and $nova=="") {
                                //echo "/";
                                $peresp="";
if ($conperiodo=='20111') { $peresp="2011F"; }
if ($conperiodo=='20121') { $peresp="2012F"; }
if ($conperiodo=='20131') { $peresp="2013F"; }

                                foreach ($notas_historica as $rowhp) {
                                    if($rowhp[Periodo_Acad]==$peresp and $rowhp[Codigo]==$prelacod and $rowhp[ConexEst]=$concedula){
                                        $nota       =$rowhp["Nota"];
                                        $pnota      =$rowhp["Pra"];
                                        $veraspss   =$rowhp["Observacion"];
                                        $condvali   =$rowhp["Condicion"];
                                        $entro="si";
                                        //echo $prelacod.'//'.$rowhp["Condicion"];
                                        if ($condvali=="2" Or $condvali=="5") {
                                            if (($nota>"2.99" and $veraspss==0) Or ($pnota>"2.99" and $veraspss==0)){
                                            $mitt=1;$seprec=2;
                                            }
                                            if (($nota<"3.00" and $veraspss==0 and $mitt=="") Or ($pnota<"3.00" and $veraspss==0 and $mitt=="")){
                                                    $mitt=0; $seprec=5;
                                            }
                                        }
                                    }
                                }
//                               $resulthp=mysql_query("select Nota, Observacion,Pra,Condicion,Periodo_Acad from notas_historica
//                               where ((Periodo_Acad='$peresp') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
//                               while($rowhp = mysql_fetch_array($resulthp)) {
//                                    
//
//                               }
//                               mysql_free_result($resulthp);

                           }
                        if ($mitt==0) { $seprec=5; break; }

			}

$observer="20";
			if ($seprec>2) { break; }
			}
		}
		if ($seprec<3) { $observer="";
                    //$modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
                    //$resultcarest = mysql_query ($modificarcarest);
			$pret="";
                }
		}
		//echo $prelacod."<br>";
		//if ($prelacod=="EG-540220806") { echo $nota."//".$pnota."//".$notat;}

                //////// Validar Administracion
                if (($conperiodo=='20111' Or $conperiodo=='2011D' Or $conperiodo=='20121' Or $conperiodo=='20122' Or $conperiodo=='20131' Or $conperiodo=='20132' Or $conperiodo=='20141' Or $conperiodo=='20142') and ($codigo == '63047801' or $codigo == '63047802')) {

                //echo "/";
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
			$cuanto=0;
			// $resulthp=mysql_query("select Nota, Observacion,Pra from notas_historica
                        //   where ((Periodo_Acad='$conperiodo') and (ConexEst='$concedula'))");
                        //   while($rowhp = mysql_fetch_array($resulthp)) {
			//	$cuanto=$cuanto+1;
                        //   }
                        //   mysql_free_result($resulthp);

			if ($fomaOE!="E" and $cuanto<3) {
			$notat="";
			$resulthpr=mysql_query("select conexper from validarperiodo  where ((periodo='$conperiodo'))");
        		while($rowhpr = mysql_fetch_array($resulthpr)) {
            		$bper=$rowhpr["conexper"];
		           //if ($bper!='20111') {
                            foreach ($notas_historica as $rowhp) {
                                if($rowhp[Periodo_Acad]==$bper and $rowhp[Codigo]==$prelacod and $rowhp[ConexEst]=$concedula){
                                    $nota       =$rowhp["Nota"];
                                    $pnota      =$rowhp["Pra"];
                                    $veraspss   =$rowhp["Observacion"];
                                    $entro="si";
                                    if (($nota>"2.99" and $veraspss==0) Or ($pnota>"2.99" and $veraspss==0)){
                                    $notat="si";
                                    }
                                    if (($nota<"3.00" and $veraspss==0 and $notat=="") Or ($pnota<"3.00" and $veraspss==0 and $notat=="")){
                                            $notat="";
                                    }
                                }
                            }
//        		   $resulthp=mysql_query("select Nota, Observacion,Pra from notas_historica
//        		   where ((Periodo_Acad='$bper') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
//        		   while($rowhp = mysql_fetch_array($resulthp)) {
//                           }
//        		   mysql_free_result($resulthp);
			   //}
			}
			//if ($prelacod=="EC-540140101") {echo $nota."//".$notat;}
			$nova="";
			if (($codigo == '63047801' and $prelacod=="63011202" and $notat=="") or ($codigo == '63047802' and $prelacod=="63011202" and $notat=="")) { $seprec=5; $nova="n"; }
			if ($notat=="" and $nova=="") {

				$seprec=$seprec+1;
				 $mitt=0;
                                foreach ($notas_historica as $rowhp) {
                                    if($rowhp[Periodo_Acad]==$conperiodo and $rowhp[Codigo]==$prelacod and $rowhp[ConexEst]=$concedula){
                                        $nota       =$rowhp["Nota"];
                                        $pnota      =$rowhp["Pra"];
                                        $veraspss   =$rowhp["Observacion"];
                                        $entro="si";
                                        if (($nota>"2.99" and $veraspss==0) Or ($pnota>"2.99" and $veraspss==0)){
                                        $mitt=1;$seprec='';
                                        }
                                        if (($nota<"3.00" and $veraspss==0 and $mitt=="") Or ($pnota<"3.00" and $veraspss==0 and $mitt=="")){
                                                $mitt=0; $seprec=5;
                                                //echo $rowhp["Codigo"].'<br>';
                                        }
                                    }
                                }
//                                $resulthp=mysql_query("select Nota, Observacion,Pra from notas_historica
//                           where ((Periodo_Acad='$conperiodo') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
//                           while($rowhp = mysql_fetch_array($resulthp)) {
//                           }
//                           mysql_free_result($resulthp);
				//echo $prelacod."<br>";
			if (($codigo == '63047801' and $prelacod=="63011202") or ($codigo == '63047802' and $prelacod=="63011202")) {
                             $seprec=5; $nova="n";

                            }
                            if ($mitt==0 and $nova=="") {
                                //echo "/";
                                $peresp="";
if ($conperiodo=='20111') { $peresp="2011F"; }
if ($conperiodo=='20121') { $peresp="2012F"; }
if ($conperiodo=='20131') { $peresp="2013F"; }
                                foreach ($notas_historica as $rowhp) {
                                    if($rowhp[Periodo_Acad]==$peresp and $rowhp[Codigo]==$prelacod and $rowhp[ConexEst]=$concedula){
                                        $nota       =$rowhp["Nota"];
                                        $pnota      =$rowhp["Pra"];
                                        $veraspss   =$rowhp["Observacion"];
                                        $condvali   =$rowhp["Condicion"];
                                        $entro="si";
                                        //echo $prelacod.'//'.$rowhp["Condicion"];
                                        if ($condvali=="2" Or $condvali=="5") {
                                            if (($nota>"2.99" and $veraspss==0) Or ($pnota>"2.99" and $veraspss==0)){
                                            $mitt=1;$seprec=2;
                                            }
                                            if (($nota<"3.00" and $veraspss==0 and $mitt=="") Or ($pnota<"3.00" and $veraspss==0 and $mitt=="")){
                                                    $mitt=0; $seprec=5;
                                            }
                                        }
                                    }
                                }
//                               $resulthp=mysql_query("select Nota, Observacion,Pra,Condicion,Periodo_Acad from notas_historica
//                               where ((Periodo_Acad='$peresp') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
//                               while($rowhp = mysql_fetch_array($resulthp)) {
//                               }
//                               mysql_free_result($resulthp);

                           }
                          if ($mitt==0) { $seprec=5; break; }

			}
			$observer="20";
			if ($seprec>2) { break; }

			}
		}

		if ($seprec<3) { $observer="";
                    //$modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
                    //$resultcarest = mysql_query ($modificarcarest);
			$pret="";
                }
		}
                //////////////////////// Fin Administracion
                //////// Validar Contaduria

                if (($conperiodo=='20111' Or $conperiodo=='2011D' Or $conperiodo=='20121' Or $conperiodo=='20122' Or $conperiodo=='20131' Or $conperiodo=='20132' Or $conperiodo=='20141' Or $conperiodo=='20142') and ($codigo == '64047802' or $codigo == '64047804')) {

                //echo "/";
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
			$cuanto=0;
			// $resulthp=mysql_query("select Nota, Observacion,Pra from notas_historica
                        //   where ((Periodo_Acad='$conperiodo') and (ConexEst='$concedula'))");
                        //   while($rowhp = mysql_fetch_array($resulthp)) {
			//	$cuanto=$cuanto+1;
                        //   }
                        //   mysql_free_result($resulthp);

			if ($fomaOE!="E" and $cuanto<3) {
			$notat="";
                        $nota="";$pnota="";
			$resulthpr=mysql_query("select conexper from validarperiodo  where ((periodo='$conperiodo'))");
        		while($rowhpr = mysql_fetch_array($resulthpr)) {
            		$bper=$rowhpr["conexper"];
		           //if ($bper!='20111') {
                           foreach ($notas_historica as $rowhp) {
                                if($rowhp[Periodo_Acad]==$bper and $rowhp[Codigo]==$prelacod and $rowhp[ConexEst]=$concedula){
                                    $nota       =$rowhp["Nota"];
                                    $pnota      =$rowhp["Pra"];
                                    $veraspss   =$rowhp["Observacion"];
                                    $entro="si";
                                    if (($nota>"2.99" and $veraspss==0) Or ($pnota>"2.99" and $veraspss==0)){
                                    $notat="si";
                                    }
                                    if (($nota<"3.00" and $veraspss==0 and $notat=="") Or ($pnota<"3.00" and $veraspss==0 and $notat=="")){
                                            $notat="";
                                    }
                                }
                           }
//        		   $resulthp=mysql_query("select Nota, Observacion,Pra from notas_historica
//        		   where ((Periodo_Acad='$bper') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
//        		   while($rowhp = mysql_fetch_array($resulthp)) {
//            			
//                                //if ($prelacod=="64013101") { echo $nota."//".$notat.'/'.$pnota.'<br>'; }
//        		   }
//        		   mysql_free_result($resulthp);
			   //}
			}
			//if ($prelacod=="64013101") {echo $nota."//".$notat.'/'.$pnota.'<br>';}
			$nova="";
			if (($codigo == '64047802' and $prelacod=="64012201" and $notat=="") or ($codigo == '64047804' and $prelacod=="64012201" and $notat=="")) { $seprec=5; $nova="n"; }
			if ($notat=="" and $nova=="") {
				$seprec=$seprec+1;
				 $mitt=0;
                                foreach ($notas_historica as $rowhp) {
                                    if($rowhp[Periodo_Acad]==$conperiodo and $rowhp[Codigo]==$prelacod and $rowhp[ConexEst]=$concedula){
                                        $nota       =$rowhp["Nota"];
                                        $pnota      =$rowhp["Pra"];
                                        $veraspss   =$rowhp["Observacion"];
                                        $entro="si";
                                        if (($nota>"2.99" and $veraspss==0) Or ($pnota>"2.99" and $veraspss==0)){
                                        $mitt=1;
                                        }
                                        if (($nota<"3.00" and $veraspss==0 and $mitt=="") Or ($pnota<"3.00" and $veraspss==0 and $mitt=="")){
                                                $mitt=0; $seprec=5;
                                        }
                                    }
                                }
//                                $resulthp=mysql_query("select Nota, Observacion,Pra from notas_historica
//                           where ((Periodo_Acad='$conperiodo') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
//                           while($rowhp = mysql_fetch_array($resulthp)) {
//                           }
//                           mysql_free_result($resulthp);
				//echo  $seprec.'/'; echo $prelacod.'/'.$nota."<br>";
			if (($codigo == '64047802' and $prelacod=="64012201") or ($codigo == '64047804' and $prelacod=="64012201")) { $seprec=5; $nova="n"; }

                        if ($mitt==0 and $nova=="") {
                                //echo "/";
                                $peresp="";
if ($conperiodo=='20111') { $peresp="2011F"; }
if ($conperiodo=='20121') { $peresp="2012F"; }
if ($conperiodo=='20131') { $peresp="2013F"; }
                                foreach ($notas_historica as $rowhp) {
                                    if($rowhp[Periodo_Acad]==$peresp and $rowhp[Codigo]==$prelacod and $rowhp[ConexEst]=$concedula){
                                        $nota       =$rowhp["Nota"];
                                        $pnota      =$rowhp["Pra"];
                                        $veraspss   =$rowhp["Observacion"];
                                        $condvali   =$rowhp["Condicion"];
                                        $entro="si";
                                        //echo $prelacod.'//'.$rowhp["Condicion"];
                                        if ($condvali=="2" Or $condvali=="5") {
                                            if (($nota>"2.99" and $veraspss==0) Or ($pnota>"2.99" and $veraspss==0)){
                                            $mitt=1;$seprec=2;
                                            }
                                            if (($nota<"3.00" and $veraspss==0 and $mitt=="") Or ($pnota<"3.00" and $veraspss==0 and $mitt=="")){
                                                    $mitt=0; $seprec=5;
                                            }
                                        }
                                    }
                                }
//                               $resulthp=mysql_query("select Nota, Observacion,Pra,Condicion,Periodo_Acad from notas_historica
//                               where ((Periodo_Acad='$peresp') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
//                               while($rowhp = mysql_fetch_array($resulthp)) {
//                               }
//                               mysql_free_result($resulthp);

                           }
                           if ($mitt==0) { $seprec=5; break; }

			}
			$observer="20";
			if ($seprec>2) { break; }
			}
		}

		if ($seprec<3) { $observer="";
                    //$modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
                    //$resultcarest = mysql_query ($modificarcarest);
			$pret="";
                }
		}
                //////////////////////// Fin Contaduria
                ////////// Validar TSU Informatica
                if (($conperiodo=='20111' Or $conperiodo=='2011D' Or $conperiodo=='20121' Or $conperiodo=='20122' Or $conperiodo=='20131' Or $conperiodo=='20132' Or $conperiodo=='20141' Or $conperiodo=='20142') and ($codigo == '55010010' or $codigo == '56023602')) {

                //echo "/";
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
			$cuanto=0;
			if ($fomaOE!="E" and $cuanto<3) {
			$notat="";
                        $nota="";$pnota="";
			$resulthpr=mysql_query("select conexper from validarperiodo  where ((periodo='$conperiodo'))");
        		while($rowhpr = mysql_fetch_array($resulthpr)) {
            		$bper=$rowhpr["conexper"];
		           //if ($bper!='20111') {
                            foreach ($notas_historica as $rowhp) {
                                if($rowhp[Periodo_Acad]==$bper and $rowhp[Codigo]==$prelacod and $rowhp[ConexEst]=$concedula){
                                    $nota       =$rowhp["Nota"];
                                    $pnota      =$rowhp["Pra"];
                                    $veraspss   =$rowhp["Observacion"];
                                    $entro="si";
                                    if (($nota>"2.99" and $veraspss==0) Or ($pnota>"2.99" and $veraspss==0)){
                                    $notat="si";
                                    }
                                    if (($nota<"3.00" and $veraspss==0 and $notat=="") Or ($pnota<"3.00" and $veraspss==0 and $notat=="")){
                                            $notat="";
                                    }
                                }
                            }
//        		   $resulthp=mysql_query("select Nota, Observacion,Pra from notas_historica
//        		   where ((Periodo_Acad='$bper') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
//        		   while($rowhp = mysql_fetch_array($resulthp)) {
//            			
//                                //if ($prelacod=="64013101") { echo $nota."//".$notat.'/'.$pnota.'<br>'; }
//        		   }
//        		   mysql_free_result($resulthp);
			   //}
			}
			//if ($prelacod=="64013101") {echo $nota."//".$notat.'/'.$pnota.'<br>';}
			$nova="";
			//if (($codigo == '64047802' and $prelacod=="64012201" and $notat=="") or ($codigo == '64047804' and $prelacod=="64012201" and $notat=="")) { $seprec=5; $nova="n"; }
			if ($notat=="" and $nova=="") {
				$seprec=$seprec+1;
				 $mitt=0;
                                foreach ($notas_historica as $rowhp) {
                                    if($rowhp[Periodo_Acad]==$conperiodo and $rowhp[Codigo]==$prelacod and $rowhp[ConexEst]=$concedula){
                                        $nota       =$rowhp["Nota"];
                                        $pnota      =$rowhp["Pra"];
                                        $veraspss   =$rowhp["Observacion"];
                                        $entro="si";
                                        if (($nota>"2.99" and $veraspss==0) Or ($pnota>"2.99" and $veraspss==0)){
                                        $mitt=1;
                                        }
                                        if (($nota<"3.00" and $veraspss==0 and $mitt=="") Or ($pnota<"3.00" and $veraspss==0 and $mitt=="")){
                                                $mitt=0; $seprec=5;
                                        }
                                    }
                                }
//                                $resulthp=mysql_query("select Nota, Observacion,Pra from notas_historica
//                                where ((Periodo_Acad='$conperiodo') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
//                                while($rowhp = mysql_fetch_array($resulthp)) {
//                                }
//                                mysql_free_result($resulthp);
				//echo  $seprec.'/'; echo $prelacod.'/'.$nota."<br>";
			//if (($codigo == '64047802' and $prelacod=="64012201") or ($codigo == '64047804' and $prelacod=="64012201")) { $seprec=5; $nova="n"; }
                          if ($mitt==0) {
                                //echo "/";
                                $peresp="";
if ($conperiodo=='20111') { $peresp="2011F"; }
if ($conperiodo=='20121') { $peresp="2012F"; }
if ($conperiodo=='20131') { $peresp="2013F"; }
                                foreach ($notas_historica as $rowhp) {
                                    if($rowhp[Periodo_Acad]==$peresp and $rowhp[Codigo]==$prelacod and $rowhp[ConexEst]=$concedula){
                                        $nota       =$rowhp["Nota"];
                                        $pnota      =$rowhp["Pra"];
                                        $veraspss   =$rowhp["Observacion"];
                                        $condvali   =$rowhp["Condicion"];
                                        $entro="si";
                                        //echo $prelacod.'//'.$rowhp["Condicion"];
                                        if ($condvali=="2" Or $condvali=="5") {
                                            if (($nota>"2.99" and $veraspss==0) Or ($pnota>"2.99" and $veraspss==0)){
                                            $mitt=1;$seprec=2;
                                            }
                                            if (($nota<"3.00" and $veraspss==0 and $mitt=="") Or ($pnota<"3.00" and $veraspss==0 and $mitt=="")){
                                                    $mitt=0; $seprec=5;
                                            }
                                        }
                                    }
                                }
//                               $resulthp=mysql_query("select Nota, Observacion,Pra,Condicion,Periodo_Acad from notas_historica
//                               where ((Periodo_Acad='$peresp') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
//                               while($rowhp = mysql_fetch_array($resulthp)) {
//                               }
//                               mysql_free_result($resulthp);

                           }
                           if ($mitt==0) { $seprec=5; break; }

			}
			$observer="20";
			if ($seprec>2) { break; }
			}
		}

		if ($seprec<3) { $observer="";
                    //$modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
                    //$resultcarest = mysql_query ($modificarcarest);
			$pret="";
                }
		}
                //////////////////////// Fin TSU Informatica
                //////////// Validar ING Informatica
                if (($conperiodo=='20111' Or $conperiodo=='2011D' Or $conperiodo=='20121' Or $conperiodo=='20122' Or $conperiodo=='20131' Or $conperiodo=='20132' Or $conperiodo=='20141' Or $conperiodo=='20142') and ($codigo == 'II51002091005' or $codigo == 'II51002090904')) {

                //echo "/";
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
                            $cuanto=0;
			if ($fomaOE!="E" and $cuanto<3) {
                            $notat="";
                            $nota="";$pnota="";
    			$resulthpr=mysql_query("select distinct conexper from validarperiodo  where ((periodo='$conperiodo'))");
            		while($rowhpr = mysql_fetch_array($resulthpr)) {
                		$bper=$rowhpr["conexper"];
    		           //if ($bper!='20111') {
                                foreach ($notas_historica as $rowhp) {
                                    if($rowhp[Periodo_Acad]==$bper and $rowhp[Codigo]==$prelacod and $rowhp[ConexEst]=$concedula){
                                        $nota       =$rowhp["Nota"];
                			$pnota      =$rowhp["Pra"];
                			$veraspss   =$rowhp["Observacion"];
                                    if ($veraspss==0) { $veraspss=''; }
                			$entro="si";
                			if (($nota>"2.99" and $veraspss=="") Or ($pnota>"2.99" and $veraspss=="")){
                   			$notat="si";
                			}
                			if (($nota<"3.00" and $veraspss=="" and $notat=="") Or ($pnota<"3.00" and $veraspss=="" and $notat=="")){
                    			$notat="";
                			}
                                    }
                                }
//            		   $resulthp=mysql_query("select Nota, Observacion,Pra from notas_historica
//            		   where ((Periodo_Acad='$bper') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
//            		   while($rowhp = mysql_fetch_array($resulthp)) {
//                	        //if ($prelacod=="64013101") { echo $nota."//".$notat.'/'.$pnota.'<br>'; }
//            		   }
//            		   mysql_free_result($resulthp);
    			   //}
    			}
//                            foreach ($notas_historica as $rowhpa){
//                                if($rowhpa[Codigo]==$prelacod){
//                                    $resulthpr=mysql_query("select distinct conexper from validarperiodo  where ((periodo='$conperiodo'))");
//                                    while($rowhpr = mysql_fetch_array($resulthpr)) {
//                                        $bper=$rowhpr["conexper"];
//                                        if($rowhpr[conexper]==$rowhpa[Periodo_Acad]){
//                                            $nota       =$rowhpa["Nota"];
//                                            $pnota      =$rowhpa["Pra"];
//                                            $veraspss   =$rowhpa["Observacion"];
//                                            if ($veraspss==0) { $veraspss=''; }
//                                            $entro="si";
//                                            if (($nota>"2.99" and $veraspss=="") Or ($pnota>"2.99" and $veraspss=="")){
//                                            $notat="si";
//                                            }
//                                            if (($nota<"3.00" and $veraspss=="" and $notat=="") Or ($pnota<"3.00" and $veraspss=="" and $notat=="")){
//                                                    $notat="";
//                                            }
//                                        }
//                                    }
//                                    mysql_free_result($resulthpr);
//                                }
//                            }
                            //if ($prelacod=="21170158") {echo $nota."//".$notat.'/'.$pnota.'<br>';}
                            
                            $nova="";
                            //if (($codigo == '64047802' and $prelacod=="64012201" and $notat=="") or ($codigo == '64047804' and $prelacod=="64012201" and $notat=="")) { $seprec=5; $nova="n"; }
                            if ($notat=="" and $nova=="") {
                                $seprec=$seprec+1;
                                $mitt=0;

//                                $resulthp=mysql_query("select Nota, Observacion,Pra from notas_historica
//                                where ((Periodo_Acad='$conperiodo') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
//                                while($rowhp = mysql_fetch_array($resulthp)) {
//                                    $nota       =$rowhp["Nota"];
//                                    $pnota      =$rowhp["Pra"];
//                                    $veraspss   =$rowhp["Observacion"];
//                                    if ($veraspss==0) { $veraspss=''; }
//                                    $entro="si";
//                                    if (($nota>"2.99" and $veraspss=="") Or ($pnota>"2.99" and $veraspss=="")){
//                                    $mitt=1;
//                                    }
//                                    if (($nota<"3.00" and $veraspss=="" and $mitt=="") Or ($pnota<"3.00" and $veraspss=="" and $mitt=="")){
//                                            $mitt=0; $seprec=5;
//                                    }
//                                }
//                                mysql_free_result($resulthp);
                                foreach ($notas_historica as $rowhpa){
                                    if($rowhpa[Codigo]==$prelacod and $rowhpa[Periodo_Acad]==$conperiodo){
                                        $nota       =$rowhpa["Nota"];
                                        $pnota      =$rowhpa["Pra"];
                                        $veraspss   =$rowhpa["Observacion"];
                                        if ($veraspss==0) { $veraspss=''; }
                                        $entro="si";
                                        if (($nota>"2.99" and $veraspss=="") Or ($pnota>"2.99" and $veraspss=="")){
                                        $mitt=1;
                                        }
                                        if (($nota<"3.00" and $veraspss=="" and $mitt=="") Or ($pnota<"3.00" and $veraspss=="" and $mitt=="")){
                                                $mitt=0; $seprec=5;
                                        }
                                        //if ($concedula=="21170158") {echo $nota."//".$notat.'/'.$pnota.'<br>';}
                                    }
                                }
                                    //echo  $seprec.'/'; echo $prelacod.'/'.$nota."<br>";
                            //if (($codigo == '64047802' and $prelacod=="64012201") or ($codigo == '64047804' and $prelacod=="64012201")) { $seprec=5; $nova="n"; }
                                if ($mitt==0) {
                                    //echo "/";
                                $peresp="";
    if ($conperiodo=='20111') { $peresp="2011F"; }
    if ($conperiodo=='20121') { $peresp="2012F"; }
    if ($conperiodo=='20131') { $peresp="2013F"; }

//                                    $resulthp=mysql_query("select Nota, Observacion,Pra,Condicion,Periodo_Acad from notas_historica
//                                    where ((Periodo_Acad='$peresp') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
//                                    while($rowhp = mysql_fetch_array($resulthp)) {
//                                         $nota       =$rowhp["Nota"];
//                                         $pnota      =$rowhp["Pra"];
//                                         $veraspss   =$rowhp["Observacion"];
//                                         $condvali   =$rowhp["Condicion"];
//                                         if ($veraspss==0) { $veraspss=''; }
//                                         $entro="si";
//                                         //echo $prelacod.'//'.$rowhp["Condicion"];
//                                         if ($condvali=="2" Or $condvali=="5") {
//                                             if (($nota>"2.99" and $veraspss=="") Or ($pnota>"2.99" and $veraspss=="")){
//                                             $mitt=1;$seprec=2;
//                                             }
//                                             if (($nota<"3.00" and $veraspss=="" and $mitt=="") Or ($pnota<"3.00" and $veraspss=="" and $mitt=="")){
//                                                     $mitt=0; $seprec=5;
//                                             }
//                                         }
//
//                                    }
//                                    mysql_free_result($resulthp);
                                    foreach ($notas_historica as $rowhpa){
                                        if($rowhpa[Codigo]==$prelacod and $rowhpa[Periodo_Acad]==$peresp){
                                            $nota       =$rowhpa["Nota"];
                                            $pnota      =$rowhpa["Pra"];
                                            $veraspss   =$rowhpa["Observacion"];
                                            $condvali   =$rowhpa["Condicion"];
                                            if ($veraspss==0) { $veraspss=''; }
                                            $entro="si";
                                            //echo $prelacod.'//'.$rowhp["Condicion"];
                                            if ($condvali=="2" Or $condvali=="5") {
                                                if (($nota>"2.99" and $veraspss=="") Or ($pnota>"2.99" and $veraspss=="")){
                                                $mitt=1;$seprec=2;
                                                }
                                                if (($nota<"3.00" and $veraspss=="" and $mitt=="") Or ($pnota<"3.00" and $veraspss=="" and $mitt=="")){
                                                        $mitt=0; $seprec=5;
                                                }
                                            }
                                        }
                                    }
                                }
                                if ($mitt==0) { $seprec=5; break; }

                            }
                            $observer="20";
                            if ($seprec>2) { break; }
			}
		}

		if ($seprec<3) { $observer="";
                    //$modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
                    //$resultcarest = mysql_query ($modificarcarest);
			$pret="";
                }
		}
                //////////////////////// Fin ING Informatica
                //////////// Validar TSU Civil
                
                if (($conperiodo=='20111' Or $conperiodo=='2011D' Or $conperiodo=='20121' Or $conperiodo=='20122' Or $conperiodo=='20131' Or $conperiodo=='20132' Or $conperiodo=='20141' Or $conperiodo=='20142') and ($codigo == '24047601')) {

                //echo "/";
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
			$cuanto=0;
                        if ($fomaOE=="E" and $semMat!=$semestreOEp) {
                            $semestreOEp=$semMat; $vali_electivaesp='';
                        }
			if ($vali_electivaesp=='' and $cuanto<3) {
			$notat="";
                        $nota="";$pnota="";
			$resulthpr=mysql_query("select conexper from validarperiodo  where ((periodo='$conperiodo'))");
        		while($rowhpr = mysql_fetch_array($resulthpr)) {
            		$bper=$rowhpr["conexper"];
		           //if ($bper!='20111') {
                            foreach ($notas_historica as $rowhp){
                                if($rowhp[Codigo]==$prelacod and $rowhp[Periodo_Acad]==$bper){
                                    $nota       =$rowhp["Nota"];
                                    $pnota      =$rowhp["Pra"];
                                    $veraspss   =$rowhp["Observacion"];
                                    if ($veraspss==0) { $veraspss=''; }
                                    $entro="si";
                                    if (($nota>"2.99" and $veraspss=="") Or ($pnota>"2.99" and $veraspss=="")){
                                    $notat="si";
                                    $vali_electivaesp='si';
                                    }
                                    if (($nota<"3.00" and $veraspss=="" and $notat=="") Or ($pnota<"3.00" and $veraspss=="" and $notat=="")){
                                            $notat="";
                                    }
                                }
                            }
//        		   $resulthp=mysql_query("select Nota, Observacion,Pra from notas_historica
//        		   where ((Periodo_Acad='$bper') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
//        		   while($rowhp = mysql_fetch_array($resulthp)) {
//            			
//                                //if ($prelacod=="64013101") { echo $nota."//".$notat.'/'.$pnota.'<br>'; }
//        		   }
//        		   mysql_free_result($resulthp);
			   //}
			}
			//if ($prelacod=="64013101") {echo $nota."//".$notat.'/'.$pnota.'<br>';}
			$nova="";
			//if (($codigo == '64047802' and $prelacod=="64012201" and $notat=="") or ($codigo == '64047804' and $prelacod=="64012201" and $notat=="")) { $seprec=5; $nova="n"; }
			if ($notat=="" and $nova=="" and $vali_electivaesp=='') {
				$seprec=$seprec+1;
				 $mitt=0;
                                foreach ($notas_historica as $rowhp){
                                    if($rowhp[Codigo]==$prelacod and $rowhp[Periodo_Acad]==$conperiodo){
                                        $nota       =$rowhp["Nota"];
                                        $pnota      =$rowhp["Pra"];
                                        $veraspss   =$rowhp["Observacion"];
                                        if ($veraspss==0) { $veraspss=''; }
                                        $entro="si";
                                        if (($nota>"2.99" and $veraspss=="") Or ($pnota>"2.99" and $veraspss=="")){
                                        $mitt=1;  
                                        }
                                        if (($nota<"3.00" and $veraspss=="" and $mitt=="") Or ($pnota<"3.00" and $veraspss=="" and $mitt=="")){
                                                $mitt=0; $seprec=5;
                                        }
                                    }
                                }
//                                $resulthp=mysql_query("select Nota, Observacion,Pra from notas_historica
//                                where ((Periodo_Acad='$conperiodo') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
//                                while($rowhp = mysql_fetch_array($resulthp)) {
//                                }
//                                mysql_free_result($resulthp);
				//echo  $seprec.'/'; echo $prelacod.'/'.$nota."<br>";
			//if (($codigo == '64047802' and $prelacod=="64012201") or ($codigo == '64047804' and $prelacod=="64012201")) { $seprec=5; $nova="n"; }
                          if ($mitt==0) {
                                //echo "/";
                                $peresp="";
                                if ($conperiodo=='20111') { $peresp="2011F"; }
                                if ($conperiodo=='20121') { $peresp="2012F"; }
				if ($conperiodo=='20131') { $peresp="2013F"; }
                                
                                foreach ($notas_historica as $rowhp){
                                    if($rowhp[Codigo]==$prelacod and $rowhp[Periodo_Acad]==$peresp){
                                        $nota       =$rowhp["Nota"];
                                        $pnota      =$rowhp["Pra"];
                                        $veraspss   =$rowhp["Observacion"];
                                        $condvali   =$rowhp["Condicion"];
                                        if ($veraspss==0) { $veraspss=''; }
                                        $entro="si";
                                        //echo $prelacod.'//'.$rowhp["Condicion"];
                                        if ($condvali=="2" Or $condvali=="5") {
                                            if (($nota>"2.99" and $veraspss=="") Or ($pnota>"2.99" and $veraspss=="")){
                                            $mitt=1;$seprec=2;
                                            }
                                            if (($nota<"3.00" and $veraspss=="" and $mitt=="") Or ($pnota<"3.00" and $veraspss=="" and $mitt=="")){
                                                    $mitt=0; $seprec=5;
                                            }
                                        }
                                    }
                                }
//                               $resulthp=mysql_query("select Nota, Observacion,Pra,Condicion,Periodo_Acad from notas_historica
//                               where ((Periodo_Acad='$peresp') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
//                               while($rowhp = mysql_fetch_array($resulthp)) {
//                                    
//
//                               }
//                               mysql_free_result($resulthp);

                           }
                           if ($mitt==0) { $seprec=5; break; }

			}
			$observer="20";
			if ($seprec>2) { break; }
			}
		}
		//echo $seprec;
		if ($seprec<3) { $observer=""; 
                    //$modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
                    //$resultcarest = mysql_query ($modificarcarest);
			$pret="";
                }
		}
                //////////////////////// Fin TSU Civil
                
		//////////// Validar Ingles
                if (($conperiodo=='20111' Or $conperiodo=='2011D' Or $conperiodo=='20121' Or $conperiodo=='20122' Or $conperiodo=='20131' Or $conperiodo=='20132' Or $conperiodo=='20141' Or $conperiodo=='20142') and ($codigo == 'TRG096')) {

                //echo "/";
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
			$cuanto=0;
			if ($fomaOE!="E" and $cuanto<3) {
			$notat="";
                        $nota="";$pnota="";
			$resulthpr=mysql_query("select conexper from validarperiodo  where ((periodo='$conperiodo'))");
        		while($rowhpr = mysql_fetch_array($resulthpr)) {
            		$bper=$rowhpr["conexper"];
		           //if ($bper!='20111') {
                            foreach ($notas_historica as $rowhp) {
                                if($rowhp[Periodo_Acad]==$bper and $rowhp[Codigo]==$prelacod and $rowhp[ConexEst]=$concedula){
                                    $nota       =$rowhp["Nota"];
                                    $pnota      =$rowhp["Pra"];
                                    $veraspss   =$rowhp["Observacion"];
                                    if ($veraspss==0) { $veraspss=''; }
                                    $entro="si";
                                    if (($nota>"2.99" and $veraspss=="") Or ($pnota>"2.99" and $veraspss=="")){
                                    $notat="si";
                                    }
                                    if (($nota<"3.00" and $veraspss=="" and $notat=="") Or ($pnota<"3.00" and $veraspss=="" and $notat=="")){
                                            $notat="";
                                    }
                                }
                            }
//        		   $resulthp=mysql_query("select Nota, Observacion,Pra from notas_historica
//        		   where ((Periodo_Acad='$bper') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
//        		   while($rowhp = mysql_fetch_array($resulthp)) {
//            			
//                                //if ($prelacod=="64013101") { echo $nota."//".$notat.'/'.$pnota.'<br>'; }
//        		   }
//        		   mysql_free_result($resulthp);
			   //}
			}
			//if ($prelacod=="64013101") {echo $nota."//".$notat.'/'.$pnota.'<br>';}
			$nova="";
			//if (($codigo == '64047802' and $prelacod=="64012201" and $notat=="") or ($codigo == '64047804' and $prelacod=="64012201" and $notat=="")) { $seprec=5; $nova="n"; }
			if ($notat=="" and $nova=="") {
				$seprec=$seprec+1;
				 $mitt=0;
                                foreach ($notas_historica as $rowhp) {
                                    if($rowhp[Periodo_Acad]==$conperiodo and $rowhp[Codigo]==$prelacod and $rowhp[ConexEst]=$concedula){
                                        $nota       =$rowhp["Nota"];
                                        $pnota      =$rowhp["Pra"];
                                        $veraspss   =$rowhp["Observacion"];
                                        if ($veraspss==0) { $veraspss=''; }
                                        $entro="si";
                                        if (($nota>"2.99" and $veraspss=="") Or ($pnota>"2.99" and $veraspss=="")){
                                        $mitt=1;
                                        }
                                        if (($nota<"3.00" and $veraspss=="" and $mitt=="") Or ($pnota<"3.00" and $veraspss=="" and $mitt=="")){
                                                $mitt=0; $seprec=5;
                                        }
                                    }
                                }
                                    
//                                $resulthp=mysql_query("select Nota, Observacion,Pra from notas_historica
//                           where ((Periodo_Acad='$conperiodo') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
//                           while($rowhp = mysql_fetch_array($resulthp)) {
//                                
//
//                           }
//                           mysql_free_result($resulthp);
				//echo  $seprec.'/'; echo $prelacod.'/'.$nota."<br>";
			//if (($codigo == '64047802' and $prelacod=="64012201") or ($codigo == '64047804' and $prelacod=="64012201")) { $seprec=5; $nova="n"; }
                          if ($mitt==0) {
                                //echo "/";
                                $peresp="";
if ($conperiodo=='20111') { $peresp="2011F"; }
if ($conperiodo=='20121') { $peresp="2012F"; }
if ($conperiodo=='20131') { $peresp="2013F"; }
                                foreach ($notas_historica as $rowhp) {
                                    if($rowhp[Periodo_Acad]==$peresp and $rowhp[Codigo]==$prelacod and $rowhp[ConexEst]=$concedula){
                                        $nota       =$rowhp["Nota"];
                                        $pnota      =$rowhp["Pra"];
                                        $veraspss   =$rowhp["Observacion"];
                                        if ($veraspss==0) { $veraspss=''; }
                                        $condvali   =$rowhp["Condicion"];
                                        $entro="si";
                                        //echo $prelacod.'//'.$rowhp["Condicion"];
                                        if ($condvali=="2" Or $condvali=="5") {
                                            if (($nota>"2.99" and $veraspss=="") Or ($pnota>"2.99" and $veraspss=="")){
                                            $mitt=1;$seprec=2;
                                            }
                                            if (($nota<"3.00" and $veraspss=="" and $mitt=="") Or ($pnota<"3.00" and $veraspss=="" and $mitt=="")){
                                                    $mitt=0; $seprec=5;
                                            }
                                        }
                                        
                                    }
                                }
//                               $resulthp=mysql_query("select Nota, Observacion,Pra,Condicion,Periodo_Acad from notas_historica
//                               where ((Periodo_Acad='$peresp') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
//                               while($rowhp = mysql_fetch_array($resulthp)) {
//                                    
//
//                               }
//                               mysql_free_result($resulthp);

                           }
                           if ($mitt==0) { $seprec=5; break; }

			}
			$observer="20";
			if ($seprec>2) { break; }
			}
		}

		if ($seprec<3) { $observer="";
                    //$modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
                    //$resultcarest = mysql_query ($modificarcarest);
			$pret="";
                }
		}
                //////////////////////// Fin Ingles

                /////////Vali.... diferente a Educacion///////////////777
                if (($conperiodo=='20111' Or $conperiodo=='2011D' Or $conperiodo=='20121' Or $conperiodo=='20122' Or $conperiodo=='20131' Or $conperiodo=='20132' Or $conperiodo=='20141' Or $conperiodo=='20142') and ($codigo == '51025002P' OR $codigo == '31047801' Or $codigo == '31047802' Or $codigo == '35047901' Or $codigo == '35047902' Or $codigo == 'PA220241001' Or $codigo == 'EA521350709' Or $codigo == 'EA520350609' Or $codigo == 'PV210261001')) {
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
			$cuanto=0;
                        // $resulthp=mysql_query("select Nota, Observacion,Pra from notas_historica
                          // where ((Periodo_Acad='$conperiodo') and (ConexEst='$concedula'))");
                          // while($rowhp = mysql_fetch_array($resulthp)) {
                          //      $cuanto=$cuanto+1;
                          // }
                          // mysql_free_result($resulthp);

                        if ($fomaOE!="E" and $cuanto<3) { $notat="";
			$resulthpr=mysql_query("select conexper from validarperiodo  where ((periodo='$conperiodo'))");
        		while($rowhpr = mysql_fetch_array($resulthpr)) {
            		$bper=$rowhpr["conexper"];
                            foreach ($notas_historica as $rowhp) {
                                if($rowhp[Periodo_Acad]==$bper and $rowhp[Codigo]==$prelacod and $rowhp[ConexEst]=$concedula){
                                    $nota       =$rowhp["Nota"];
                                    $pnota      =$rowhp["Pra"];
                                    $veraspss   =$rowhp["Observacion"];
                                    if ($veraspss==0) { $veraspss=''; }
                                    $entro="si";
                                    if (($nota>"2.99" and $veraspss=="") Or ($pnota>"2.99" and $veraspss=="")){
                                    $notat="si";
                                    }
                                    if (($nota<"3.00" and $veraspss=="" and $notat=="") Or ($pnota<"3.00" and $veraspss=="" and $notat=="")){
                                            $notat="";
                                    }
                                }
                            }
//        		   $resulthp=mysql_query("select Nota, Observacion,Pra from notas_historica
//        		   where ((Periodo_Acad='$bper') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
//        		   while($rowhp = mysql_fetch_array($resulthp)) {
//            			
//
//        		   }
//        		   mysql_free_result($resulthp);
                           //if ($prelacod=='PA220210101') { echo $notat; }
			}
			if ($notat=="") {   $seprec=$seprec+1;
                        $mitt=0;
                            //echo $mitt."//".$prelacod."<br>";
                                foreach ($notas_historica as $rowhp) {
                                    if($rowhp[Periodo_Acad]==$conperiodo and $rowhp[Codigo]==$prelacod and $rowhp[ConexEst]=$concedula){
                                        $nota       =$rowhp["Nota"];
                                        $pnota      =$rowhp["Pra"];
                                        $veraspss   =$rowhp["Observacion"];
                                        if ($veraspss==0) { $veraspss=''; }
                                        $entro="si";
                                        if (($nota>"2.99" and $veraspss=="") Or ($pnota>"2.99" and $veraspss=="")){
                                        $mitt=1;
                                        }
                                        if (($nota<"3.00" and $veraspss=="" and $mitt=="") Or ($pnota<"3.00" and $veraspss=="" and $mitt=="")){
                                                $mitt=0; $seprec=5;
                                        }
                                    }
                                }
//                                $resulthp=mysql_query("select Nota, Observacion,Pra from notas_historica
//                           where ((Periodo_Acad='$conperiodo') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
//                           while($rowhp = mysql_fetch_array($resulthp)) {
//                           }
//                           mysql_free_result($resulthp);
                           if ($mitt==0) {
                                //echo "/";
                                $peresp="";
if ($conperiodo=='20111') { $peresp="2011F"; }
if ($conperiodo=='20121') { $peresp="2012F"; }
if ($conperiodo=='20131') { $peresp="2013F"; }
                                foreach ($notas_historica as $rowhp) {
                                    if($rowhp[Periodo_Acad]==$peresp and $rowhp[Codigo]==$prelacod and $rowhp[ConexEst]=$concedula){
                                        $nota       =$rowhp["Nota"];
                                        $pnota      =$rowhp["Pra"];
                                        $veraspss   =$rowhp["Observacion"];
                                        $condvali   =$rowhp["Condicion"];
                                        if ($veraspss==0) { $veraspss=''; }
                                        $entro="si";
                                        //echo $prelacod.'//'.$rowhp["Condicion"];
                                        if ($condvali=="2" Or $condvali=="5") {
                                            if (($nota>"2.99" and $veraspss=="") Or ($pnota>"2.99" and $veraspss=="")){
                                            $mitt=1;$seprec=2;
                                            }
                                            if (($nota<"3.00" and $veraspss=="" and $mitt=="") Or ($pnota<"3.00" and $veraspss=="" and $mitt=="")){
                                                    $mitt=0; $seprec=5;
                                            }
                                        }
                                    }
                                }
//                               $resulthp=mysql_query("select Nota, Observacion,Pra,Condicion,Periodo_Acad from notas_historica
//                               where ((Periodo_Acad='$peresp') and (Codigo='$prelacod') and (ConexEst='$concedula'))");
//                               while($rowhp = mysql_fetch_array($resulthp)) {
//                                    
//
//                               }
//                               mysql_free_result($resulthp);

                           }
                          if ($mitt==0) {

                              $seprec=5; break;

                           }

			}
			$observer="20";
			if ($seprec>2) { break; }
			}

		}
		if ($seprec<3) { $observer="";
                    //$modificarcarest = "UPDATE notas_historica SET Observacion ='' WHERE id=$confq";
                    //$resultcarest = mysql_query ($modificarcarest);
			$pret="";
                }
		}

?>
