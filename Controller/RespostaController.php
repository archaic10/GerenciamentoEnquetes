<?php
require 'Controller.php';
require_once './Model/RespostaDAO.php';
    require_once './Model/EnqueteDAO.php';
    class RespostaController extends Controller{
        private $enquete;
        private $resposta;
  
        public function __construct() {
            parent::__construct();
        }
        
        public function salvar(){                
             
                foreach($_REQUEST['resposta'] as $indice){             
           
              
                    $this->enquete = $_REQUEST['enquete'];
                    $this->resposta = $indice;           
                    $o = new class{};               
                    $o->COD_ENQUETE = $this->enquete; 
                    $o->ALTERNATIVA =  $this->resposta;                
                    $respostaDAO = new RespostaDAO();
                    if($respostaDAO->inserir($o)){            
                        echo "<script>alert('respostas criada com sucesso')</script>";
                    }else{
                        echo "<script>alert('error')</script>";                
                    }
                }
        }
        public function alterar(){
            $this->id = $_REQUEST['codigo'];
            $this->titulo = $_REQUEST['titulo'];
            $this->inicio = $_REQUEST['inicio'];
            $this->termino = $_REQUEST['termino'];
        
        }
        public function deletar (){
            $this->id = $_REQUEST['codigo'];
        
        }
        public function listar(){
        
        
        }
        
        public function selecionar(){
        
        
        }
        public function listarEnquetes(){
            $enqueteDAO = new EnqueteDAO();
            return $enqueteDAO->obter();
        
        }
    } 
?>