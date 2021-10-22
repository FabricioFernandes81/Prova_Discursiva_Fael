<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tec SAP - Sua Loja Virtual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{BASE}}css/style.css">
    <link rel="stylesheet" href="{{BASE}}css/styleproducts.css">
    <link rel="stylesheet" href="{{BASE}}css/Carrinho.css">
    <link rel="stylesheet" href="{{BASE}}css/admin.css">
    <link rel="stylesheet" href="{{BASE}}css/checkout.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    <script src="https://kit.fontawesome.com/a6184f16f7.js" crossorigin="anonymous"></script>
    <script src="{{BASE}}js/script.js"></script>


</head>

<body>
    <header>
        {% include "partes/menu.php" %}

        {% block body %}


        {% endblock %}
       

    </header>

</body>

</html>