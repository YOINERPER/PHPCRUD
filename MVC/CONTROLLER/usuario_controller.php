<?php
require_once("./MODEL/usuario_modelo.php");

class usuario_controlador
{

    public function __construct()
    {
        // if (!isset($_SESSION["USU_ID"])) {
        //     header("location: /PROJECTS/MVC/MVC");
        // }

        $this->obj = new Plantilla();
    }

    public function principal()
    {
        $this->obj->usuarios = usuario_modelo::listar();
        $this->obj->unirPagina("/usuario/principal");
    }
    public function frmRegistrar()
    {
        if ($_SESSION["USU_ROL"] == 1) {

            $this->obj->unirPagina("/usuario/frmRegistro.usuario");
        } else {
            $this->obj->unirPagina("/inicio/principal");
        }
    }
    public function Registrar()
    {
        if (isset($_POST["nombres"]) && isset($_POST["apellidos"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["telefono"]) && isset($_POST["fecha_nac"]) && isset($_POST["usu_rol"])) {
            extract($_POST);

            if (trim($nombres) == "" || trim($apellidos) == "" || trim($email) == "" || trim($password) == "" || trim($telefono) == "" || trim($fecha_nac) == "" || trim($usu_rol) == "") {

                echo json_encode(array('estado' => 2, "mensaje" => "Todos los campos son obligatorios", "icono" => "warning"));
            } else {

                $datos['nombres'] = $nombres;
                $datos['apellidos'] = $apellidos;
                $datos['email'] = $email;
                $datos['password'] = $password;
                $datos['telefono'] = $telefono;
                $datos['fecha_nac'] = $fecha_nac;
                $datos['usu_rol'] = $usu_rol;

                $res = usuario_modelo::registrar($datos);
                if ($res) {
                    echo json_encode(array('estado' => 1, "mensaje" => "Registro exitoso", "icono" => "success"));
                } else {
                    echo json_encode(array('estado' => 2, "mensaje" => "error al registrar", "icono" => "error"));
                }
            }
        } else {
            header("location:/mvcApp");
        }
    }

    public function frmEditar()
    {


        $Uid = $_GET["uid"];
        $this->obj->infoUsuario = usuario_modelo::buscarXuid($Uid);
        $this->obj->unirPagina("/usuario/frmEditar.usuario");
    }
    public function Editar()
    {

        if (isset($_POST["nombres"]) && isset($_POST["apellidos"]) && isset($_POST["email"]) && isset($_POST["uid"]) && isset($_POST["telefono"]) && isset($_POST["fecha_nac"])) {
            extract($_POST);

            if (trim($nombres) == "" || trim($apellidos) == "" || trim($email) == "" || trim($uid) == "" || trim($telefono) == "" || trim($fecha_nac) == "") {

                echo json_encode(array('estado' => 2, "mensaje" => "Todos los campos son obligatorios", "icono" => "warning"));
            } else {

                $datos['nombres'] = $nombres;
                $datos['apellidos'] = $apellidos;
                $datos['email'] = $email;
                $datos['uid'] = $uid;
                $datos['telefono'] = $telefono;
                $datos['fecha_nac'] = $fecha_nac;

                $res = usuario_modelo::actualizar($datos);
                if ($res) {
                    echo json_encode(array('estado' => 1, "mensaje" => "Actualizacion exitosa", "icono" => "success"));
                } else {
                    echo json_encode(array('estado' => 2, "mensaje" => "error al actualizar", "icono" => "error"));
                }
            }
        } else {
            header("location:/mvcApp");
        }
    }

    public function eliminar()
    {
        if (isset($_GET['uid'])) {
            $uid = $_GET['uid'];
            $r = usuario_modelo::eliminar($uid);

            if ($r) {
                echo json_encode(array('estado' => 1, "mensaje" => "Se elimino exitosamente", "icono" => "success"));
            } else {
                echo json_encode(array('estado' => 2, "mensaje" => "error al eliminar", "icono" => "error"));
            }
        }
    }
    public function reportePDF()
    {
        
        if(isset($_POST["rol"])){
            $rol = $_POST["rol"];
            $usuarios = usuario_modelo::listar("WHERE USU_ROL = $rol");
            require_once('VIEW/usuario/reporte.php');

        }else{
            $this->obj->unirPagina("/usuario/principal");
        }
            
       
          
    }
}
