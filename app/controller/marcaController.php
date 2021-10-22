<?php

namespace app\controller;

use app\core\controller;
use app\Model\MarcaModel;

class marcaController extends controller
{
    private $marcaModel;

    public function __construct()
    {
        $this->marcaModel = new MarcaModel();
    }


    public function index()
    {
    }
    public function admin()
    {

        $this->load('admin/listMarca', [
            'marcalist' => $this->marcaModel->lerMarcas()
        ]);
    }
    public function cadastrar()
    {
        $this->load(
            'admin/addMarca',
            [
                'tipo' => 'Adicionar',
                'uri' => 'insere'
            ]
        );
    }

    public function editar($idMarca)
    {
        $marcaId = filter_var($idMarca, FILTER_SANITIZE_NUMBER_INT);
        $this->load('admin/addMarca', [
            'Marcas' => $this->marcaModel->lerPorId($marcaId),
            'tipo' => 'Editar',
            'uri' => 'alterar',
            'categoriaId' => $idMarca
        ]);
    }
    public function deletar($idMarca)
    {
        $marcaId = filter_var($idMarca, FILTER_SANITIZE_NUMBER_INT);
        $this->load('admin/addMarca', [
            'Marcas' => $this->marcaModel->lerPorId($idMarca),
            'tipo' => 'Deletar',
            'uri' => 'deleta',
            'categoriaId' => $idMarca
        ]);
    }

    public function insere()
    {
        $titulo = filter_input(INPUT_POST, 'txtMarca', FILTER_SANITIZE_STRING);
        $result = $this->marcaModel->inserir($titulo);
        header("Location: " . BASE . "marca/admin");
    }

    public function alterar()
    {
        $marcaId = filter_input(INPUT_POST, 'txtId', FILTER_SANITIZE_STRING);
        $titulo = filter_input(INPUT_POST, 'txtMarca', FILTER_SANITIZE_STRING);
        $result = $this->marcaModel->alterar($marcaId, $titulo);
        header("Location: " . BASE . "marca/admin");
    }

    public function deleta()
    {
        $marcaId = filter_input(INPUT_POST, 'txtId', FILTER_SANITIZE_STRING);
        $titulo = filter_input(INPUT_POST, 'txtMarca', FILTER_SANITIZE_STRING);
        $result = $this->marcaModel->deletar($marcaId, $titulo);
        header("Location: " . BASE . "marca/admin");
    }
}
