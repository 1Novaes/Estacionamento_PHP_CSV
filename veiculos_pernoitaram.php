<?php
//Carregando os dados
function carregaDados($filename)
{
    $row = 1;
    if (($handle = fopen($filename, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            for ($c = 0; $c < count($data); $c++) {
                if ($row == 1) {
                    $col_header[] = $data[$c];
                } else {
                    $line[$col_header[$c]] = $data[$c];
                }
            }
            if (isset($line)) $dataset[] = $line;
            $row++;
        }
        fclose($handle);
    }
    return $dataset;
}
function veiculos_pernoitaram($veiculos, $mes)
{

    $t = [];
    for ($c = 0; $c < count($veiculos); $c++) {
        $data1 = new DateTime($veiculos[$c]['data']);
        $data2 = new DateTime($mes);
        $intervalo = $data1->diff($data2);

        if ($intervalo->format('%R%a days') >= 1) {
            $t[] = $veiculos[$c]['placa'];
        }
    }
    print_r($t);
}

$veiculos = carregaDados("teste.csv");
$qt = veiculos_pernoitaram($veiculos, '18-09-2021');
