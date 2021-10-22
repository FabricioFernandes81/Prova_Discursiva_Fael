{% extends "partes/body.php" %}

{% block body %}
<div class="container-fluid ">
  <div class="container">
    <div class="row">
      <h3>Marcas</h3>
      <a href="{{BASE}}marca/cadastrar" class="btn btn-primary">Nova Marca</a>
      <table id="tabela">
        <tr>
          <th>Id</th>
          <th>Marca</th>
          <th></th>
          <th></th>
        </tr>
        <tr>
          {% for marca in marcalist %}
          <td>{{marca.Id}}</td>
          <td>{{marca.titulo}}</td>
          <td width="105px;"><a class="btn btn-primary btn-sm" href="{{BASE}}marca/editar/{{marca.Id}}" role="button"><i class="far fa-edit"></i>Editar</a></td>
          <td width="105px;"><a class="btn btn-primary btn-sm" href="{{BASE}}marca/deletar/{{marca.Id}}" role="button"><i class="fas fa-trash-alt"></i>Deletar</a></td>
        </tr>
        {% endfor %}
      </table>
    </div>
  </div>
</div>

{% endblock %}