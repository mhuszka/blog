<?php

$error = array();


if ($_SERVER["REQUEST_METHOD"] == "GET") {


    if (empty($_GET["titre"])) {

        $error['titre'] = true; //vide

    } else {

        $error['titre'] = false; //correctement rempli

    }


    if (empty($_GET["contenu"])) {

        $error['contenu'] = true; // vide

    } else {

        $error['contenu'] = false; //correctement rempli

    }


    if(empty($_GET['auteur'])){

        $error['auteur'] = true; //vide

    }else{

        $error['auteur'] = false; //correctement rempli
    }
    
    if(!in_array(true, $error)){
        mail('reginaphalange088@laposte.net', 'Mail venant du site', $_GET["message"], 'From: "'.$_GET["nom"].'"<'.$_GET["mail"].'>');
        
        $error['sendEmail'] = false;
        
    }else{
        $error['sendEmail'] = true;
    }
}

echo json_encode($error); 

?>    
