<?php

namespace app\controller;

use app\core\controller;
use app\Model\MarcaModel;

class calcularCepController extends controller
{

  public function __construct()
  {
  }
  public function calcular()
  {
    $cep = $_POST['cep'];
    $peso = $_POST['pesofrete'];
    $totalFrete =  $peso * 30;

    echo json_encode(array(
      'cep' => '
    <ul class="calculofrete">
     <li><div class="row">
         <div class="col-8">
     
      <input type="radio" name="transpor" value = "' . $totalFrete . '">
      <label class="container">Correios</label>
         </div>
         <div class="col-4">R$ ' . ConvertMoeda($totalFrete) . '</div>
         <div class="info">Prazo de entrega de 2 a 8 dias úteis</div>
    </div>
        </li>        
    
        </ul>'

    ));
  }
}
