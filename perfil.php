<?php

session_start();
include("conexao.php");

$email = mysqli_real_escape_string($conexao, $_SESSION['email']); 
$query = mysqli_query($conexao, "SELECT * FROM cliente WHERE email_clt = '$email'");

$cliente = mysqli_fetch_array($query);


if (!$email){
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0>">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
<link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="icon" href="https://i.postimg.cc/wT3nfxgv/Logo.png" type="image/x-icon">

<head>

    <link rel="stylesheet" href="perfilCSS.css">
    <title> Perfil Paws Palace </title>

</head>

<!--barra de navegação-->
<header>
    <div class="logobox">
        <img src="https://i.postimg.cc/6pmnt94V/Logo.png" alt="logo" class="logo" onclick="window.open('index.php', '_self')">
    </div>

    <div class="acesso" id="acesso">
        <button class="btnclube" onclick="window.open('clube.html', '_self')"> <img src="https://i.postimg.cc/RCtv2NBj/asspaws.png" alt="btnclube" class="imgclube">
        </button>

        <button class="btnagendamento" onclick="window.open('agendamento.html', '_self')"> <img src="https://i.postimg.cc/fThMsDWk/banhotosa.png" alt="btnagendamento"
                class="imgagendamento"> </button>

        <button class="btnperfil" id="btnperfil" onclick="location.reload();"> <img
                src="https://i.postimg.cc/gjm6Nj1p/perfil.png" alt="perfil" class="imgperfil"> </button>
    </div>
</header>

<body>
    <div class="content">
        <form enctype="multipart/form-data" method="post" action="btnalt.php">
            <fieldset class="legendbox">

                <legend>
                    <div class="imgcontabox" id="imgcontabox">

                        <img src="https://i.postimg.cc/nhg2TK2t/btncachorros.png" class="imgconta"
                            alt="imagem do usuário" height="100px" width="100px">

                    </div>
                </legend>


                <input type="file" name="arq" accept="image/*" id="inputfile">
                <div class="btnbox"> <div id="btnaltimg" class="btns"> Alterar imagem</div> </div>


                <div class="box1">

                    <div class="inputbox">
                        <label for="nomeconta"> <b>Nome:</b> </label>
                        <input type="text" class="input" id="nomeconta" name="nomeconta" value="<?php echo $cliente['nome_clt']  ?>">
                    </div>

                </div>


                <div class="box1">

                    <div class="inputbox">
                        <label for="cpf"> <b>CPF:</b> </label>
                        <input type="text" class="input" id="cpf" name="cpf" maxlength="14" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.-]/g, '')" value="<?php echo $cliente['cpf_clt'] ?>">
                    </div>

                </div>

                <div class="box1">

                    <div class="inputbox">
                        <label for="endereco"> <b>Endereço:</b> </label>
                        <input type="text" class="input" id="endereco" name="endereco" value="<?php echo $cliente['end_clt'] ?>" placeholder="adicione seu endereço">
                    </div>

                </div>

                <div class="box1">

                    <div class="inputbox">
                        <label for="telefone"> <b>Telefone:</b> </label>
                        <input type="text" class="input" id="telefone" name="telefone" maxlength="13"
                        oninput="this.value = this.value.replace(/[^0-9. -]/g,'')" value="<?php echo $cliente['tel_clt'] ?>">
                    </div>

                </div>

                <div class="btnbox">
                <input type="submit" class="btns" id="altdados" value="alterar dados"></input>
                <button  class="btns" onclick="window.open('btnsair.php', '_self')" id="btnsair">sair</button>
                </div>

            </fieldset>
        </form>

    </div>

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

    <script src="perfilJS.js"></script>

</body>

</html>