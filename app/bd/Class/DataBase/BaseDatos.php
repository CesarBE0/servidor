<?php
namespace Class\DataBase;
use mysqli;
use mysqli_sql_exception;

class BaseDatos {
    private static ?BaseDatos $instance=null;
    private string $user;
    private string  $password;
    private string  $host;
    private string  $database;
    private mysqli $con;

    private function __construct() {
        $this->user=$_ENV['DB_USER'];
        $this->password=$_ENV['PASSWORD'];
        $this->host=$_ENV['HOST'];
        $this->database=$_ENV['DATABASE'];
        try {
            $this->con = new mysqli($this->host, $this->user, $this->password, $this->database);
        }catch (mysqli_sql_exception $e){
            die("ERROR Conectando".$e->getMessage());

        }
    }
    public static function getInstance(): BaseDatos {
        if(self::$instance==null)
            self::$instance=new BaseDatos();
        return self::$instance;
    }

    public function getAllTables():array{
        $sentencia = "show tables";
        $res = $this->con->query($sentencia);
        $fila = $res->fetch_row();
        $tables = [];

        while ($fila) {
            $tables[] = $fila[0];
            $fila = $res->fetch_row();
        }
        return $tables;
    }

    /**
     * @param string $table
     * @return array
     */
    public function getContentTable(string $table):array{
        $filas = [];
        $sentencia = "select * from $table";
        $res = $this->con->query($sentencia);

        $fila = $res->fetch_row();
        while ($fila) {
            $filas[] = $fila;
            $fila = $res->fetch_row();
        }
        return $filas;
    }

    public function getFieldName(string $table):array
    {
        $campos = [];
        $sentencia = "SHOW COLUMNS FROM $table";
        $res = $this->con->query($sentencia);

        while($fila = $res->fetch_assoc()){
            $campos[] = $fila['Field'];
        }
        return $campos;
    }

}