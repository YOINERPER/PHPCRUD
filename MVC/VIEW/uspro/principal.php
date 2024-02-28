<h1 class="text-center mt-4 mb-4">INSCRIPCIONES</h1>
<div>


<div class="w-100 d-flex align-items-center justify-content-center mt-4">
    <form action="?controlador=uspro&accion=reportePDF" method="post" class="w-50">
    <input type="text"  class="form-control" placeholder="PROGRAMA" list="list-programas" name="programa" id="input-datalist-program">
                    <datalist id="list-programas">
                        <?php
                        foreach ($this->programas as $programas) {
                            echo "<option>" . $programas["PRO_CODIGO"] . "-" . $programas["PRO_NOMBRE"] . "</option>";
                        }
                        ?>
                    </datalist>
        <?php
        if ($_SESSION["USU_ROL"] == 1) {
            echo  '<a href="?controlador=uspro&accion=frmRegistrar" class="btn btn-info  mt-2">Registrar</a>';
        }
        ?>
        <input type="submit" value="Generar Reporte (PDF)" class="btn btn-primary mt-2">
    </form>

</div>

</div>
<div class="px-5 pt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">USUARIO</th>
                <th scope="col">PROGRAMA</th>
                <th scope="col">FECHA INSC</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            foreach ($this->inscritos as $usuarios) {
                $ID =$usuarios["USPRO_ID"]; 
                $uid = $usuarios["USPRO_USU_ID"];
                $puid = $usuarios["USPRO_PRO_ID"];
                echo "<tr>";
                echo "<td>" . $usuarios["USPRO_USU_ID"] . "</td>";
                echo "<td>" . $usuarios["USPRO_PRO_ID"] . "</td>";
                echo "<td>" . $usuarios["USPRO_FECH_INS"] . "</td>";
            
                if ($_SESSION["USU_ROL"] == 1) {
                    echo "<td><button type='button' onclick='eliminarRegistros(\"$uid\", this, \"uspro\",\"$puid\")' class='btn btn-danger'>Eliminar</button> || <a type='button' href='?controlador=uspro&accion=frmEditar&uid=$ID' class='btn btn-info'>Editar</a></td>";
                }
                echo "<tr>";
            }
            ?>
        </tbody>
    </table>
</div>
