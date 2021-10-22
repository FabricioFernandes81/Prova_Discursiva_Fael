<?php

namespace app\core;

use app\Model\CarrinhoModel;

class Controller
{


  protected function load(string $view, $params = [])
  {
    $twig = new \Twig\Environment((new \Twig\Loader\FilesystemLoader('../app/view/')),
      ['debug' => false]
    );
    //$twig->addExtension(new \Twig\Extension\DebugExtension());

    $twig->addGlobal('BASE', BASE);

    echo $twig->render($view . '.twig.php', $params);
  }

  protected function verificarCart()
  {
    $this->CarrinhoModel = new CarrinhoModel();

    $this->load('partes/checkCart', [
      'Quantidade' => $this->CarrinhoModel->QdtProdutos()

    ]);
  }
  protected function Mensagem(string $titulo, string $mensagem, string $uri, int $http = 200)
  {
    http_response_code($http);
    $this->load('partes/mensagem', [
      'titulo' => $titulo,
      'mensagem' => $mensagem,
      'uri' => $uri
    ]);
  }
}
