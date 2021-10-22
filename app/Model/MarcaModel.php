<?php

namespace app\Model;

use app\core\ServicoMysql;

class MarcaModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new ServicoMysql();
    }


    public function lerMarcas()
    {

        $sql = 'Select * from marca order BY Id_Marca ASC';
        $dt = $this->pdo->executarSql($sql);
        $lista = [];

        foreach ($dt as $row) {
            $lista[] = $this->colecao($row);
        }
        return $lista;
    }

    private function colecao($tipo)
    {
        return (object)[

            'Id' => $tipo['Id_Marca'] ?? null,
            'titulo' => $tipo['nome'] ?? null
        ];
    }

    public function lerPorId(int $idMarca)
    {
        $sql = 'Select *  from marca  where Id_Marca =:id';
        $dr = $this->pdo->executarSqlRow($sql, [
            ':id' => $idMarca
        ]);


        return $this->colecao($dr);
    }
    /*------------------------------------------------------------------*/
    public function inserir(string $titulo)
    {
        $sql = 'INSERT INTO marca (nome) VALUES 
        (:Marca)';
        $params = [
            ':Marca' => $titulo

        ];
        return $this->pdo->executarNQuery($sql, $params);
    }

    public function alterar(int $idMarca, string $titulo)
    {
        $sql = 'Update marca Set nome = :Marca WHERE Id_Marca = :Id';
        $params = [
            ':Id' => $idMarca,
            ':Marca' => $titulo

        ];
        return $this->pdo->executarNQuery($sql, $params);
    }

    public function deletar(int $idMarca)
    {
        $sql = 'Select * from produtos where IdMarca = :Id';
        $params = [
            ':Id' => $idMarca
        ];

        if (!$this->pdo->executarSqlRow($sql, $params)) {
            $sql1 = 'DELETE FROM marca where Id_Marca = :Id';
            //$sql1 = 'Delete * from categoria where Id_Categoria = :Id';
            $params1 = [
                ':Id' => $idMarca
            ];
            $this->pdo->executarSql($sql1, $params1);
            return 1;
        } else {

            return 0;
        }
    }
}
