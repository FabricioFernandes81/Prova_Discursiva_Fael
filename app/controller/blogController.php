<?php

namespace app\controller;

use app\core\controller;

class blogController extends controller
{
public function __construct()
{
    
}

public function index()
{
    $this->load('blog' );

}

}