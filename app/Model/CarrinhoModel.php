<?php

namespace app\Model;

use app\core\ServicoMysql;
use app\Funcoes\produtos;
use app\core\Erro;
use app\Funcoes\pedidos;

class CarrinhoModel
{

  private $pdo;
  private $listaPedido = array();
  public $errotxt;
  private $erro;
  private $estoque;
  public function __construct()
  {
    $this->pdo = new ServicoMysql();
    $this->listaPedido = array();
    $this->Error = Erro::getInstancia();

    session_start();
    if (empty($_SESSION['itens'])) {
      $_SESSION['itens'] = array();
    }
  }


  public function adicionarCart(int $id)
  {


    if (!isset($_SESSION['itens'][$id])) {
      $_SESSION['itens'][$id] = array(
        'estoque' => '1',
        'quantidade' => '1'
      );
    }
  }

  public function VisualizarCarrinho()
  {
    $lista = [];

    $sql = 'Select p.Codigo,p.Produto,p.Descricao,p.estoque,m.nome marca,c.nome categoria,p.valor,p.peso,p.img from produtos p 
      INNER JOIN marca m on p.idMarca = m.Id_Marca
      INNER JOIN categoria c on p.IdCategoria = c.Id_Categoria where codigo = :id';
    //  LogSys($_SESSION['itens'],false);
    foreach ($_SESSION['itens'] as $item => $value) {

      $idProduto = $item;

      //var_dump($key);



      $dt = $this->pdo->executarSql($sql, [
        ':id' => $idProduto

      ]);
      foreach ($dt as $dr) {


        $_SESSION['itens'][$item]['estoque'] = $dr['estoque'];
        $lista[] = $this->colecao($dr, $value['quantidade']);


        $subTotal = $value['quantidade'] * $dr['valor'];
        $this->listaPedido[] = [
          "Id" => $dr['Codigo'],
          "Produto" => $dr['Produto'],
          "Quant" => $value['quantidade'],
          "SubTotal" => ConvertMoeda($subTotal),
          'sub' => $value['quantidade'] * $dr['valor'],
          'Peso' => $dr['peso']
        ];
      }
    }

    return $lista;
  }


  public function aumentarQdt($id)
  {

    if (($_SESSION['itens'][$id]['quantidade']) <> ($_SESSION['itens'][$id]['estoque'])) {
      $_SESSION['itens'][$id]['quantidade'] += 1;
    } else
      $this->Error->set('<div class="alert alert-danger">Desculpe Estoque Insuficiente!!</div>');
  }
  public function diminuirQdt($id)
  {

    if (($_SESSION['itens'][$id]['quantidade'] > 1) && ($_SESSION['itens'][$id]['quantidade'] <= $_SESSION['itens'][$id]['estoque'])) {
      $_SESSION['itens'][$id]['quantidade'] -= 1;
    } else
      $this->Error->set('<div class="alert alert-danger">Desculpe Estoque Insuficiente!!</div>');
  }
  public function removerproduto($id)
  {

    unset($_SESSION['itens'][$id]);
  }

  public function mostrarPedido()
  {

    $this->total = 0;
    foreach ($this->listaPedido as $v) {
      $this->total += $v['sub'];
    }

    return $this->listaPedido;
  }

  public function CalculaTotal()
  {

    return $this->total;
  }
  private function colecao($arr, $qdt)
  {
    $produtos = new Produtos();
    $produtos->SetId($arr['Codigo'] ?? null);
    $produtos->setTitulo($arr['Produto'] ?? null);
    $produtos->setDescricao($arr['Descricao'] ?? null);
    $produtos->setEstoque($arr['estoque'] ?? null);
    $produtos->setMarca($arr['marca'] ?? null);
    $produtos->setCategoria($arr['categoria'] ?? null);
    $produtos->setValor(ConvertMoeda($arr['valor']) ?? null);
    $produtos->setPeso($arr['peso'] ?? null);
    $produtos->setImagem($arr['img'] ?? null);
    $produtos->setQuantidade($qdt ?? null);

    return $produtos;
  }

  public function finalizarPedido(Pedidos $pedidos)
  {

    $sql = 'INSERT INTO pedidos (Cliente,Cliente_Sobrenome,email,FormaPgt,Cep,vlrFrete,vlrPedido,data) VALUES (:Cliente,:Sobrenome,:emailcli,:Pgt,:cep,:vlrFrete,:vlrPedido,:data)';
    $params = [
      ':Cliente' => $pedidos->getCliNome(),
      ':Sobrenome' => $pedidos->getSobr(),
      ':emailcli' => $pedidos->getCliEmail(),
      ':Pgt' => $pedidos->getCliPgt(),
      ':cep' => $pedidos->getCep(),
      ':vlrFrete' => resetMoeda($pedidos->getCliVlrFrete()),
      ':vlrPedido' => resetMoeda($pedidos->getCliVlrPedido()),
      ':data' => $pedidos->getData()

    ];

    $this->pdo->executarNQuery($sql, $params);


    $idLast = $this->pdo->getLastId();

    foreach ($_SESSION['itens'] as $item => $value) {

      $idProduto = $item;
      $sqlPro = 'INSERT INTO itenspedidos (Id_pedido, Id_produto, Quantidade, ValorUnitario) VALUES (:Id_Pedido, :Id_Produto, :Quantidade, :vlrUnit)';
      $paramsItem = [
        ':Id_Pedido' => $idLast,
        ':Id_Produto' => $item,
        ':Quantidade' => $value['quantidade'],
        ':vlrUnit' => resetMoeda($pedidos->getCliVlrPedido())
      ];
      $this->pdo->executarNQuery($sqlPro, $paramsItem);
    };
    unset($_SESSION['itens']);
    return $idLast;
  }
}
