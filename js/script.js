var pagina= window.location.href;
pagina = pagina.split('/');
pagina = pagina[pagina.length-1];
pagina = pagina.split('.');
pagina = pagina[0];
var dados = "";
if(pagina === "index" ){
   document.querySelector("#btnSalvar").addEventListener("click", function(){
      if(document.getElementById("codigo").value!= ""){
         document.querySelector("#comando").value="alterar";         
      }else{
         document.querySelector("#comando").value="Salvar";
      }
      if(document.getElementById("titulo").value != "" && document.getElementById("inicio").value != "" && document.getElementById("termino").value != ""){
         document.querySelector("#enquete").method= "post";   
         document.querySelector("#enquete").submit();
      }else{
         alert("preencha todos os campos");
      }
   });
   function excluir(id){
      document.getElementById("comando").value="deletar";
      document.querySelector("#enquete").method= "post";   
      document.getElementById("codigo").value=id;

      document.querySelector("#enquete").submit();
   };
   function editar(id){
      $.ajax({
         url:"/index.php",
         type:"post",
      
         data:{
            comando:"obterEnquetePorPk",
            codigo: id,           
         }
      }).done(function(data){         
         document.getElementById("titulo").value=JSON.parse(data)[0]["titulo"];       
         document.getElementById("codigo").value=JSON.parse(data)[0]["id"];
      });
   }
}
if( pagina === "resposta"){
   document.querySelector(".btnAdd").addEventListener("click", function(){  
      var novo_name= document.querySelectorAll("textarea").length;
      var novo =  document.createElement("div");
     var botao = document.createElement("button");
      novo.innerHTML = " <div id ='conjunto"+novo_name+"' class='container column'>"+
      " <label for='resposta'>Resposta "+(novo_name+1)+"</label>"+
      " <textarea name='resposta[]'  cols='30' rows='2' placeholder='Digite a resposta'></textarea>"+
      " </div >";
      botao.class = "btnRemove";
      botao.id = "btn"+novo_name;
      botao.innerHTML = "-";
      botao.type = "button";
      botao.classList.add("btn-remove");
      botao.addEventListener("click", function(){ 
         this.parentNode.remove();         
      });
      document.querySelector("#enquete").appendChild(novo);   
      document.querySelector("#conjunto"+novo_name).appendChild(botao);

   });

   document.getElementById("btnSalvarResposta").addEventListener("click",function(){
      var valida = true;
      var text = document.querySelectorAll("textarea");
      for(var f =0; f < text.length; f ++){
       
         if(text[f].value ==""){
            valida = false;         
         }
      
       }
       if(valida == true){
         document.querySelector("#comando").value="Salvar";
         document.querySelector("#enquete").method= "post";   
         document.querySelector("#enquete").submit();
       }else{
          alert("Preencha todos os campos");
       }
   });

}
if( pagina === "home"){

 
 var check = document.querySelectorAll("input[type=checkbox]");
 var camposEnquete = document.querySelectorAll("input[name =checkbox]")
 var camposResposta=document.querySelectorAll("input[type=checkbox]")

 document.querySelector("#comando").value="salvar";
   for(x = 0; x < check.length; x++){
      
      check[x].addEventListener("click",function(){
            if(this.checked ==true){       
            var id =  this.parentNode.children["cod_enquete[]"].value;
            this.parentNode.children["cod_enquete[]"].value;
            this.parentNode.children["cod_resposta[]"].value= this.value;     
      
            $.ajax({
               url:"/home.php",
               type:"post",
            
               data:{
                  comando:"salvar",
                  cod_enquete: this.parentNode.children["cod_enquete[]"].value,
                  cod_resposta: this.parentNode.children["cod_resposta[]"].value
               }
            })
            .done(
               function(data){               
           
                  var votos = document.getElementsByClassName("voto"+id+"");
                  var cont = 1;
                  for(var z = 0; z < votos.length; z++){        
                    
                     votos[z].innerHTML =JSON.parse(data)[0][cont];
                     cont++;
                  }
            });
         }
      });
   }   

}

