<?php

namespace app\Model;

use app\core\ServicoMysql;

class CategoriaModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new ServicoMysql();
    }

    public function buscaCategorias(int $id)
    {

        $lista = ['teste' => 'tetetet'];
        //  return $lista;

    }

    public function lerCategoria()
    {
        $sql = 'Select * from categoria order  BY Id_Categoria ASC';
        $dt = $this->pdo->executarSql($sql);
        $lista = [];

        foreach ($dt as $row) {

            $lista[] = $this->colecao($row);
        }
        return $lista;
    }

    public function lerPorId(int $categoriaId)
    {
        $sql = 'Select *  from categoria  where Id_Categoria =:id';
        $dr = $this->pdo->executarSqlRow($sql, [
            ':id' => $categoriaId
        ]);


        return $this->colecao($dr);
    }

    private function colecao($tipo)
    {
        return (object)[

            'Id' => $tipo['Id_Categoria'] ?? null,
            'titulo' => $tipo['nome'] ?? null
        ];
    }

    /*------------------------------------------------------------------*/
    public function inserir(string $titulo)
    {
        $sql = 'INSERT INTO categoria (nome) VALUES 
        (:Categoria)';
        $params = [
            ':Categoria' => $titulo

        ];
        return $this->pdo->executarNQuery($sql, $params);
    }

    public function alterar(int $idCategoria, string $titulo)
    {
        $sql = 'Update categoria Set nome = :Produto WHERE Id_categoria = :Id';
        $params = [
            ':Id' => $idCategoria,
            ':Produto' => $titulo

        ];
        return $this->pdo->executarNQuery($sql, $params);
    }

    public function deletar(int $idCategoria)
    {
        $sql = 'Select * from Produtos where IdCategoria = :Id';
        $params = [
            ':Id' => $idCategoria
        ];

        if (!$this->pdo->executarSqlRow($sql, $params)) {
            $sql1 = 'DELETE FROM categoria where Id_Categoria =:Id';

            $params1 = [
                ':Id' => $idCategoria
            ];
            $this->pdo->executarSqlRow($sql1, $params1);
            return 1;
        } else {

            return 0;
        }
    }
}
