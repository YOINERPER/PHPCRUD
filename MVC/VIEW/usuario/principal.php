<h1 class="text-center pt-5">ADMINISTRACION DE USUARIOS</h1>
<div class="cont-btn-reg w-100 d-flex justify-content-lg-start ps-5">

</div>
<div class="w-100 d-flex align-items-center justify-content-center mt-4">
    <form action="?controlador=usuario&accion=reportePDF" method="post" class="w-50">
        <select name="rol" class="form-select bg-secondary  " aria-label="Default select example" required>
            <option value ="" selected disabled hidden>ROL DE USUARIO</option>
            <option value="1">ADMINISTRADOR</option>
            <option value="2">SECRETARIO(A)</option>
            <option value="3">ESTUDIANTE</option>
        </select>
        <?php
        if ($_SESSION["USU_ROL"] == 1) {
            echo  '<a href="?controlador=usuario&accion=frmRegistrar" class="btn btn-info mt-2">Registrar</a>';
        }
        ?>
        <input type="submit" value="Generar Reporte (PDF)" class="btn btn-primary mt-2">
    </form>

</div>

<div class="px-5 pt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">NOMBRE</th>
                <th scope="col">APELLIDO</th>
                <th scope="col">EMAIL</th>
                <th scope="col">TELEFONO</th>
                <th scope="col">FECHA NAC</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($this->usuarios as $usuarios) {
                $uid = $usuarios['USU_UID'];
                echo "<tr>";
                echo "<td>" . $usuarios["USU_NOMBRES"] . "</td>";
                echo "<td>" . $usuarios["USU_APELLIDOS"] . "</td>";
                echo "<td>" . $usuarios["USU_EMAIL"] . "</td>";
                echo "<td>" . $usuarios["USU_TELEFONO"] . "</td>";
                echo "<td>" . $usuarios["USU_FECH_NAC"] . "</td>";
                if ($_SESSION["USU_ROL"] == 1) {
                    echo "<td><button type='button' onclick='eliminarRegistros(\"$uid\", this, \"usuario\")' class='btn btn-danger'>Eliminar</button> || <a type='button' href='?controlador=usuario&accion=frmEditar&uid=$uid' class='btn btn-info'>Editar</a></td>";
                }
                echo "<tr>";
            }
            ?>
        </tbody>
    </table>
</div>