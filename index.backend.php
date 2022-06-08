<?php
header('Content-type: application/json');

$dadosEnviados = file_get_contents('php://input');

$dadosEnviados = json_decode($dadosEnviados, true);

$n1 = $dadosEnviados['n1'];
$n2 = $dadosEnviados['n2'];
$op = $dadosEnviados['op'];

$resposta;
switch($op){
    case '+':
        $dadosEnviados['result'] = ($n1 + $n2);       
        break;
    case '-':
        $dadosEnviados['result'] = ($n1 - $n2);
        break;
    case '*':
        $dadosEnviados['result'] = ($n1 * $n2);
        break;
    default:
        $dadosEnviados['result'] = ($n1 / $n2);
        break;
}
echo json_encode($dadosEnviados);