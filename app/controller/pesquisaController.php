<?php

namespace app\controller;
use app\core\controller;
use app\Model\ProdutosModel;

class pesquisaController extends Controller
{
    private $produtosModel;

    public function __construct()
    {
        $this->produtosModel = new ProdutosModel();
    }

    public function index()
    {
        $this->Mensagem(
            'Erro',
            'Houve um erro, tente novamente mais tarde',
            'index'
        );
    }

    public function p()
    {
      
        $termo = filter_input(INPUT_POST, 'txtPesquisa', FILTER_SANITIZE_STRING);
     
    $result = $this->produtosModel->pesquisaProdutos($termo);
    if ($result <= 0) {
    $this->Mensagem(
        'Busca',
        'Nenhum produto encontrado.',
        'index'
    );
return;
}
     $this->load('index', [
        'listaProdutos' => $this->produtosModel->pesquisaProdutos($termo)
        
    ]);
    }
}
