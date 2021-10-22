{% extends "partes/body.php" %}

{% block body %}


<div class="container-fluid ">
  <div class="container">
    <div class="row">
      <h3>Produtos</h3>
      <a href="{{BASE}}admin/adicionar/" class="btn btn-primary">Novo Produto</a>

      <table id="tabela">
        <tr>
          <th>Id</th>
          <th>Produto</th>
          <th>Estoque</th>
          <th>Marca</th>
          <th>Categoria</th>
          <th>Valor</th>
          <th>Peso</th>
          <th></th>
          <th></th>
        </tr>
        {% for Produtos in produtoslist %}
        <tr>
          <td>{{Produtos.Id}}</td>
          <td>{{Produtos.Titulo}}</td>
          <td>{{Produtos.Estoque}}</td>
          <td>{{Produtos.marca}}</td>
          <td>{{Produtos.Categoria}}</td>
          <td>R$ {{Produtos.Valor}}</td>
          <td>{{Produtos.Peso}}</td>

          <td><a class="btn btn-primary btn-sm" href="{{BASE}}admin/editar/{{ Produtos.id }}" role="button"><i class="far fa-edit"></i>Editar</a></td>
          <td><a class="btn btn-primary btn-sm" href="{{BASE}}admin/deletar/{{ Produtos.id }}" role="button"><i class="fas fa-trash-alt"></i>Deletar</a></td>

        </tr>
        {% endfor %}
      </table>

    </div>
  </div>

</div>


{% endblock %}