<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /php-login');
  }
  require 'db/database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT * FROM usuarios WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = $results;

    if(!$results){
      die( require_once('views/err.html') );
    }
    $pase = $_POST['password'];
    $hash = $results['password'];

    if (count($results) > 0 && password_verify($pase, $hash)) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /Facturacion-electronica/index.php");
      $message = 'Datos invalidos';
      
    } else {
      $message = 'Los datos ingresados son incorrectos';
    }
  }

?>


<?php if(!empty($message)): ?>
<p> <?= $message ?></p>
<?php endif;

  include_once 'views/login.php';

?>