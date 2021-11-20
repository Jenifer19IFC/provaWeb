<!DOCTYPE html>
<?php 
     include_once "conf/default.inc.php";
     require_once "conf/Conexao.php";
     $title = "Lista de Vendas";
     $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "2";
     $procurar = isset($_POST['procurar']) ? $_POST['procurar'] : "";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
</head>
<body>

<form method="post">
    <input type="radio" name="tipo" id="tipo" value="1" <?php if ($tipo == 1) { echo "checked"; }?>>Nome<br>  
    <input type="radio" name="tipo" id="tipo" value="2" <?php if ($tipo == 2) { echo "checked"; }?>>Fixo<br>
    <input type="text" name="procurar" id="procurar" value="<?php echo $procurar; ?>">
    <input type="submit" value="Consultar">
</form>
<br>
<?php
    $sql = "";
    if ($tipo == 1){
        $sql = "SELECT * FROM vendas WHERE nome LIKE '$procurar%' ORDER BY nome";
    }else{    
        $sql = "SELECT * FROM vendas WHERE fixo <= '$procurar%' ORDER BY fixo";
    }
    $pdo = Conexao::getInstance(); 
    $consulta = $pdo->query($sql);
    while ($linha = $consulta->fetch(PDO::FETCH_BOTH)){
        echo "Id: {$linha['id']} - Nome: {$linha['nome']} - Janeiro: {$linha['janeiro']} - Fevereiro: {$linha['fevereiro']} - Março: {$linha['marco']}- Abril: {$linha['abril']} - Maio: {$linha['maio']} - Junho: {$linha['junho']}  - Julho: {$linha['julho']} - Agosto: {$linha['agosto']} - Setembro: {$linha['setembro']} - Outubro: {$linha['outubro']} - Novembro: {$linha['novembro']} - Desembro: {$linha['dezembro']} - Fixo: {$linha['fixo']} - Data Contratação: {$linha['dataContratacao']}<br/>";
    
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

    }
?>
</body>
</html>