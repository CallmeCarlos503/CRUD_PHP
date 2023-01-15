<?php

    //todo: las sweetalert se requieren las librerias necesarias para aplicarla en PHP

//*=======================================================================
    //! Inclusion de la base de datos

include_once '../bd/conection.php';
//*=======================================================================
try{
//*=======================================================================
    //! mostrar el ID necesario para la insercion
$query = 'SELECT * FROM persona'; //? Comando de busqueda de datos generales
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $Dato1 = $row['ID'];
        $Dato2 = $row['Nombre'];
    }
    $acumulado = $Dato1 + 1; //? el auto incrementable existente
    $result->free();
}
//*=======================================================================

//*=======================================================================
    //! insercion de datos
if (isset($_GET['btnenviar'])) {
    
    try{
        
        $Nombre = $_GET['txtnombre'];
        if ($Nombre=="") {

            //* sweetalert
        $simbolo="warning";
        $msj="no ha llenado lo que corresponde";
        header('Location: ../index.php?msj='.$msj.'&simbolo='.$simbolo.'&titulo=peligro');

        }
        else {

        $query = "INSERT INTO persona VALUES($acumulado,'$Nombre');"; //? Comando de insercion
        mysqli_query($mysqli, $query);
        
            //* SweetAlert
        $simbolo="success";
        $msj="se agrego con exito";
        header('Location: ../index.php?msj='.$msj.'&simbolo='.$simbolo.'&titulo=exito');
        }
    }
    catch( exception ){
            //* sweet alert
        $simbolo="error";
        $msj="No se permite caracteres especiales";
        header('Location: ../index.php?msj='.$msj.'&simbolo='.$simbolo.'&titulo=error');
    }
    }
//*============================================================================================
    
//*============================================================================================
    //! eliminacion de datos
elseif (isset($_REQUEST['btnEliminar'])) {
    $id = $_REQUEST['btnEliminar'];
    $query = "DELETE FROM persona WHERE ID=$id;"; //? Comando de eliminacion por SQL Server
    mysqli_query($mysqli, $query);
    
    // * sweetalert
    $simbolo="warning";
    $msj="se elimino con exito";
    header('Location: ../index.php?msj='.$msj.'&simbolo='.$simbolo.'&titulo=eliminacion');
}
//*===========================================================================================

//*===========================================================================================
    //! busqueda de datos ante modificacion
elseif (isset($_REQUEST['btnbusqueda'])) {
    $id = $_REQUEST['btnbusqueda'];
    $query = "SELECT * FROM persona where ID=$id"; //? Comando de busqueda
    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $Dato1 = $row['ID'];
            $Dato2 = $row['Nombre'];
        }
        $result->free();
    }
    mysqli_query($mysqli, $query);
    header('Location: ../index.php?ID=' . $id . '&nombre=' . $Dato2);
}
//*===========================================================================================

//*===========================================================================================
    //! modificacion de datos
elseif (isset($_GET['btnModificar'])) {
    try{
    $id = $_GET['txtID'];
    $nombre = $_GET['txtnombre'];
    $query = "UPDATE persona
    SET Nombre = '$nombre'
    WHERE ID=$id;"; //? Comando de actualizacion de datos por SQL Server
    mysqli_query($mysqli, $query);
    
    // * sweetalert
    
    $simbolo="success";
    $msj="se modifico con exito";
    header('Location: ../index.php?msj='.$msj.'&simbolo='.$simbolo.'&titulo=modificacion');
    } catch(exception){
    $simbolo="error";
    $msj="No se logro modificar correctamente el dato";
    header('Location: ../index.php?msj='.$msj.'&simbolo='.$simbolo.'&titulo=modificacion');   
    }
}
//*============================================================================================
}
catch(Exception $EX){
    header('Location: ../index.php');
}