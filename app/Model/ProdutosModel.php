<?php

namespace app\Model;

use app\core\ServicoMysql;
use app\Funcoes\produtos;
use app\Funcoes\pedidos;

class ProdutosModel
{

  private $pdo;

  public function __construct()
  {
    $this->pdo = new ServicoMysql();
  }

  public function visualizarProdutos()
  {
    $sql = 'Select * from produtos ORDER BY produto DESC';
    $dt = $this->pdo->executarSql($sql);

    $lista = [];
    foreach ($dt as $dr)

      $lista[] = $this->collection1($dr);


    return $lista;
  }

  public function pesquisaProdutos(string $termo)
  {
    
  $sql = 'Select * from produtos WHERE UPPER(Produto) LIKE :termo';
    $params = [
      ':termo'=> strtoupper("{$termo}%")
    ];
    $dt = $this->pdo->executarSql($sql,$params);

    $lista = [];
    foreach ($dt as $dr){
      $lista[] = $this->collection1($dr);
    return $lista;
    }
    return -1;
  }
  public function VisualizaProdFalta()
  {
    $sql = 'Select p.Codigo,p.Produto,p.Descricao,p.Estoque,m.nome marca,c.nome categoria,p.valor,p.peso,p.img from produtos p 
      INNER JOIN marca m on p.idMarca = m.Id_Marca
      INNER JOIN categoria c on p.IdCategoria = c.Id_Categoria  where p.Estoque = :Estoque Order by produto DESC';

    $params = [
      ':Estoque' => '0'
    ];
    $dt = $this->pdo->executarSql($sql, $params);

    $lista = [];
    foreach ($dt as $dr)

      $lista[] = $this->collection($dr);


    return $lista;
  }

  public function viewPedidoPorId(int $IdPedido)
  {

    $sql = 'Select * from pedidos WHERE Id = :IdPedido';
    $params = [
      ':IdPedido' => $IdPedido
    ];

    $dt = $this->pdo->executarSql($sql, $params);

    $lista = [];
    foreach ($dt as $dr)

      $lista[] = $this->collection_Request($dr);


    return $lista;
  }
  public function visualizarItens(int $IdPedido)
  {

    $sql = 'Select i.Id_pedido Pedido,p.Produto,m.nome Marca,c.nome Categoria,i.Quantidade,i.ValorUnitario valor from itenspedidos i 
        INNER JOIN produtos p on i.Id_produto = p.Codigo
        INNER JOIN marca m on p.idMarca = m.Id_Marca
        INNER JOIN categoria c on p.IdCategoria = c.Id_Categoria where Id_pedido = :IdPedido';
    $params = [
      ':IdPedido' => $IdPedido,
    ];

    $dt = $this->pdo->executarSql($sql, $params);

    $lista = [];
    foreach ($dt as $dr)

      $lista[] = $this->collectionPedido($dr);


    return $lista;
  }

  private function collectionPedido($arr)
  {
    return (object) [
      'id'     => $arr['Pedido'] ?? null,
      'produto' => $arr['Produto'] ?? null,
      'marca' => $arr['Marca'] ?? null,
      'categoria' => $arr['Categoria'] ?? null,
      'Quantidade' => $arr['Quantidade'] ?? null,
      'valor' => ConvertMoeda($arr['valor']) ?? null,
      'status' => 'Pendente' ?? null,


    ];
  }
  private function collection1($arr)
  {
    return (object) [
      'id'     => $arr['Codigo'] ?? null,
      'titulo' => $arr['Produto'] ?? null,
      'descricao' => $arr['Descricao'] ?? null,
      'marca' => $arr['marca'] ?? null,
      'valor' => ConvertMoeda($arr['valor']) ?? null,
      'imagem' => $arr['img'] ?? null,
      'Estoque' => $arr['Estoque'] ?? null

    ];
  }

