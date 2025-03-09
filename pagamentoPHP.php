<?php
include_once('conexao.php');

$pdt= $_POST['id'];
$query= mysqli_query($conexao, "SELECT * FROM produto WHERE cod_pdt= $pdt");

if($query->num_rows > 0){
    while($row= $query->fetch_assoc()){
        echo $row['nome_pdt'];
        echo $row['val_pdt'];
        echo $row['dcr_pdt'];
        echo $row['link_pdt'];
    }
} else{
    echo "Sem produtos";
}
?>