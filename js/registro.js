$(document).ready(function() {
  //OBTENER DATOS DEL FORMULARIO REGISTRO
$('#registro').submit(function (e) {
    verify_save();
    e.preventDefault();
  })
});

function verify_save(){
  var nombre = document.getElementById("nombre").value;
  var apellido = document.getElementById("apellido").value;
  var cargo = document.getElementById("cargo").value;
  var sede = document.getElementById("sede").value;
  var email = document.getElementById("correo").value;
  var pass1 = document.getElementById("pass1").value;
  var pass2 = document.getElementById("pass2").value;

  if (nombre === "") {
    showMessage('Debe Añadir Un Nombre', 'danger');
  }else if (apellido === "") {
    showMessage('Debe Añadir Un apellido', 'danger');
  }else if (sede === "") {
    showMessage('Elija Una Sede', 'danger');
  }else if (email === "") {
    showMessage('Agrega Una Direccion Email', 'danger');
  }else if (pass1 === "" || pass2 === "") {
    showMessage('Complete Los Campos De Contraseñas', 'danger');
  }else if (pass1 !== pass2) {
    showMessage('Las Contraseñas No Coinciden', 'danger');
  }else if (! $('#check').prop('checked')) {
    showMessage('Debe Aceptar Los Terminos y Condiciones','danger')
  }else{
    const datos = {
      Nombre: nombre,
      Apellido: apellido,
      Cargo: cargo,
      Sede: sede,
      Email: email,
      Pass: pass1 
    }
    $.post('single_email.php', datos, function (response) {
      console.log(response);
      if (response == 'Existe') {
        showMessage('Este Usuario Ya Existe', 'danger')
      }else if(response == 'Creado'){
        showMessage('Usuario Creado Correctamente', 'success')
        LimpiarData();
      }else{
        showMessage('Error de sistema', 'danger')
      }
    })
  }


}
function LimpiarData() {
  let formulario = document.getElementById('registro');
  formulario.reset();
}

function showMessage(message, cssClass) {
  const div = document.createElement("div");
  div.className = `text-center alert alert-${cssClass} mt-2`;
  div.appendChild(document.createTextNode(message));

  // Show in The DOM
    const container = document.querySelector(".container");
    const app = document.querySelector("#App");

    container.insertBefore(div, app);

    setTimeout(function () {
      document.querySelector(".alert").remove();
    }, 3000);


  }