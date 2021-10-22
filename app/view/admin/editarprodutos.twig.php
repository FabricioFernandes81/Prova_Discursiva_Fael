{% extends "partes/body.php" %}

{% block body %}
<div class="container-fluid ">
    <div class="container">
        <div class="row">
            <h3>Adicionar Produto</h3>
            <div class="form-produtos">
                <form action="{{BASE}}admin/alterar/{{produtos.Id}}" onsubmit="return validar(true);" method="post" enctype="multipart/form-data">
                    <label for="nomefrm">Produto</label>

                    <input type="text" id="txtProduto" name="txtProduto" placeholder="Informe o Produto" value="{{produtos.Titulo}}">
                    <label for="descrfrm">Descricao</label>
                    <textarea id="txtDescr" name="txtDescr" placeholder="Write something.." style="height:100px">
                    {{produtos.Descricao}}
                    </textarea>
                    <div class="row">
                        <div class="col-2">
                            <label for="descrfrm">Estoque</label>
                            <input type="text" id="estoquefrom" name="txtestoque" placeholder="Informe o Estoque" value="{{produtos.Estoque}}">
                        </div>
                        <div class="col-5"><label for="selMarca">Marca</label>
                            <select id="selMarca" name="selMarca">
                                {% for marca in listMarcas %}
                                <option value="{{marca.Id}}" {{marca.Id == produtos.marca ? "selected" : ""}}>{{marca.titulo}}</option>
                                {% endfor %}
                            </select>
                        </div>
                        <div class="col-5">
                            <label for="descrfrm">Categoria</label>
                            <select id="selCategoria" name="selCategoria">
                                {% for categoria in listCategorias %}
                                <option value="{{categoria.Id}}" {{categoria.Id == produtos.categoria ? "selected" : ""}}>{{categoria.titulo}}</option>
                                {% endfor %}
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="nomefrm">Valor</label>
                            <input type="text" id="valorfrom" name="txtvalor" placeholder="Informe o valor" value="{{produtos.Valor}}">
                        </div>
                        <div class="col-6">
                            <label for="nomefrm">Peso</label>
                            <input type="text" id="txtpeso" name="txtpeso" placeholder="Informe o peso" value="{{produtos.Peso}}">
                        </div>
                    </div>
                    <label for="nomefrm">Imagem:</label>
                    <input type="file" class="form-control-file" name="imagePro" id="File" accept="image/*">

                    <div class="row mt-3">
                        <div class="col-md-10">
                            <div id="dvAlert">
                                <div class="alert alert-info">Preencha corretamente todos os campos</div>
                            </div>
                        </div>
                        <div class="col-md-2 text-right">
                            <input type="submit" value="Editar" class="btn btn-success w-100">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

{% endblock %}