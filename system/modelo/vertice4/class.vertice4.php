<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vertice4
 *
 * @author anonymous
 */
class Vertice4
{
    public function totalInspecciones()
    {
        $conexion = new Conexion;
        $conectar = $conexion->obtenerConexionMy();
        $sql = "SELECT * FROM inspeccion";
        $preparar = $conectar->prepare($sql);
        $preparar->execute();
        $resultado = $preparar->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
