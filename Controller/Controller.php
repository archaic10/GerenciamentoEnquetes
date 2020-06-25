<?php
ini_set('display_errors', '1');
header('Content-type: text/html; charset=utf-8');
date_default_timezone_set('America/Bahia');

class Controller{
    public function __construct(){         
  
      
      
       
        if (array_key_exists('comando', $_POST) && $_POST['comando'] != "") {
     
            $acao = $_POST['comando'];
            if (method_exists($this, $acao)) {
                $this->{$acao}();
            }
        }
    }
 
}
?>