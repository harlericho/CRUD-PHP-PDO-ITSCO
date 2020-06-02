<div class="modal fade" id="modalEdit_<?php echo $value['cod']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="POST" action="controlador/crudUsuarios.php" novalidate>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <input type="hidden" id=idcode name="idcode" value="<?php echo $value['cod']; ?>">
                            <label for="validationCustom01">Apellidos y Nombres:</label>
                            <input type="text" class="form-control" id="validationCustom01"
                                value="<?php echo $value['nombre']; ?>" placeholder="Apellidos y Nombres"
                                name="txtNombree" required>
                            <div class="invalid-feedback">
                                Ingrese sus Apellidos y Nombres.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Usuario:</label>
                            <input type="email" class="form-control" name="txtUsuarioe" id="validationCustom02"
                                value="<?php echo $value['usuario']; ?>" placeholder="Email" required>
                            <div class="invalid-feedback">
                                Ingrese un Email.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">Contraseña:</label>
                            <input type="password" class="form-control" name="txtPassworde" id="validationCustom03"
                                value="<?php echo $desencriptar($value['password']); ?>" placeholder="Contraseña"
                                required>
                            <div class="invalid-feedback">
                                Ingrese una Contraseña.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom04">Rol</label>
                            <select class="custom-select" id="validationCustom04"
                                value="<?php echo $value['descripcion']; ?>" name="seleccionRole" required>
                                <!-- <option selected disabled value="">-Seleccione-</option> -->
                                <?php if ($value['idrol'] === "1") {
                                ?>
                                <option value="1"><?php echo $value['descripcion']; ?></option>
                                <option value="2">Invitado</option>
                                <?php
                                } else {
                                ?>
                                <option value="2"><?php echo $value['descripcion']; ?></option>
                                <option value="1">Administrador</option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione un Rol.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom04">Estado</label>
                            <select class="custom-select" id="validationCustom04" name="seleccionEstadoe" required>
                                <!-- <option selected disabled value="">-Seleccione-</option> -->
                                <?php if ($value['estado'] === "A") {
                                ?>
                                <option value="A">Activo</option>
                                <option value="I">Inactivo</option>
                                <?php
                                } else {
                                ?>
                                <option value="I">Inactivo</option>
                                <option value="A">Activo</option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione un Estado.
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-dark" type="submit" name="btnModificar"
                            title="Modificar Usuario"><i class="fa fa-edit"></i> Modificar</button>
                    </div>
                </form>
                <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function() {
                    'use strict';
                    window.addEventListener('load', function() {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form) {
                            form.addEventListener('submit', function(event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            }, false);
                        });
                    }, false);
                })();
                </script>
            </div>
        </div>
    </div>
</div>