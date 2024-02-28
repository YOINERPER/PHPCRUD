<?php
require_once("./MODEL/usuario_modelo.php");
require_once "MODEL/programa_modelo.php";
require_once "MODEL/uspro_modelo.php";
class uspro_controlador
{

    public function __construct()
    {

        $this->obj = new Plantilla();
    }

    public function principal()
    {
        $this->obj->programas = programa_modelo::listar();
        $this->obj->inscritos = uspro_modelo::listar();
        $this->obj->unirPagina("/uspro/principal");
    }

    public function frmRegistrar()
    {

        $this->obj->usuarios = usuario_modelo::listar();
        $this->obj->programas = programa_modelo::listar();
        $this->obj->unirPagina("/uspro/frmRegistro");
    }
    public function Registrar()
    {
        if (isset($_POST["USU_EMAIL"]) && isset($_POST["PRO_CODIGO"]) && isset($_POST["USPRO_FECH_INS"])) {


            extract($_POST);

            if (trim($USU_EMAIL) == "" || trim($PRO_CODIGO) == "" || trim($_POST["USPRO_FECH_INS"]) == "") {

                echo json_encode(array('estado' => 2, "mensaje" => "todos los campos son obligatorios", "icono" => "warning"));
            } else {


                $datos['USU_EMAIL'] = $USU_EMAIL;

                //TRAEMOS EL ID DEL USUARIO
                $resUsu = usuario_modelo::buscarXEmail($USU_EMAIL);

                if (is_array($resUsu)) {
                    $USU_UID = $resUsu["USU_UID"];

                    //TRAEMOS EL ID DEL PROGRAMA

                    $resPro = programa_modelo::programaxCod($PRO_CODIGO);


                    if (is_array($resPro)) {
                        $PRO_CODIGO = $resPro["PRO_UID"];

                        //verificar que no este inscrito
                        $insc = uspro_modelo::BuscarInsc($USU_UID, $PRO_CODIGO);
                        if (is_array($insc)) {

                            echo json_encode(array('estado' => 2, "mensaje" => "El usuario ya se encuentra inscrito en el programa", "icono" => "error"));
                        } else {
                            $proUid = uniqid();
                            $datos['USPRO_UID'] = $proUid;
                            $datos['USPRO_USU_UID'] = $USU_UID;
                            $datos['USPRO_PRO_UID'] = $PRO_CODIGO;
                            $datos['USPRO_FECH_INS'] = $USPRO_FECH_INS;

                            // registramos inscripcion en la base de datos

                            $resInsc = uspro_modelo::registrar($datos);

                            if ($resInsc) {
                                echo json_encode(array('estado' => 1, "mensaje" => "Registro exitoso", "icono" => "success"));
                            } else {
                                echo json_encode(array('estado' => 2, "mensaje" => "error al registrar", "icono" => "error"));
                            }
                        }
                    }
                }

                // $datos['PRO_CODIGO'] = $CodPro;
                // $res = programa_modelo::registrar($datos);

                // if ($res) {
                //     echo json_encode(array('estado' => 1, "mensaje" => "Registro exitoso", "icono" => "success"));
                // } else {
                //     echo json_encode(array('estado' => 2, "mensaje" => "error al registrar", "icono" => "error"));
                // }
            }
        } else {
            header("location:/mvcApp");
        }
    }

    public function frmEditar()
    {
        $Uid = $_GET["uid"];
        $this->obj->infoInsc = uspro_modelo::buscarxId($Uid);
        $this->obj->usuarios = usuario_modelo::listar();
        $this->obj->programas = programa_modelo::listar();
        $this->obj->unirPagina("/uspro/frmEditar.uspro");
    }
    public function Editar()
    {
        if (isset($_POST["USPRO_USU_ID"]) && isset($_POST["USPRO_PRO_ID"]) && isset($_POST["USPRO_ID"]) && isset($_POST["USPRO_FECH_INS"])) {
            extract($_POST);

            if (trim($USPRO_USU_ID) == "" || trim($USPRO_PRO_ID) == "" || trim($USPRO_ID) == "" || trim($USPRO_FECH_INS) == "") {

                echo json_encode(array('estado' => 2, "mensaje" => "Todos los campos son obligatorios", "icono" => "warning"));
            } else {

                //TRAEMOS EL ID DEL USUARIO
                $resUsu = usuario_modelo::buscarXEmail($USPRO_USU_ID);

                if (is_array($resUsu)) {

                    $USU_UID = $resUsu["USU_UID"];

                    //TRAEMOS EL ID DEL PROGRAMA

                    $resPro = programa_modelo::programaxCod($USPRO_PRO_ID);

                    if (is_array($resPro)) {
                        $PRO_CODIGO = $resPro["PRO_UID"];

                        $datos['USPRO_USU_ID'] = $USU_UID;
                        $datos['USPRO_PRO_ID'] = $PRO_CODIGO;
                        $datos['USPRO_FECH_INS'] = $USPRO_FECH_INS;
                        $datos['USPRO_ID'] = $USPRO_ID;


                        $res = uspro_modelo::actualizar($datos);
                        if ($res) {
                            echo json_encode(array('estado' => 1, "mensaje" => "Actualizacion exitosa", "icono" => "success"));
                        } else {
                            echo json_encode(array('estado' => 2, "mensaje" => "error al actualizar", "icono" => "error"));
                        }
                    } else {
                        echo json_encode(array('estado' => 2, "mensaje" => "No existe el programa", "icono" => "error"));
                    }
                } else {
                    echo json_encode(array('estado' => 2, "mensaje" => "No existe usuario", "icono" => "error"));
                }
            }
        } else {
            header("location:/mvcApp");
        }
    }

    public function eliminar()
    {
        if (isset($_GET['uid']) && isset($_GET['puid'])) {
            $uid = $_GET['uid'];
            $puid = $_GET['puid'];

            $r = uspro_modelo::eliminar($uid, $puid);

            if ($r) {
                echo json_encode(array('estado' => 1, "mensaje" => "Se elimino exitosamente", "icono" => "success"));
            } else {
                echo json_encode(array('estado' => 2, "mensaje" => "error al eliminar", "icono" => "error"));
            }
        }
    }
    public function reportePDF()
    {
        if (isset($_POST["programa"])) {
            $codpro = $_POST["programa"];
            $codpro_split = explode("-", $codpro);

            $userlist = array(); 
            //TRAEMOS EL ID DEL PROGRAMA

            $resPro = programa_modelo::programaxCod($codpro_split[0]);

            if (is_array($resPro)) {
                $PRO_CODIGO = $resPro["PRO_UID"];
                
                $usuarios = uspro_modelo::buscarxPrograma($PRO_CODIGO);

                foreach($usuarios as $users){
                    var_dump($users["USPRO_USU_ID"]);
                    array_push($userlist,$users["USPRO_USU_ID"]);
                }
                
                $usuar = array();
                foreach($userlist as $users){
                    $user = usuario_modelo::buscarXuid($users);
                    array_push($usuar,$user);
                }
                
                
                require_once('VIEW/uspro/reporte.php');
            }
        } else {
            $this->obj->unirPagina("/usuario/principal");
        }
    }
}
