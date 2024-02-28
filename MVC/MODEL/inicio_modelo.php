<?php

class inicio_modelo{

    public static function buscarXEmail($Email, $password){
        
        $i = new connection();
        $con = $i -> getConnection();
        $sql = "SELECT * FROM t_usuario WHERE USU_EMAIL = ? AND USU_PASSWORD = ?";
        $st = $con -> prepare($sql);
        $v = array($Email,$password);
       
        $st -> execute($v);

        return $st -> fetch();
    }
}