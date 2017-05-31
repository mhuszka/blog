<?php
$id = $_GET['id'];

$servername = "localhost";
$username = "bmelissa";
$password = "bmelissa@2017";

try {
    $conn = new PDO("mysql:host=$servername;dbname=bmelissa", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM blog WHERE id=$id");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->fetchAll();
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}


?>

<!DOCTYPE html>
<html lang="fr">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Urban Jungle Blog</title>

        <!-- Bootstrap Core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Theme CSS -->
        <link href="../css/clean-blog.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href="https://fonts.googleapis.com/css?family=Kumar+One|Kumar+One+Outline|Poppins" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        Menu <i class="fa fa-bars"></i>
                    </button>


                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="../index.php">Home</a>
                            </li>
                            <li>
                                <a href="../about.php">About</a>
                            </li>
                            <li>
                                <a href="../post/post.php">Articles</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Header -->

        <!-- Set your background image for this header on the line below. -->
        <header class="intro-header" style="background-image: url('../img/plants.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            <h1><?= $result[0]['titre']; ?></h1>
                            <span class="meta">Posted by <a href="#"><?= $result[0]['auteur']; ?></a> on August 24, 2014</span>
                            <hr class="small">
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                    <p><?= $result[0]['contenu']; ?></p>
                    <p><?= $result[0]['image']; ?></p>

                </div>
            </div>
        </div>
    </body>
</html>