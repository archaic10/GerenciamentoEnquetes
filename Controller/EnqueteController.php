<?php
require 'Controller.php';
require './Model/EnqueteDAO.php';
require_once './Model/RespostaDAO.php';
class EnqueteController extends Controller{
private $id;
private $titulo;
private $inicio;
private $termino;

public function __construct() {
    parent::__construct();
}

public function salvar(){       
    
    $this->titulo = $_REQUEST['titulo'];
    $this->inicio = $_REQUEST['inicio'];
    $this->termino = $_REQUEST['termino'];
    $o = new class{};   
    $o->TITULO = $this->titulo; 
    $o->DATA_INICIO =  $this->inicio;
    $o->DATA_FIM = $this->termino;   
    $enqueteDAO = new EnqueteDAO();

    if($enqueteDAO->inserir($o)){

        echo "<script>alert('enquete criada com sucesso')</script>";
    }else{
        echo "<script>alert('enquete criada com sucesso')</script>";

    }    
}
public function alterar(){
  
    $this->id = $_REQUEST['codigo'];
    $this->titulo = $_REQUEST['titulo'];
    $this->inicio = $_REQUEST['inicio'];
    $this->termino = $_REQUEST['termino'];
    $o = new class{};   
    $o->ID = $this->id;
    $o->TITULO = $this->titulo; 
    $o->DATA_INICIO =  $this->inicio;
    $o->DATA_FIM = $this->termino;   
    $enqueteDAO = new EnqueteDAO();
    if($enqueteDAO->alterar($o)){
        echo "<script>alert('enquete aleterada com sucesso')</script>";
    }else{
        echo "<script>alert('erro')</script>";
    }
}
public function deletar (){
    $this->id = $_REQUEST['codigo'];
    $o = new class{};   
    $o->ID = $this->id;
    $enqueteDAO = new EnqueteDAO();
    $respostaDAO = new RespostaDAO();
    $o->COD_ENQUETE =$o->ID ;
    $respostaDAO->excluir($o);  
    if($enqueteDAO->excluir( $o)){
        echo "<script>alert('Excluído com  sucesso')</script>";
    }else{
        echo "<script>alert('erro')</script>";
    }
}


public function obterEnquetes(){
    $enqueteDAO = new EnqueteDAO();
    return $enqueteDAO->obter();
}
public function obterEnquetePorPk(){ 
    $this->id = $_REQUEST['codigo'];
    $o = new class{};   
    $o->ID = $this->id;
    $enqueteDAO = new EnqueteDAO();   
    echo  json_encode($enqueteDAO->obterPorPk($o));
    exit;
}

}

?>