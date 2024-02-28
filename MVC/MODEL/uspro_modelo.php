<?php

class uspro_modelo
{

    public static function registrar($info)
    {
        $i = new connection();
        $con = $i->getConnection();
        $sql = "INSERT INTO t_us_pro(USPRO_UID,USPRO_USU_ID,USPRO_PRO_ID,USPRO_FECH_INS) VALUES (?,?,?,?)";
        $st = $con->prepare($sql);

        $v = array(
            $info["USPRO_UID"],
            $info["USPRO_USU_UID"],
            $info["USPRO_PRO_UID"],
            $info["USPRO_FECH_INS"]
        );

        return $st->execute($v);
    }

    public static function listar()
    {
        $i = new connection();
        $con = $i->getConnection();
        $sql = "SELECT * FROM t_us_pro";

        $st = $con->prepare($sql);

        $st->execute();

        return $st->fetchAll();
    }

    public static function BuscarInsc($USU_UID, $PRO_CODIGO)
    {
        $i = new connection();
        $con = $i->getConnection();
        $sql = "SELECT * FROM t_us_pro WHERE USPRO_USU_ID = ? AND USPRO_PRO_ID = ?";

        $st = $con->prepare($sql);
        $v = array($USU_UID, $PRO_CODIGO);
        $st->execute($v);

        return $st->fetch();
    }

    public static function eliminar($UID, $PUID)
    {

        $i = new connection();
        $con = $i->getConnection();
        $sql = "DELETE FROM t_us_pro WHERE USPRO_USU_ID = ? AND USPRO_PRO_ID = ?";

        $st = $con->prepare($sql);
        $v = array($UID, $PUID);


        return  $st->execute($v);
    }

    public static function buscarxId($ID)
    {
        $i = new connection();
        $con = $i->getConnection();
        $sql = "SELECT * FROM t_us_pro WHERE USPRO_ID = ?";

        $st = $con->prepare($sql);
        $v = array($ID);
        $st->execute($v);

        return $st->fetch();
    }

    public static function actualizar($info)
    {
        $i = new connection();
        $con = $i->getConnection();
        $sql = "UPDATE t_us_pro SET USPRO_USU_ID = ?, USPRO_PRO_ID  = ?,USPRO_FECH_INS =? WHERE USPRO_ID = ?";
        $st = $con->prepare($sql);
        $v = array(
            $info["USPRO_USU_ID"],
            $info["USPRO_PRO_ID"],
            $info["USPRO_FECH_INS"],
            $info["USPRO_ID"],

        );

        return $st->execute($v);
    }

    public static function buscarxPrograma($Codprograma)
    {
        $i = new connection();
        $con = $i->getConnection();
        $sql = "SELECT * FROM t_us_pro WHERE USPRO_PRO_ID = ?";
        var_dump($Codprograma);
        $st = $con->prepare($sql);
        $v = array($Codprograma);
        $st->execute($v);

        return $st->fetchAll();
    }
}
