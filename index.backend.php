<?php
header('Content-type: application/json');
$dadosEnviados = file_get_contents('php://input');
$dadosEnviados = json_decode($dadosEnviados, true);

if($dadosEnviados['op'] == '+'){
    $dadosEnviados['result'] = ($dadosEnviados['n1'] + $dadosEnviados['n2']);
}
elseif($dadosEnviados['op'] == '-'){
    $dadosEnviados['result'] = ($dadosEnviados['n1'] - $dadosEnviados['n2']);
}
elseif($dadosEnviados['op'] == '*'){
    $dadosEnviados['result'] = ($dadosEnviados['n1'] * $dadosEnviados['n2']);
}
else{
    $dadosEnviados['result'] = ($dadosEnviados['n1'] / $dadosEnviados['n2']);
}

echo json_encode($dadosEnviados);