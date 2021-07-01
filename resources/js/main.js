const btnEnviar = document.querySelector("#btnEnviar");
btnEnviar.addEventListener('click', evaluar);

function evaluar(){
    
    let data = {
        nombres : $("#nombres").val(),
        ap_paterno : $("#ap_paterno").val(),
        ap_materno : $("#ap_materno").val(),
        doc_identidad : $("#doc_identidad").val(),
        numero_doc : $("#numero_doc").val(),
        telefono : $("#telefono").val(),
        correo : $("#correo").val(),
        direccion : $("#direccion").val(),
        urbanizacion : $("#urbanizacion").val(),

        departamento : $("#departamento").val(),
        provincia : $("#provincia").val(),
        distrito : $("#distrito").val(),

        menor_edad: $("#menor_edad_si").is(":checked") ? 'SI' : 'NO',

        tienda : $("#tienda").val(),
        tipo : $("#tipo").val(),
        relacionado : $("#relacionado").val(),
        numero_pedido : $("#numero_pedido").val(),
        // fecha de hoy - setear automatico
        fecha_reclamo_queja : $("#fecha_reclamo_queja").val(),
        descripcion_bien_contratado : $("#descripcion_bien_contratado").val(),
        proveedor : $("#proveedor").val(),
        fecha_compra : $("#fecha_compra").val(),
        fecha_consumo : $("#fecha_consumo").val(),
        fecha_vencimiento : $("#fecha_vencimiento").val(),
        numero_lote : $("#numero_lote").val(),
        codigo_no_indespensable : $("#codigo_no_indespensable").val(),
        detalle_reclamo_queja : $("#detalle_reclamo_queja").val(),
        detalle_pedido_cliente : $("#detalle_pedido_cliente").val(),
        acciones_tomadas_empresa : $("#acciones_tomadas_empresa").val(),


        check_declaracion_titular : $("#check_declaracion_titular").is(':checked') ? true : false,
        check_terminos_condiciones : $("#check_terminos_condiciones").is(':checked') ? true : false
                
    }

    console.log(data)


}
