<?php
    header('Content-type: application/json');

    $cxPdo = new PDO('mysql:host=localhost;port=3306;dbname=campeonato_futbol','root','');
    $cmdSql = "SELECT * FROM clube";
    $cxPrepare = $cxPdo->prepare($cmdSql);
    $dados = [];
    if($cxPrepare->execute()){
        if($cxPrepare->rowCount() > 0){
            $dados = $cxPrepare->fetchAll();
        }
    }

    echo json_encode($dados);