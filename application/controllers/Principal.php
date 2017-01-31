<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Principal
 *
 * @author karlo
 */
class Principal extends CI_Controller {

    //put your code here
    public function index() {
        $this->load->view('template/header');
        $this->load->view('inicio');
        $this->load->view('template/footer');
    }

}
