<?php
defined('ROOT') or exit('No direct script access allowed');

class Model{

    protected $db;

    public function __construct(){
        $this->db = App::$db;
    }

}