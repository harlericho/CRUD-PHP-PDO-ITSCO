<?php
session_start();
include "../datos/conexion.php";
//include "../datos/sha1.php";
include "../datos/EncryDesencry.php";
if ($_GET) {
    $id = $_GET['codid'];
    $sql = "UPDATE usuarios set estado='I' where cod='$id'";
    $query = $pdo->prepare($sql);
    $query->execute();
    if ($query) {
        $_SESSION['mensaje'] = 'Dato eliminado o inactivo';
        $_SESSION['color'] = 'danger';
        $_SESSION['logo'] = 'trash'; //logo
        header("location:../usuarios.php");
        // echo "<script>
        // alert('Registro eliminado o inactivo');window.location= '../usuarios.php'
        // </script>";
    }
}

if (isset($_POST['btnGuardar']) != null) {
    $datos = array(
        'nombre' => $_POST['txtNombre'],
        'usuario' => $_POST['txtUsuario'],
        'pass' => $encriptar($_POST['txtPassword']),
        'rol' => $_POST['seleccionRol'],
        'estado' => $_POST['seleccionEstado'],
    );
    $sql = "INSERT INTO usuarios (nombre,usuario,password,idrol,estado) VALUE(:nombre,:usuario,:pass,:rol,:estado)";
    $query = $pdo->prepare($sql);
    $query->execute($datos);

    $sql2 = "SELECT max(cod) as cod1 FROM usuarios";
    $query2 = $pdo->prepare($sql2);
    $query2->execute();
    $variable = $query2->fetchAll();
    foreach ($variable as $key => $value) {
        $cod1 = $value['cod1'];
    }

    $imagen = ($_FILES['avatar']['tmp_name']);
    $imagenusu = fopen($imagen, 'rb');
    $sql3 = "INSERT INTO images_tabla (imagen, idusu) VALUE(:imagenusu,:idusu)";
    $query3 = $pdo->prepare($sql3);
    $query3->bindParam(':imagenusu', $imagenusu, PDO::PARAM_LOB);
    $query3->bindParam(':idusu', $cod1, PDO::PARAM_INT);
    $query3->execute();


    $_SESSION['mensaje'] = 'Usuario agregado';
    $_SESSION['color'] = 'success';
    $_SESSION['logo'] = 'save'; //logo
    header("location:../usuarios.php");
}


if (isset($_POST['btnModificar']) != null) {
    $datos = array(
        'codigo' => $_POST['idcode'],
        'nombre' => $_POST['txtNombree'],
        'usuario' => $_POST['txtUsuarioe'],
        'pass' => $encriptar($_POST['txtPassworde']),
        'rol' => $_POST['seleccionRole'],
        'estado' => $_POST['seleccionEstadoe'],
    );
    $sql = "UPDATE usuarios SET nombre=:nombre,usuario=:usuario,password=:pass,idrol=:rol,estado=:estado where cod=:codigo";
    $query = $pdo->prepare($sql);
    $query->execute($datos);
    $_SESSION['mensaje'] = 'Usuario modificado';
    $_SESSION['color'] = 'info';
    $_SESSION['logo'] = 'edit'; //logo
    header("location:../usuarios.php");
}
