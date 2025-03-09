<?php
        include('conexao.php');

        session_start();
        $email= $_POST['l_email'];
        $senha= $_POST['l_senha'];

        $sql = "SELECT * FROM usuario WHERE email_usu = '$email' AND senha_usu = '$senha'";

        $query = $conexao->prepare($sql);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {

            $_SESSION['email'] = $email;
            header('Location: index.php');

           
        } else {
            unset($_SESSION['email']);
            header('Location: login.html');
        }

    mysqli_close($conexao);

    ?>