<h1 class="text-center mt-4 mb-4">INSCRIPCIONES</h1>
<div class="form-group row bg-light ">
    <div class="col-6 border border-secondary p-5 ">

        <label for="input-datalist" class="text-white">USUARIOS</label>
        <input type="text" class="form-control " placeholder="Email" list="list-users" id="input-datalist-users">
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
        <input type="text" class="form-control" placeholder="PROGRAMA" list="list-programas" id="input-datalist-program">
        <datalist id="list-programas">
            <?php
            foreach ($this->programas as $programas) {
                echo "<option>" . $programas["PRO_CODIGO"] . "-" . $programas["PRO_NOMBRE"]. "</option>";
            }
            ?>
        </datalist>
    </div>


</div>

<div class="w-100 d-flex  justify-content-center align-items-center pt-4">
    <button class="btn btn-primary w-25" onclick="UserInscriptions()">Confirmar Inscripcion</button>
</div>


<script>
    document.addEventListener('DOMContentLoaded', e => {
        $('#input-datalist').autocomplete()
    }, false);
</script>