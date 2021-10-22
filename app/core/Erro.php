<?php

namespace app\core;

class Erro
{

    const _ERRO_ = 'error';

    private static $instancia = null;

    private function __construct()
    {
    }

    public static function getInstancia()
    {
        if (is_null(self::$instancia)) {
            self::$instancia = new Erro();
        }
        return self::$instancia;
    }

    public function set($mens)
    {
        $_SESSION[self::_ERRO_] = $mens;
    }

    public function get()
    {


        if (isset($_SESSION[self::_ERRO_]) && $_SESSION[self::_ERRO_] != "") {
            $flash = $_SESSION[self::_ERRO_];
            unset($_SESSION[self::_ERRO_]);

            return $flash;
        }
    }
}
