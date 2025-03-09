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

?>


<!DOCTYPE html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0>">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="icon" href="https://i.postimg.cc/wT3nfxgv/Logo.png" type="image/x-icon">

<head>

    <link rel="stylesheet" href="produtoCSS.css">
    <title> Produto Paws Palace </title>

</head>

<!--header - logo-->
<header>
    <div class="logobox">
        <img src="https://i.postimg.cc/6pmnt94V/Logo.png" alt="logo" class="logo" onclick="window.open('index.php', '_self')">
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

    <!--conteúdo principal - box do produto-->
    <div class="contentbox">
        <div class="content">
            <div class="content-inside">


                <!--imagem do produto-->
                <div class="box1">
                    <div class="produtoimg">

                        <?php

                        echo "<img alt='produto' id='imgpdt' src='" . ($produto1['img_pdt'] ?? $produto2['img_pdt'] ?? $produto3['img_pdt'] ?? $produto4['img_pdt']) . "'>";

                        ?>

                    </div>
                </div>

                <!--informações do produto-->
                <div class="box2" id="box2">
                    <div class="nomeproduto" id="nomepdt">
                        <?php

                        echo "<b>" . ($produto1['nome_pdt'] ?? $produto2['nome_pdt'] ?? $produto3['nome_pdt'] ?? $produto4['nome_pdt']) . "</b>";

                        ?>
                    </div>

                    <div class="descproduto" id="descpdt">
                        <?php
                        echo ($produto1['dcr_pdt'] ?? $produto2['dcr_pdt'] ?? $produto3['dcr_pdt'] ?? $produto4['dcr_pdt']);
                        echo "<br>";
                        echo "<br>";
                        echo number_format($produto1['peso_pdt'] ?? $produto2['peso_pdt'] ?? $produto3['peso_pdt'] ?? $produto4['peso_pdt'], 2, ',', '.') . " Kg";
                        ?>
                    </div>

                    <div class="valorbox">
                        <div class="valorproduto" id="valorpdt">

                            <?php

                            echo "<b>" . "R$" . number_format($produto1['val_pdt'] ?? $produto2['val_pdt'] ?? $produto3['val_pdt'] ?? $produto4['val_pdt'], 2, ',', '.') . "</b>";

                            ?>

                        </div>

                        <button class="btncompra" id="btncomprar"> 

                        <?php
                        if (isset($_SESSION["email"])) {
                            echo "<a href='pagamento.php?id=" . ($produto1['cod_pdt'] ?? $produto2['cod_pdt'] ?? $produto3['cod_pdt'] ?? $produto4['cod_pdt'] ). " 'style='text-decoration: none; color: inherit'>" . "<b>Comprar</b>" . "</a>";
                           
                        } else {
                            header("Location: login.html");
                            
                        }

                            ?>
                        </button>
                    </div>
                </div>

            </div>

        </div>

        

    </div>

</body>

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

</html>

<script>
    function sobre() {
        var container = document.querySelector(".subfooter");

        container.style.display = 'flex';
        document.getElementById("locationsobre").scrollIntoView(true);
    };
</script>