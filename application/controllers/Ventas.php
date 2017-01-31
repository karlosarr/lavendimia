<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ventas
 *
 * @author karlo
 */
class Ventas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ventas_model');
        $this->load->helper('url');
        $this->load->database('default');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view('template/header');
        $this->load->view('ventas');
        $this->load->view('template/footer');
    }

}
