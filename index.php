<?php
  session_start();

  require 'db/database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM usuarios WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>
<?php if(!empty($user)): ?>
<!-- <br> Bienevido. <? //= $user['email']; ?> -->
<?php require './views/inventario.php' ?>
<?php else: 
      require './views/index.php';
     endif; ?>