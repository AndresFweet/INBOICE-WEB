<?php 
  include_once 'libs/user.php';
  //echo $data;
  if ($data === 'ADMINISTRADOR') {
    require 'nav-admin.php';
  }else{
    require 'nav-user.php';
  }  
?>