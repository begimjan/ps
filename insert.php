<?php 
  $connect = mysqli_connect('127.0.0.1','root','','begimjan_17_pn');
 $insert = mysqli_query($connect,"INSERT INTO store (name,price,img) VALUES ('" . $_POST['name'] . "','" . $_POST['price'] . "','images/" . $_FILES['img']['name'] . "')");
   move_uploaded_file( $_FILES['img']['tmp_name'], 'images/' .  $_FILES['img']['name']);
   header('Location: http://begimjan/store/admin.php');
 ?>