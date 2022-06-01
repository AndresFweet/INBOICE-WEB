<?php
    $titulo = 'REGISTRO || SISTEMA DE FACTURACION';
    require_once 'partials/header.php'; ?>

<body>
    <div class="container">
        <div id="App" class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <br>
                <div class="card-body form-group border">
                    <h2 class="text-center">NUEVO REGISTRO</h2>
                    <br>
                    <form id="registro">
                        <div class="d-flex form-group w-100">
                            <input type="text" id="nombre" class="form-control mr-4"
                                placeholder="Agrega un nombre completo">
                            <input type="text" id="apellido" class="form-control" placeholder="Agrega el apellido">
                        </div>

                        <div class="d-flex form-group">
                            <div class="w-50 mr-3">
                                <select id="cargo" class="form-control">
                                    <option>ADMINISTRADOR</option>
                                    <option>USUARIO</option>
                                </select>
                            </div>
                            <input type="text" id="sede" class="form-control w-50" placeholder="SEDE">
                        </div>
                        <input type="email" id="correo" class="form-control" placeholder="INGRESA TU EMAIL">
                        <br>
                        <div class="d-flex form-group w-100">
                            <input type="password" id="pass1" class="form-control mr-4" placeholder="CONTRASEÑA">
                            <input type="password" id="pass2" class="form-control" placeholder="VERIFICA CONTRASEÑA">
                        </div>
                        <div class="form-check mb-2">
                            <input id="check" class="form-check-input" type="checkbox">
                            <label class="form-check-label" for="flexCheckChecked">
                                ACEPTAR TERMINOS Y CONDICIONES
                            </label>
                        </div>
                        <button type="submit" class="w-100 btn btn-primary">REGISTRAR DATOS</button>
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script src="js/registro.js"></script>
</body>

</html>