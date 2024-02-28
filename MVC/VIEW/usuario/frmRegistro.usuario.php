<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Registrar</h6>
        <form method="POST" onsubmit="return false;" action="?controlador=usuario&accion=Registrar" id="formReg">
            <div class="row">
                <div class="col-lg-6">
                    <label for="nombre" class="form-label text-white">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" required>
                </div>
                <div class="col-lg-6">
                    <label for="apellidos" class="form-label text-white">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                </div>

                <div class="col-lg-6">
                    <label for="email" class="form-label text-white">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-lg-6">
                    <label for="password" class="form-label text-white">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="col-lg-6">
                    <label for="telefono" class="form-label text-white">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required>
                </div>

                <div class="col-lg-6">
                    <label for="fecha_nac" class="form-label text-white">Fecha de nacimiento</label required>
                    <input type="date" class="form-control" id="fecha_nac" name="fecha_nac">
                </div>

                <div class="col-lg-6 mt-4">
                    <select class="form-select" aria-label="Default select example" id="usu_rol">
                        <option selected>Seleccione un rol</option>
                        <option value=1>Administrador</option>
                        <option value=2>Secretario(a)</option>
                        <option value=3>Estudiante</option>
                    </select>
                </div>
            </div>
            <button type="submit" onclick="registrarUsuario()" class="btn btn-primary mt-4">Registrar</button>
        </form>
    </div>
</div>