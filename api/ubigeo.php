<?php
require_once("./config/config.php");
mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_OFF);
$datos = [];

    if (isset($_GET['departamentos'])) {
        // seteamos departamentos
        $resultado = mysqli_query($cn,"SELECT * FROM departamento");
         
    } else if (isset($_GET['provincias']) && isset($_GET['id_departamento'])) {
        // seteamos provincias
        $resultado = mysqli_query($cn,"SELECT * FROM provincia WHERE idDepa = {$_GET['id_departamento']}");
    
    } else if (isset($_GET['distritos']) && isset($_GET['id_provincia'])) {
        // seteamos provincias
        $resultado = mysqli_query($cn,"SELECT * FROM distrito WHERE idProv = {$_GET['id_provincia']}");    
    }

    if (mysqli_num_rows($resultado) > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $datos[] = $row;
        }
    }
    
    echo json_encode(["data" => $datos]);
    mysqli_close($cn);







