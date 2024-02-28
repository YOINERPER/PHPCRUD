<div class="w-100  p-5 w-100">
    <h1 class="h1 text-center ">REGISTRO DE PROGRAMAS</h1>
    <div class="bg-light rounded ">

        <form class="p-5 " id="formReg" onsubmit="return false">
            <div class="form-group">
                <label for="exampleInputEmail1" class=" mb-2  text-white ">Nombre Programa:</label>
                <input type="text" class="form-control   " id="NomPro" aria-describedby="emailHelp" name="NomPro" placeholder="Nombre Programa" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label class=" text-white mb-2" for="exampleInputPassword1">Codigo Programa:</label>
                <input type="number" class="form-control" id="CodPro" name="CodPro" placeholder="Codigo Programa" required>
            </div>
            <button type="submit" onclick="registrarPrograma()" class="btn btn-primary mt-2">Crear</button>
        </form>
    </div>
</div>


</div>