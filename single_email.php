<?php 
    include 'db/database.php';
    session_start();
          
          $nombre = $_POST['Nombre'];
          $apellido = $_POST['Apellido'];
          $cargo = $_POST['Cargo'];
          $sede = $_POST['Sede'];  
          $email = $_POST['Email'];
          $pass = $_POST['Pass'];
          $passHash = password_hash($pass, PASSWORD_DEFAULT);

    if (isset($email)) {
        $query = $conn->prepare('SELECT * FROM usuarios WHERE email = :email');
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount() > 0){
            echo 'Existe';
        }

        if ($query->rowCount() == 0) {
            $query = $conn->prepare("INSERT INTO usuarios (email,password,nombre,apellido,cargo,sede) VALUES (:email,:passHash,:nombre,:apellido,:cargo,:sede)");
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->bindParam("passHash", $passHash, PDO::PARAM_STR);
            $query->bindParam("nombre", $nombre, PDO::PARAM_STR);
            $query->bindParam("apellido", $apellido, PDO::PARAM_STR);
            $query->bindParam("cargo", $cargo, PDO::PARAM_STR);
            $query->bindParam("sede", $sede, PDO::PARAM_STR);
            $result = $query->execute();
            
            if ($result) {
                echo 'Creado';
            }else {
                echo 'error';
            }

        }

    }      
           
?>