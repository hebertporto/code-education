<?php
session_start();

include('conexao.php');

if(isset($_SESSION['usuario']) AND $_SESSION['usuario'] == 1)
{
    $sql = "SELECT * FROM pagina";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h3>Lista de Páginas Cadastras no Seu Site:</h3>";
    echo "<ul>";
    foreach($res as $r)
    {
        echo "<li>Página: ".$r['titulo']."- <a href='/editor?p=". $r['titulo']. "'>Editar</a></li>";
    }
    echo "</ul>";

}
else
{
    require_once('login.php');
}