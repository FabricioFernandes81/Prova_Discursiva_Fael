{% extends "partes/body.php" %}

{% block body %}

<div class="container-fluid ">
    <div class="container">
        <div class="row">
            <h3>{{tipo}} marca</h3>
            <div class="form-produtos">
                <form action="{{BASE}}marca/{{uri}}" method="post">
                    <label for="nomefrm">Produto</label>
                    <input type="hidden" id="txtId" name="txtId" value="{{Marcas.Id}}" />
                    <input type="text" id="txtMarca" name="txtMarca" placeholder="Informe a Marca" value="{{Marcas.titulo}}">
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

{% endblock %}