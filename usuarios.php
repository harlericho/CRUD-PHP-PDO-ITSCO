<?php

include "templeate/templeate.php";
?>

<?php
$sql = "SELECT u.cod, u.nombre,u.usuario,r.descripcion,u.estado
FROM usuarios u INNER JOIN rol r ON u.idrol=r.cod";
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
            <a href="addUsuarios.php" class="btn btn-outline-primary" title="Agregar Usuario"><i
                    class="fa fa-user-plus"></i> Agregar</a>
            <br><br>
            <div class="table-responsive-sm">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
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
                                <a href="" class="btn btn-outline-primary btn-sm" title="Modificar">
                                    <i class="fa fa-pen-square"></i></a>
                                <a href="controlador/crudUsuarios.php?codid=<?php echo $value['cod']; ?>"
                                    class="btn btn-outline-danger btn-sm" title="Eliminar">
                                    <i class="fa fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
                <?php
                if (isset($_SESSION['mensaje'])) {
                    ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Mensaje:</strong> <?php echo $_SESSION['mensaje']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                    unset($_SESSION['mensaje']);
                } else {
                    unset($_SESSION['mensaje']);
                } ?>
            </div>
        </div>
    </div>
</div>