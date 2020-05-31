<h1 align="center">
  <br>
  <a href="https://twitter.com/CarlChokSanc"><img src="https://pbs.twimg.com/profile_images/1249514034992492546/taRVsUFG_400x400.jpg" alt="harlericho" width="200"></a>
  <br>
 CarlChokSanc
  <br>
</h1>
<p align="center">
  <a href="#key-features">Developer</a> •
  <a href="#how-to-use">Programming</a> •
  <a href="#download">Design</a> •
  <a href="#credits">Web</a> •
  <a href="#related">Gamer</a> •
  <a href="#license">Students</a>
</p>

 ---


![screenshot](https://pbs.twimg.com/media/EXs0FIEWkAArlMZ.jpg)

---

## Crud-PHP-PDO-ITSCO

Sistema de un crud básico usando php -pdo - mysql, todo orientado a la web.

```php
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
    header("location:../usuarios.php");
}
```
---
```php
if ($int >= 3) {
                    //modificamos el estado del usuario
                    $sql1 = "update usuarios set estado='I' where usuario='$user'";
                    $querysql1 = $pdo->prepare($sql1);
                    $querysql1->execute();

                    $_SESSION['alerta2'] = 'Lo sentimos, su usuario ha sido desactivado';
                    header("location: ../index.php");
                    //$mensaje2 = 'Lo sentimos, su usuario ha sido desactivado';
                    //echo "<script type='text/javascript'>alert('$mensaje2');</script>";
                    //header('refresh:0.2;url=../index.php');
                    limpiarSession();
                } else {
                    $_SESSION['alerta2'] = $int + 'intentos';
                    header("location: ../index.php");
                    //echo "<script type='text/javascript'>alert('$int intento');window.location= '../index.php'</script>";
                }
```
---
## License
Carlos Choca Sánchez

---

>
> GitHub [@CarlChokSanc](https://github.com/harlericho) &nbsp;&middot;&nbsp;
> Twitter [@CarlChokSanc](https://twitter.com/CarlChokSanc)
---
