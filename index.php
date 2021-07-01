<?php

$data['nombres']        = isset($_POST['nombres']) ? $_POST['nombres'] : '';
$data['ap_paterno']     = isset($_POST['ap_paterno']) ? $_POST['ap_paterno'] : '';
$data['ap_materno']     = isset($_POST['ap_materno']) ? $_POST['ap_materno'] : '';
$data['doc_identidad']  = isset($_POST['doc_identidad']) ? $_POST['doc_identidad'] : 'DNI';
$data['numero_doc']        = isset($_POST['numero_doc']) ? $_POST['numero_doc'] : '';
$data['telefono']        = isset($_POST['telefono']) ? $_POST['telefono'] : '';
$data['correo']        = isset($_POST['correo']) ? $_POST['correo'] : '';
$data['direccion']        = isset($_POST['direccion']) ? $_POST['direccion'] : '';
$data['urbanizacion']        = isset($_POST['urbanizacion']) ? $_POST['urbanizacion'] : '';


$list_docIdentidad = [
    "DNI" => "DNI",
    "PASAPORTE" => "PASAPORTE",
    "CARNET_EXTRANJERIA" => "CARNET EXTRANJERIA",
    "RUC" => "RUC"
]

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap 5 - ICONS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet" type="text/css">
    <!-- Main Css -->
    <link href="./resources/css/main.css" rel="stylesheet" type="text/css">


    <title>Document</title>
</head>

