<?  
class TabajaraCache
{
 /* configure as opcoes abaixo */
 public static $dir_cache = "cache_dir/"; //diretorio onde os arquivos de cache serao guardados
 public static $tempo_cache = cache_time; //tempo em que a pagina fica no cache (3600 segundos 1 hora)
 public static $editar_via_url = false; //permite atualizar, e excluir arquivos e o diretorio onde o cache e armazenado (tudo via url)
 public static $string_separatoria = "&cache_debug="; //string que serve para separar os elementos da url (usar false quando for pergar o valor via $_GET['cache_debug'])
 public static $extensao_padrao = "html"; //extensao padrao dos arquivos de cache
 
 /* iniciando o contrutor da classe */
 function __construct()
 {
    $this->pagina_atual = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $this->md5_pg = md5($this->pagina_atual).".".self::$extensao_padrao;
    $this->arquivo = self::$dir_cache.$this->md5_pg;
    $this->opcoes = "basico";
    $this->acao = false;
    $this->retorno = true;
    
    //array com as opcoes de debug
    $this->arr_debug = array("atualizar","limpar","matar");
   
    //cria o diretorio e da permissao de acesso
    @mkdir(self::$dir_cache,0777,true); 
    @chmod(self::$dir_cache,0777);
   
    //pega os parametros de debug via url
    if(self::$editar_via_url != false && self::$string_separatoria != false)
    { 
       //separa a string em partes
       $arr_url = explode(self::$string_separatoria,$this->pagina_atual);   
       //pega a acao que sera executada
       $this->acao = $arr_url[count($arr_url)-1];     
    }elseif(self::$editar_via_url != false && isset($_GET['cache_debug'])){
       //pega a acao que sera executada
       $this->acao = $_GET['cache_debug'];
    }

 }
 
 
  /* funcao que mostra o conteudo gravado no cache caso ele exista */
  
  public function KagaCache()
  {
     //verifica se o metodo e um metodo post
     if($_SERVER['REQUEST_METHOD'] != "POST")
     {
          //se a opcao de debug estiver no array
          if($this->acao != false && in_array($this->acao,$this->arr_debug))
          {
              
              switch($this->acao)
              { 
               case "atualizar":
               default:
               $this->retorno = false;
               break;
               
               //apaga o arquivo atual 
               case "limpar":
               @unlink($this->arquivo);
               break;
               
               //apaga todos os arquivos de cache
               case "matar": 
               
                 if($dir = opendir(self::$dir_cache)) 
                 {
                      while(false !== ($file = readdir($dir)))   
                      {
                          if($file != "." and $file != "..")
                          {
                            @unlink(self::$dir_cache.$file);
                          }
                      }
                      closedir($dir);
                  }
              }
          
          /* se o arquivo existir entao da um include dele na pagina */
          }
          
          elseif(file_exists($this->arquivo) && (time() - self::$tempo_cache < filemtime($this->arquivo)))
          {
           include($this->arquivo); exit;
          }
      
         /*  Ativa o buffer de saída / ob_gzhandler - faz a compressao do arquivo  */
         if($this->retorno != false)
         {
         ob_start("ob_gzhandler");
         }
     }
  
   }
  
  
  /* funcao que gera o arquivo com o seu conteudo */
  
  public function CriaCache($opcoes="")
  {
     //verifica se o metodo e um metodo post
     if($_SERVER['REQUEST_METHOD'] != "POST" || $this->retorno != false)
     {
         /* abre o arquivo para escrita */
         $fp = fopen($this->arquivo,"w");
         /* verifica se foi escolhida uma opcao, caso nao for e definido um valor padrao para a opcao */
         if($opcoes == "")
         {
           $opcoes = $this->opcoes;
         }
      
         /* verificando as opcoes escolhidas e fazendo o tratamento (retirando os espacos em branco) */
         switch($opcoes)
         {
           case "basico":
           default:
           $buffer = ob_get_contents();
           break;
         
           case "normal":
           $buffer = str_replace(array("\r\n", "\r", "\n", "\t"), '', ob_get_contents());
           break;
         
           case "agressivo":
           $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', ob_get_contents());
           break;
         }
    
      /* salva o conteudo do buffer no arquivo */
      fwrite($fp,$buffer); 
      /* fecha o arquivo e joga o conteudo para o browser */
      fclose($fp); ob_end_flush();
    }
      
 }
  
  
  

}

?>