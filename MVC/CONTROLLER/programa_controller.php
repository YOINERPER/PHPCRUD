<?php
require_once "MODEL/programa_modelo.php";
class programa_controlador
{


    public function __construct()
    {
        $this->obj = new Plantilla();
    }

    public function principal()
    {
        $this->obj->programas = programa_modelo::listar();
        $this->obj->unirPagina("/programa/principal");
    }

    public function frmRegistrar()
    {
        $this->obj->unirPagina("/programa/frmRegistro");
    }
    public function Registrar()
    {
        if (isset($_POST["NomPro"]) && isset($_POST["CodPro"])) {


            extract($_POST);
            if (trim($NomPro) == "" || trim($CodPro) == "") {

                echo json_encode(array('estado' => 2, "mensaje" => "todos los campos son obligatorios", "icono" => "warning"));
                
            } else {
                
                $datos['NomPro'] = $NomPro;
                $datos['CodPro'] = $CodPro;
                $res = programa_modelo::registrar($datos);

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
        $this->obj->infoProgramas = programa_modelo::BuscarxUID($Uid);
        $this->obj->unirPagina("/programa/frmEditar.programa");
    }
    public function Editar()
    {
        if (isset($_POST["PRO_CODIGO"]) && isset($_POST["PRO_NOMBRE"]) && isset($_POST["PRO_UID"]) ) {
            extract($_POST);

            if (trim($PRO_CODIGO) == "" || trim($PRO_NOMBRE) == "" || trim($PRO_UID) == "" ) {

                echo json_encode(array('estado' => 2, "mensaje" => "Todos los campos son obligatorios", "icono" => "warning"));
            } else {

                $datos['PRO_CODIGO'] = $PRO_CODIGO;
                $datos['PRO_NOMBRE'] = $PRO_NOMBRE;
                $datos['PRO_UID'] = $PRO_UID;
               

                $res = programa_modelo::actualizar($datos);
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
            $r = programa_modelo::eliminar($uid);

            if ($r) {
                echo json_encode(array('estado' => 1, "mensaje" => "Se elimino exitosamente", "icono" => "success"));
            } else {
                echo json_encode(array('estado' => 2, "mensaje" => "error al eliminar", "icono" => "error"));
            }
        }
    }
    public function buscar()
    {
    }
}