<body>
    <!-- nav - logo -->
    <nav class="header">
        <img class="header_logo" src="./resources/img/logo.png" alt="logo">
    </nav>

    <!-- Seccion título -->
    <section class="title">
        <h1 class=""><strong>Libro de Reclamaciones Empresa</strong></h1>
        <h5 class="my-4"><strong>RUC 123456789123</strong></h5>
    </section>

    <!-- Seccion INFO -->
    <section class="info">
        <p class="text-danger"><strong>T129 - Wong.pe</strong></p>
        <p>Calle Augusto Angulo No 130 - Miraflores</p>
        <p>Teléfono: 613-8888 Opción 1 y luego opción 1</p>
    </section>

    <!-- Seccion Formulario -->
    <section class="container-md">

        <!-- USUARIO DATOS -->
        <div class="card mt-4">
            <div class="card-header d-flex">
                <h4><i class="bi bi-person-circle text-danger"></i>  <strong>Identificación del Consumidor Reclamante</strong></h4>
                <span class="text-danger txt_obligatorio"><i><strong>    Datos Obligatorios *</i></strong></span>
            </div>

            <div class="card-body row p-5">


                <div class="form group col-sm-12 col-md-6">
                    <label>Nombres<span class="text-danger"> *</span></label>
                    <input type="text" name="nombres" class="form-control" value="<?= $data['nombres']  ?>">
                    <span class="text-danger msg_error" id="nombres__error"> <?= isset($data['errores']['nombres']) ? $data['errores']['nombres'] : ''; ?> </span><br>
                </div>

                <div class="form group col-sm-12 col-md-3">
                    <label>Apellido Parno<span class="text-danger"> *</span></label>
                    <input type="text" name="ap_paterno" class="form-control" value="<?= $data['ap_paterno']  ?>">
                    <span class="text-danger msg_error" id="ap_paterno__error"> <?= isset($data['errores']['ap_paterno']) ? $data['errores']['ap_paterno'] : ''; ?> </span><br>
                </div>

                <div class="form group col-sm-12 col-md-3">
                    <label>Apellido Materno<span class="text-danger"> *</span></label>
                    <input type="text" name="ap_materno" class="form-control" value="<?= $data['ap_materno']  ?>">
                    <span class="text-danger msg_error" id="ap_materno__error"> <?= isset($data['errores']['ap_materno']) ? $data['errores']['ap_materno'] : ''; ?> </span><br>
                </div>

                <div class="form group col-sm-12 col-md-4">
                    <label>Doc. Identidad<span class="text-danger"> *</span></label>
                    <select id="doc_identidad" name="doc_identidad" class="form-control select2">

                        <?php foreach ($list_docIdentidad as $key => $value) { ?>
                            <option <?= $key == $data['doc_identidad'] ? 'selected ="selected"' : '' ?> value="<?= $key ?>"><?= $value ?></option>;
                        <?php } ?>

                    </select>
                    <span class="text-danger msg_error" id="doc_identidad__error"> <?= isset($data['errores']['doc_identidad']) ? $data['errores']['doc_identidad'] : ''; ?> </span><br>
                </div>

                <div class="form group col-sm-12 col-md-4">
                    <label>Numero Doc.<span class="text-danger"> *</span></label>
                    <input type="text" name="numero_doc" class="form-control" value="<?= $data['numero_doc']  ?>">
                    <span class="text-danger msg_error" id="numero_doc__error"> <?= isset($data['errores']['numero_doc']) ? $data['errores']['numero_doc'] : ''; ?> </span><br>
                </div>

                <div class="form group col-sm-12 col-md-4">
                    <label>Teléfono / Celular<span class="text-danger"> *</span></label>
                    <input type="number" name="telefono" class="form-control" value="<?= $data['telefono']  ?>" maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" style="text-transform:uppercase;">
                    <span class="text-danger msg_error" id="telefono__error"> <?= isset($data['errores']['telefono']) ? $data['errores']['telefono'] : ''; ?> </span><br>
                </div>

                <div class="form group col-sm-12 col-md-6">
                    <label>Correo Electrónico<span class="text-danger"> *</span></label>
                    <input type="text" name="correo" class="form-control" value="<?= $data['correo']  ?>">
                    <span class="text-danger msg_error" id="correo__error"> <?= isset($data['errores']['correo']) ? $data['errores']['correo'] : ''; ?> </span><br>
                </div>

                <div class="form group col-sm-12 col-md-3">
                    <label>Dirección<span class="text-danger"> *</span></label>
                    <input type="text" name="direccion" class="form-control" value="<?= $data['direccion']  ?>">
                    <span class="text-danger msg_error" id="direccion__error"> <?= isset($data['errores']['direccion']) ? $data['errores']['direccion'] : ''; ?> </span><br>
                </div>

                <div class="form group col-sm-12 col-md-3">
                    <label>Urbanización</label>
                    <input type="text" name="urbanizacion" class="form-control" value="<?= $data['urbanizacion']  ?>">
                    <span class="text-danger msg_error" id="urbanizacion__error"> <?= isset($data['errores']['urbanizacion']) ? $data['errores']['urbanizacion'] : ''; ?> </span><br>
                </div>

                <div class="form group col-sm-12 col-md-4">
                    <label>Departamento<span class="text-danger"> *</span></label>
                    <select id="departamento" name="departamento" class="form-control select2">
                        <option value="">Seleccione</option>
                    </select>
                    <span class="text-danger msg_error" id="departamento__error"> <?= isset($data['errores']['departamento']) ? $data['errores']['departamento'] : ''; ?> </span><br>
                </div>

                <div class="form group col-sm-12 col-md-4">
                    <label>Provincia<span class="text-danger"> *</span></label>
                    <select id="provincia" name="provincia" class="form-control select2">
                        <option value="">Seleccione</option>
                    </select>
                    <span class="text-danger msg_error" id="provincia__error"> <?= isset($data['errores']['provincia']) ? $data['errores']['provincia'] : ''; ?> </span><br>
                </div>

                <div class="form group col-sm-12 col-md-4">
                    <label>Distrito<span class="text-danger"> *</span></label>
                    <select id="distrito" name="distrito" class="form-control select2">
                        <option value="">Seleccione</option>
                    </select>
                    <span class="text-danger msg_error" id="distrito__error"> <?= isset($data['errores']['distrito']) ? $data['errores']['distrito'] : ''; ?> </span><br>
                </div>

                <div class="form group mt-2 w-75 d-flex justify-content-around m-auto" style="max-width: 400px;">
                    <label>Eres Menor de Edad?</label>
                    <div class="form-check" style="padding-right: 20px;">
                        <input id="radio_todos" class="form-check-input" value="SI" type="radio" name="radios_buttons" checked>
                        <label class="form-check-label" for="radio_todos">SI</label>
                    </div>
                    <div class="form-check" style="padding-right: 20px;">
                        <input id="radio_entrada" class="form-check-input" value="NO" type="radio" name="radios_buttons">
                        <label class="form-check-label" for="radio_entrada">NO</label>
                    </div>
                </div>

            </div>
        </div>

        <!-- DATOS DETALLE RECLAMACION-->
        <div class="card mt-4">
            <div class="card-header d-flex">
                <h4><i class="bi bi-person-circle text-danger"></i>  <strong>Detalle de la Reclamación y Pedido del Consumidor</strong></h4>
                <span class="text-danger txt_obligatorio"><i><strong>    Datos Obligatorios *</i></strong></span>
            </div>

            <div class="card-body row p-5">

                <div class="form group col-sm-12 col-md-6">
                    <label>Tienda<span class="text-danger"> *</span></label>
                    <select id="tienda" name="tienda" class="form-control select2">
                        <option value="">Seleccione</option>
                    </select>
                    <span class="text-danger msg_error" id="tienda__error"> <?= isset($data['errores']['tienda']) ? $data['errores']['tienda'] : ''; ?> </span><br>
                </div>
                <div class="form group col-sm-12 col-md-6">

                </div>

                <!-- TIPOS -->
                <div class="form group col-sm-12 col-md-4">
                    <label>Seleccione Tipo<span class="text-danger"> *</span></label>
                    <select id="tipo" name="tipo" class="form-control select2">
                        <option value="RECLAMO">Reclamo</option>
                        <option value="QUEJA">Queja</option>
                    </select>
                    <span class="text-danger msg_error" id="tipo__error"> <?= isset($data['errores']['tipo']) ? $data['errores']['tipo'] : ''; ?> </span><br>
                </div>
                <!-- RELACIONADO -->
                <div class="form group col-sm-12 col-md-4">
                    <label>Seleccione Relacionado a <span class="text-danger"> *</span></label>
                    <select id="relacionado" name="relacionado" class="form-control select2">
                        <option value="PRODUCTO">Producto</option>
                        <option value="SERVICIO">Servicio</option>
                    </select>
                    <span class="text-danger msg_error" id="relacionado__error"> <?= isset($data['errores']['relacionado']) ? $data['errores']['relacionado'] : ''; ?> </span><br>
                </div>

                <!-- NRO PEDIDO -->
                <div class="form group col-sm-12 col-md-4">
                    <label>Nro° Pedido</label>
                    <input type="text" name="numero_pedido" class="form-control">
                    <span class="text-danger msg_error" id="numero_pedido__error"> </span><br>
                </div>

                <!--FECHA RECLAMO / QUEJA -->
                <div class="form group col-sm-12 col-md-4">
                    <label>Fecha de reclamo / queja <span class="text-danger"> *</span></label>
                    <input readonly type="text" name="fecha_reclamo_queja" class="form-control">
                    <span class="text-danger msg_error" id="fecha_reclamo_queja__error"> </span><br>
                </div>

                <!-- DESCRIPCION PRODUCTO / SERVICIO -->
                <div class="form group col-sm-12 col-md-8">
                    <label>Identificación del bien contratado: Descripción del producto o servicio <span class="text-danger"> *</span></label>
                    <textarea rows="1" id="fecha_reclamo_queja" name="fecha_reclamo_queja" class="form-control"></textarea>
                    <span class="text-danger msg_error" id="fecha_reclamo_queja__error"> </span><br>
                </div>

                <!--PROVEEDOR-->
                <div class="form group col-sm-12 col-md-3">
                    <label>Proveedor</label>
                    <input type="text" name="proveedor" class="form-control">
                    <span class="text-danger msg_error" id="proveedor__error"> </span><br>
                </div>

                <!--FECHA COMPRA-->
                <div class="form group col-sm-12 col-md-3">
                    <label>Fecha de Compra</label>
                    <input type="text" name="fecha_compra" class="form-control">
                    <span class="text-danger msg_error" id="fecha_compra__error"> </span><br>
                </div>

                <!--FECHA CONSUMO-->
                <div class="form group col-sm-12 col-md-3">
                    <label>Fecha de Consumo</label>
                    <input type="text" name="fecha_consumo" class="form-control">
                    <span class="text-danger msg_error" id="fecha_consumo__error"> </span><br>
                </div>

                <!--FECHA COMPRA-->
                <div class="form group col-sm-12 col-md-3">
                    <label>Fecha de Vencimiento</label>
                    <input type="text" name="fecha_vencimiento" class="form-control">
                    <span class="text-danger msg_error" id="fecha_vencimiento__error"> </span><br>
                </div>

                <!--NUMERO LOTE-->
                <div class="form group col-sm-12 col-md-6">
                    <label>Nr° Lote</label>
                    <input type="text" name="numero_lote" class="form-control">
                    <span class="text-danger msg_error" id="numero_lote__error"> </span><br>
                </div>

                <!-- CODIGO -->
                <div class="form group col-sm-12 col-md-6">
                    <label>Código (no indespensable)</label>
                    <input type="text" name="codigo_no_indesp" class="form-control">
                    <span class="text-danger msg_error" id="codigo_no_indesp__error"> </span><br>
                </div>

                <!-- DESCRIPCION PRODUCTO / SERVICIO -->
                <div class="form group col-sm-12 col-md-8">
                    <label>Detalle del Reclamo / Queja, según indica el cliente <span class="text-danger"> *</span></label>
                    <textarea rows="3" id="detalle_reclamo_queja" name="detalle_reclamo_queja" class="form-control"></textarea>
                    <span class="text-danger msg_error" id="detalle_reclamo_queja__error"> </span><br>
                </div>

                <!-- PEDIDO CLIENTE -->
                <div class="form group col-sm-12 col-md-4">
                    <label>Pedido del Cliente <span class="text-danger"> *</span></label>
                    <textarea rows="3" id="detalle_pedido_cliente" name="detalle_pedido_cliente" class="form-control"></textarea>
                    <span class="text-danger msg_error" id="detalle_pedido_cliente__error"> </span><br>
                </div>

                <!-- MONTO RECLAMADO -->
                <div class="form group col-sm-12 col-md-6">
                    <label>Monto Reclamado (S/.)</label>
                    <input type="number" id="monto_reclamo" name="monto_reclamo" class="form-control">
                    <span class="text-danger msg_error" id="monto_reclamo__error"> </span><br>
                </div>
                <div class="form group col-sm-12 col-md-6"></div>

                <!-- ACCIONES TOMADA POR LA EMPRESA -->
                <div class="form group col-sm-12 col-md-6">
                    <label>Acciones tomadas por la empresa (Para ser llenado por el establecimiento) </label>
                    <textarea rows="3" id="acciones_tomadas_empresa" name="acciones_tomadas_empresa" class="form-control"></textarea>
                    <span class="text-danger msg_error" id="acciones_tomadas_empresa__error"> </span><br>
                </div>

                <div class="form group col-sm-12">
                    <p class="descripciones"><i><strong class="text-danger">(1) Reclamo:</strong> <span>Disconformidad relacionada a los productos y/o servicios.</span></i></p>
                    <p class="descripciones"><i><strong class="text-danger">(2) Queja:</strong> <span>Disconformidad no relacionada a los productos y/o servicios; o, malestar o descontento a la atención al público.</span></i></p>
                </div>
            </div>
        </div>

        <!-- SECCION FINAL -->
        <div class="card mt-4">
            <div class="card-body row p-5">
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check_declaracion_titular">
                        <label class="form-check-label" for="declaracion_titular">
                            Declaro ser el titular del servicio y acepto el contenido del presente formulario manifestando bajo Declaración Jurada la veracidad de los hechos descritos.
                        </label>
                        
                        <ul class="mt-2">
                            <li>La formulación del reclamo no impide acudir a otras vías de solución de controversias ni es requisito previo para interponer una denuncia ante Indecopi.</li>
                            <li>El proveedor deberá dar respuesta al reclamo en un plazo no mayor a treinta (30) días calendario, pudiendo ampliar el plazo hasta por treinta días.</li>
                            <li>Mediante la suscripción del presente documento el cliente autoriza a que lo contacten luego de atendido el reclamo a fin de evaluar la calidad y satisfacción con el proceso de atención de reclamos.</li>
                        </ul>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check_terminos_condiciones">
                        <label class="form-check-label" for="terminos_condiciones">
                            He Leído y acepto la Política de Privacidad y Seguridad y la Política de Cookies"
                        </label>
                    </div>

                </div>

                <div class="col-12 d-flex justify-content-center">                   
                    <button class="mt-4 btn btn-dark" style="width: 150px;">ENVIAR</button>
                </div>
            </div>
        </div>

    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>