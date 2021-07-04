<?php
require_once("./config/config.php");
date_default_timezone_set('America/Lima');
include __DIR__."./enviar_correo.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $errors = [];

    $_POST = json_decode(file_get_contents('php://input'), true);

    if(!isset($_POST["nombres"]) || strlen($_POST["nombres"]) <= 0 ) $errors['nombres'] = "Ingrese Nombres";
    if(!isset($_POST["ap_paterno"]) || strlen($_POST["ap_paterno"]) <= 0 ) $errors['ap_paterno'] = "Ingrese Apellido Paterno";
    if(!isset($_POST["ap_materno"]) || strlen($_POST["ap_materno"]) <= 0 ) $errors['ap_materno'] = "Ingrese Apellido Materno";
    if(!isset($_POST["doc_identidad"]) || strlen($_POST["doc_identidad"]) <= 0 ) $errors['doc_identidad'] = "Ingrese Doc. Identidad";
    if(!isset($_POST["numero_doc"]) || strlen($_POST["numero_doc"]) <= 0 ) $errors['numero_doc'] = "Ingrese Nr° Doc.";
    if(!isset($_POST["telefono"]) ) $_POST["telefono"] = ''; // ### CAN BE NULL
    if(!isset($_POST["correo"]) || strlen($_POST["correo"]) <= 0 ){
        $errors['correo'] = "Ingrese Correo Electrónico";
    }else{
        if (!filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL)) {
            $errors['correo'] = "Formato de Correo Electrónico inválido";
        }
    }
    if(!isset($_POST["direccion"]) || strlen($_POST["direccion"]) <= 0 ) $errors['direccion'] = "Ingrese Direccion";
    if(!isset($_POST["urbanizacion"]) ) $_POST["urbanizacion"] = ''; // ### CAN BE NULL

    if(!isset($_POST["departamento"]) || strlen($_POST["departamento"]) <= 0 ) $errors['departamento'] = "Ingrese Departamento";
    if(!isset($_POST["provincia"]) || strlen($_POST["provincia"]) <= 0 ) $errors['provincia'] = "Ingrese Provincia";
    if(!isset($_POST["distrito"]) || strlen($_POST["distrito"]) <= 0 ) $errors['distrito'] = "Ingrese Distrito";

    if(!isset($_POST["departamento_id"]) || strlen($_POST["departamento_id"]) <= 0 ) {
        $_POST['departamento'] = "";
        $errors['departamento_id'] = "Ingrese departamento";
    }
    if(!isset($_POST["provincia_id"]) || strlen($_POST["provincia_id"]) <= 0 ){
        $_POST['provincia'] = "";
        $errors['provincia_id'] = "Ingrese provincia";
    }
    if(!isset($_POST["distrito_id"]) || strlen($_POST["distrito_id"]) <= 0 ){
        $_POST['distrito'] = "";
        $errors['distrito_id'] = "Ingrese distrito";
    }

    if(!isset($_POST["menor_edad"]) || strlen($_POST["menor_edad"]) <= 0 ) $errors['menor_edad'] = "Seleccione Consulta Edad";

    if(!isset($_POST["tienda"]) || strlen($_POST["tienda"]) <= 0 ) $errors['tienda'] = "Seleccione Tienda";
    if(!isset($_POST["tipo"]) || strlen($_POST["tipo"]) <= 0 ) $errors['tipo'] = "Seleccione Tipo ";
    if(!isset($_POST["relacionado"]) || strlen($_POST["relacionado"]) <= 0 ) $errors['relacionado'] = "Seleccione Relacionado a.";
    if(!isset($_POST["numero_pedido"]) ) $_POST["numero_pedido"] = ''; // ### CAN BE NULL
    
    if(!isset($_POST["fecha_reclamo_queja"]) || strlen($_POST["fecha_reclamo_queja"]) <= 0 ) $errors['fecha_reclamo_queja'] = "Ingrese fecha_reclamo_queja";
    if(!isset($_POST["descripcion_bien_contratado"]) || strlen($_POST["descripcion_bien_contratado"]) <= 0 ) $errors['descripcion_bien_contratado'] = "Ingrese Identificacion del bien Contratado";
    if(!isset($_POST["proveedor"]) ) $_POST["proveedor"] = ''; // ### CAN BE NULL
    if(!isset($_POST["fecha_compra"]) ) $_POST["fecha_compra"] = ''; // ### CAN BE NULL
    if(!isset($_POST["fecha_consumo"]) ) $_POST["fecha_consumo"] = ''; // ### CAN BE NULL
    if(!isset($_POST["fecha_vencimiento"]) ) $_POST["fecha_vencimiento"] = ''; // ### CAN BE NULL
    if(!isset($_POST["numero_lote"]) ) $_POST["numero_lote"] = ''; // ### CAN BE NULL
    if(!isset($_POST["codigo_no_indespensable"]) ) $_POST["codigo_no_indespensable"] = ''; // ### CAN BE NULL
    if(!isset($_POST["detalle_reclamo_queja"]) || strlen($_POST["detalle_reclamo_queja"]) <= 0 ) $errors['detalle_reclamo_queja'] = "Ingrese Detalle reclamo / queja";
    if(!isset($_POST["detalle_pedido_cliente"]) || strlen($_POST["detalle_pedido_cliente"]) <= 0 ) $errors['detalle_pedido_cliente'] = "Ingrese Detalle del Pedido del cliemte";
    
    if(!isset($_POST["monto_reclamo"]) ) $_POST["monto_reclamo"] = ''; // ### CAN BE NULL
    if(!isset($_POST["acciones_tomadas_empresa"]) ) $_POST["acciones_tomadas_empresa"] = ''; // ### CAN BE NULL

    if(!isset($_POST["check_declaracion_titular"]) || strlen($_POST["check_declaracion_titular"]) <= 0 ) $errors['check_declaracion_titular'] = "Acepte la Declaración titular del Servicio.";
    if(!isset($_POST["check_terminos_condiciones"]) || strlen($_POST["check_terminos_condiciones"]) <= 0 || $_POST["check_terminos_condiciones"] == false) $errors['check_terminos_condiciones'] = "Acepte las Políticas y Condiciones.";

    
    if (count($errors) > 0) {
        http_response_code(404);
        echo json_encode(["message" => "Corregir los errores.", "errors" => $errors]);
        die();
    }

    $today = new DateTime();
    $dayTime = date_format($today, 'Y-m-d H:i:s');
    $day = date_format($today, 'Y-m-d');
    $time = date_format($today, 'H:i:s');
    
    $_POST["z_sistema_fecha_hora_creada"] = $dayTime;
    $_POST["z_sistema_fecha_creada"] = $day;
    $_POST["z_sistema_hora_creada"] = $time;    

    $ruta_dataJson = __DIR__.'./data/data.json';

    // Guardamos la data
    if (true) {        
        // // obtenemos datajson en texto
        $dataJSON_TEXT = file_get_contents($ruta_dataJson);
        // // convertir texto to json
        $dataJSON_DECODE = json_decode($dataJSON_TEXT, true);
        // //contar y sumar más 1 por el ID
        $nuevaData = new ArrayObject();
        $nuevaData["id"] = count($dataJSON_DECODE)+1; 
        // seteamos nuevo arrayObject para colocar el id en la primera posición
        foreach($_POST as $k=>$v) $nuevaData[$k] = $v;

        // // setiar la nueva data al json
        array_Push($dataJSON_DECODE, $nuevaData);
        // // convertir nuevamente a texto el json
        $dataJSON_ENCODE = json_encode($dataJSON_DECODE, JSON_UNESCAPED_UNICODE);
        // // guardar la data en el archivo csv 
        file_put_contents($ruta_dataJson, $dataJSON_ENCODE);

        // // actualizamos el archivo csv
        require_once(__DIR__.'./data_csv.php');
        // enviamos el mensaje al usuario
        require_once(__DIR__.'./enviar_correo.php');

        $error_email = '';
        if(enviar_mensaje($_POST["correo"]))
        {
            $error_email = "Message sent!";
        }else
        {
            $error_email = "Message NOT sent!";
        }

        http_response_code(201);
        echo json_encode(["message" => "Registrado correctamente.", "email_enviado"=>$error_email]);
        

    } else {
        http_response_code(404);
        echo json_encode(["message" =>"Error en el servicio, Contacte a Sistemas."]);
    }   
    
    die();   
}

