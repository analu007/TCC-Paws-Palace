
<?php
    if(isset($_POST['submit']))
    {
        include_once('conexao.php');

        $nome= $_POST['nome'];
        $email= $_POST['email'];
        $senha= $_POST['senha'];
        $cpf= $_POST['cpf'];
        $tlf= $_POST['tel'];    
        
        $result= mysqli_query($conexao, "INSERT INTO cliente(email_clt, cpf_clt, nome_clt, tel_clt)
        VALUES('$email','$cpf', '$nome', '$tlf');");

$result= mysqli_query($conexao, "INSERT INTO usuario(email_usu, senha_usu)
VALUES('$email', '$senha');");

        header('Location: login.html');
    }
?>