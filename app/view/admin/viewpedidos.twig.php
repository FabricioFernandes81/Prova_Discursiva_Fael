{% extends "partes/body.php" %}

{% block body %}


<div class="container-fluid ">
  <div class="container">
    <div class="row">
      <h3 style="text-align: center;">Itens do Pedido Nº {{numeroPedido}}</h3>
      <div class="container-fluid">
        <div class="row">
          {% for cliente in client %}
          <div class="col-3 header-info-client"><label>Nome:</label>{{cliente.cliNome}} {{cliente.cliSobr}}</div>
          {% endfor %}

        </div>

      </div>

    </div>
    <table id="tabela">
      <tr>
        <th>Id</th>
        <th>Produto</th>
        <th>Marca</th>
        <th>Categoria</th>
        <th>Quantidade</th>
        <th>Valor</th>
        <th>Status</th>
        <th></th>
      </tr>
      <tr>

        {% for pedido in Requestlist %}
        <td>{{pedido.id}}</td>
        <td>{{pedido.produto}}</td>
        <td>{{pedido.marca}}</td>
        <td>{{pedido.categoria}}</td>
        <td>{{pedido.Quantidade}}</td>
        <td>R$ {{pedido.valor}}</td>
        <td>{{pedido.status}}</td>
        <td><a class="btn btn-primary btn-sm" href="#" role="button"><i class="fas fa-paper-plane"></i> Enviar</a></td>

      </tr>
      {% endfor %}
    </table>

  </div>
</div>



{% endblock %}