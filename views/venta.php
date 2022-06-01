<?php
    $titulo = "NUEVA VENTA || INVOICE-WEB";
    $favicon = "images/icono.png";
    include 'partials/header.php';
?>

<body>
    <div class="container">
        <div id="Api" class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <br>
                <div class="card-body form-group border" id="factura">
                    <h2 class="text-center">NUEVA VENTA</h2>
                    <form id="vent" method="post" id="form_venta">
                        <div class="d-flex form-group w-100">
                            <select id="producto" class="w-50 form-control mr-2">

                            </select>
                            <input type="text" id="cant" class="w-50 form-control" placeholder="Elije una cantidad">
                        </div>
                        <div class="d-flex form-group w-100">
                            <input type="text" id="client" class="form-control w-50 mr-2"
                                placeholder="Nombre del cliente">
                            <input type="text" id="precio" class="form-control w-50" placeholder="Precio" readonly>
                        </div>
                        <div class="form-group d-flex w-100">
                            <input type="date" id="fecha" class="form-control w-50 mr-2 mb-2">
                            <input type="text" id="total" class="form-control w-50 mb-2" readonly value="TOTAL:">
                        </div>
                        <div class="d-flex form-group w-100">
                            <button id="add" style="display:none;" class="mr-2 w-50 btn btn-primary">AÑADIR OTRA
                                VENTA</button>
                            <button id="reg" class="w-50 btn btn-primary ml-auto">REGISTRAR</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div id="factura_list" class="col-md-8">

                <div class="d-flex mt-2 mb-4">
                    <button class="mr-2  btn btn-info w-50 ml-auto" id="btn-todo" style="display: none">Registrar
                        todo</button>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

    <script src="js/jspdf.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script src="js/venta.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>