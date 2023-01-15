<!DOCTYPE html>
<?php include_once 'bd/conection.php'; ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/fuente.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body style="color: black;">
    <h1>
        <center>
            BASE DE DATOS EJEMPLO DE DATOS
        </center>
    </h1>
    <br><br>
    <div class="container text-center">
        <div class="row align-items-start">
            <div class="col">
                <form action="acciones/comandos.php" method="get" name="frminsertar">
                    <h3>Inserte un nombre</h3>
                    <input type="text" class="form-control" name="txtnombre" id=""> <br>
                    <input type="submit" class="btn btn-primary" name="btnenviar">
                </form>
            </div>
            <div class="col">
                <?php
                $query = 'SELECT * FROM persona';
                if ($result = $mysqli->query($query)) { ?>
                    <table class="table table-striped-columns table-dark order-table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col" colspan="2">Acciones  </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($row = $result->fetch_assoc()) {
                            $campo1 = $row['ID'];
                            $campo2 = $row['Nombre'];
                            echo '<tr>';
                            echo '<td>';
                            echo $campo1;
                            echo '</td>';
                            echo '<td>';
                            echo $campo2;
                            echo '</td>';
                            echo '</td>';
                            echo "
                            <td>
                            
                            <a class='btn btn-danger' name='eliminar' href='acciones/comandos.php?btnEliminar=$campo1'>Eliminar</a>
                            </td>
                            <td>
                            
                            <a class='btn btn-primary' name='editar' href='acciones/comandos.php?btnbusqueda=$campo1'>Editar</a>
                            </td>
                            ";
                        }}
                $result->free();
                ?>
                        </tbody>
                    </table>
            </div>
            <div class="col">
                <input class="form-control col-md-3 light-table-filter" data-table="order-table" type="text" placeholder="Search.." </div>
                <br><br><br>

                
                <?php if (isset($_REQUEST['ID'])) {

                    $ID = $_REQUEST['ID'];
                    $Nombre = $_REQUEST['nombre'];
                    ?>
                    <form action="../capturas/acciones/comandos.php" method="get">
                        <label>
                            <h3>DATOS A MODIFICAR</h3>
                            <br>
                            ID a modificar: <?php echo $ID; ?>
                            <br>
                        </label>
                        <br><br>
                        <input type="text" class="form-control" required="true" value='<?php echo $Nombre; ?>' name="txtnombre" id="">
                        <input type="hidden" name="txtID" value=<?php echo $ID; ?>>
                        <br><br>
                        <!-- Se afectua en la seccion de btnModificar del area de comandos -->
                        <button type="submit" class="btn btn-primary" name="btnModificar">Modificar</button>
                    </form>
                <?php
                } elseif (isset($_REQUEST['msj'])) {
                    $msj = $_REQUEST['msj']; ?>
                <script>
                    Swal.fire({
                    title: '<?php echo $_REQUEST['titulo']; ?>',
                    text: '<?php echo $msj; ?>',
                    icon: '<?php echo $_REQUEST['simbolo']; ?>',
                    confirmButtonText: 'Continuar'
                    })
                </script>
                <?php
                } ?>
            </div>         
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="../js/buscador.js"></script>
</body>

</html>