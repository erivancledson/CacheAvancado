<?php

//carregamento das paginas
$p = 'pagina';
//verificar se existe
if(isset($_GET['p']) && !empty($_GET['p']) && file_exists('paginas/'.$_GET['P'].'.php')){
    $p = $_GET['p'];
}

// se existe o cache
if(file_exists('caches/'.$p.'cache')){
    require 'caches/'.$p.'cache';
}else{
    ob_start();
require 'paginas/'.$p.'.php';
$html = ob_get_contents();
//tudo que for imprimido no ob vai ser guardado na memoria
ob_end_clean();

file_put_contents('caches/'.$p.'cache', $html);
echo $html;
}
?>