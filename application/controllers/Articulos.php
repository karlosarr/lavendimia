<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Articulos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('articulos_model');
        $this->load->helper('url');
        $this->load->database('default');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view('template/header');
        $this->load->view('articulos');
        $this->load->view('template/footer');
    }

    public function setArticulo() {
        
    }

    public function getArticulo() {
        
    }
    
    public function show() {
        $articulos = $this->articulos_model->getArticulos();
        echo json_encode($articulos);
    }

}
