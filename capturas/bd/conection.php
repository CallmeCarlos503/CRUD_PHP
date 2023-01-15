<?php
//! Conexion de base de datos
$host = "127.0.0.1";
$user = "root";
$password = "";
$bd = "datos";
$port = 3306;
$mysqli = new mysqli($host, $user, $password, $bd);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
//? echo $mysqli->host_info . "\n" (Se utiliza para saber la informacion del Host);

//! Segunda manera de la conexion de base de datos

$mysqli = new mysqli($host, $user, $password, $bd, $port); //! AQUI SE UTILIZA EL PORT (SEGUNDO METODO DE CONEXION)
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

//? echo $mysqli->host_info . "\n"(Se utiliza para saber la informacion del host);
