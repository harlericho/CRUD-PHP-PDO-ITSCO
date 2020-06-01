<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>LOGIN</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>

<body>
    <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">

                <div class="panel-heading">
                    <div class="panel-title">Iniciar Sessión</div>
                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Olviso su
                            cuenta</a></div>
                </div>
                <div style="padding-top:30px" class="panel-body">

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    <form id="loginform" class="form-horizontal" role="form" method="POST"
                        action="controlador/acceso.php">

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input id="email" type="email" class="form-control" name="email"
                                placeholder="Ingrese su email" autofocus="" required>
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password"
                                placeholder="Ingrese su contraseña" required>
                        </div>
                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->

                            <div class="col-sm-12 controls">
                                <button class="btn btn-success" type="submit">
                                    <i class="glyphicon glyphicon-open"></i>
                                    Ingreso</button>
                                <!-- <a id="btn-fblogin" href="#" class="btn btn-primary">Registro</a> -->
                            </div>
                        </div>
                    </form>
                    <!-- Copyright -->
                    <div class="footer-copyright text-center py-3">© 2020 Copyright:
                        <a href="https://twitter.com/CarlChokSanc"> CarlChoSanc</a>
                    </div>
                    <!-- Copyright -->
                </div>
            </div>
            <?php
            if (isset($_SESSION['alerta'])) {
            ?>
            <div class="alert alert-<?php echo $_SESSION['color']; ?> alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong><i class="icon fa fa-<?= $_SESSION['logo']; ?> "></i> Alerta!: </strong>
                <?php echo  $_SESSION['alerta']; ?>
            </div>
            <?php
                unset($_SESSION['alerta']);
                unset($_SESSION['color']);
                unset($_SESSION['logo']);
            } else {
                unset($_SESSION['alerta']);
                unset($_SESSION['color']);
                unset($_SESSION['logo']);
            } ?>
        </div>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>