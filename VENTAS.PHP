<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



    <?php require 'partials/navbar.php';

    ?>
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <a class="btn btn-danger" href="#" id="report" onclick="reporte()">GENERAR REPORTE</a>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <?php
          require 'db/conexion.php';
          
           $user = $_GET['usuario'];
           $sql = "SELECT * FROM usuarios WHERE nombre = '$user'";
           $result = mysqli_query($connection, $sql);
           $json = array();
           while ($row = mysqli_fetch_array($result)) {
           $json[] = array(
            'sede' => $row['sede']);            
         }

        $longitud = count($json);
       for ($i=0; $i < $longitud ; $i++) { 
       $data = current($json[$i]);
       $sede = json_encode($data);
        }
    
        $sql = "SELECT * FROM producto WHERE sede = '$data'";
        $result = mysqli_query($connection, $sql);

        $json = array();
        while ($row = mysqli_fetch_array($result)) {
            $json[] = array(
            'name' => $row['nombre_producto']);            
        }
        $arr = count($json);
        for ($i=0; $i <$arr; $i++) { 
            $jsonstring = json_encode($json[$i]);
            $string = str_replace('name','', $jsonstring);
            $str = str_replace('"','',$string);
            $st = str_replace(':','',$str);
            $s = str_replace('{','',$st);
            $product = str_replace('}','',$s);
           
            require 'views/cards.php';

        }

            //echo $cod,'  ', $cant;
            

    ?>
    <script src="js/reporte.js"></script>

    <script src="js/jspdf.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>

</html>