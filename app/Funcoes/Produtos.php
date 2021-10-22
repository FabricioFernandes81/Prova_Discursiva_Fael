<?php

namespace app\Funcoes;


class Produtos
{
    private $id;
    private $titulo;
    private $descricao;
    private $estoque;
    private $marca;
    private $categoria;
    private $valor;
    private $peso;
    private $imagem;
    private $quantidade;

    public function SetId($id)
    {

        $this->id = $id;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function setEstoque($estoque)
    {
        $this->estoque = $estoque;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function setPeso($peso)
    {
        $this->peso = $peso;
    }
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }
    public function getDescicao()
    {
        return $this->descricao;
    }
    public function getEstoque()
    {
        return $this->estoque;
    }
    public function getMarca()
    {
        return $this->marca;
    }
    public function getCategoria()
    {
        return $this->categoria;
    }
    public function getValor()
    {
        return $this->valor;
    }

    public function getPeso()
    {
        return $this->peso;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }
}
