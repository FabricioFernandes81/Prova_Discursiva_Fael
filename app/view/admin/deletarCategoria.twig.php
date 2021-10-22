{% extends "partes/body.php" %}

{% block body %}

<div class="container-fluid ">
    <div class="container">
        <div class="row">
            <h3>Deletar Categoria</h3>
            <div class="form-produtos">
                <form action="{{BASE}}categoria/deleta/{{Categoria.Id}}" method="post">
                    <div id="dvAlert">

                        <label for="nomefrm">Produto</label>
                        <input type="text" id="txtCategoria" name="txtCategoria" placeholder="Informe a Categoria" value="{{Categoria.titulo}}">

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