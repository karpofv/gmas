<?php  
class Establecimiento {
    public function obtenerDatosEstablec(){
        $campos     = "*";
        $tablas     = "establecimiento e, c_estados ce, c_municipios cm, c_parroquia cp";
        $consultas  = "1=1 and e.est_estado=ce.id and e.est_muncodigo=cm.id and e.est_parcodigo=cp.id";
        $ress_       = paraTodos::arrayConsulta($campos,$tablas,$consultas);
        foreach ($ress_ as $key) {
            $array[] = $key;
        }
        return $array;
    }
}
?>