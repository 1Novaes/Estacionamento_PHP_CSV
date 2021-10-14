<?php
//Feita
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
//Calculando a Quantidade de Veículos.
function quantidade_veiculos($veiculos, $data, $hora)
{
    $t = [];
    for ($c = 0; $c < count($veiculos); $c++) {
        if ($veiculos[$c]['data'] == $data && $veiculos[$c]['hora'] == $hora) {
            $t[] = $veiculos[$c]['placa'];
        }
    }
    print_r(count($t));
}

$veiculos = carregaDados("teste.csv");
$qt = quantidade_veiculos($veiculos, '17-09-2021', '19:00');
