{% extends "partes/body.php" %}

{% block body %}


{{categoria.titulo}}
{% set sum = 0 %}

<div class="container-fluid top-product">
  <div class="container-fluid header-carrinho">
    {% if listaCarrinho %}
    <div class="row">
      <div class="col-lg-7 col-md-3">
        <div class="compras-papel-principal">
          <div class="detalhe-pessoal-info">
            <h3>Carrinho de Compras</h3>
          </div>

          {% for carrinho in listaCarrinho %}
          <form name="produt" action="{{BASE}}carrinho" method="POST" class="needs-validation" novalidate>
            <div class="comprasListPro">
              <div id="dvAlert">
                {{ error.get() | raw }}
              </div>
              <div class="conteudo-list">
                <div class="painel-esquerda">
                  <div class="imagem-produ"><img src="{{BASE}}img_produtos/{{carrinho.imagem}}" alt=""></div>
                </div>
                <input type="hidden" value="{{carrinho.Id}}" id="txtId" name="txtId">
                <div class="painel-central">
                  <h3 class="titulo">{{carrinho.titulo}}</h3>
                  {% set sum = sum + carrinho.peso %}
                </div>
                <div class="painel-direita">
                  <div class="preco-painel">
                    <div class="valor">R$ {{carrinho.valor}}</div>
                  </div>
                  <div class="quantidade-add mt-4">

                    <span>
                      <button type="Submit" id="qtd-min" class="qtd-min" data-type="plus" data-field="" name="diminuir" value="diminuir">
                        <i class="fa fa-minus"></i>
                      </button>
                    </span>
                    <span>
                      <input class="form-control quantidade" readonly="" id="quantidade" type="text" value="{{carrinho.Quantidade}}">
                    </span>
                    <span>
                      <button type="Submit" id="qtd-max" class="qtd-max" value="aumentar" name="aumentar">
                        <i class="fas fa-plus"></i>
                      </button>
                    </span>
                  </div>
                </div>
              </div>
              <div class="compras-papel-fooder">
                <div class="row">
                  <div class="col-md-6 col-8 ">
                    <button type="Submit" id="qtd-min data-field=" value="remover" name="remover">
                      <i class="fas fa-recycle"></i> Remover</a>
                    </button>
                  </div>
                </div>
              </div>



            </div>
          </form>
          {% endfor %}
        </div>


      </div>

      <div class="col-lg-5 col-md-4 carrinho">
        <form method="POST" action="{{BASE}}carrinho/checkout">

          <ul class="list-group mb-3">
            {% for pedidos in listpedidos %}
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>

                <h6 class="my-0">{{pedidos.Produto}}</h6>
                <INPUT TYPE="hidden" NAME="prodId[]" VALUE="{{pedidos.Id}}">
                <INPUT TYPE="hidden" NAME="prodQuan[]" VALUE="{{pedidos.Quant}}">
                <INPUT TYPE="hidden" NAME="prodSubTotal[]" VALUE="{{pedidos.SubTotal}}">



                <INPUT TYPE="hidden" NAME="prodId[]" VALUE="{{pedidos.Id}}">
                <small class="text-muted"></small>
              </div>
              <span class="text-muted">R$ {{pedidos.SubTotal}}</span>
            </li>
            {% endfor %}
            <INPUT TYPE="hidden" NAME="prodtotalFrete" VALUE="{{Total}}">
            <li class="list-group-item d-flex justify-content-between">
              <span>Total </span>
              <strong>R$ {{Total}}</strong>
            </li>
          </ul>

          <div class="col-13">

            <div id="cepcalculo" class="header-frete">

            </div>

            <div class="carrinho-frete">

              <input type="text" id="cep-destino" name="cep-dest" placeholder="Informe o seu CEP" required>
              <div class="invalid-feedback">
                Por favor Informe o cep de destino.
              </div>
              <INPUT TYPE="hidden" name="pesofrete" id="pesofrete" VALUE="{{sum}}">

              <button type="button" class="input-group-append" id="calcular-frete" value="calcular"><i class="fas fa-truck-moving"></i> CALCULAR</button>
              <div class="col-13 fechar-pedido"><button type="submit" class="btPedido" id="" value="calcular"> FECHAR PEDIDO </button></div>

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  {% else %}
  <div class="carr-vazio">CARRINHO VAZIO
    <div class="carr-vazio-a">
      Não há produtos selecionados até o momento!
      Seu carrinho está vazio.<a href="{{BASE}}index">Voltar para o site.</a>
    </div>
  </div>
  {% endif %}
</div>


{% endblock %}