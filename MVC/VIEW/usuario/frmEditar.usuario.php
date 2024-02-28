<div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Editar</h6>
            <form method="POST" onsubmit="return false;" action="?controlador=usuario&accion=Editar" id="formEdit">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="nombre" class="form-label text-white">Nombres</label>
                        <input type="text" value="<?php echo $this-> infoUsuario["USU_NOMBRES"] ?>" class="form-control" id="nombres" name="nombres" required>
                    </div>
                     <div class="col-lg-6">
                        <label for="apellidos" class="form-label text-white">Apellidos</label>
                        <input type="text" value="<?php echo $this-> infoUsuario["USU_APELLIDOS"] ?>" class="form-control" id="apellidos"  name="apellidos" required>
                    </div>

                     <div class="col-lg-6">
                        <label for="email" class="form-label text-white">Email</label>
                        <input type="email" value="<?php echo $this-> infoUsuario["USU_EMAIL"] ?>" class="form-control" id="email"  name="email" required>
                   </div>
                    

                     <div class="col-lg-6">
                        <label for="telefono" class="form-label text-white">Telefono</label>
                        <input value="<?php echo $this-> infoUsuario["USU_TELEFONO"] ?>" type="text" class="form-control" id="telefono"  name="telefono" required>
                    </div>

                     <div class="col-lg-6">
                        <label for="fecha_nac" class="form-label text-white">Fecha de nacimiento</label required>
                        <input type="date" value="<?php echo $this-> infoUsuario["USU_FECH_NAC"] ?>" class="form-control" id="fecha_nac"  name="fecha_nac">
                    </div>

                    <div class="col-lg-6">
                        <input type="hidden" value="<?php echo $this-> infoUsuario["USU_UID"] ?>" class="form-control" id="uid"  name="uid">
                    </div>
                </div>     
                <button type="submit" onclick="EditarUsuario()" class="btn btn-primary mt-4">Editar</button>                
            </form>
        </div>     
</div>