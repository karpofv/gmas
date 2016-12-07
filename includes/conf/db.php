<?php
    /**
    *
    * Description: Archivo de configuracion de conexion con la base de datos.
    *
    * LICENSE:   HFJ_LICENSE
    *
    * @category    includes
    * @package     Seido
    * @author      <hfj@hfj.com>
    * @version     3.0
    * @file        db.php
    * @path        includes/
    * @date        21/06/2009
    */
    // conexion a mysql
    $user       = 'root';
    $host       = 'localhost';
    $passwd     = '';
    $database   = 'gmas';
    $port       = '3306';

    class datosConexion {
    //////////////////MYSQL///////////////////////
    protected $servidorMy   =   "localhost";
    protected $dbMy         =   "gmas";
    protected $usuarioMy    =   "root";
    protected $claveMy      =   "";
    protected $puertoMy     =   "3306";
    }
?>
