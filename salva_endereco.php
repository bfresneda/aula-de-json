<?php
// capturando informacoes via GET


 if($_GET){
 $cep = $_GET['cep'];
 $numero = $_GET['numero'];


 //levantar as informacoes da localidade a partir do cep

$str = file_get_contents("http://viacep.com.br/ws/$cep/json");


// transformando a string json em um array associativo.

$endereco = json_decode($str,true);

//adicionando o numero ao array de endereço

$endereco ['numero'] = $numero;

// transformar o array associativo $endereco de volta para uma string

$str = json_encode($endereco);

//salvando string do json em um arquivo com o put contents

file_put_contents('arquivoendereço.json',$str);

echo('<pre>');
print_r($str);
echo('</pre>');

};






?>