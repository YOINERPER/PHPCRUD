<?php
require_once("./MODEL/inicio_modelo.php");
class inicio_controlador
{

    public function __construct()
    {
        $this->obj = new Plantilla();
    }

    public function principal()
    {
        $this->obj->unirPagina("/inicio/frmlogin",false);
    }

    public function panelPrincipal()
    {
        if(!isset($_SESSION["USU_UID"])){
            header("location: /PROJECTS/MVC/MVC");
        }
        $this->obj->unirPagina("/inicio/principal");
    }

   
    public function frmLogin()
    {

        $this->obj->unirPaginaLogin("/inicio/frmlogin");
    }

    public function login()
    {

        if (isset($_POST["USU_EMAIL"]) && isset($_POST["USU_PASSWORD"])) {

            extract($_POST);

            if (trim($_POST["USU_EMAIL"]) == "" || trim($_POST["USU_PASSWORD"]) == "") {

                echo json_encode(array('estado' => 2, "mensaje" => "Todos los campos son obligatorios", "icono" => "warning"));
            } else {
                
                $email = $_POST["USU_EMAIL"];
               
                $pwEncripted= sha1($USU_PASSWORD);

                $res = inicio_modelo::buscarXEmail($email,$pwEncripted);
                //verificamos que coincida
                
                if(is_array($res)){
                        $_SESSION["USU_NOMBRES"] = $res["USU_NOMBRES"];
                        $_SESSION["USU_APELLIDOS"] = $res["USU_APELLIDOS"];
                        $_SESSION["USU_UID"] = $res["USU_UID"];
                        $_SESSION["USU_ROL"] = $res["USU_ROL"];
                        echo json_encode(1);
                        
                }else{
                    
                    echo json_encode(array('estado' => 2, "mensaje" => "Usuario o contrasena incorrectos, verifique e intente nuevamente", "icono" => "error"));
                }
                
                
            }
        }
    }
    public function cerrarSesion()
    {
        session_destroy();
        header("location: /PROJECTS/MVC/MVC");
    }
}
