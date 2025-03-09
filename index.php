<?php
    session_start();

    /*
    if((!isset($_SESSION['senha']) == true)){
        unset($_SESSION['email']);  
        unset($_SESSION['senha']);
        header('Location: login.html');
    }
        */
    
?>

<?php

include('conexao.php');

$query1 = mysqli_query($conexao, "SELECT * FROM produto_cachorro");
$query2 = mysqli_query($conexao, "SELECT*FROM produto_gato");
$query3 = mysqli_query($conexao, "SELECT*FROM produto_passaro");
$query4 = mysqli_query($conexao, "SELECT*FROM produto_peixereptil");


if (!$query1) {
    die('Query inválida:' . @mysqli_error($conexao));
}

?>


<!DOCTYPE html>
<html>

<head>


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link fontes e icones-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- link swiper-->


    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="https://i.postimg.cc/wT3nfxgv/Logo.png" type="image/x-icon">
    <title> Home Paws Palace </title>


</head>

<!--barra de navegação-->
<header>
    <div class="logobox">
        <img src="https://i.postimg.cc/6pmnt94V/Logo.png" alt="logo" class="logo" onclick="location.reload();">
    </div>

    <div class="pesquisabox">
    </div>

    <div class="acesso" id="acesso">
        <button class="btnclube" onclick="window.open('clube.html', '_self')"> <img
                src="https://i.postimg.cc/RCtv2NBj/asspaws.png" alt="btnclube" class="imgclube">
        </button>

        <button class="btnagendamento" onclick="window.open('agendamento.html', '_self')"> <img
                src="https://i.postimg.cc/fThMsDWk/banhotosa.png" alt="btnagendamento" class="imgagendamento"> </button>

        <button class="btnperfil" onclick="window.open('btn.php', '_self')"> <img
                src="https://i.postimg.cc/gjm6Nj1p/perfil.png" alt="perfil" class="imgperfil"> </button>
    </div>

</header>

<!--barra de navegação rápida-->
<div class="subheader">



    <div class="subitem" onclick="window.location.href='#r1'">
        <img src="https://i.postimg.cc/NFYKnT5k/cachorro.png" class="imgsubitem">
        <a class="a"> Cachorro </a>
    </div>


    <div class="subitem" onclick="window.location.href='#r2'">
        <img src="https://i.postimg.cc/J7cDkT26/gato.png" class="imgsubitem">
        <a class="a"> Gato </a>
    </div>

    <div class="subitem" onclick="window.location.href='#r3'">
        <img src="https://i.postimg.cc/C5NRp18T/passaro.png" class="imgsubitem">
        <a class="a"> Pássaro </a>
    </div>

    <div class="subitem" onclick="window.location.href='#r4'">
        <img src="https://i.postimg.cc/xT6XsXYL/peixe.png" class="imgsubitem">
        <a class="a"> Peixe </a>
    </div>

    <div class="subitem" onclick="window.location.href='#r4'">
        <img src="https://i.postimg.cc/15mgcGx9/reptil.png" class="imgsubitem">
        <a class="a"> Réptil </a>
    </div>


    <!--png do côco-->
    <div class="subitens2">

        <button class="clube" id="btnclube" onclick="btnclube()"> Clube Paws </button>
        |
        <button class="agendamento" id="btnagendamento" onclick="btnagendamento()"> Agendamento </button>

    </div>

</div>