  public function VisualizaProd()
  {
    $sql = 'Select p.Codigo,p.Produto,p.Descricao,p.Estoque,m.nome marca,c.nome categoria,p.valor,p.peso,p.img from produtos p 
      INNER JOIN marca m on p.idMarca = m.Id_Marca
      INNER JOIN categoria c on p.IdCategoria = c.Id_Categoria Order by produto DESC';

    $dt = $this->pdo->executarSql($sql);

    $lista = [];
    foreach ($dt as $dr)

      $lista[] = $this->collection($dr);


    return $lista;
  }
  public function Visualizapedidos()
  {
    $sql = 'Select * from pedidos Order by Id DESC';

    $dt = $this->pdo->executarSql($sql);

    $lista = [];
    foreach ($dt as $dr) {
      //echo $dr['FormaPgt'];
      $lista[] = $this->collection_Request($dr);
    }

    return $lista;
  }

  private function collection_Request($arr)
  {
    return (object) [
      'Id'     => $arr['Id'] ?? null,
      'cliNome' => $arr['Cliente'] ?? null,
      'cliSobr' => $arr['Cliente_Sobrenome'] ?? null,
      'cliEmail' => $arr['email'] ?? null,
      'cliPagam' => $arr['FormaPgt'] ?? null,
      'cep' => $arr['Cep'] ?? null,
      'valor' => ConvertMoeda($arr['vlrPedido']) ?? null,
      'data' => $arr['data'] ?? null

    ];
  }

  private function collection($arr)
  {
    $produtos = new Produtos();
    $produtos->SetId($arr['Codigo'] ?? null);
    $produtos->setTitulo($arr['Produto'] ?? null);
    $produtos->setDescricao($arr['Descricao'] ?? null);
    $produtos->setEstoque($arr['Estoque'] ?? null);
    $produtos->setMarca($arr['marca'] ?? null);
    $produtos->setCategoria($arr['categoria'] ?? null);
    $produtos->setValor(ConvertMoeda($arr['valor']) ?? null);
    $produtos->setPeso($arr['Peso'] ?? null);
    $produtos->setImagem($arr['img'] ?? null);
    $produtos->setQuantidade($qdt ?? null);

    return $produtos;
  }

  public function inserir(Produtos $produtos)
  {
    $sql = 'INSERT INTO produtos (Produto, Descricao, Estoque, IdMarca, IdCategoria, valor, Peso,img) VALUES 
      (:Produto, :Descricao, :Estoque, :IdMarca, :IdCategoria, :valor, :Peso ,:img)';
    $params = [
      ':Produto' => $produtos->getTitulo(),
      ':Descricao' => $produtos->getDescicao(),
      ':Estoque' => $produtos->getEstoque(),
      ':IdMarca' => $produtos->getMarca(),
      ':IdCategoria' => $produtos->getCategoria(),
      ':valor' => $produtos->getValor(),
      ':Peso' => $produtos->getPeso(),
      ':img' => $produtos->getImagem(),
    ];
    $this->pdo->executarNQuery($sql, $params);


    return 0;
  }

  public function lerPorId(int $produtosId)
  {
    $sql = 'Select p.*,p.IdMarca marca,p.IdCategoria categoria  from produtos p where codigo =:id';
    $dr = $this->pdo->executarSqlRow($sql, [
      ':id' => $produtosId
    ]);


    return $this->collection($dr);
  }

  public function alterar(Produtos $produtos)
  {

    $sql = 'Update produtos Set Produto = :Produto,Descricao = :Descricao, Estoque = :Estoque, IdMarca = :IdMarca, IdCategoria = :IdCategoria,
      valor = :valor, Peso = :Peso, img = :img  WHERE Codigo = :Id';
    $params = [
      ':Id' => $produtos->getId(),
      ':Produto' => $produtos->getTitulo(),
      ':Descricao' => $produtos->getDescicao(),
      ':Estoque' => $produtos->getEstoque(),
      ':IdMarca' => $produtos->getMarca(),
      ':IdCategoria' => $produtos->getCategoria(),
      ':valor' => $produtos->getValor(),
      ':Peso' => $produtos->getPeso(),
      ':img' => $produtos->getImagem()
    ];
    return $this->pdo->executarNQuery($sql, $params);
  }
  public function deleta(Produtos $produtos)
  {
    $sql = 'DELETE FROM produtos where Codigo =:Id';
    $params = [
      ':Id' => $produtos->getId()
    ];

    // LogSys($params,false);

    return $this->pdo->executarNQuery($sql, $params);
  }
}
