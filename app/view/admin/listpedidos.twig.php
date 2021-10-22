{% extends "partes/body.php" %}

{% block body %}



<div class="container-fluid ">
  <div class="container">
    <div class="row">

      <table id="tabela">
        <tr>
          <th>Id</th>
          <th>Cliente</th>
          <th>E-mail</th>
          <th>Forma Pagamento</th>
          <th>CEP</th>
          <th>Valor Pedido</th>
          <th>Data</th>
          <th></th>

        </tr>
        {% for pedidos in requestList %}

        <tr>
          <td>{{pedidos.Id}}</td>
          <td>{{pedidos.cliNome}} {{pedidos.Sobr}}</td>
          <td>{{pedidos.cliEmail}}</td>
          <td>{{pedidos.cliPagam }}</td>
          <td>{{pedidos.cep}}</td>
          <td>R$ {{pedidos.valor }}</td>
          <td>{{pedidos.data}}</td>
          <td><a class="btn btn-primary btn-sm" href="{{BASE}}admin/itens/{{ pedidos.Id }}" role="button"><i class="far fa-eye"></i>Ver Pedido</a></td>
        </tr>
        {% endfor %}
      </table>

    </div>
  </div>

</div>
{% endblock %}