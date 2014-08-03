<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"> oi oi </span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">PHP: FOUNDATION</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div>
            <ul class="nav navbar-nav">
                <li><a href="/home">Home</a></li>
                <li><a href="/empresa">Empresa</a></li>
                <li><a href="/produtos">Produtos</a></li>
                <li><a href="/servicos">Serviços</a></li>
                <li><a href="/contato">Contato</a></li>
                <li><a href="/login">Login</a></li>
            </ul>
            <form class="navbar-form navbar-right" role="search" action="pesquisar" method="post">
                <div class="form-group">
                    <input type="text" name="pesquisa" class="form-control" placeholder="Pesquisar">
                </div>
                <button type="submit" class="btn btn-default">Enviar</button>
            </form>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
