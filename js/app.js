
$(document).ready(function() {
  
  let edit = false;
  //console.log('jQuery is working');
  $('#task-result').hide();
  Obtener_Products();
  // BUSQUEDA DE PRODUCTOS POR EL EVENTO KEYUP
$('#search').keyup(function(e) {
  if ($('#search').val()) {
  let search = $('#search').val();
    $.ajax({
    url: 'busqueda.php',
    type: 'POST',
    data: { search },
    success: function(response){
      let arr = JSON.parse(response);
      let template = '';
      arr.forEach(arr => {
        template += `
                     <li>
                     ${arr.nombre}
                     </li>
                    ` 
      });
      $('#container').html(template);
      $('#task-result').show();
      //console.log(arr);
    }
  })
  }
});

$('#inventario').submit(function (e) {
    e.preventDefault();
    const Data = {
      producto: $('#product').val(),
      cantidad: $('#cant').val(),
      precio: $('#price').val(),
      id: $('#productiD').val()
    };

    let url = edit === false ? 'new_product.php' : 'edit_product.php';

    $.post(url, Data,  function(response) {
    if (response == 'existe') {
      showMessage('ESTE PRODUCTO YA EXISTE','danger')
    }
    Obtener_Products();
    $('#inventario').trigger('reset');
    });
  });

function Obtener_Products() {
  $.ajax({
    url: 'lista_producto.php',
    type: 'GET',
    success: function (response) {
     // console.log(response);
     let products = JSON.parse(response);
     let template = '';
     products.forEach(products => {
       template += `
                  <tr ProductId=${products.Id}>
                  <td>${products.Id}</td>
                  <td>
                  <a href="#" class="product-item">
                    ${products.Producto} 
                  </a>
                  </td>
                  <td>
                  ${products.Cantidad}
                  </td>
                  <td>${products.precio}</td>
                  <td>
                    <button class="product-delete btn btn-danger">
                     Delete 
                    </button>
                  </td>
                  </tr>
                `
      //console.log(products.Producto);
     });
     $('#inv').html(template);
    }
  })
}  
//PROCESO PARA ELIMINAR UN PRODUCTO
$(document).on('click', '.product-delete', function (e)  {
  e.preventDefault();
    Swal.fire({
      title: '¿Seguro que desea eliminar el registro?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: '¡Si, eliminar!'
    }).then((result) => {
      if (result.value) {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('ProductId');
        $.post('delete_product.php', {id}, function (response) {
        //console.log(response);
        Obtener_Products();
      });
      }
    })
  });

 //PROCESO PARA EDITAR UN PRODUCTO
 $(document).on('click', '.product-item', function () {
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr('ProductId');
    $.post('single.php', {id}, (response) => {
      let arr = JSON.parse(response);
      $('#product').val(arr[0].nombre);
      $('#cant').val(arr[0].cantidad);
      $('#price').val(arr[0].precio);
      $('#productiD').val(arr[0].id);
      console.log(arr);
      edit = true;      
    });
 }); 

})


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

