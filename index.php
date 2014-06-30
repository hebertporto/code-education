<?php date_default_timezone_set('America/Sao_Paulo'); ?>
<!DOCTYPE HTML>
    <html lang="pt-br">
        <head>
            <meta charset="utf-8">
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="/images/favicon.ico" rel="icon" type="image/x-icon" />
            <title>PHP: FOUNDATION</title>
        </head>
    <body class="container">
        <header>
            <?php require_once("menu_principal.php"); ?>
        </header>
        <section id="main-content">
            <?php
            $url = array('contato','empresa','home','produtos','servicos');
             if(isset($_GET['p']))
             {
                 if(in_array($_GET['p'],$url))
                    require_once($_GET['p'] . ".php");
                 else
                 {
                     echo "<h1 class='text-center'> Error. Url não encontrada. </h1>";
                 }
             }
            else
                require_once('home.php');
            ?>
        </section>
        <div class="clearfix"></div>
        <footer  class="text-center navbar navbar-fixed-bottom">
            <p>
                Todos os Direitos Reservados <?php echo date('Y'); ?>
            </p>
        </footer>
        <script src="js/1.11.1-jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>

</html>

