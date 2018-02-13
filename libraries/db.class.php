<?php
defined('ROOT') or exit('No direct script access allowed');

class DB{

    protected $pdo;

    public function __construct($host, $user, $password, $db_name, $charset){
	    $dsn = "mysql:host=$host;dbname=$db_name;charset=$charset";
	    $opt = [
		    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		    PDO::ATTR_EMULATE_PREPARES   => false,
	    ];
	    $this->pdo = new PDO($dsn, $user, $password, $opt);
    }

    public function query($sql, $data = array(), $insert = FALSE){
        if ( !$this->pdo ){
            return false;
        }

	    $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute($data);

	    return $insert ? $res : $stmt;
    }

	public function pdoSet($allowed, &$values, $source = array()) {
		$set = '';
		$values = array();
		foreach ($allowed as $field) {
			if (isset($source[$field])) {
				$set.="`".str_replace("`","``",$field)."`". "=:$field, ";
				$values[$field] = $source[$field];
			}
		}
		return substr($set, 0, -2);
	}

}