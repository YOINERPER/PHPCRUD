<div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Editar</h6>
            <form method="POST" onsubmit="return false;" action="?controlador=programa&accion=Editar" id="formEdit">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="nombre" class="form-label text-white">CODIGO</label>
                        <input type="text" value="<?php echo $this-> infoProgramas["PRO_CODIGO"] ?>" class="form-control" id="PRO_CODIGO" name="nombres" required>
                    </div>
                     <div class="col-lg-6">
                        <label for="apellidos" class="form-label text-white">NOMBRE</label>
                        <input type="text" value="<?php echo $this-> infoProgramas["PRO_NOMBRE"] ?>" class="form-control" id="PRO_NOMBRE"  name="apellidos" required>
                    </div>

                    <div class="col-lg-6">
                        <input type="hidden" value="<?php echo $this-> infoProgramas["PRO_UID"] ?>" class="form-control" id="uid"  name="uid">
                    </div>
                </div>     
                <button type="submit" onclick="EditarProgramas()" class="btn btn-primary mt-4">Editar</button>                
            </form>
        </div>     
</div>