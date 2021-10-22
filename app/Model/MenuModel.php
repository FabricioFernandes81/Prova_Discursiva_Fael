<?php

namespace app\Model;

use app\core\ServicoMysql;
use app\Funcoes\produtos;

class MenuModel
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = new ServicoMysql();
    }

    public function visualizarMenu()
    {
        $sql = 'Select * from categoria ORDER BY nome DESC';
        $dt = $this->pdo->executarSql($sql);

        $lista = [];
        foreach ($dt as $dr)
            $lista[] = $this->collection1($dr);

        //  LogSys($lista);
        return $lista;
    }

    private function collection1($arr)
    {
        return (object) [
            'Id'     => $arr['Id_Categoria'] ?? null,
            'Categoria' => $arr['nome'] ?? null


        ];
    }
}
