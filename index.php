<?php require_once  "./Controller/EnqueteController.php"; ?>
<?php $enqueteController = new EnqueteController();?>
<?php require_once  "./layout/topo.php"; ?>
<?php require_once  "./layout/menu.php"; ?>
    
        <h1>Criar Enquete</h1>    
        <form id="enquete"method="POST" >
            <input type="hidden" id="comando" name="comando" value="">
            <input type="hidden" id="codigo" name="codigo" value="">
            <div class="container column">
                <label for="titulo">Título</label>
                <textarea name="titulo" id="titulo" cols="30" rows="5" placeholder="Digite o título"></textarea>
            </div >
                <div class="container column">
                    <label for="inicio">Data início</label>
                    <input type="datetime-local" id="inicio" name="inicio" value="">
                </div >
                <div class="container column">
                    <label for="termino">Data termino</label>
                    <input type="datetime-local" id="termino" name="termino" value="">
                </div>
            </div>
        </form> 
        <table class="container column">
            <thead >
                <tr >
                    <th class="col">Id</th>
                    <th class="col">Título</th>
                    <th class="col">Data ínicio</th>
                    <th class="col">Data fim</th>
                    <th class="col">Status</th>
                    <th class="col">Ações</th>
                </tr>
            </thead>
            <tbody class="row">
                <?php foreach($enqueteController->obterEnquetes() as $enquete){
                    $data_atual = date("Y/m/d H:i:s");
                    $diferenca1 = strtotime($enquete['data_inicio']) - strtotime($data_atual) ;
                    $diferenca2 = strtotime($enquete['data_fim']) - strtotime($data_atual) ;
                    $status  = "";
                    if($diferenca1 > 0){
                        $status  = "Não iniciado";
                    }else if($diferenca2 > 0 && $diferenca1 < 0){
                        $status  = "Em andamento";
                    }else if($diferenca2 < 0 && $diferenca1 < 0){
                        $status  = "Finalizado";
                    }
                    ?>
                    
                <tr>
                    <td class="col"><?=$enquete['id']?></td>
                    <td class="col"><?=$enquete['titulo']?></td>
                    <td class="col"><?=date("d/m/Y H:i:s", strtotime($enquete['data_inicio']))?></td>
                    <td class="col"><?=date("d/m/Y H:i:s", strtotime($enquete['data_fim']))?></td>
                    <td class="col"><?=$status?></td>
                    <td class="col">
                        <button  class="btn-remove" onclick="excluir('<?=$enquete['id']?>')">Excluir</button>
                        <button  class="btn-remove" onclick="editar('<?=$enquete['id']?>')">Editar</button>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        <div class="container column">
            <br>
            <button id="btnSalvar" class="btn-formulario item " name="btnSalvar">Criar</button>
            <br>
        </div>       
<?php require_once  "./layout/footer.php"; ?>