<?php
    if(isset($_POST['submit']))
    {
        include_once('conexao.php');

//------imagem------
        $arq=$_FILES['arq'];
       
        if($arq['size'] > 5242880) 
        die("Arquivo muito grande!! Maximo de 5mb");

        $pasta="Arquivos/";
        $n_arq= $arq['name'];
        $aln_arq= uniqid();
        $ext= strtolower(pathinfo($n_arq,PATHINFO_EXTENSION));
        $tp= "pet";

        if($ext != "jpg" && $ext != "png")
        die("Tipo de arquivo invalido");

        $path= $pasta . $aln_arq . "." . $ext;
        $up_arq=move_uploaded_file($arq['tmp_name'], $path);

        if($up_arq){
            $result= mysqli_query($conexao, "INSERT INTO imagem (id_img, nm_img, pt_img, tp_img)
            VALUES('$aln_arq', '$n_arq', '$path', '$tp');") 
            or die("Falha na passagem de dados" . $my_sqli->error);
        } else {
            echo"Falha no upload"; 
        }
        
//------agendamento------
        $tosa= $_POST['tosa'];
        $acss= $_POST['acess'];
        $pagm= $_POST['fpag'];
        $data= $_POST['dataagd'];
        $time= $_POST['horaagd'];
        $obsat= $_POST['obsat'];
        $end=$_POST['endresp'];
        $obsres= $_POST['obsres'];
        $npet= $_POST['nomepet'];
        $raca= $_POST['racapet'];
        $ipet= $_POST['idadepet'];
        $prt= $_POST['prtpet'];
        $obsp= $_POST['obspet']; 
        $nres= $_POST['nomeresp'];
        $cpf= $_POST['cpfresp'];       
            
        $queryp= mysqli_query($conexao, "INSERT INTO agendamento(nome_pet, rc_pet, idade_pet, prt_pet, obs_pet,
         cpf_clt, nome_clt,svp_agd, acs_agd, data_agd, hora_agd, obs_agd, obsres_agd, end_agd, pagm_agd)
        VALUES('$npet', '$raca', '$ipet', '$prt', '$obsp', '$cpf', '$nres', '$tosa', '$acss', '$data', '$time', '$obsat', '$obsres', '$end', '$pagm');");
            

        header('Location: agendamento.html');
    }
?>