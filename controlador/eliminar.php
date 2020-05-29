<?php
session_start();
include "../datos/conexion.php";
if ($_GET) {
    $id=$_GET['codid'];
    $sql = "UPDATE usuarios set estado='I' where cod='$id'";
    $query = $pdo->prepare($sql);
    $query->execute();
    if ($query) {

        $_SESSION['mensaje']='Dato eliminado o inactivo';
        header("location:../usuarios.php");
       // echo "<script>
       // alert('Registro eliminado o inactivo');window.location= '../usuarios.php'
       // </script>";
    }
}
