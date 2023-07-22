<?php

class escritaArquivo{

    private $texto = "";
    private $diretorio = "";
    private $img = "";
    
    private function escrever($conteudo,$caminho){
      try{
           // $this->img = $imagem;
            $this->texto = $conteudo;
            $this->diretorio = '..//arquivo/'.$caminho;
            if(!$this->diretorio){
                die("Arquivo não informado");
            }else{
                $file = fopen($this->diretorio,"w");
                fwrite($file,$this->texto);
                fclose($file);
               return $this->img;
            } 
            
        }catch(Exception $e){
            echo("arquivo sem valor ou nao existe!".$e->getMessage());
        } 

    }
    public function inserir($conteudo,$caminho){
        
        $this->escrever($conteudo,$caminho);
    }
}
    function valores(){
    $arquivo = new escritaArquivo();
    $valores = json_decode($_GET['arquivo']);
    $texto = $valores->texto;
    $caminho = $valores->caminho;
    $arquivo->inserir($texto,$caminho);

}
valores();
?>
