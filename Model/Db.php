<?php

abstract class Db{
    const DB_URL = "LOCALHOST";
    const DB_NAME = "se";
    const DB_USERNAME = "root";
    const DB_PASSWORD = "";
    const DB_CHARSET = "charset=utf8";

    //const DB_CHARSET = "";

    private static $oPConn = null;
    protected $oConn;

    public function __construct($schema = "") {
    // set the PDO error mode to exception
        try {
            if (self::$oPConn == null) {
                self::$oPConn = new PDO("mysql:host=".self::DB_URL.";dbname=".self::DB_NAME.';charset=utf8', self::DB_USERNAME,  self::DB_PASSWORD);
                self::$oPConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            }

    $this->oConn = self::$oPConn;

        } catch (PDOException $ex) {
            echo "Não foi possível realizar a conexão com o banco de dados!";
            exit;
        } catch (Exception $ex) {
            echo "Houve uma falha desconhecida!";
            exit;
        }
    }

    public abstract function inserir($o);

    public abstract function alterar($o);

    public abstract function excluir($o);

    public abstract function obter($o = null);

    public abstract function obterPorPk($o);
}
?>
