<!DOCTYPE html>
<?php 
     include_once "conf/default.inc.php";
     require_once "conf/Conexao.php";
     $title = "Lista de Vendas";
     $id = isset($_GET['id']) ? $_GET['id'] : "1";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
</head>
<body>
<?php
   
    $sql = "SELECT * FROM vendas WHERE id = $id";
   
    $pdo = Conexao::getInstance(); 
    $consulta = $pdo->query($sql);
    while ($linha = $consulta->fetch(PDO::FETCH_BOTH)){
        echo "Código: {$linha['id']} - Nome: {$linha['nome']}- Janeiro: {$linha['janeiro']}</br></br>";
        $total = ($linha['janeiro']+$linha['fevereiro']+$linha['marco']+$linha['abril']+$linha['maio']+$linha['junho']+$linha['julho']+$linha['agosto']+$linha['setembro']+$linha['outubro']+$linha['novembro']+$linha['dezembro']);
        echo "Total de vendas do ano: R$ $total </br></br>";
        
        $comissaojan = ($linha['janeiro'] / 100) * 3;
        $comissaofev = ($linha['fevereiro'] / 100) * 3;
        $comissaomar = ($linha['marco'] / 100) * 3;
        $comissaoabr = ($linha['abril'] / 100) * 3;
        $comissaomai = ($linha['maio'] / 100) * 3;
        $comissaojun = ($linha['junho'] / 100) * 3;
        $comissaojul = ($linha['julho'] / 100) * 3;
        $comissaoago = ($linha['agosto'] / 100) * 3;
        $comissaoset = ($linha['setembro'] / 100) * 3;
        $comissaoout = ($linha['outubro'] / 100) * 3;
        $comissaonov = ($linha['novembro'] / 100) * 3;
        $comissaodez = ($linha['dezembro'] / 100) * 3;
       
        echo "Comissão janeiro: R$ $comissaojan</br>";
        echo "Comissão fevereiro: R$ $comissaofev</br>";
        echo "Comissão marco: R$ $comissaomar</br>";
        echo "Comissão abril: R$ $comissaoabr</br>";
        echo "Comissão maio: R$ $comissaomai</br>";
        echo "Comissão junho: R$ $comissaojun</br>";
        echo "Comissão julho: R$ $comissaojul</br>";
        echo "Comissão agosto: R$ $comissaoago</br>";
        echo "Comissão setembro: R$ $comissaoset</br>";
        echo "Comissão outubro: R$ $comissaoout</br>";
        echo "Comissão novembro: R$ $comissaonov</br>";
        echo "Comissão desembro: R$ $comissaodez</br>";

        $data = $linha['dataContratacao'];
        echo "$data</br>"; //Data de contratação

        date_default_timezone_set('America/Sao_Paulo');
    
    
        //echo "Tempo em anos na empresa: $tempo </br>";


    
        /*echo "-------------- NOTAS --------------</br>";
        echo "Nota 1: {$linha['nota1']}</br>";
        echo "Nota 2: {$linha['nota2']}</br>";
        echo "Nota 3: {$linha['nota3']}</br>";
        echo "Nota 4: {$linha['nota4']}</br>";
        echo "Nota 5: {$linha['nota5']}</br></br>";
        $maior = max($linha['nota1'],$linha['nota2'],$linha['nota3'],$linha['nota4'],$linha['nota5']);
        $menor = min($linha['nota1'],$linha['nota2'],$linha['nota3'],$linha['nota4'],$linha['nota5']);
        echo "-------- NOTAS DESCARTADAS --------</br>";
        echo "Maior: {$maior}</br>";
        echo "Menor: {$menor}</br></br>";
        echo "-------- RESULTADO FINAL -----------</br>";
        $soma = ($linha['nota1']+$linha['nota2']+$linha['nota3']+$linha['nota4']+$linha['nota5']-$maior-$menor);
        echo "Soma: ".number_format($soma, 2, '.', ',')."</br>";
        $media = ($linha['nota1']+$linha['nota2']+$linha['nota3']+$linha['nota4']+$linha['nota5']-$maior-$menor)/3;
        echo "Média: ".number_format($media, 2, '.', ',')."</br>";*/
    }
?>
</body>
</html>