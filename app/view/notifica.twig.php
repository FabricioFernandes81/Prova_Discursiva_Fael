{% for Menu in listamenus %}
<li><form name="frmCategoria" id ="frmCategoria"  class="pesquisa" action="{{BASE}}categoria/" method="post">
<input type="hidden" name="verCategoria" value ="{{Menu.Id}}" >
<a onClick="AbrirCategoria();" class="dropdown-item" href="javascript:void(0)">{{Menu.Categoria}}</a>
</form>
</li>

{% endfor %}
