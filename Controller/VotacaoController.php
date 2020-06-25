<?php
    require_once 'Controller.php';
    require_once './Model/EnqueteDAO.php';
    require_once './Model/RespostaDAO.php';
    require_once './Model/VotacaoDAO.php';
    class VotacaoController extends Controller{
        private $cod_enquete;
        private $cod_resposta;

        public function __construct(){
            parent::__construct();            
        }
        public function salvar(){   
            
          
            $this->cod_enquete = $_REQUEST['cod_enquete'];
            $this->cod_resposta = $_REQUEST['cod_resposta'];
    
            $o = new class{};   
            $o->COD_ENQUETE = $this->cod_enquete; 
            $o->COD_RESPOSTA =  $this->cod_resposta;
            
            $votacaoDAO = new VotacaoDAO();
           if($votacaoDAO->inserir($o)){
        
               
                $respostaDAO = new RespostaDAO();
                $array = [];
                $armazena = "";
                $contador = 0;
                // var_dump($respostaDAO->obterRespostas($o));
              foreach($respostaDAO->obterRespostas($o) as $respostas ){
                $contador++;
                  if($contador == count($respostaDAO->obterRespostas($o))){
                     $armazena.=$respostas['id'];
                  }else{
                    $armazena.=$respostas['id'].",";

                  }               
              }
            
              $o = new class{};
              $o->INDICES = $armazena;
              $o->COD_ENQUETE = $this->cod_enquete; 
              echo  json_encode($votacaoDAO->obterVotacao($o));
              exit;
            
            }else{
                echo "<script>alert('error')</script>";
             
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
        public function listarEnquetes(){
            $enqueteDAO = new EnqueteDAO();
            return $enqueteDAO->obter();        
        }
        public function listarRespostas($cod_resposta){
            $this->cod_resposta = $cod_resposta;
            $o = new class{};
            $o->COD_ENQUETE = $this->cod_resposta;
            $respostaDAO = new RespostaDAO();
            return $respostaDAO->obterRespostas($o);        
        }
        
        
        public function selecionar(){
        
        
        }
    } 
?>