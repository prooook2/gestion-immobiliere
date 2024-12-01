<?php
    require_once 'CRUDAppartement.php';   
    $crud=new CRUDAppartement();
    $ref=$_GET['ref'];
    $res=$crud->supprimerApp($ref);
    if($res){
        header('location:listeApp.php');
    }
    else{
        echo "erreur";
    }

?>