<body>

    <!--meio da página-->
    <main>

        <img src="https://i.postimg.cc/kGKg75tX/prim-banner.png" alt="Banner Promocão" class="main-banner">

    </main>

    <!--conteúdo principal-->
    <div class="content" id="content">

        <!--Container ração cachorro-->
        <div class="location" id="r1"></div>
        <div class="titulo-racoes">Rações para cachorros</div>

        <?php

        echo "<div class='card-list'>";

        while ($produto1 = mysqli_fetch_array($query1)) {
            echo "<a href='produto.php?id=" . $produto1['cod_pdt'] . " 'style='text-decoration: none; color: inherit'>";
            echo "<div class='card-item'>";

            echo "<div class='racimgbox'>";
            echo "<img src='" . htmlspecialchars($produto1['img_pdt']) . "' alt='imagem' class='racimg'/>";
            echo "</div>";

            echo "<p class='racmarca'>" . $produto1['nome_pdt'] . "</p>";

            echo "<p class='racpreco'>" . "R$" . number_format($produto1['val_pdt'], 2, ',', '.') . "</p>";

            echo "</div>";
            echo "</a>";
        }
        echo "</div>";

        ?>

        <!--Container ração gatos-->
        <div class="location" id="r2"></div>
        <div class="titulo-racoes">Rações para gatos</div>

        <?php

        echo "<div class='card-list'>";

        while ($produto2 = mysqli_fetch_array($query2)) {
            echo "<a href='produto.php?id=" . $produto2['cod_pdt'] . " 'style='text-decoration: none; color: inherit'>";
            echo "<div class='card-item'>";

            echo "<div class='racimgbox'>";
            echo "<img src='" . htmlspecialchars($produto2['img_pdt']) . "' alt='imagem' class='racimg'/>";
            echo "</div>";

            echo "<p class='racmarca'>" . $produto2['nome_pdt'] . "</p>";

            echo "<p class='racpreco'>" . "R$" . number_format($produto2['val_pdt'], 2, ',', '.') . "</p>";

            echo "</div>";
            echo "</a>";
        }
        echo "</div>";

        ?>


        <!--conteúdo intermediário-->
        <div class="titulo-racoes" id="servicos">Serviços oferecidos</div>
        <div class="container2">

            <div class="box1">

                <img src="https://i.postimg.cc/RCtv2NBj/asspaws.png" alt="img clube" class="imgclube-banner">

                <div class="box-inside">

                    <b id="box-inside-b">Assinatura <br> <b id="b2"> Paws </b> </b>
                    <button class="btnbanner" onclick="window.open('clube.html','_self')"> <b id="btnbanner-b">Saiba <br> mais</b></button>
                </div>


            </div>


            <div class="box2">

                <img src="https://i.postimg.cc/fThMsDWk/banhotosa.png" alt="img agendamento"
                    class="imgagendamento-banner">

                <div class="box-inside">

                    <b id="box-inside-b">Banho & <br> <b id="b2"> tosa </b></b>
                    <button class="btnbanner" onclick="window.open('agendamento.html','_self')"> <b id="btnbanner-b">Agende <br> aqui</b></button>
                </div>

            </div>

        </div>



        <!--slider racao passaros-->
        <div class="location" id="r3"></div>
        <div class="titulo-racoes">Rações para pássaros</div>

        <?php

        echo "<div class='card-list'>";

        while ($produto3 = mysqli_fetch_array($query3)) {
            echo "<a href='produto.php?id=" . $produto3['cod_pdt'] . " 'style='text-decoration: none; color: inherit'>";
            echo "<div class='card-item'>";

            echo "<div class='racimgbox'>";
            echo "<img src='" . htmlspecialchars($produto3['img_pdt']) . "' alt='imagem' class='racimg'/>";
            echo "</div>";

            echo "<p class='racmarca'>" . $produto3['nome_pdt'] . "</p>";

            echo "<p class='racpreco'>" . "R$" . number_format($produto3['val_pdt'], 2, ',', '.') . "</p>";

            echo "</div>";
            echo "</a>";
        }
        echo "</div>";

        ?>


        <!--slider racao peixes e repteis-->
        <div class="location" id="r4"></div>
        <div class="titulo-racoes">Rações para peixes e répteis</div>

        <?php

        echo "<div class='card-list'>";

        while ($produto4 = mysqli_fetch_array($query4)) {
            echo "<a href='produto.php?id=" . $produto4['cod_pdt'] . " 'style='text-decoration: none; color: inherit'>";
            echo "<div class='card-item'>";

            echo "<div class='racimgbox'>";
            echo "<img src='" . htmlspecialchars($produto4['img_pdt']) . "' alt='imagem' class='racimg'/>";
            echo "</div>";

            echo "<p class='racmarca'>" . $produto4['nome_pdt'] . "</p>";

            echo "<p class='racpreco'>" . "R$" . number_format($produto4['val_pdt'], 2, ',', '.') . "</p>";

            echo "</div>";
            echo "</a>";
        }
        echo "</div>";

        ?>

    <!-- link swiper script-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- main script-->
    <script src="mainJS.js"></script>

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