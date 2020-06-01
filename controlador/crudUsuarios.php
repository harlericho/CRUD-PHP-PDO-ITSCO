<?php
session_start();
include "../datos/conexion.php";
if ($_GET) {
    $id = $_GET['codid'];
    $sql = "UPDATE usuarios set estado='I' where cod='$id'";
    $query = $pdo->prepare($sql);
    $query->execute();
    if ($query) {
        $_SESSION['mensaje'] = 'Dato eliminado o inactivo';
        $_SESSION['color'] = 'danger';
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
        'pass' => md5($_POST['txtPassword']),
        'rol' => $_POST['seleccionRol'],
        'estado' => $_POST['seleccionEstado'],
    );
    $sql = "INSERT INTO usuarios (nombre,usuario,password,idrol,estado) value(:nombre,:usuario,:pass,:rol,:estado)";
    $query = $pdo->prepare($sql);
    $query->execute($datos);
    $_SESSION['mensaje'] = 'Usuario agregado';
    $_SESSION['color'] = 'success';
    header("location:../usuarios.php");
}


if (isset($_POST['btnModificar']) != null) {
    $datos = array(
        'codigo' => $_POST['idcode'],
        'nombre' => $_POST['txtNombree'],
        'usuario' => $_POST['txtUsuarioe'],
        'pass' => $_POST['txtPassworde'],
        'rol' => $_POST['seleccionRole'],
        'estado' => $_POST['seleccionEstadoe'],
    );
    $sql = "UPDATE usuarios SET nombre=:nombre,usuario=:usuario,password=:pass,idrol=:rol,estado=:estado where cod=:codigo";
    $query = $pdo->prepare($sql);
    $query->execute($datos);
    $_SESSION['mensaje'] = 'Usuario modificado';
    $_SESSION['color'] = 'info';
    header("location:../usuarios.php");
}
