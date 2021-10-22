<?php

namespace app\controller;

use app\core\controller;
use app\Model\CategoriaModel;

class categoriaController extends controller
{

    private $categoriaModel;

    public function __construct()
    {

        $this->categoriaModel = new CategoriaModel();
    }


    public function index()
    {

        $id  = filter_input(INPUT_POST, 'verCategoria', FILTER_SANITIZE_STRING);

        if ($id == 0) {
            echo "ERRo Encontrado";
        } else {

            $this->Mensagem(
                'Erro',
                'Houve um erro, tente novamente mais tarde',
                'index'
            );
            return;
            /* $this->load('categoria', [
                'listagemCategorias' => $this->categoriaModel->buscaCategorias($id)
            ]);*/
        }
    }

    public function admin()
    {
        $this->load('admin/listCategoria', [
            'listCategorias' => $this->categoriaModel->lerCategoria()
        ]);
    }

    public function editar($categoriaId)
    {
        $categoriaId = filter_var($categoriaId, FILTER_SANITIZE_NUMBER_INT);
        $this->load('admin/editCategoria', [
            'Categoria' => $this->categoriaModel->lerPorId($categoriaId),
            'categoriaId' => $categoriaId
        ]);
    }

    public function deletar(int $categoriaId)
    {
        $categoriaId = filter_var($categoriaId, FILTER_SANITIZE_NUMBER_INT);
        $this->load('admin/deletarCategoria', [
            'Categoria' => $this->categoriaModel->lerPorId($categoriaId),
            'categoriaId' => $categoriaId
        ]);
    }
    public function cadastrar()
    {
        $this->load('admin/addCategoria');
    }

    public function insere()
    {
        $titulo = filter_input(INPUT_POST, 'txtCategoria', FILTER_SANITIZE_STRING);
        $result = $this->categoriaModel->inserir($titulo);
        header("Location: " . BASE . "categoria/admin");
    }

    public function alterar($idCategoria)
    {
        $categoriaId = filter_var($idCategoria, FILTER_SANITIZE_NUMBER_INT);
        $titulo = filter_input(INPUT_POST, 'txtCategoria', FILTER_SANITIZE_STRING);



        $result = $this->categoriaModel->alterar($idCategoria, $titulo);
        header("Location: " . BASE . "categoria/admin");
    }

    public function deleta($idCategoria)
    {

        $idCategoria = filter_var($idCategoria, FILTER_SANITIZE_NUMBER_INT);
        $result = $this->categoriaModel->deletar($idCategoria);

        $result = $this->categoriaModel->deletar($idCategoria);


        header("Location: " . BASE . "categoria/admin");
    }
}
