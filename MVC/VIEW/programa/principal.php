<h1 class="text-center pt-5">ADMINISTRACION DE PROGRAMAS</h1>
<div class="cont-btn-reg w-100 ">
    <?php
    if ($_SESSION["USU_ROL"] == 1) {
        echo  '<a href="?controlador=PROGRAMA&accion=frmRegistrar" class="btn btn-primary">Registrar</a>';
    
    }
    ?>
</div>
<!-- <div class="w-100 d-flex align-items-center justify-content-center mt-4">
    <form action="?controlador=usuario&accion=reportePDF" method="post" class="w-50">
        <select name="rol" class="form-select" aria-label="Default select example">
            <option selected>ROL DE USUARIO</option>
            <option value="1">ADMINISTRADOR</option>
            <option value="2">SECRETARIO(A)</option>
            <option value="3">ESTUDIANTE</option>
        </select>
        <input type="submit" class="btn btn-primary">
    </form>
   
</div> -->

<div class="px-5 pt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">CODIGO</th>
                <th scope="col">NOMBRE</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($this->programas as $prog) {
                $uid = $prog['PRO_UID'];
                echo "<tr>";
                echo "<td>" . $prog["PRO_CODIGO"] . "</td>";
                echo "<td>" . $prog["PRO_NOMBRE"] . "</td>";
          
                if ($_SESSION["USU_ROL"] == 1) {
                    echo "<td><button type='button' onclick='eliminarRegistros(\"$uid\", this, \"programa\")' class='btn btn-danger'>Eliminar</button> || <a type='button' href='?controlador=programa&accion=frmEditar&uid=$uid' class='btn btn-info'>Editar</a></td>";
                }
                echo "<tr>";
            }
            ?>
        </tbody>
    </table>
</div>