<?php
namespace app\controller;
use app\core\controller;
use app\Model\MenuModel;

class notificaController extends Controller {

private $menuModel;
Public function __construct()
{
    $this->menuModel = new MenuModel();
}


public function index()
{

}

public function m()
{

    $this->load('notifica', [
        'listamenus' => $this->menuModel->visualizarMenu()
    ]);
 
    
}



}
