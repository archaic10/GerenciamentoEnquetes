<?php
require_once 'Db.php';
class RespostaDAO extends Db{
    public function __construct() {
        parent::__construct();
    }

    public function inserir($o){
        $query = "INSERT INTO RESPOSTA (COD_ENQUETE,ALTERNATIVA) VALUES('$o->COD_ENQUETE','$o->ALTERNATIVA')";

        return $this->oConn->exec($query);
    }
    public function alterar($o){
    }
    public function excluir($o){
        $query = "DELETE FROM RESPOSTA WHERE COD_ENQUETE ='$o->ID'";
        
        try{          
            return $this->oConn->exec($query);
        }catch (Exception $ex) {
            return false;
        }
    }
    public function obter($o = null){
        $query = "SELECT * FROM RESPOSTA ";
        $res = $this->oConn->query($query);
        return $res->fetchAll();
    }
    public function obterPorPk($o = null){
        $query = " SELECT * FROM RESPOSTA ";
        $res = $this->oConn->query($query);
    }
    public function obterRespostas($o ){
        $query = " SELECT * FROM RESPOSTA WHERE cod_enquete = '$o->COD_ENQUETE' ";  
      
        $res = $this->oConn->query($query);
        return $res->fetchAll();
    }

}
?>