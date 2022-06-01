<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $titulo ?> </title>
    <?php if (isset($_SESSION['user_id'])) {
    ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/icono.png" type="image/x-icon">
    <?php
    }else{
    ?>
    <link rel="shortcut icon" href="<?php echo $favicon ?>" type="image/x-icon">
    <link rel="stylesheet" href="assets/normalize.css">
    <link rel="stylesheet" href="assets/estilos.css">
    <?php
    } ?>
</head>