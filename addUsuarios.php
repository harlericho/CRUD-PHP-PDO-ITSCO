<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="POST" action="controlador/crudUsuarios.php" enctype='multipart/form-data' novalidate>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Apellidos y Nombres:</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="Apellidos y Nombres" name="txtNombre" required>
                            <div class="invalid-feedback">
                                Ingrese sus Apellidos y Nombres.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Usuario:</label>
                            <input type="email" class="form-control" name="txtUsuario" id="validationCustom02" placeholder="Email" required>
                            <div class="invalid-feedback">
                                Ingrese un Email.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">Contraseña:</label>
                            <input type="password" class="form-control" name="txtPassword" id="validationCustom03" placeholder="Contraseña" required>
                            <div class="invalid-feedback">
                                Ingrese una Contraseña.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom04">Rol</label>
                            <select class="custom-select" id="validationCustom04" name="seleccionRol" required>
                                <option selected disabled value="">-Seleccione-</option>
                                <option value="1">Administrador</option>
                                <option value="2">Invitado</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione un Rol.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom04">Estado</label>
                            <select class="custom-select" id="validationCustom05" name="seleccionEstado" required>
                                <option selected disabled value="">-Seleccione-</option>
                                <option value="A">Activo</option>
                                <option value="I">Inactivo</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione un Estado.
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom04">Imagen</label>
                            <input type="file" class="form-control" name="avatar" id="validationCustom06" required>
                            <div class="invalid-feedback">
                                Seleccione una imagen.
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-primary" type="submit" name="btnGuardar" title="Guardar Usuario"><i class="fa fa-save"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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