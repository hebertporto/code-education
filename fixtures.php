<?php
require_once('conexao.php');

/**
 * Tabela: Pagina
 * id: int
 * titulo: varchar
 * conteudo: text
 */

# Resetar a Tabela
$sql = "TRUNCATE TABLE pagina";
$stmt = $conexao->prepare($sql);
$stmt->execute();

# Criando HOME
$sql = "INSERT INTO pagina(titulo, conteudo) VALUES ('home', '<h1>Home</h1> Esse é o conteúdo bla bla bla bla')";
$stmt = $conexao->prepare($sql);
$stmt->execute();

# Criando EMPRESA
$sql = "INSERT INTO pagina(titulo, conteudo) VALUES ('empresa', '<h1>Empresa</h1>Esse é o conteúdo, bla bla bla bla')";
$stmt = $conexao->prepare($sql);
$stmt->execute();

# Criando PRODUTOS
$sql = "INSERT INTO pagina(titulo, conteudo) VALUES ('produtos', '<h1>Produtos</h1> Esse é o conteúdo, bla bla bla bla')";
$stmt = $conexao->prepare($sql);
$stmt->execute();

# Criando SERVIÇOS
$sql = "INSERT INTO pagina(titulo, conteudo) VALUES ('servicos', '<h1>Serviços</h1> Esse é o conteúdo, bla bla bla bla')";
$stmt = $conexao->prepare($sql);
$stmt->execute();
