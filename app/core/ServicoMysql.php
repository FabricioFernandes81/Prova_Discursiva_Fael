<?php

namespace app\core;

use PDO;
use PDOException;

class ServicoMysql
{
  private $debug;
  private static $conexao;
  private $servidor;
  private $usuario;
  private $senhaDb;
  private $database;

  public function __construct()
  {
    //  Carrega Credenciais do Banco de Dados
    $this->debug = true;
    $this->servidor = DB_HOST;
    $this->usuario = DB_USUARIO;
    $this->senha = DB_SENHA;
    $this->database = NOME_DB;
  }

  public function getConexao()
  {
    try {
      if (self::$conexao == null) {
        self::$conexao = new PDO("mysql:host=localhost;dbname=comercio", "root", "");
      }
      return self::$conexao;
    } catch (PDOException $erro) {
      //  echo "<strong>ERRO DETECTADO:</strong></br>", $erro->getMessage();
      die();
    }
  }

  public function executarSql($sql, $params = null)
  {
    try {
      $stmt = $this->getConexao()->prepare($sql);
      $stmt->execute($params);

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
      if ($this->debug) {
      }

      die();
      return null;
    }
  }

  public function executarSqlRow($sql, $params = null)
  {
    try {
      $stmt = $this->getConexao()->prepare($sql);
      $stmt->execute($params);

      return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
      if ($this->debug) {
      }

      die();
      return null;
    }
  }

  public function executarNQuery($sql, $params = null)
  {
    try {

      $stmt = $this->getConexao()->prepare($sql);
      return $stmt->execute($params);
    } catch (PDOException $ex) {
    }
    die();
    return null;
  }

  public function getLastId()
  {
    return $this->getConexao()->lastInsertId();
  }
}
