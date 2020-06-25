<?php 
require_once 'Db.php';
class VotacaoDAO extends Db{

    public function __construct() {
        parent::__construct();
    }

    public function inserir($o){
        $query = "INSERT INTO VOTACAO (COD_ENQUETE, COD_RESPOSTA ) VALUES('$o->COD_ENQUETE','$o->COD_RESPOSTA')";
        return $this->oConn->exec($query);
    }
    public function alterar($o){
      
    }
    public function excluir($o){
        $query = "DELETE FROM VOTACAO WHERE ID ='$o->ID'";
        try{          
            return $this->oConn->exec($query);
        }catch (Exception $ex) {
            return false;
        }
    }
    public function obter($o = null){
        $query = "SELECT * FROM VOTACAO ";
        $res = $this->oConn->query($query);
        return $res->fetchAll();
    }
    public function obterPorPk($o = null){
        $query = " SELECT * FROM VOTACAO ";
        $res = $this->oConn->query($query);
    }
    
    
    public function obterVotacao($o){

       $query =  "SELECT ";
     
        $indices = explode(",", $o->INDICES);
        $contador =0;
        foreach($indices as $indice){
            $contador ++;
            if($contador < count($indices)){
               
                $query.=" COUNT(case when cod_resposta = $indice then id end) as '$indice', ";
                
            }
            if($contador == count($indices)){
                
                $query.=" COUNT(case when cod_resposta = $indice then id end) as '$indice' from votacao where cod_enquete = '$o->COD_ENQUETE ' ";
                
            }
            
        }
      
     
       $res = $this->oConn->query($query);
        return $res->fetchAll();
    }
}
?>