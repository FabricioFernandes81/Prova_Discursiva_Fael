{% extends "partes/body.php" %}

{% block body %}
<form  action="{{BASE}}carrinho/finalizaPedido" method="POST">
		<div class="container-fluid top-product">
		<div class="container-fluid header-carrinho">
		<div class="row">
 		<div class="col-lg-8">
		
			<div class="detalhe-pessoal-info">
			<h3>Dados Pessoais</h3>
				
				<div class="row">
					<div class= "col-lg-6 col-md-6"> 
			<div class="detalhe-pessoal mb-20">
         <label>Nome <abbr class="required" title="required">*</abbr></label>
                                            <input type="text" name= "txtNome">
                                        </div>
						</div>
							<div class= "col-lg-6 col-md-6"> 
			<div class="detalhe-pessoal mb-20">
         <label>Sobrenome: <abbr class="required" title="required">*</abbr></label>
                                            <input type="text" name= "txtSobrenome">
                                        </div>
					</div>
							<div class= "col-lg-12 col-md-8"> 
			<div class="detalhe-pessoal mb-20">
         <label>Email: <abbr class="required" title="required">*</abbr></label>
                                            <input type="text" name= "txtEmail">
                                        </div>
					</div>
					</div>
			</div>
      <div class="detalhe-pessoal-info">
			<h3>Dados de Entrega</h3>
</div>
			</div>        
<div class="col-lg-4">
<div class="detalhe-pessoal-info">
			<h3>Seu Pedido</h3>
          <ul class="list-group mb-3">
          {% for pedidos in listpedidos %}
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>

              <h6 class="my-0">{{pedidos.Produto}}</h6>
              <small class="text-muted"></small>
            </div>
            <span class="text-muted">R$ {{pedidos.SubTotal}}</span>
          </li>
            {% endfor %}
            <li class="list-group-item d-flex justify-content-between">
              <span>Frete</span>
              <strong>R$ {{valFrete}}</strong>
            </li>
			  <li class="list-group-item d-flex justify-content-between">
              <span>Total</span>
              <strong>R$ {{totalCFrete}}</strong>
              <INPUT TYPE="hidden" name="txtValorFrete" id="cep" VALUE="{{valFrete}}">
              <INPUT TYPE="hidden" name="txtTotalFrete" id="cep" VALUE="{{totalCFrete}}">
              <INPUT TYPE="hidden" name="txtCep" id="cep" VALUE="{{cepdest}}">
            </li>
          </ul>
	</div>
	
<div class="col-13 metodos-pagamento"> 
	<div class="forma-Pagamento">
 <input  class="input-radio" type="radio" value="Boleto"  name="metodo-pgt">
 <label>Boleto </label>
 
 </div>

 <div class="forma-Pagamento">
 <input  class="input-radio" type="radio" value="TransfBancária"  name="metodo-pgt">
 <label>Transferência bancária </label>
 
 </div>

 <div class="forma-Pagamento">
 <input  class="input-radio" type="radio" value="PIX"  name="metodo-pgt">
 <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> PIX </font></font></label>
 
 </div>
 
	</div>
<div class="col-13">
    
  	<div class="col-13 fechar-pedido"><button class="btPedido" type="submit" value="Finalizar"> FINALIZAR PEDIDO </button></div>
    
    </div>
            
            </div>
			</div>
				</div>
		
		</div>
        </form>

        {% endblock %}