<?php $titulo = 'LOGIN || SISTEMA DE FACTURACION';
      $favicon = 'images/user.png';
 require_once 'partials/header.php'; ?>

<body>
    <div class="center">
        <br>
        <h2>INICIO DE SESSION</h2>
        <form action="login.php" method="POST">
            <div class="text_field">
                <input name="email" type="text" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="text_field">
                <input name="password" type="password" required>
                <span></span>
                <label>Contraseña</label>
            </div>
            <input type="submit" value="Login">
        </form>
    </div>
</body>

</html>