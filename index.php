<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once 'class/Aluno.php';
        $a = new Aluno();

        var_dump(
            $a->NOTA1(6),
            $a->NOTA2(7),
            $a->NOTA3(8),
            $a->NOTA4(10)
        );
        



        var_dump($a->calcMedia());
    ?>
</body>
</html>