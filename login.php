<?php
session_start();

include('conexao.php');

if(isset($_SESSION['usuario']) AND $_SESSION['usuario'] == 1)
{
    echo "Você já está Logado.<br >";
    echo "<a href='/area_restrita'>Área Restrita</a>";
}
else
{
    if(isset($_POST['login']) AND isset($_POST['senha']))
    {

        $sql = "SELECT * FROM usuario WHERE login=:login";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue("login",$_POST['login']);
        $stmt->execute();

        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        if($res)
        {
            if(password_verify($_POST['senha'], $res['senha']))
            {
                $_SESSION['usuario'] = 1;
                require_once('area_restrita.php');
            }
            else
            {
                echo "Usuário ou Senha Inválidos";
            }
        }
        else
        {
            echo "Usuário não Cadastrado";
        }
    }
    else
    {

    ?>
    <div class="col-lg-5">
        <h4>Autenticação</h4>
    <form role="form" method="post" name="form" id="form" action="">
      <div class="form-group">
        <label for="exampleInputEmail1">Login</label>
        <input type="text" class="form-control" id="login" name="login" placeholder="Insira o Login">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Insira a Senha">
      </div>
      <button type="submit" class="btn btn-default">Enviar</button>
    </form>
    </div>
<?php }

}?>

