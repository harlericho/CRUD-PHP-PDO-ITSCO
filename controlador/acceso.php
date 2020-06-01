<?php
require '../datos/conexion.php';
session_start();
$user = $_POST['email'];
$pass = $_POST['password'];
$passmd5 = md5($pass);
$sql = "select * from usuarios where usuario='$user' and password='$passmd5'";
$query = $pdo->prepare($sql);
$query->execute();
$result = $query->fetchAll();
if (validarUsuario($user, $pdo) == true) {
    foreach ($result as $res) {
        $rol = $res['idrol'];
    }
    if (@$rol) {
        switch ($rol) {
            case 1:
                echo "<script>
                alert('Bienvenido Administrador');window.location= '../inicio.php'
                </script>";
                $_SESSION['usuario'] = $user;
                limpiarSession();
                break;
            case 2:
                echo "<script>
                alert('Bienvenido Invitado');window.location= '../inicio.php'
                </script>";
                $_SESSION['usuario'] = $user;
                limpiarSession();
                break;
        }
    } else {
        if ((isset($_SESSION['n'])) && (isset($_SESSION['user']))) {
            $dato = $_SESSION['user'];
            if ($dato === $user) {
                $_SESSION['n'] = $_SESSION['n'] + 1;
                $int = $_SESSION['n'];
                if ($int >= 3) {
                    //modificamos el estado del usuario
                    $sql1 = "update usuarios set estado='I' where usuario='$user'";
                    $querysql1 = $pdo->prepare($sql1);
                    $querysql1->execute();

                    $_SESSION['alerta'] = 'Lo sentimos, su usuario ha sido desactivado';
                    $_SESSION['color'] = 'danger';
                    $_SESSION['logo'] = 'exclamation-circle';
                    header("location: ../index.php");
                    //$mensaje2 = 'Lo sentimos, su usuario ha sido desactivado';
                    //echo "<script type='text/javascript'>alert('$mensaje2');</script>";
                    //header('refresh:0.2;url=../index.php');
                    limpiarSession();
                } else {
                    $_SESSION['alerta'] = $int.' intentos';
                    $_SESSION['color'] = 'danger';
                    $_SESSION['logo'] = 'lock';
                    header("location: ../index.php");
                    //echo "<script type='text/javascript'>alert('$int intento');window.location= '../index.php'</script>";
                }
            } else {
                $_SESSION['n'] = 1;
                $_SESSION['user'] = $user;
                $_SESSION['alerta'] = '1 intento';
                $_SESSION['color'] = 'danger';
                $_SESSION['logo'] = 'lock';
                header("location: ../index.php");
                //echo "<script type='text/javascript'>alert('1 intento');window.location= '../index.php'</script>";
            }
        } else {
            $_SESSION['n'] = 1;
            $_SESSION['user'] = $user;
            $_SESSION['alerta'] = '1 intento';
            $_SESSION['color'] = 'danger';
            $_SESSION['logo'] = 'lock';
            header("location: ../index.php");
            //echo "<script type='text/javascript'>alert('1 intento');window.location= '../index.php'</script>";
        }
    }
} elseif (validarEstado($user, $pdo) == true) {
    //echo "<script>
    //alert('El estado del usuario esta inactivo');
    //</script>";
    $_SESSION['alerta'] = 'El estado del usuario esta inactivo';
    $_SESSION['color'] = 'info';
    $_SESSION['logo'] = 'user-times';
    header("location: ../index.php");
} else {
    $_SESSION['alerta'] = 'Usuario no existe en la base';
    $_SESSION['color'] = 'warning';
    $_SESSION['logo'] = 'user';
    header("location: ../index.php");
    // echo "<script type='text/javascript'>alert('Email no existe');window.location= '../index.php'</script>";
}

function validarUsuario($usu, $pdo2)
{
    $sqlus = "select * from usuarios where usuario='$usu' and estado='A'";
    $querysqluser = $pdo2->prepare($sqlus);
    $querysqluser->execute();
    $numeroDeFilas = $querysqluser->rowCount();
    # Si son 0 o menos, significa que no existe
    if ($numeroDeFilas <= 0) {
        return false;
    } else {
        return true;
    }
}

function validarEstado($usu, $pdo2)
{
    $sqlus = "select * from usuarios where usuario='$usu' and estado='I'";
    $querysqluser = $pdo2->prepare($sqlus);
    $querysqluser->execute();
    $numeroDeFilas = $querysqluser->rowCount();
    # Si son 0 o menos, significa que no existe
    if ($numeroDeFilas <= 0) {
        return false;
    } else {
        return true;
    }
}

function limpiarSession()
{
    unset($_SESSION['n']);
    unset($_SESSION['user']);
}
