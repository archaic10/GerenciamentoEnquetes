<?php require_once  "./Controller/VotacaoController.php"; ?>
<?php $votacaoController= new  VotacaoController(); ?>
<?php require_once  "./layout/topo.php"; ?>
<?php require_once  "./layout/menu.php"; ?>

    <h1>Feed</h1>    
<?php $data_atual = date("Y/m/d H:i:s");  ?>
    <form id="enquete " >
    <input type="hidden" id="comando" name="comando" value="salvar">
        <?php   foreach($votacaoController->listarEnquetes() as $enquetes){ 
              $diferenca1 = strtotime($enquetes['data_inicio']) - strtotime($data_atual) ;
              $diferenca2 = strtotime($enquetes['data_fim']) - strtotime($data_atual) ;
             if( $diferenca2 > 0 && $diferenca1 < 0){
            ?>
            <div class="margem">               
                    <div class="container column">
                                <h3> <?= $enquetes['titulo'] ?></h3>                           
                    </div>
                    <div class="questao container ">
                        <p class="item"><b>Início:</b><br> <?= date("d/m/Y",strtotime($enquetes['data_inicio']))?></p>
                        <p class="item"> <b>Termino:</b> <br><?= date("d/m/Y",strtotime($enquetes['data_fim']))?></p>
                    </div>
                    <div class="questao container ">
                        <?php   foreach($votacaoController->listarRespostas($enquetes['id']) as $respostas){ ?>
                            <input class="item"  type="checkbox" name="caixa" value="<?= $respostas['id']?>"><label for=""> <?= $respostas['alternativa']?> </label><div class="voto<?=$enquetes['id']?>"></div>
                        <?php  }?>
                        <input  type="hidden" name="cod_resposta[]" value="">
                        <input  type="hidden" name="cod_enquete[]"  value="<?=$enquetes['id']?>">
                    </div>
                </div>
                <br>
            <?php  }?>
        <?php  }?>
    </form> 
<?php require_once  "./layout/footer.php"; ?>