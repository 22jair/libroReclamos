const MAIN_URL = "http://localhost/libroReclamos/api/";
// const MAIN_URL = "https://www.jair.educationhost.cloud/libro_reclamos/api/"

const btnEnviar = document.querySelector("#btnEnviar");
btnEnviar.addEventListener('click', fetch_main);

Date.prototype.toDateInputValue = (function() {
  var local = new Date(this);
  local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
  return local.toJSON().slice(0,10);
});

$("#fecha_reclamo_queja").val(new Date().toDateInputValue());


async function fetch_main(){
    limpiarErrores();
    
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

        departamento : $("#departamento option:selected").text(),
        provincia : $("#provincia option:selected").text(),
        distrito : $("#distrito option:selected").text(),

        departamento_id : $("#departamento").val(),
        provincia_id : $("#provincia").val(),
        distrito_id : $("#distrito").val(),

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
        detalle_pedido_cliente : $("#detalle_pedido_cliente").val(),
        acciones_tomadas_empresa : $("#acciones_tomadas_empresa").val(),
        monto_reclamo : $("#monto_reclamo").val(),
        
        check_declaracion_titular : $("#check_declaracion_titular").is(':checked') ? true : false,
        check_terminos_condiciones : $("#check_terminos_condiciones").is(':checked') ? true : false
                
    }

    console.log(data)

    const request = await fetch(MAIN_URL+"libro_reclamo.php", {
        method: "POST",
        body: JSON.stringify(data),
      });
      
    // const resp = await request.json().then((e) => e);
    let hasError = false;
    if (request.status == 201) {     
    
      alert("Registrado Correctamente"); 

      Swal.fire({
        title: `Mensaje`,
        html: 'Creado Correctamente',
        icon: "success",        
      }).then((result) => {        
            //Relojeamos para evaluar el estado
            window.location.reload()
        })       
            
    }  else {    
      // ERROR      
      hasError = true;
      await request.json().then((e) => {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: e.message
        })
        mostrarErrores(e.errors)
      });    
    }   


}

function mostrarErrores(errores){
  console.log(errores)
    for (const key in errores) {
        $(`#${key}__error`).text(errores[key]);        
    } 
}

function limpiarErrores(){
    $(".msg_error").text("");
}

