function reporte() {
    
    Swal.fire({
        title: "Seguro que quiere generar el reporte?",
        showCancelButton: true,
        confirmButtonText: "Confirmar",
        cancelButtonText: "Cancelar",
        })
         .then(resultado => {
            if (resultado.value) {
               
            $.ajax({
                url: 'reporte.php',
                success: function (response){
                    console.log(response);
                }
            })

        }
    });
         
      }
        