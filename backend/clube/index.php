<?php
    header('Content-type: application/json');

    $dadosEnviados = file_get_contents('php://input');
    $dadosEnviados = json_decode($dadosEnviados, true);

    $cxPdo = new PDO('mysql:host=localhost;port=3306;dbname=campeonato_futbol','root','');
    
    $cmdSql = "SELECT * FROM clube";

    if(isset($dadosEnviados['busca'])){
        $busca = $dadosEnviados['busca'];
        $cmdSql = "SELECT * FROM clube WHERE clube.nome LIKE '%$busca%'";
    }
       
    $cxPrepare = $cxPdo->prepare($cmdSql);
    $dados = [
        'result'=>false,
        'cmdExec'=>$dadosEnviados,
        'dados' => []
    ];

    if($cxPrepare->execute()){
        if($cxPrepare->rowCount() > 0){
            $dados['result'] = true;
            $dados['dados'] = $cxPrepare->fetchAll();
        }
    }

    echo json_encode($dados);