<!-- NAVIGATION  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">INICIO</a>
    <a class="navbar-brand" href="signup.php">
        REGISTRO</a>
    <a class="navbar-brand" href="caja.php">CAJA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <form class="form-inline my-2 my-lg-0">
                <input name="search" id="search" class="form-control mr-sm-2" type="search"
                    placeholder="Buscar un producto" aria-label="Search">
            </form>
    </div>
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            VENTAS
        </button>

        <?php
        require 'db/conexion.php';
        $sql = "SELECT * FROM usuarios";
        $result = mysqli_query($connection, $sql);
        $json = array();
        while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
        'nombre' => $row['nombre']);}
        ?>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <?php
            $longitud = count($json);
            for ($i=0; $i < $longitud ; $i++) { 
            $item = current($json[$i]);
            $usuarios = json_encode($item);?>
            <a class="dropdown-item" href="VENTAS.PHP?usuario=<?php echo $item ?>"><?php echo strtoupper($item) ?></a>
            <?php }
         ?>
        </div>
    </div>
    <a href="libs./logout.php" class="ml-2 btn btn-danger">Salir</a>
</nav>