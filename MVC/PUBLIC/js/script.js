let registrarUsuario = async () => {

    let nombres = document.getElementById("nombres").value;
    let apellido = document.getElementById("apellidos").value;
    let email = document.getElementById("email").value;
    let telefono = document.getElementById("telefono").value;
    let password = document.getElementById("password").value;
    let fecha_nac = document.getElementById("fecha_nac").value;
    let usu_rol = document.getElementById("usu_rol").value;

    console.log(usu_rol);

    if (nombres.trim() == "" || apellido.trim() == "" || email.trim() == "" || telefono.trim() == "" || password.trim() == "" || fecha_nac.trim() == "" || usu_rol.trim() == "") {

        return Swal.fire({
            position: "center",
            icon: "warning",
            title: "Todos los campos son obligtorios",
            showConfirmButton: false,
            timer: 1500
        });
    }

    let url = "?controlador=usuario&accion=registrar";
    fd = new FormData;
    fd.append("nombres", nombres);
    fd.append("apellidos", apellido);
    fd.append("email", email);
    fd.append("telefono", telefono);
    fd.append("password", password);
    fd.append("fecha_nac", fecha_nac);
    fd.append("usu_rol", usu_rol);

    let respuesta = await fetch(url, {
        method: "post",
        body: fd
    })

    let info = await respuesta.json();

    Swal.fire({
        position: "center",
        icon: info.icono,
        title: info.mensaje,
        showConfirmButton: false,
        timer: 1500
    });

    //clear form
    clearform();


}

let eliminarRegistros = async (uid, elem, controller,puid) => {



    Swal.fire({
        title: "Estas Seguro que deseas eliminar?",
        text: "Esta accion no se puede revertir!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Eliminar!"

    }).then((result) => {
        if (result.isConfirmed) {

            eliminar(uid, elem, controller,puid)
        }

    });

}

let eliminar = async (uid, elem, controller, puid) => {
    
    if (!puid) {

        let url = `?controlador=${controller}&accion=eliminar&uid=${uid}`;
        let respuesta = await fetch(url)
        let info = await respuesta.json();

        Swal.fire({
            title: "Informacion",
            text: info.mensaje,
            icon: info.icono
        });

        $(elem).closest('tr').remove();
    }else{

        let url = `?controlador=${controller}&accion=eliminar&uid=${uid}&puid=${puid}`;
        let respuesta = await fetch(url)
        let info = await respuesta.json();

        Swal.fire({
            title: "Informacion",
            text: info.mensaje,
            icon: info.icono
        });

        $(elem).closest('tr').remove();
    }



}


//=============== programa =====================

let registrarPrograma = async () => {

    let url = "?controlador=programa&accion=Registrar";
    fd = new FormData;
    fd.append("NomPro", document.getElementById("NomPro").value);
    fd.append("CodPro", document.getElementById("CodPro").value);

    let respuesta = await fetch(url, {
        method: "post",
        body: fd
    })

    let info = await respuesta.json();

    if (info) {

        Swal.fire({
            position: "center",
            icon: info.icono,
            title: info.mensaje,
            showConfirmButton: false,
            timer: 1500
        });
    }

    clearform();

}

const EditarProgramas = async () => {
    let PRO_CODIGO = document.getElementById("PRO_CODIGO").value;
    let PRO_NOMBRE = document.getElementById("PRO_NOMBRE").value;
    let PRO_UID = document.getElementById("uid").value;


    if (PRO_CODIGO.trim() == "" || PRO_NOMBRE.trim() == "" || PRO_UID.trim() == "") {

        return Swal.fire({
            position: "center",
            icon: "warning",
            title: "Todos los campos son obligatorios",
            showConfirmButton: false,
            timer: 1500
        });
    }

    let url = "?controlador=programa&accion=Editar";
    fd = new FormData;
    fd.append("PRO_CODIGO", PRO_CODIGO);
    fd.append("PRO_NOMBRE", PRO_NOMBRE);
    fd.append("PRO_UID", PRO_UID);


    let respuesta = await fetch(url, {
        method: "post",
        body: fd
    })

    let info = await respuesta.json();

    Swal.fire({
        position: "center",
        icon: info.icono,
        title: info.mensaje,
        showConfirmButton: false,
        timer: 1500
    });

}

