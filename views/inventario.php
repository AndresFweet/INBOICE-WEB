    <?php
    $titulo = 'INICIO || SISTEMA DE FACTURACION';
    require_once 'partials/header.php';
    require_once 'partials/navbar.php' ?>
    <div class="container">
        <div id="App" class="row p-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <!-- FORMULARIO DEL INVENTARIO -->
                        <form id="inventario">
                            <input type="hidden" id="productiD">
                            <div class="form-group">
                                <input type="text" id="product" class="form-control mb-2"
                                    placeholder="Nombre del producto">
                                <input type="number" id="cant" class="form-control mb-2" step="1"
                                    placeholder="Cantidad disponible">
                                <input type="number" id="price" class="form-control mb-2" step="1"
                                    placeholder="Precio del producto">
                                <button type="submit" class="btn btn-primary btn-block text-center">
                                    Añadir Producto
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- TABLA DE INVENTARIO -->
            <div class="col-md-8">
                <div class="card my-4" id="task-result">
                    <div class="card-body">
                        <ul id="container"></ul>
                    </div>
                </div>
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>PRODUCTO</td>
                            <td>CANTIDAD</td>
                            <td>PRECIO</td>
                            <td>ACCIONES</td>
                        </tr>
                    <tbody id="inv"></tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="js/app.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>

    </html>