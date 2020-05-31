<div class="modal" tabindex="-1" role="dialog" id="edit_<?php echo $value['cod']; ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modificar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="contanier">
                    <form class="needs-validation" method="POST" action="" novalidate>
                        <div class="form-row">
                            <div class="col-md-8 mb-3">
                                <label for="validationCustom01">Apellidos y Nombres:</label>
                                <input type="text" class="form-control" id="validationCustom01"
                                    placeholder="Apellidos y Nombres" name="txtNombre"
                                    value="<?php echo $value['nombre']; ?>" required>
                                <div class="invalid-feedback">
                                    Ingrese sus Apellidos y Nombres.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom02">Usuario:</label>
                                <input type="email" class="form-control" name="txtUsuario" id="validationCustom02"
                                    placeholder="Email" value="<?php echo $value['usuario']; ?>" required>
                                <div class="invalid-feedback">
                                    Ingrese un Email.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom03">Contraseña:</label>
                                <input type="password" class="form-control" name="txtPassword" id="validationCustom03"
                                    placeholder="Contraseña" value="<?php echo $value['password']; ?>" required>
                                <div class="invalid-feedback">
                                    Ingrese una Contraseña.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
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
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom04">Estado</label>
                                <select class="custom-select" id="validationCustom04" name="seleccionEstado"
                                    value="<?php echo $value['estado']; ?>" required>
                                    <option selected disabled value="">-Seleccione-</option>
                                    <option value="A">Activo</option>
                                    <option value="I">Inactivo</option>
                                </select>
                                <div class="invalid-feedback">
                                    Seleccione un Estado.
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-info" type="submit" name="btnModificar" title="Modificar Usuario">
                    <i class="fa fa-edit"></i> Modificar</button>
                <!-- <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button> -->
            </div>
        </div>
    </div>
</div>