function clearform() {
    $('#formReg')[0].reset();
}

const EditarUsuario = async () => {
    let nombres = document.getElementById("nombres").value;
    let apellido = document.getElementById("apellidos").value;
    let email = document.getElementById("email").value;
    let telefono = document.getElementById("telefono").value;
    let uid = document.getElementById("uid").value;
    let fecha_nac = document.getElementById("fecha_nac").value;

    if (nombres.trim() == "" || apellido.trim() == "" || email.trim() == "" || telefono.trim() == "" || uid.trim() == "" || fecha_nac.trim() == "") {

        return Swal.fire({
            position: "center",
            icon: "warning",
            title: "Todos los campos son obligatorios",
            showConfirmButton: false,
            timer: 1500
        });
    }

    let url = "?controlador=usuario&accion=Editar";
    fd = new FormData;
    fd.append("nombres", nombres);
    fd.append("apellidos", apellido);
    fd.append("email", email);
    fd.append("telefono", telefono);
    fd.append("uid", uid);
    fd.append("fecha_nac", fecha_nac);

    let respuesta = await fetch(url, {
        method: "post",
        body: fd
    })

    let info = await respuesta.json();

    Swal.fire({
        position: "center",
        icon: info.icono,
        title: info.mensaje,
        showConfirmButton: false,
        timer: 1500
    });

}

const UserInscriptions = async () => {



    let usuario = document.getElementById("input-datalist-users").value;
    let programa = document.getElementById("input-datalist-program").value;

    if (usuario.trim() == "" || programa.trim() == "") {
        return Swal.fire({
            position: "center",
            icon: "warning",
            title: "Todos los campos son obligatorios",
            showConfirmButton: false,
            timer: 1500
        });
    }

    let codPro = programa.split("-")[0];

    let fecha = new Date();

    fecha = fecha.toISOString();

    let url = "?controlador=uspro&accion=Registrar";

    fd = new FormData;
    fd.append("USU_EMAIL", usuario);
    fd.append("PRO_CODIGO", codPro);
    fd.append("USPRO_FECH_INS", fecha);

    let recargar = 0;
    await fetch(url, {
        method: "post",
        body: fd
    }).then(response => response.json())
        .then(response => {

            Swal.fire({
                position: "center",
                icon: response.icono,
                title: response.mensaje,
                showConfirmButton: false,
                timer: 1500
            });

            recargar = 1;


        })

    setTimeout(function () {
        location.reload();
    }, 1000);


}


const EditarInscripciones = async () => {
    let USPRO_USU_ID = document.getElementById("input-datalist-users").value;
    let USPRO_PRO_ID = document.getElementById("input-datalist-program").value;
    let USPRO_FECH_INS = document.getElementById("fecha_insc").value;
    let USPRO_ID = document.getElementById("uid").value;
    
    USPRO_PRO_ID = USPRO_PRO_ID.split("-")[0];
    console.log(USPRO_USU_ID,USPRO_PRO_ID,USPRO_FECH_INS,USPRO_ID)
    if (USPRO_USU_ID.trim() == "" || USPRO_PRO_ID.trim() == "" || USPRO_ID.trim() == "" || USPRO_FECH_INS.trim() == "") {

        return Swal.fire({
            position: "center",
            icon: "warning",
            title: "Todos los campos son obligatorios",
            showConfirmButton: false,
            timer: 1500
        });
    }

    let url = "?controlador=uspro&accion=Editar";
    fd = new FormData;
    fd.append("USPRO_USU_ID", USPRO_USU_ID);
    fd.append("USPRO_PRO_ID", USPRO_PRO_ID);
    fd.append("USPRO_FECH_INS", USPRO_FECH_INS);
    fd.append("USPRO_ID", USPRO_ID);


    let respuesta = await fetch(url, {
        method: "post",
        body: fd
    })

    let info = await respuesta.json();

    Swal.fire({
        position: "center",
        icon: info.icono,
        title: info.mensaje,
        showConfirmButton: false,
        timer: 1500
    });

}
