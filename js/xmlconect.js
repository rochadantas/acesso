function xmlLeitura(){
    let arquivo = document.getElementById('NomeArquivo');
    enviar(arquivo.value,"ler");
    
  
}
function xmlGravar(){
   
    let caminho = document.getElementById('NomeArquivo');
    let texto = document.getElementById('texto');
    let jsonconteudo = {"caminho":caminho.value,"texto":texto.value};
    let arquivo = JSON.stringify(jsonconteudo);
   
    enviar(arquivo,"gravar");
    

}

function enviar(arquivo,tipo){
    let url;
    const xmlhttp = new XMLHttpRequest();
   
 

    if(arquivo != "" && tipo == "ler"){
         url = 'php/lerArquivo.php?arquivo='+arquivo;
         
    }else if(arquivo != "" && tipo == "gravar"){
         url = 'php/escritaArquivo.php?arquivo='+arquivo;
         //alert(img);
    }
    
        if(arquivo === ""){
            alert("Os campos não tem um valores informado!");
        }else{
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
                xmlhttp.onload = function(){
                    document.getElementById("situacao").innerHTML =  xmlhttp.responseText;
                  
                    }
                }
            }
        }
    
        
            
   
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}