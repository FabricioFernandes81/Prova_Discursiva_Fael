<?php

namespace app\Funcoes;

class Pedidos
{

    private $id;
    private $cliNome;
    private $cliSobr;
    private $cliEmail;
    private $clipagam;
    private $cep;
    private $valorFrete;
    private $totalPedido;
    private $data;

    public function SetId($id)
    {
        $this->id = $id;
    }

    public function SetCliNome($cliNome)
    {
        $this->cliNome = $cliNome;
    }

    public function SetCliSobr($cliSobr)
    {
        $this->cliSobr = $cliSobr;
    }

    public function SetCliEmail($cliEmail)
    {
        $this->cliEmail = $cliEmail;
    }

    public function SetCliPgt($formaPgt)
    {
        $this->clipagam =  $formaPgt;
    }

    public function SetCliCep($cep)
    {
        $this->cep =  $cep;
    }
    public function SetCliValoFre($valorFrete)
    {
        $this->valorFrete =  $valorFrete;
    }
    public function SetCliTotalPed($totalpedido)
    {
        $this->totalPedido =  $totalpedido;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getCliNome()
    {
        return $this->cliNome;
    }

    public function getSobr()
    {
        return $this->cliSobr;
    }
    public function getCliEmail()
    {
        return $this->cliEmail;
    }
    public function getCliPgt()
    {
        return $this->clipagam;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function getCliVlrFrete()
    {
        return $this->valorFrete;
    }
    public function getCliVlrPedido()
    {
        return $this->totalPedido;
    }

    public function getData()
    {
        return $this->data;
    }
}
