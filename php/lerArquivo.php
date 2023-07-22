<?php
class lerArquivo{
   private $arquivopath;
   

    private function lerArq($caminho){
        
        try{
            $this->arquivopath = '..//arquivo/'.$caminho;
            $file = fopen($this->arquivopath,"r");
            
            $buffer =  fread($file,filesize($this->arquivopath));
            fclose($file);
            return($buffer);                  
        }catch(Exception $e){
            echo ("arquivo sem conteudo".$e->getMessage());
        }
            
    }
    public function chamado($valor){
        $conteudo = $this->lerArq($valor);
        return $conteudo;
    }
}
function inicio(){
    try{
        $arquivos = new lerArquivo();
        $texto = $arquivos->chamado($_GET['arquivo']);
        echo($texto);
    }catch(Exception $e){
        echo("arcquivo sem conteudo");
    }
    
}
inicio();
?>