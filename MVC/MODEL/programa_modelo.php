<?php

class programa_modelo{

    public static function registrar($info)
    {
        $i = new connection();
        $con = $i -> getConnection();
        $sql = "INSERT INTO t_programa(PRO_UID,PRO_NOMBRE,PRO_CODIGO) VALUES (?,?,?)";
        $st = $con -> prepare($sql);
        $uid = uniqid();
        $v = array(
            $uid,
            $info["NomPro"],
            $info["CodPro"],
        );
        return $st-> execute($v);
    }

    public static function eliminar($UID)
    {
        $i = new connection();
        $con = $i -> getConnection();
        $sql = "DELETE FROM t_programa WHERE PRO_ID = ?";

        $st = $con -> prepare($sql);
        $v = array($UID);

        return  $st -> execute($v);
    }

    public static function listar()
    {
        $i = new connection();
        $con = $i -> getConnection();
        $sql = "SELECT * FROM t_programa";

        $st = $con -> prepare($sql);

        $st -> execute();

        return $st -> fetchAll();

    }

    public static function programaxCod($cod)
    {
        $i = new connection();
        $con = $i -> getConnection();
        $sql = "SELECT * FROM t_programa WHERE PRO_CODIGO = ?";

        $st = $con -> prepare($sql);
        $v = array($cod);
        $st -> execute($v);

        return $st -> fetch();

    }

    public static function BuscarxUID($UID)
    {
        $i = new connection();
        $con = $i -> getConnection();
        $sql = "SELECT * FROM t_programa WHERE PRO_UID = ?";

        $st = $con -> prepare($sql);
        $v = array($UID);
        $st -> execute($v);

        return $st -> fetch();
    }

    public static function actualizar($info)
    {
        $i = new connection();
        $con = $i->getConnection();
        $sql = "UPDATE t_programa SET PRO_CODIGO = ?, PRO_NOMBRE  = ? WHERE PRO_UID = ?";
        $st = $con->prepare($sql);
        $v = array(
            $info["PRO_CODIGO"],
            $info["PRO_NOMBRE"],
            $info["PRO_UID"],
           
        );

        return $st->execute($v);
    }

}