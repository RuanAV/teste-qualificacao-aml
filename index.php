<?php

function getDataCsv() {
    
    if (($handle = fopen("202110_CPGF.csv", "r")) !== FALSE) {
        $dados = array();
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            array_push($dados, $data);
        }
        fclose($handle);
    }

    return $dados;
}

// Questão K
function getTotalMovimentacoes() {
    $data = getDataCsv();
    
    $num = count($data);
    $totalMovimentacoes = 0;
    for ($c=0; $c < $num; $c++) {
        $temp = str_replace(",",".", $data[$c][14]);
        $totalMovimentacoes += floatval($temp);
    }

    $totalMovimentacoes = number_format($totalMovimentacoes, 2, ',', '.');
    echo "Total das movimentações:<strong> R$ $totalMovimentacoes</strong>";
    echo "<br>";
}

// Questão L
function getTotalMovimentacoesSigilosas() {
    $data = getDataCsv();
    
    $num = count($data);
    $totalMovSigiloso = 0;
    for ($c=0; $c < $num; $c++) {
        $temp = str_replace(",",".", $data[$c][14]);
        
        if ($data[$c][10] == "-11" && $data[$c][9] == "Sigiloso") {
            $totalMovSigiloso += floatval($temp);
        }
        
    }

    $totalMovSigiloso = number_format($totalMovSigiloso, 2, ',', '.');
    echo "Total das movimentações sigilosas: <strong>R$ $totalMovSigiloso</strong>";
    echo "<br>";
}

// Questão M
function getOrgaoMaisMovimentos() {
    $data = getDataCsv();

    $ArrayCdOrgaos = null;
    $cdOrgaoMaiorRegistro = null;
    $qtdRegistros = 0;
    $num = count($data);
    $orgaos = array();
    $totalMovSigilosoOrgao = 0;
    $nmOrgao = null;

    for ($c=0; $c < $num; $c++) {
        $temp = str_replace(",",".", $data[$c][14]);
        
        if ($data[$c][10] == "-11" && $data[$c][9] == "Sigiloso") {
            array_push($orgaos, $data[$c][2]);
        }
  
    }

    $ArrayCdOrgaos = array_count_values($orgaos);
    
    foreach ($ArrayCdOrgaos as $chave => $quantidade) {
        if ($quantidade > $qtdRegistros) {
            $qtdRegistros = $quantidade;
            $cdOrgaoMaiorRegistro = $chave;
        }
    }

    for ($c=0; $c < $num; $c++) {
        $temp = str_replace(",",".", $data[$c][14]);
        
        if (($data[$c][10] == "-11" && $data[$c][9] == "Sigiloso") && intval($data[$c][2]) == $cdOrgaoMaiorRegistro) {
            $nmOrgao = utf8_encode($data[$c][3]);
            $totalMovSigilosoOrgao += floatval($temp);
        }
  
    }

    $totalMovSigilosoOrgao = number_format($totalMovSigilosoOrgao, 2, ',', '.');
    echo "O órgão com mais movimentações foi o <strong>$nmOrgao</strong>, e ele movimentou <strong>R$ $totalMovSigilosoOrgao</strong>";
    echo "<br>";
}

// Questão N
function getPortadorSaquesOrgao() {
    $data = getDataCsv();

    $num = count($data);

    $totalSaques = 0;
    $arrayPortador = array();
    $qtdRegistrosCpf = null;
    $qtdRegistros = 0;
    $nmPortador = null;
    $cpfPortador = null;
    $nmOrgao = null;

    for ($c=0; $c < $num; $c++) {
        if ($data[$c][12] == "SAQUE CASH/ATM BB" || $data[$c][12] ==  "SAQUE - INT$ - APRES") {
            array_push($arrayPortador, $data[$c][8]);
        }        
    }

    $qtdRegistrosCpf = array_count_values($arrayPortador);
    
    foreach ($qtdRegistrosCpf as $chave => $quantidade) {
        if ($quantidade > $qtdRegistros && $chave) {
            $qtdRegistros = $quantidade;
            $cpfPortador = $chave;
        }
    }
    
    for ($c=0; $c < $num; $c++) {
        $temp = str_replace(",",".", $data[$c][14]);
        
        if ($data[$c][8] == $cpfPortador ) {
            $nmOrgao = utf8_encode($data[$c][3]);
            $nmPortador = utf8_encode($data[$c][9]);
            $totalSaques += floatval($temp);
        }
  
    }
    
    $totalSaques = number_format($totalSaques, 2, ',', '.');
    echo "O portador que mais realizou saques foi o <strong>R$ $nmPortador</strong>, sendo o seu órgão o <strong>R$ $nmOrgao</strong> e a quantia sacada no período foi de <strong>R$ $totalSaques</strong>";
    echo "<br>";
}

// Questão O
function getPortadorComMaisCompras() {
    $data = getDataCsv();

    $num = count($data);

    $arrayDsCompras = array("COMPRA A/V - R$ - APRES", "COMPRA A/V - INT$ - APRES", "COMP A/V-SOL DISP C/CLI-R$ ANT VENC");

    $arrayFavorecido = array();
    $qtdRegistrosCpfCnpj = null;
    $qtdRegistros = 0;
    $nmFavorecido = null;
    $cpfCnpjPortador = null;

    for ($c=0; $c < $num; $c++) {
        if (in_array($data[$c][12], $arrayDsCompras)) {
            array_push($arrayFavorecido, $data[$c][10]);
        }        
    }

    $qtdRegistrosCpfCnpj = array_count_values($arrayFavorecido);
    
    foreach ($qtdRegistrosCpfCnpj as $chave => $quantidade) {
        if ($quantidade > $qtdRegistros && (($chave != -1 && $chave != -2) && $chave != -11)) {
            $qtdRegistros = $quantidade;
            $cpfCnpjPortador = $chave;
        }
    }
    
    for ($c=0; $c < $num; $c++) {
        
        if ($data[$c][10] == $cpfCnpjPortador ) {
            $nmFavorecido = utf8_encode($data[$c][11]);
        }
  
    }

    echo "O favorecido que mais recebeu compras realizadas foi o <strong>$nmFavorecido</strong>";
    echo "<br>";
}

getTotalMovimentacoes();
getTotalMovimentacoesSigilosas();
getOrgaoMaisMovimentos();
getPortadorSaquesOrgao();
getPortadorComMaisCompras()

?>