<?php

session_start();
include('conexao.php');

if (isset($_GET['id'])) {

    $codpdt = intval($_GET['id']);
} else {

    die("ID do produto não especificado.");
}


$query1 = mysqli_query($conexao, "SELECT*FROM produto_cachorro WHERE cod_pdt = $codpdt");
$query2 = mysqli_query($conexao, "SELECT*FROM produto_gato WHERE cod_pdt = $codpdt");
$query3 = mysqli_query($conexao, "SELECT*FROM produto_passaro WHERE cod_pdt = $codpdt");
$query4 = mysqli_query($conexao, "SELECT*FROM produto_peixereptil WHERE cod_pdt = $codpdt");

$produto1 = mysqli_fetch_array($query1);
$produto2 = mysqli_fetch_array($query2);
$produto3 = mysqli_fetch_array($query3);
$produto4 = mysqli_fetch_array($query4);

$email = mysqli_real_escape_string($conexao, $_SESSION['email']); 
$query = mysqli_query($conexao, "SELECT * FROM cliente WHERE email_clt = '$email'");

$cliente = mysqli_fetch_array($query);

?>



<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento - Paws Palace</title>
    <link rel="stylesheet" href="pagamentoCSS.css">
</head>

<!--barra de navegação-->
<header>
    <div class="logobox">
        <img src="https://i.postimg.cc/6pmnt94V/Logo.png" alt="logo" class="logo"
            onclick="window.open('index.php', '_self')">
    </div>


    <div class="acesso" id="acesso">
        <button class="btnclube" onclick="window.open('clube.html', '_self')"> <img src="https://i.postimg.cc/RCtv2NBj/asspaws.png" alt="btnclube" class="imgclube">
        </button>

        <button class="btnagendamento" onclick="window.open('agendamento.html', '_self')"> <img src="https://i.postimg.cc/fThMsDWk/banhotosa.png" alt="btnagendamento"
                class="imgagendamento"> </button>

        <button class="btnperfil" id="btnperfil" onclick="window.open('btn.php', '_self')"> <img
                src="https://i.postimg.cc/gjm6Nj1p/perfil.png" alt="perfil" class="imgperfil"> </button>
    </div>
</header>

<body>

    <body>

        <main>
            <form action="" method="POST" id="box">
                <fieldset>
                    <legend>Pagamento</legend>

                    <div class="box1">

                        <div class="inputbox">
                            <label for="valor">Valor da compra</label>
                            <div id="valorpdt" class="input">
                                <?php
                                echo "R$". number_format($produto1['val_pdt'] ?? $produto2['val_pdt'] ?? $produto3['val_pdt'] ?? $produto4['val_pdt'], 2, ',', '.');

                                ?>
                            </div>
                        </div>

                        <br><br>

                        <div class="inputbox">
                            <label for="nomepdt"> Produto </label>
                            <div type="text" class="input" id="nomepdt">
                                <?php

                                echo ($produto1['nome_pdt'] ?? $produto2['nome_pdt'] ?? $produto3['nome_pdt'] ?? $produto4['nome_pdt'])
                                ?>
                            </div>
                        </div>

                        <br><br>

                        <div class="inputbox">
                            <label for="cartao">Bandeira do Cartão</label>
                            <select id="cartao" name="cartao" class="input" required>
                                <option value="" disabled selected>Selecione</option>
                                <option value="visa">Visa</option>
                                <option value="mastercard">Mastercard</option>
                                <option value="elo">Elo</option>
                                <option value="amex">American Express</option>
                            </select>
                        </div>

                    </div>

                    <div class="box2">

                        <div class="inputbox">
                            <label for="telefone">Número de telefone</label>
                            <input type="text" id="telefone" name="telefone" class="input"  maxlength="13"
                                placeholder="(99) 99999-9999" oninput="this.value = this.value.replace(/[^0-9. -]/g,'')" value="<?php echo $cliente['tel_clt'] ?>">
                        </div>

                        

                        <br><br>

                        <div class="inputbox">
                            <label for="cpf">CPF do Comprador</label>
                            <input type="text" id="cpf" name="cpf" class="input" placeholder="123.456.789-01" maxlength="14" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.-]/g, '')" value="<?php echo $cliente['cpf_clt'] ?>">
                        </div>

                        <br><br>

                        <div class="btnsbox">
                            <a href="index.php" class="btncntcmp"> Voltar </a>
                            <button class="btncomprar" onclick="window.open('index.php', '_self')">Comprar</button>
                            
                        </div>
                    </div>

                </fieldset>
            </form>


        </main>

        <!--rodapé-->
    <footer>

        <div class="sobre">

            <b class="titulo" onclick="sobre()" id="sobre"> Sobre nós </b>
            Quem somos?
        </div>

        <div class="contato">

            <p><a href="https://etecvilaformosa.cps.sp.gov.br/" target="_blank" id="evf">ETEC de Vila Formosa</a>
            </p>

            <br>

            <div class="contatobox">
                <img src="img/instaicon.png" class="iconimg" alt="instagram logo">
                <p><a href="https://www.instagram.com/paws.palace_?igsh=c3JwNmYzaGNuOWVu" id="instagram" target="_blank"
                        rel="noopener noreferrer">@paws.palace_</a></p>
            </div>

            <br>

            <div class="contatobox">
                <img src="img/emailicon.png" class="iconimg" alt="email logo">
                <p><a id="email-link"
                        href="https://mail.google.com/mail/?view=cm&fs=1&to=tccpawspalace@gmail.com&su=Ajuda%20Paws%20Palace&body="
                        target="_blank">tccpawspalace@gmail.com</a></p>
            </div>

        </div>


    </footer>

    <div class="subfooter" id="subfooter">

        <div class="boxsobre">
            No Paws Palace, nosso objetivo é oferecer uma experiência prática e personalizada para você e seu pet.
            Criamos uma plataforma que combina conveniência e eficiência, permitindo agendamentos online, acesso a
            produtos de
            alta qualidade e gestão simplificada de serviços. Inspirados por nossa paixão pelos animais e comprometidos
            com a
            excelência, buscamos ser mais do que um pet shop, mas um parceiro confiável na jornada de cuidados com seu
            companheiro. Priorizamos o bem-estar dos pets e a satisfação dos tutores, com uma equipe dedicada e soluções
            inovadoras para tornar seu dia a dia mais fácil e especial.

            <br><br>

            Precisa de ajuda? Contate-nos <a id="email-link"
                href="https://mail.google.com/mail/?view=cm&fs=1&to=tccpawspalace@gmail.com&su=Ajuda%20Paws%20Palace&body="
                target="_blank">tccpawspalace@gmail.com</a>
        </div>

        <div class="locationsobre" id="locationsobre"></div>

    </div>

    <script src="pagamentoJS.js"></script>

    </body>

</html>