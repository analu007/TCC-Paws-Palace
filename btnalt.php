<?php

include("conexao.php");
session_start();

$email = mysqli_real_escape_string($conexao, $_SESSION['email']); 

$cpf= $_POST['cpf'];
$nm= $_POST['nomeconta'];
$end= $_POST['endereco'];
$tel= $_POST['telefone'];
$result = mysqli_query($conexao,"UPDATE cliente SET cpf_clt = '$cpf', nome_clt= '$nm', end_clt= '$end', tel_clt = '$tel' WHERE email_clt= '$email'");

 header("Location: perfil.php");
?>