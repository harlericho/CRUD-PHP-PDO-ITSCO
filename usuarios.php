<?php

include "templeate/templeate.php";
?>

<?php
$sql = "SELECT u.cod, i.imagen, u.nombre,u.usuario,u.password,u.idrol,r.descripcion,u.estado
FROM usuarios u INNER JOIN rol r ON u.idrol=r.cod 
INNER JOIN images_tabla i ON u.cod=i.idusu WHERE u.estado='A'";
$query = $pdo->prepare($sql);
$query->execute();
$result = $query->fetchAll();
?>
<div class="container">
    <div clas="row">
        <br>
        <div clas="col.lg-12 text-center">
            <h3>Listado Usuarios</h3>
            <br>
            <a href="#" data-toggle="modal" data-target="#modalAdd" class="btn btn-outline-primary" title="Agregar Usuario"><i class="fa fa-user-plus"></i> Agregar
            </a>
            <?php include('addUsuarios.php'); ?>
            <br><br>
            <div class="table-responsive-sm">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Avatar</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result as $key => $value) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $value['cod']; ?></th>
                                <td> <img src="data:image/jpeg;base64, <?php echo base64_encode($value['imagen']);?>" width="50" height="50"/></td>
                                <td><?php echo $value['nombre']; ?></td>
                                <td><?php echo $value['usuario']; ?></td>
                                <td><?php echo $value['descripcion']; ?></td>
                                <td><?php
                                    if ($value['estado'] == 'A') {
                                        echo "<span class='badge badge-success'>Activo</span>";
                                    } else {
                                        echo "<span class='badge badge-danger'>Inactivo</span>";
                                    } ?></td>
                                <td>
                                    <a href="#modalEdit_<?php echo $value['cod']; ?>" class="btn btn-outline-primary btn-sm" data-toggle="modal" title="Modificar">
                                        <i class="fa fa-pen-square"></i></a>
                                    <a href="controlador/crudUsuarios.php?codid=<?php echo $value['cod']; ?>" class="btn btn-outline-danger btn-sm" title="Eliminar">
                                        <i class="fa fa-trash-alt"></i></a>
                                </td>
                                <?php include('editUsuarios.php'); ?>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
                <?php
                if (isset($_SESSION['mensaje'])) {
                ?>
                    <div class="alert alert-<?php echo $_SESSION['color']; ?> alert-dismissible fade show" role="alert">
                        <strong><i class="icon fa fa-<?= $_SESSION['logo']; ?> "></i> Mensaje: </strong>
                        <?php echo $_SESSION['mensaje']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                    unset($_SESSION['mensaje']);
                    unset($_SESSION['color']);
                    unset($_SESSION['logo']);
                } else {
                    unset($_SESSION['mensaje']);
                    unset($_SESSION['color']);
                    unset($_SESSION['logo']);
                } ?>
            </div>
        </div>
    </div>
</div>