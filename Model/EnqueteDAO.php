<?php
require_once 'Db.php';
class EnqueteDAO extends Db{

    public function __construct() {
        parent::__construct();
    }

    public function inserir($o){
        $query = "INSERT INTO ENQUETE (TITULO, DATA_INICIO, DATA_FIM ) VALUES('$o->TITULO','$o->DATA_INICIO', '$o->DATA_FIM')";
        return $this->oConn->exec($query);
    }
    public function alterar($o){
        $query = "UPDATE ENQUETE SET TITULO='$o->TITULO', DATA_INICIO ='$o->DATA_INICIO', DATA_FIM='$o->DATA_FIM' WHERE ID ='$o->ID'";
        return $this->oConn->exec($query);
    }
    public function excluir($o){
        $query = "DELETE FROM ENQUETE WHERE ID ='$o->ID'";
        try{          
            return $this->oConn->exec($query);
        }catch (Exception $ex) {
            return false;
        }
    }
    public function obter($o = null){
        $query = "SELECT * FROM ENQUETE ";
        $res = $this->oConn->query($query);
        return $res->fetchAll();
    }
    public function obterPorPk($o){
        $query = " SELECT * FROM ENQUETE WHERE ID ='$o->ID' ";
        $res = $this->oConn->query($query);
        return $res->fetchAll();
    }
}
?>