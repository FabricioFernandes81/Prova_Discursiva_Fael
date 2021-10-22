<?php

namespace app\controller;

use app\core\controller;
use app\Funcoes\produtos;
use app\Model\ProdutosModel;
use app\Model\CategoriaModel;
use app\Model\MarcaModel;


class adminController extends controller
{
    private $modelprodu;

    public function __construct()
    {
        $this->modelprodu = new ProdutosModel();
    }

    public function index()
    {

        // LogSys([
        //     'produtoslist' => $this->modelprodu->VisualizaProd()]);

        $this->load('admin/admin', [
            'produtoslist' => $this->modelprodu->VisualizaProd()
        ]);
    }



    public function produtoemfalta()
    {
        //LogSys(['produtoslist' => $this->modelprodu->VisualizaProdFalta()],false);
        $this->load('admin/produtoemfalta', [
            'produtoslist' => $this->modelprodu->VisualizaProdFalta()
        ]);
    }
    public function editar($produtoId)
    {
        $produtoId = filter_var($produtoId, FILTER_SANITIZE_NUMBER_INT);

        $this->load('admin/editarProdutos', [
            'listCategorias' => (new CategoriaModel())->lerCategoria(),
            'listMarcas' => (new MarcaModel())->lerMarcas(),
            'produtos' => $this->modelprodu->lerPorId($produtoId),
            'produtoId' => $produtoId
        ]);
    }

    public function adicionar()
    {

        $this->load('admin/addProdutos', [
            'listCategorias' => (new CategoriaModel())->lerCategoria(),
            'listMarcas' => (new MarcaModel())->lerMarcas()
        ]);
    }

    public function pedidos()
    {

        /*LogSys([
            'Requestlist' => $this->modelprodu->Visualizapedidos()
        ],false);*/
        $this->load('admin/listpedidos', [
            'requestList' => $this->modelprodu->Visualizapedidos()
        ]);
    }

    public function itens($idPedido)
    {
        $pedidoId = filter_var($idPedido, FILTER_SANITIZE_NUMBER_INT);


        /*    LogSys([
        'Requestlist' => $this->modelprodu->visualizarItens($pedidoId)
        ],false);*/

        $this->load('admin/viewpedidos', [
            'client' => $this->modelprodu->viewPedidoPorId($pedidoId),
            'Requestlist' => $this->modelprodu->visualizarItens($pedidoId),
            'numeroPedido' => $pedidoId

        ]);
    }

    //visualizarItens
    public function deletar($produtoId)
    {
        $produtoId = filter_var($produtoId, FILTER_SANITIZE_NUMBER_INT);


        $this->load('admin/deletarprodutos', [
            'listCategorias' => (new CategoriaModel())->lerCategoria(),
            'listMarcas' => (new MarcaModel())->lerMarcas(),
            'produtos' => $this->modelprodu->lerPorId($produtoId),
            'produtoId' => $produtoId
        ]);
    }


    private function getInputs()
    {

        $produtos = new Produtos();

        $produtos->setTitulo(filter_input(INPUT_POST, 'txtProduto', FILTER_SANITIZE_STRING));
        $produtos->setDescricao(filter_input(INPUT_POST, 'txtDescr', FILTER_SANITIZE_STRING));
        $produtos->setEstoque(filter_input(INPUT_POST, 'txtestoque', FILTER_SANITIZE_STRING));
        $produtos->setMarca(filter_input(INPUT_POST, 'selMarca', FILTER_SANITIZE_NUMBER_INT));
        $produtos->setCategoria(filter_input(INPUT_POST, 'selCategoria', FILTER_SANITIZE_NUMBER_INT));
        $produtos->setValor(filter_input(INPUT_POST, 'txtvalor', FILTER_SANITIZE_STRING));
        $produtos->setPeso(filter_input(INPUT_POST, 'txtpeso', FILTER_SANITIZE_STRING));
        $produtos->setImagem($this->uploadFile());
        return $produtos;
    }

    private function uploadFile()
    {
        $uploaddir = 'img_produtos/';
        $uploadfile = $uploaddir . basename($_FILES['imagePro']['name']);

        if (move_uploaded_file($_FILES['imagePro']['tmp_name'], $uploadfile)) {


            return $_FILES['imagePro']['name'];
        } else {

            return 'semFoto.png';
        }
    }
    /*----------------------------------------------*/
    public function inserir()
    {
        $produtos = $this->getInputs();

        $result = $this->modelprodu->inserir($produtos);
        header("Location: " . BASE . "admin");
    }
    public function alterar($produtoId)
    {
        $produtos = $this->getInputs();
        $produtos->SetId($produtoId);


        $result = $this->modelprodu->alterar($produtos);
        header("Location: " . BASE . "admin");
    }

    public function deleta($produtoId)
    {
        $produtos = $this->getInputs();
        $produtos->SetId($produtoId);
        $result = $this->modelprodu->deleta($produtos);
        header("Location: " . BASE . "admin");
    }

    private function validar(Produtos $produto, bool $validateId = true)
    {
        if ($validateId && $produto->getId() <= 0)
            return false;

        if (strlen($produto->getTitulo()) < 2)
            return false;

        if (strlen($produto->getDescicao()) < 2)
            return false;

        if (strlen($produto->getEstoque()) < 0)
            return false;
        if (strlen($produto->getMarca()) < 2)
            return false;
        if (strlen($produto->getCategoria()) < 2)
            return false;
        if (strlen($produto->getValor()) < 2)
            return false;
        if (strlen($produto->getPeso()) < 2)
            return false;
        if (strlen($produto->getImagem()) < 2)
            return false;

        return true;
    }
}
