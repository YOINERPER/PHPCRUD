<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Editar</h6>
        <form method="POST" onsubmit="return false;" action="?controlador=usuario&accion=Editar" id="formEdit">
            <div class="row">
                <div class="col-6 border border-secondary p-5 ">

                    <label for="input-datalist" class="text-white">USUARIOS</label>
                    <input type="text" value="<?php foreach ($this-> usuarios as $users){ if($users["USU_UID"]== $this ->infoInsc["USPRO_USU_ID"]){echo $users["USU_EMAIL"];}}?>" class="form-control " placeholder="Email" list="list-users" id="input-datalist-users">
                    <datalist id="list-users">
                        <?php
                        foreach ($this->usuarios as $usuarios) {
                            echo "<option>" . $usuarios["USU_EMAIL"] . "</option>";
                        }
                        ?>
                    </datalist>
                </div>

                <div class="col-6 border border-secondary p-5 ">

                    <label for="input-datalist" class="text-white">PROGRAMA</label>
                    <input type="text" value="<?php foreach ($this-> programas as $program){ if($program["PRO_UID"]== $this ->infoInsc["USPRO_PRO_ID"]){echo $program["PRO_CODIGO"];}}?>" class="form-control" placeholder="PROGRAMA" list="list-programas" id="input-datalist-program">
                    <datalist id="list-programas">
                        <?php
                        foreach ($this->programas as $programas) {
                            echo "<option>" . $programas["PRO_CODIGO"] . "-" . $programas["PRO_NOMBRE"] . "</option>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="col-6 border border-secondary p-5">
                    <label class="text-white">Fecha Inscripcion</label>
                    <input type="date" value="<?php echo $this->infoInsc["USPRO_FECH_INS"] ?>" class="form-control" id="fecha_insc" name="fecha_insc">
                </div>

                <div class="col-lg-6">
                    <input type="hidden" value="<?php echo $this->infoInsc["USPRO_ID"] ?>" class="form-control" id="uid" name="uid">
                </div>
            </div>
            <button type="submit" onclick="EditarInscripciones()" class="btn btn-primary mt-4">Editar</button>
        </form>
    </div>
</div>