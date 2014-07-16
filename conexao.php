<?php
try {
    $conexao = new \PDO("mysql:host=localhost:3307;dbname=code","root", "root");
} catch( \PDOException $e) {
    die("Erro código: " . $e->getCode(). ": " . $e->getMessage());
};