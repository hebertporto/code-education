<?php
date_default_timezone_set('America/Sao_Paulo');
require_once("conexao.php");

$rota = parse_url("http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
$url_final = substr($rota["path"], 1);

if($url_final =='') # Traz a página Home ao acessar pela primeira vez.
    $url_final = 'home';

$urls = array('empresa','home','produtos','servicos','contato', 'pesquisar', 'editor', 'login', 'area_restrita');
$urls_sistema = array('contato', 'pesquisar', 'editor', 'login', 'area_restrita');

$sql = 'SELECT * FROM pagina';
$stmt = $conexao->prepare($sql);
$stmt->execute();

$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

$r = function ($url) use ($urls, $res, $urls_sistema)
        {
            if(in_array($url ,$urls))
            {
                if(in_array($url, $urls_sistema))
                {
                    require_once($url .'.php');
                }
                else
                {
                    foreach($res as $r)
                    {
                     if($r['titulo'] === $url)
                         echo $r['conteudo'];
                    }
                }
            }
            else
            {
                header('HTTP/1.0 404 Not Found');
                echo "<h1>404 Not Found</h1>";
                echo "Sorry. A página solicitada não foi encontrada.";
                exit();
            }
        }
?>
<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="/images/favicon.ico" rel="icon" type="image/x-icon" />
        <script src="vendor/ckeditor/ckeditor.js"></script>
        <title>PHP: FOUNDATION</title>
    </head>
    <body class="container">
        <header>
            <?php require_once("menu_principal.php"); ?>
        </header>
        <section id="main-content">
            <?php
                $r($url_final);
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
        <script>
            CKEDITOR.replace( 'editor1' ); // Replace the <textarea id="editor1"> with a CKEditor // instance, using default configuration.
        </script>
    </body>
</html>

