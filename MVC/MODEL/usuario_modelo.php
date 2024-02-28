<?php

class usuario_modelo
{

    public static function registrar($info)
    {
        $i = new connection();
        $con = $i->getConnection();
        $sql = "INSERT INTO t_usuario(USU_UID,USU_NOMBRES,USU_APELLIDOS,USU_EMAIL,USU_PASSWORD,USU_TELEFONO,USU_FECH_NAC,USU_ROL) VALUES (?,?,?,?,?,?,?,?)";
        $st = $con->prepare($sql);
        $uid = uniqid();
        $v = array(
            $uid,
            $info["nombres"],
            $info["apellidos"],
            $info["email"],
            sha1($info["password"]),
            $info["telefono"],
            $info["fecha_nac"],
            $info["usu_rol"]
        );
        return $st->execute($v);
    }

    public static function actualizar($info)
    {
        $i = new connection();
        $con = $i->getConnection();
        $sql = "UPDATE t_usuario SET USU_NOMBRES = ?, USU_APELLIDOS  = ? ,USU_EMAIL = ?,USU_TELEFONO = ? ,USU_FECH_NAC = ? WHERE USU_UID = ?";
        $st = $con->prepare($sql);
        $v = array(
            $info["nombres"],
            $info["apellidos"],
            $info["email"],
            $info["telefono"],
            $info["fecha_nac"],
            $info["uid"]
        );

        return $st->execute($v);
    }

    public static function eliminar($UID)
    {
        $i = new connection();
        $con = $i->getConnection();
        $sql = "DELETE FROM t_usuario WHERE USU_UID = ?";

        $st = $con->prepare($sql);
        $v = array($UID);

        return  $st->execute($v);
    }

    public static function listar($senstencia = "")
    {

     
            var_dump($senstencia);
            $i = new connection();
            $con = $i->getConnection();
            $sql = "SELECT * FROM t_usuario $senstencia";

            $st = $con->prepare($sql);

            $st->execute();

            return $st->fetchAll();


    }

    public static function buscarXuid($uid)
    {

        $i = new connection();
        $con = $i->getConnection();
        $sql = "SELECT * FROM t_usuario WHERE USU_UID = ?";

        $st = $con->prepare($sql);
        $v = array($uid);
        $st->execute($v);

        return $st->fetch();
    }

    public static function buscarXEmail($email)
    {

        $i = new connection();
        $con = $i->getConnection();
        $sql = "SELECT * FROM t_usuario WHERE USU_EMAIL = ?";

        $st = $con->prepare($sql);
        $v = array($email);
        $st->execute($v);

        return $st->fetch();
    }
}
