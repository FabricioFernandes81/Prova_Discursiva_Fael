{% extends "partes/body.php" %}

{% block body %}
<div class="container-fluid ">
    <div class="container">
        <div class="row">
            {% for produto in listaProdutos %}
            <div class="col-lg-3 col-md-6">
                {% if produto.Estoque <= 0 %}
                <form name="avise-me" action="{{BASE}}avise-me" method="post">
                    {% else %}
                    <!--{{BASE}}carrinho-->
                    <form id="carrinho" name="carrinho[]" action="{{BASE}}carrinho" method="post">
                        {% endif %}
                        <div class="products">
                            <div class="produto-img">
                                <img alt="User Image" heitg src="{{BASE}}img_produtos/{{produto.imagem}}">
                            </div>
                            <div class="products-content">
                                <h3 class="titulo"><a href="#">{{produto.titulo}}</a></h3>

                                <div class="price-header">
                                    <div class="price">R${{produto.valor}}</div>
                                </div>
                                {% if produto.Estoque <= 0 %}
                                <div class="avise-wrap">
                                    <button type="submit" class="comp-btn">AVISE-ME</button>
                                </div>
                                <div class="avise-wrap-1">
                                    <button type="submit" class="comp-btn"><i class="fas fa-at"></i></button>
                                    <input type="hidden" id="age" name="age" value="25" />
                                </div>

                                {% else %}
                                <div class="comprar-wrap">
                                    <button name="Comprar" value="add" type="submit" id="comprar" class="comp-btn">Comprar</button>
                                    <input type="hidden" id="idProduto" name="IdProduto" value="{{produto.id}}" />
                                    <input type="hidden" id="acao" name="acao" value="" />
                                </div>
                                <div class="comprar-wrap-1">
                                    <button type="submit" id="cesta[]" class="comp-btn"><i class="fas fa-cart-arrow-down"></i></button>
                                </div>
                                {% endif %}
                            </div>


                        </div>
                    </form>
            </div>
            {% endfor %}
        </div>
    </div>

</div>

{% endblock %}