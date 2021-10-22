{% include "notifica.twig.php" %}
<div class="header top-header"></div>
<div class="container-fluid middle-header">
    <div class="container-fluid ">
        <nav class="navbar navbar-expand-lg header-nav">

            <div class="navbar-header">
                <a href="{{BASE}}index.html" class="navbar-brand logo">
                    <img src="{{BASE}}img/logo.png" class="img-fluid" alt="Logo">

                </a>

            </div>
            <div class="middle-header-central">
                <form id="busca" class="busca" action="{{BASE}}pesquisa/p" method="post" >
                    <input type="text" name="txtPesquisa" placeholder="Pesquise seu produto">
                    <button type="submit" class="input-group-append"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="middle-header-right">
                <ul class="log-user">
                    <li>
                        <a href="#">
                            <div>
                                <i class="far fa-user mr-2"></i>

                            </div>
                            <div>Minha Conta</div>
                        </a>
                    </li>
                    <li class="cart">
                        <a href="{{BASE}}carrinho" id="cart"><i class="fas fa-shopping-cart mr-2"></i><span>

                            </span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!--Menu Da Pagina -->
<div class="container-fluid menus">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMobileToggle" aria-controls="navbarMobileToggle" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarMobileToggle">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="Submenu-Dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" onClick="AbrirMenu('{{BASE}}')">
                            Todas Categorias
                        </a>
                        <ul id="menu" class="dropdown-menu rounded-3" aria-labelledby="Submenu-Dropdown">
                            {% block body %}
                            {% endblock %}
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{BASE}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{BASE}}blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{BASE}}ofertas">Ofertas</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="Submenu-Dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Administração
                        </a>
                        <ul class="dropdown-menu rounded-3" aria-labelledby="Submenu-Dropdown">
                            <li>
                                <a class="dropdown-item" href="{{BASE}}categoria/admin">Categoria</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{BASE}}marca/admin">Marcas</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{BASE}}admin">Produtos</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{BASE}}admin/produtoemfalta">Produto em falta</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{BASE}}admin/pedidos">Vendas</a>
                            </li>


                        </ul>
                    </li>
                </ul>


            </div>
        </div>
    </nav>

</div>