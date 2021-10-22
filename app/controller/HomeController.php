<?php

namespace app\controller;
use app\core\controller;
use app\Model\ProdutosModel;

class HomeController extends controller
{
    private $produtosModel;

    public function __construct()
    {
        $this->produtosModel = new ProdutosModel();
    }

    public function index(){

   

   $this->load('index', [
    'listaProdutos' => $this->produtosModel->visualizarProdutos()
    
     
]);

}

}