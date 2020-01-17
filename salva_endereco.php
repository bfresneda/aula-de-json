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

file_put_contents('arquivoendereço.json',$str . "\n", FILE_APPEND) ;

// echo('<pre>');
// print_r($str);
// echo('</pre>');

};

?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form action="" method="get">
    Digite seu cep: <input type="text" name="cep" id="cep">
    Digite o numero: <input type="text" name="numero" id="numero">
    <input type="submit" value="Submit">
    </form>


<?php

echo('<pre>');
foreach($endereco as $end){
    echo "$end \n";}
echo('</pre>');

?>


</body>
</html>