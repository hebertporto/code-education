<?php
if(session_id() == '' || !isset($_SESSION)) {
    // Evita erro ao duplicar a session
    session_start();
}
include('conexao.php');

if(isset($_SESSION['usuario']) AND $_SESSION['usuario'] == 1)
{

    if(!isset($_POST['editor1']))
    {
        if(isset($_GET['p']))
        {
            $sql = 'SELECT * FROM pagina WHERE titulo=:titulo';
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue('titulo', $_GET['p']);
            $stmt->execute();

            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            if($res)
            {
                ?>
                <h4>Edição de Conteúdo</h4>
                <div class="col-lg-5">
                    <form method="post" action="">
                        <input type="hidden" name="titulo" id="titulo" value="<?php echo $res['titulo']; ?>"
                        <label for="editor1">Atualização de Conteúdo</label>
                        <textarea name="editor1" id="editor1" rows="10" cols="80">
                            <?php
                            echo $res['conteudo'];
                            ?>
                        </textarea>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            <?php
            }
            else
            {
                echo "<h3>Atuazalição de Conteúdo</h3>";
                echo "Página Solicitada não encontrada";
            }
        }
    }

    if(isset($_POST['editor1']))
    {
        $sql = 'UPDATE pagina set conteudo =:conteudo WHERE titulo =:titulo';
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue('conteudo', $_POST['editor1']);
        $stmt->bindValue('titulo', $_POST['titulo']);
        $stmt->execute();

        $sql = "SELECT * FROM pagina WHERE titulo=:titulo";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue('titulo', $_POST['titulo']);
        $stmt->execute();

        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        if($res)
        {
            echo"<h2>Esse é o Conteúdo Atualizado</h2>";
            echo $res['conteudo'];
            echo "<br><br><br>";
            echo "<a href='/area_restrita'>Área Restrita</a>";
        }
        else
        {
            echo "Error ao Exibir conteúdo após atualizar no banco de dados.";
        }

    }
}
else
{
    require_once('login.php');
}