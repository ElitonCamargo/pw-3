<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conectando ao banco</title>
    <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
    </style>
</head>
<body>
    <form method="post">
        <input type="text" name="txtNome" placeholder="Nome">
        <input type="text" name="txtEmail" placeholder="E-mail">
        <input type="text" name="txtTelefone" placeholder="Telefone">
        <input type="text" name="txtEstado" placeholder="Estado">
        <input type="text" name="txtCidade" placeholder="Cidade">
        <input type="text" name="txtEndereços" placeholder="Endereços">
        <input type="submit" value="Cadastrar" name="btnCad">
    </form>
    <?php
        $cx = new PDO('mysql:host=localhost;port=3306;dbname=site','root','');

        $cxPreparada = $cx->prepare('SELECT * FROM cliente;');

        if($cxPreparada->execute()){
            if($cxPreparada->rowCount() > 0){
                $dados = $cxPreparada->fetchAll();
            }
            // var_dump($dados);
        }

        if(isset($_POST['btnCad'])){
            $varNome = $_POST['txtNome'];
            $varEmail = $_POST['txtEmail'];
            $varTelefone = $_POST['txtTelefone'];
            $varEstado = $_POST['txtEstado'];
            $varCidade = $_POST['txtCidade'];
            $varEndereços = $_POST['txtEndereços'];
            $cmdSql = "INSERT INTO cliente(nome, email, telefone, uf, cidade, endereco) VALUES ('$varNome','$varEmail','$varTelefone','$varEstado','$varCidade','$varEndereços')";
            
            $cxPreparada = $cx->prepare($cmdSql);
            if($cxPreparada->execute()){
                echo "<script>alert('Tudo OK')</script>";
            }
        }
    ?> 
    <table>
        
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Estado</th>
            <th>Cidade</th>
            <th>Endereços</th>
        </thead>
        <tbody>
            <?php
                if($dados){
                    foreach ($dados as $cliente) {
                        echo '<tr>
                                <td>'.$cliente['id'].'</td>
                                <td>'.$cliente['nome'].'</td>
                                <td>'.$cliente['email'].'</td>
                                <td>'.$cliente['telefone'].'</td>
                                <td>'.$cliente['uf'].'</td>
                                <td>'.$cliente['cidade'].'</td>
                                <td>'.$cliente['endereco'].'</td>
                            </tr>';
                    }
                }
            ?>
        </tbody>
    </table> 
</body>
</html>