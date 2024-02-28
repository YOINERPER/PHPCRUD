<?php
class Plantilla
{

    public function unirPagina($contenido, $PagCompleta = true)
    {
        if ($PagCompleta) {
            require_once("./VIEW/header.php");
            require_once("./VIEW/$contenido" . ".php");
            require_once("./VIEW/footer.php");

        }else{

            require_once("./VIEW/$contenido" . ".php");
        }
    }
}
