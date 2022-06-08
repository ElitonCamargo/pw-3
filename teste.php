<?php
//header('Content-type: application/json');
// INSERT INTO extracao(`FK_Metal_Simbolo`,`FK_Empresa_Id`,`Data`,`QuantEmTonelada`) VALUES('AG',1,'2010-02-02',3);
$empresas = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
$metais = [
    'AG'=>4800, 
    'AL'=>6, 
    'AS'=>50, 
    'AU'=>285000, 
    'B' =>1.2, 
    'BA'=>100, 
    'BI'=>3200, 
    'C' =>2, 
    'CD'=>170, 
    'CE'=>219, 
    'CO'=>74, 
    'CR'=>980, 
    'CU'=>35, 
    'FE'=>7, 
    'GA'=>2500, 
    'GE'=>2300, 
    'HF'=>500, 
    'HG'=>1300, 
    'IN'=>7000, 
    'IR'=>180000, 
    'LA'=>2400, 
    'MG'=>300, 
    'MN'=>90, 
    'MO'=>33, 
    'NB'=>150, 
    'ND'=>480, 
    'NI'=>98, 
    'OS'=>7500, 
    'P' =>25,  
    'PB'=>22, 
    'PD'=>319550, 
    'PR'=>520, 
    'PT'=>223360, 
    'RE'=>223360, 
    'RH'=>15200000, 
    'RU'=>1720000, 
    'SB'=>289, 
    'SE'=>78, 
    'SI'=>150, 
    'SN'=>250, 
    'TA'=>77, 
    'TE'=>88, 
    'TH'=>380, 
    'TI'=>2000, 
    'TL'=>30000, 
    'U' =>270,  
    'V' =>127,  
    'W' =>99000,  
    'ZN'=>99, 
    'ZR'=>900
];

$datas = [];
$data = "2018-01-01";
$x = 0;
while($data != "2022-06-03"){
    $datas[] = $data;
    $data = date('Y-m-d', strtotime("+1 days",strtotime($data)));
    $x+=1;
    if($x==5){
        $x=0;
        $data = date('Y-m-d', strtotime("+2 days",strtotime($data)));
    }                
}



// --- Gerando registros de extração ----
// foreach ($empresas as $empresa) {
//     foreach ($metais as $metal) {
//         echo 'INSERT INTO extracao(`FK_Metal_Simbolo`,`FK_Empresa_Id`,`Data`,`QuantEmTonelada`) VALUES';
//             foreach($datas as $d){
//                 $quant = random_int(0, 100);
//                 echo "('$metal',$empresa,'$d',$quant),";
//             }        
//         echo "; <br> -- ********************************************************** <br>"; 
//     }
// }

function gerarValor($valor){
    $inicio = (int) $valor * 0.9;
    $termino = (int) $valor * 1.1;
    return random_int($inicio,$termino);
}



  
foreach($metais  as $metal => $valorMetal){
    $inicio = $valorMetal;
    $termino = gerarValor($inicio);
    $dif = ($inicio < $termino)? $termino - $inicio: $inicio - $termino;    
    $dif/=10;
    $contador=0;
    echo "<br>-- $metal ************************************************* <br>";
    echo 'INSERT INTO `cotacao`(`FK_Metal_Simbolo`, `Data`, `ValorKg`) VALUES ';
    foreach ($datas as  $data) {
        $contador+=1;             
        ($inicio < $termino)? $inicio += $dif:$inicio -= $dif;
        echo "('$metal','$data','$inicio'),";
        if($contador == 10){
            $inicio = $termino;
            $termino = gerarValor($inicio);
            $dif = ($inicio < $termino)? $termino - $inicio: $inicio - $termino;
            $dif/=10;
            $contador = 0;
        }
        
    }
    echo ";";
}
