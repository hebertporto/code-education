<h3>Formulário de Contato</h3>
<?php if(!isset($_GET['inputNome'])) { ?>
<div class="col-lg-5">
    <form  method="get" action="contato">

        <div class="form-group">
            <label for="inputNome">Nome:</label>
            <input type="text" class="form-control" id="inputNome" name="inputNome" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="inputEmail">E-mail:</label>
            <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="E-mail">
        </div>
        <div class="form-group">
            <label for="inputAssunto">Assunto:</label>
            <input type="text" class="form-control" id="inputAssunto" name="inputAssunto" placeholder="Assunto">
        </div>
        <div class="form-group">
            <label for="inputMensagem">Mensagem:</label>
            <textarea rows="4" cols="10" class="form-control" id="inputMensagem" name="inputMensagem" placeholder="Mensagem"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
<?php } else { ?>
<div class="col-lg-12 alert alert-success">
 Sua mensagem foi enviada com sucesso.
</div>
<h3>Confira os dados enviados abaixo:</h3>
<?php
    if(isset($_GET['inputNome']))
        echo "<h4>Nome: " . $_GET['inputNome'] . '</h4>';
    if(isset($_GET['inputEmail']))
        echo "<h4>E-mail: " . $_GET['inputEmail'] . '</h4>';
    if(isset($_GET['inputAssunto']))
        echo "<h4>Assunto: " . $_GET['inputAssunto'] . '</h4>';
    if(isset($_GET['inputMensagem']))
        echo "<h4>Mensagem: " . $_GET['inputMensagem'] . '</h4>';
} ?>