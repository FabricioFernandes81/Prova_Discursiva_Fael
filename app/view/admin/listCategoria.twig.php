{% extends "partes/body.php" %}

{% block body %}
<div class="container-fluid ">
  <div class="container">
    <div class="row">
      <h3>Categorias</h3>
      <a href="{{BASE}}Categoria/cadastrar" class="btn btn-primary">Nova Categoria</a>
      <table id="tabela">
        <tr>
          <th>Id</th>
          <th>Categoria</th>
          <th></th>
          <th></th>
        </tr>
        <tr>
          {% for categoria in listCategorias %}
          <td>{{categoria.Id}}</td>
          <td>{{categoria.titulo}}</td>
          <td width="105px;"><a class="btn btn-primary btn-sm" href="{{BASE}}Categoria/editar/{{categoria.Id}}" role="button"><i class="far fa-edit"></i>Editar</a></td>
          <td width="105px;"><a class="btn btn-primary btn-sm" href="{{BASE}}Categoria/deletar/{{categoria.Id}}" role="button"><i class="fas fa-trash-alt"></i>Deletar</a></td>
        </tr>
        {% endfor %}
      </table>
    </div>
  </div>
</div>
{% endblock %}