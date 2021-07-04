//como el MyJs esta primero ya esta definido el URL....

// selecteds
var select_departamento = document.querySelector("#departamento");
var select_provincia = document.querySelector("#provincia");
var select_distrito = document.querySelector("#distrito");
select_departamento.addEventListener("change", verificarDepartamento);
select_provincia.addEventListener("change", verificarProvincia);
// select_distrito.addEventListener("change", verificarDistrito);

const data_fetch = {
    'departamento' : { name: 'departamento', url: 'ubigeo.php?departamentos' },
    'provincia':{ name: 'provincia', url: 'ubigeo.php?provincias&id_departamento=' },
    'distrito': { name: 'distrito', url: 'ubigeo.php?distritos&id_provincia=' }
}

//llenamos los departamentoes
fetch_DataUbigeo(data_fetch.departamento.name, data_fetch.departamento.url);

async function fetch_DataUbigeo(tipo, url) {
    const request = await fetch(MAIN_URL + url);
    if (request.status == 200) {
        request.json().then((r) => {
        mostrarDataSelect(tipo, r.data);
        });
    } else {
        alert("ERROR: Contacte a Sistemas");
    }
}

function initialSelect(id) {
  $(`#${id}`).html("");
  $(`#${id}`).append(`<option value="">Seleccione...</option>`);
}

function mostrarDataSelect(id, datos) { 
  $(datos).each(function (index, value) {
    if (id == "departamento") {
      $(`#${id}`).append(
        `<option value="${value.idDepa}">${value.departamento}</option>`
      );
    } else if (id == "provincia") {
      $(`#${id}`).append(
        `<option value="${value.idProv}">${value.provincia}</option>`
      );
    } else if (id == "distrito") {
      $(`#${id}`).append(
        `<option value="${value.idDist}">${value.distrito}</option>`
      );
    }
  });
}

function verificarDepartamento() {
  initialSelect("provincia");
  initialSelect("distrito");
  if (this.value != "") {
    fetch_DataUbigeo(data_fetch.provincia.name, data_fetch.provincia.url + this.value)    
  }
}

function verificarProvincia() {
    initialSelect("distrito");
    if (this.value != "") {
        fetch_DataUbigeo(data_fetch.distrito.name, data_fetch.distrito.url + this.value)
    }
}




