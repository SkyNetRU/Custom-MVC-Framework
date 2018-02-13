<?php
defined('ROOT') or exit('No direct script access allowed');

class Controller{

    protected $data;

    protected $model;

    protected $params;

    /**
     * @return mixed
     */
    public function getData(){
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getModel(){
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getParams(){
        return $this->params;
    }

    public function __construct($data = array())
    {
	    $this->data   = $data;
	    $this->params = App::getRouter()->getParams();
    }

    public function cleanPost($post){
    	    return htmlspecialchars(strip_tags(trim($post)));
    }

}