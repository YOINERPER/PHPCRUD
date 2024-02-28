const LoginUser = async ()=>{

    let email = document.getElementById("inpEmail").value;
    let password = document.getElementById("inpPassWord").value;

    if(email.trim() == "" || password.trim() == ""  ){
        return Swal.fire({
            position: "center",
            icon: "warning",
            title: "Todos los campos son obligatorios",
            showConfirmButton: false,
            timer: 1500
        });
    }

    let url = "?controlador=inicio&accion=login";

    fd = new FormData;
    fd.append("USU_EMAIL", email);
    fd.append("USU_PASSWORD", password);

    let response = await fetch(url,{
        method:"post",
        body:fd
    }).then(response=>response.json())
    .then(respuesta => {
        
        if(respuesta == 1){
           
           window.location.href="http://localhost/PROJECTS/MVC/MVC/?controlador=inicio&accion=panelPrincipal";

        }else{
            
            Swal.fire({
                position: "center",
                icon: respuesta.icono,
                title: respuesta.mensaje,
                showConfirmButton: false,
                timer: 1500
            });
        }

        
    });


    
    
}