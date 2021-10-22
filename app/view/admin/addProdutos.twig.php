{% extends "partes/body.php" %}

{% block body %}
<div class="container-fluid ">
  <div class="container">
    <div class="row">
      <h3>Adicionar Produto</h3>
      <div class="form-produtos">

        <form name="produtos" action="{{BASE}}admin/inserir" class="needs-validation" method="post" enctype="multipart/form-data" onsubmit="return validar();" novalidate>

          <label for="nomefrm">Produto</label>
          <input type="text" id="txtProduto" name="txtProduto" placeholder="Informe o Produto" required>
          <div class="invalid-feedback">
            Por favor Informe o nome do produto.
          </div>
          <label for="descrfrm">Descricao</label>
          <textarea id="txtDescr" name="txtDescr" placeholder="Descrição..." style="height:100px"></textarea>
          <div class="row">
            <div class="col-2">
              <label for="descrfrm">Estoque</label>
              <input type="text" id="txtestoque" name="txtestoque" placeholder="Informe o Estoque" min="0" required>
              <div class="invalid-feedback">
                Por favor Informe o estoque.
              </div>
            </div>
            <div class="col-5"><label for="selMarca">Marca</label>
              <select id="selMarca" name="selMarca" required>
                <option value="">...</option>
                {% for marca in listMarcas %}
                <option value="{{marca.Id}}">{{marca.titulo}}</option>
                {% endfor %}
              </select>
              <div class="invalid-feedback">
                Por favor selecione a marca.
              </div>
            </div>
            <div class="col-5">
              <label for="descrfrm">Categoria</label>
              <select id="selCategoria" name="selCategoria" required>
                <option value="">...</option>
                {% for categoria in listCategorias %}
                <option value="{{categoria.Id}}">{{categoria.titulo}}</option>
                {% endfor %}
              </select>
              <div class="invalid-feedback">
                Por favor selecione a Categoria.
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <label for="nomefrm">Valor</label>
              <input type="text" id="txtvalor" name="txtvalor" min="0" placeholder="Informe o valor" required>
              <div class="invalid-feedback">
                Por favor Informe o valor.
              </div>
            </div>
            <div class="col-6">
              <label for="nomefrm">Peso</label>
              <input type="text" id="txtpeso" name="txtpeso" placeholder="Informe o peso" required>
              <div class="invalid-feedback">
                Por favor Informe o peso.
              </div>
            </div>
          </div>
          <label for="nomefrm">Imagem:</label>
          <input type="file" class="form-control-file" name="imagePro" id="File" accept="image/*">

          <div class="row mt-3">
            <div class="col-md-10">

            </div>
            <div class="col-md-2 text-right">
              <input type="submit" value="Adicionar" class="btn btn-success w-100">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
<script src="{{BASE}}js/script.js"></script>

{% endblock %}