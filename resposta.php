<?php require_once  "./layout/topo.php"; ?>
<?php require_once  "./layout/menu.php"; ?>
<?php require_once "./Controller/RespostaController.php";?>
<?php $respostaController = new RespostaController(); ?>
<h1>Criar Resposta</h1>    
<form id="enquete" >
    <input type="hidden" id="comando" name="comando" value="">
    <div class="container column">
    <label for="enquete">Enquete</label>
    <select name="enquete" id="enquete">
        <option value="">Selecione</option>
        <?php    foreach($respostaController-> listarEnquetes() as $ls){ ?>
            <option value="<?=$ls['id']?>"><?=$ls['titulo']?></option>
            <?php }    ?>
    </select>
    </div>
    <div id="transcreva">
    <div class="container column">
        <label for="resposta">Resposta </label>
        <textarea name="resposta[]"  cols="30" rows="2" placeholder="Digite a resposta"></textarea> 
        </div >
    </div>
    <div class="container column">
        <label for="resposta">Resposta 2</label>
        <textarea name="resposta[]"  cols="30" rows="2" placeholder="Digite a resposta"></textarea>
        </div >
    </div>
    <div class="container column">
        <label for="resposta">Resposta 3</label>
        <textarea name="resposta[]"  cols="30" rows="2" placeholder="Digite a resposta"></textarea> <button type="button" class="btn-formulario item btnAdd" name="btnAdd">+</button>
        </div >
    </div>
   
        <!--<div class="container column">
            <label for="resposta2">Resposta 2</label>
            <textarea name="resposta2" id="resposta2" cols="30" rows="2" placeholder="Digite a resposta"></textarea>
        </div >
        <div class="container column">
            <label for="resposta3">Resposta 3</label>
            <textarea name="resposta3" id="resposta3" cols="30" rows="2" placeholder="Digite a resposta"></textarea>
        </div>-->
    </div>
    <input type="hidden" name="indices" id="indices">
</form> 
<div class="container column">
    <br>
    <button id="btnSalvarResposta" type="button" class="btn-formulario item" name="btnSalvar">Criar</button>
    <br>
</div>      
<?php require_once  "./layout/footer.php"; ?>