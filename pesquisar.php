<?php
include('conexao.php');

$pesquisa = addslashes(trim($_POST['pesquisa']));

try
{
    $sql = "SELECT * FROM pagina WHERE conteudo LIKE :pesquisa";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(":pesquisa","%{$pesquisa}%");
    $stmt->execute();

    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if($res)
    {
        foreach($res as $r)
        {
            echo $r['conteudo'] . "<h5><a href=" . $r['titulo'].">Veja mais</a></h5><br />";
        }
    }
    else
    {
        echo "Nenhum Resultado foi Encontrado.";
    }

} catch (\PDOException $e) {
    echo "Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}";
}


