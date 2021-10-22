<?php

namespace app\controller;

use app\core\controller;
use app\Model\CarrinhoModel;
use app\Funcoes\pedidos;
use app\core\Erro;

class CarrinhoController extends controller
{

  private $carrModel;
  private $cep;
  public function __construct()
  {
    $this->Error = Erro::getInstancia();
    $this->carrModel = new CarrinhoModel();
  }

  public function index()
  {


    $id  = filter_input(INPUT_POST, 'txtId', FILTER_SANITIZE_STRING);


    if (isset($_POST['diminuir'])) {
      $this->atualizar($id, $_POST['diminuir']);
    } elseif (isset($_POST['aumentar'])) {
      $this->atualizar($id, $_POST['aumentar']);
    } elseif (isset($_POST['remover'])) {
      $this->atualizar($id, $_POST['remover']);
    } elseif (isset($_POST['Comprar'])) {
      $idC  = filter_input(INPUT_POST, 'IdProduto', FILTER_SANITIZE_STRING);
      $this->adicionar($idC);
    }



    $this->load('Carrinho', [
      'listaCarrinho' => $this->carrModel->VisualizarCarrinho(), 'listpedidos' => $this->carrModel->mostrarPedido(),
      'Total' => ConvertMoeda($this->carrModel->CalculaTotal()), 'error' => $this->Error
    ]);
  }

  private function atualizar(int $id, string $tipo)
  {
    switch ($tipo) {
      case 'diminuir':
        $this->carrModel->diminuirQdt($id);
        break;
      case 'aumentar':
        $this->carrModel->aumentarQdt($id);
        break;
      case 'remover':
        $this->carrModel->removerproduto($id);
        break;
    }
  }

  private function adicionar($idProduto)
  {

    $this->carrModel->adicionarCart($idProduto);
  }


  public function checkout()
  {

    $cep = $_POST['cep-dest'];
    $valorFrete = $_POST['transpor'];

    $this->load('checkout', [
      'listaCarrinho' => $this->carrModel->VisualizarCarrinho(), 'listpedidos' => $this->carrModel->mostrarPedido(),
      'totalCFrete' => ConvertMoeda($this->carrModel->CalculaTotal() + $valorFrete),
      'valFrete' => ConvertMoeda($valorFrete), 'cepdest' => $cep, 'error' => $this->Error
    ]);
  }

  public function finalizaPedido()
  {
    $pedidos = $this->getInput();

    $result = $this->carrModel->finalizarPedido($pedidos);
    header("Location: " . BASE . "carrinho/finalizado");
  }

  private function getInput()
  {
    $pedidos = new pedidos();
    $pedidos->SetCliNome(filter_input(INPUT_POST, 'txtNome', FILTER_SANITIZE_STRING));
    $pedidos->SetCliSobr(filter_input(INPUT_POST, 'txtSobrenome', FILTER_SANITIZE_STRING));
    $pedidos->SetCliEmail(filter_input(INPUT_POST, 'txtEmail', FILTER_SANITIZE_STRING));
    $pedidos->SetCliPgt(filter_input(INPUT_POST, 'metodo-pgt', FILTER_SANITIZE_STRING));
    $pedidos->SetCliCep(filter_input(INPUT_POST, 'txtCep', FILTER_SANITIZE_STRING));
    $pedidos->SetCliValoFre(filter_input(INPUT_POST, 'txtValorFrete', FILTER_SANITIZE_STRING));
    $pedidos->SetCliTotalPed(filter_input(INPUT_POST, 'txtTotalFrete', FILTER_SANITIZE_STRING));
    $pedidos->setData(getCurrentDate());
    return $pedidos;
  }

  public function finalizado()
  {
    $this->Mensagem(
      'Sua compra foi efetuada com Sucesso!',
      'Obrigado por aquirir nossos Produtos!',
      'index'
    );
  }
}
