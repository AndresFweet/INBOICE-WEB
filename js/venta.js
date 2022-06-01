//import  jsPDF  from 'jspdf';

$(document).ready(function () {
    cargar_datos();
    fecha();
    
//COMPROBACION DE QUE OPCION SE ELIGIO
$(document).on('click', '#reg', function (e) {
    let opcion = 'reg';
    e.preventDefault();
    verify(opcion);
})
$(document).on('click', '#add', function (e) {
    e.preventDefault();
    let opcion = 'add';
    verify(opcion);
})
//VERIFICANDO EL CAMPO SELECT
$('#producto').on('change', function () {
    valor_product();
    
})
//VALOR TOTAL
$('#cant').keyup(function () {
    let cantidad = document.getElementById('cant').value;
    let precio = document.getElementById('precio').value;
    let total = document.getElementById('total');
    let mult = cantidad * precio;
    total.value = 'TOTAL: ' + mult;
})

});

function verify(opcion) {
    
    let cantidad = document.getElementById("cant").value;
    let cliente = document.getElementById("client").value;
    if (cantidad === "" || cantidad === "0") {
        showMessage('Proporciona una cantidad valida','danger');
    }else if(cliente === ""){
        showMessage('Proporciona un cliente', 'danger')
    }else if(opcion == 'add'){
        showVenta();
    }else if(opcion == 'reg'){
        save_factura();
    }
}

function cargar_datos() {
    $.post('productos.php', function (response) {
         let arr = JSON.parse(response)
         let select = document.querySelector('#producto');
         let precio = document.querySelector('#precio');
         precio.value = arr[0].precio;
         arr.forEach(arr => {
            let option = document.createElement("option");
            option.setAttribute("value", "value2")
            let optionText = document.createTextNode(arr.producto);
            option.appendChild(optionText);
            select.appendChild(option)
         });
    })
}

function showMessage(message, cssClass) {
  const div = document.createElement("div");
  div.className = `text-center alert alert-${cssClass} mt-2`;
  div.appendChild(document.createTextNode(message));

  // Show in The DOM
    const container = document.querySelector(".container");
    const app = document.querySelector("#Api");

    container.insertBefore(div, app);

    setTimeout(function () {
      document.querySelector(".alert").remove();
    }, 3000);


  }
 function showVenta() {
    const productList = document.getElementById("factura_list");
    const element = document.createElement("div");

    let cliente = document.querySelector('#client').value;
    let cantidad = document.querySelector('#cant').value;
    let valor = document.querySelector('#precio').value;
    let total = document.querySelector('#total').value;
    let combo = document.getElementById('producto');
    var product = combo.options[combo.selectedIndex].text;
    
    var i = 0

    element.innerHTML = `
            <div class="card text-center mb-4 bg-light" id=" ${i++} ">
                <div class="card-body">
                    <h4> Factura a nombre de: <b> ${cliente} </b>
                        <button id="delete_item" class="btn btn-danger">X</button>
                    </h4>
                    <hr>
                    <div class="d-flex justify-content-center mt-2 ">
                        <ul class="form-group">
                        <li class="mr-2 form-control border-0 "> PRODUCTO: ${product} </li>
                        <li class="mr-2 form-control border-0"> CANTIDAD: ${cantidad} </li> 
                        </ul>
                        <ul class="form-group">
                        <li class="mr-2 form-control border-0"> V.UNITARIO: ${valor} </li>
                        <li class="mr-2 form-control border-0"> V.TOTAL: ${total} </li>
                        </ul>
                    </div>
                    <div class="d-flex justify-content-center mt-2">
                        
                    </div>
                </div>
            </div> 
        `;
    productList.appendChild(element);

    let btn_items = document.getElementById('btn-todo');
    btn_items.style.display = '';
    $(document).on('click', '#btn-todo', function (e) {
        const item = {
            producto: product,
            Cantidad: cantidad,
            Cliente: cliente,
            Valor: valor,
            Id: i++,
            Total: total
            
        }
        console.log(item);
        
    })
  } 

function valor_product() {
 
/* Para obtener el texto */
var combo = document.getElementById("producto");
var precio = document.getElementById("precio");
let total = document.getElementById('total');
let cantidad = document.getElementById('cant').value;
var product = combo.options[combo.selectedIndex].text;
console.log(product);
    $.post('valor.php', {product} , function (response){
        let producto = JSON.parse(response);
        let valor = producto[0].precio;
        precio.value = valor;
        let mult = cantidad * precio.value;
        total.value = 'TOTAL: ' + mult;
    }); 

}


function fecha() {
  var fecha = new Date(); //Fecha actual
  var mes = fecha.getMonth()+1; //obteniendo mes
  var dia = fecha.getDate(); //obteniendo dia
  var ano = fecha.getFullYear(); //obteniendo año
  
  let fecha_actual = ano+"-"+mes+"-"+dia;

  console.log(fecha_actual);

}

function save_factura() {
    var combo = document.getElementById("producto");
    var producto = combo.options[combo.selectedIndex].text;
    let total = document.getElementById('total').value;
    let cantidad = document.getElementById('cant').value;
    let cliente = document.getElementById('client').value;
    let valor = document.getElementById('precio').value;
    var fecha = new Date(); //Fecha actual
    var mes = fecha.getMonth()+1; //obteniendo mes
    var dia = fecha.getDate(); //obteniendo dia
    var ano = fecha.getFullYear(); //obteniendo año
  
    let fecha_actual = ano+"-"+mes+"-"+dia;

    const datos = {
      Product: producto,
      Fecha: fecha_actual,
      Total: total,
      Cantidad: cantidad,
      Cliente: cliente,
      Valor: valor
    }
    
    $.post('newVenta.php', datos, function (response) {
      if (response == 'insuficiente') {
          showMessage('NO HAY LA CANTIDAD DISPONIBLE','danger');
      }else  {
          showMessage('VENTA REALIZADA CORRECTAMENTE','success');
          $('#cant').val('');
          $('#client').val('');

        Swal.fire({
        title: "Desea imprimir la factura ?",
        showCancelButton: true,
        confirmButtonText: "Confirmar",
        cancelButtonText: "Cancelar",
        })
            .then(resultado => {
            if (resultado.value) {
               
            var doc = new jsPDF();
                
            doc.setFont("helvetica");
            doc.setFontSize(24);
            doc.text(20, 20, 'PERROS RICHARD');

            doc.setFontSize(16);
            doc.text(20, 30, 'Rapidez y calidad marcan la diferencia');

            doc.text('PRODUCTO'+'---------------'+producto,20,50);
            doc.text('CANTIDAD'+'------------------'+cantidad,20,70);
            doc.text('VALOR UNITARIO'+'------------ '+valor,20,90);
            var total = cantidad * valor;
            doc.text('VALOR TOTAL'+'------------ '+total,20,110);

            doc.setFontSize(14);
            doc.text(40, 130, 'Gracias por su compra ' + cliente);


        // Save the PDF
        doc.save('documento.pdf');
  
        }
    });
         
      }
      console.log(response);
    })
    
}


function pdf() {


    
  
}

//https://flutterstudio.app/