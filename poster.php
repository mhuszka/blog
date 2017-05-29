<?php

$error = array();


    if (empty($_POST["titre"])) {

        $error['titre'] = false; 

    } else {

        $error['titre'] = true;

    }


    if (empty($_POST["contenu"])) {

        $error['contenu'] = false;

    } else {

        $error['contenu'] = true;

    }


    if(empty($_POST['auteur'])){

        $error['auteur'] = false;

    }else{

        $error['auteur'] = true; 
    }

    if ($error['titre'] == true && $error['contenu'] == true && $error['auteur'] == true){
        $servername = "localhost";
        $username = "bmelissa";
        $password = "bmelissa@2017";
        $dbname = "bmelissa";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare sql and bind parameters
            $stmt = $conn->prepare("INSERT INTO blog (titre, contenu, auteur)
            VALUES (:titre, :contenu, :auteur)");
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':contenu', $contenu);
            $stmt->bindParam(':auteur', $auteur);

            // insert a row
            $titre = $_POST["titre"];
            $contenu = $_POST["contenu"];
            $auteur = $_POST["auteur"];

            $stmt->execute();

            $error['bdd'] =  "New records created successfully";
        }
        catch(PDOException $e)
        {
            $error['bdd'] = "Error: " . $e->getMessage();
        }
        $conn = null;

    }
echo 'coucou';

?>

    
