<?php

namespace app\controller;

use app\core\controller;

class ofertasController extends controller
{
public function __construct()
{
    
}

public function index()
{
    $this->load('ofertas' );

}

}