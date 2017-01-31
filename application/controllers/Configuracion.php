<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Configuracion
 *
 * @author karlo
 */
class Configuracion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('configuracion_model');
        $this->load->helper('url');
        $this->load->database('default');
        $this->load->library('form_validation');
    } 

    //put your code here
    public function index() {
        $data['configuracion'] = $this->configuracion_model->getConfiguracion();
        $this->load->view('template/header');
        $this->load->view('configuracion', $data);
        $this->load->view('template/footer');
    } 

    public function add() {
        $this->form_validation->set_rules('tasa_financiamiento', 'Tasa Financiamiento', 'required', 
                array('required' => 'Campo requerido %s.')
        );
        $this->form_validation->set_rules('enganche', 'Enganche', 'required', 
                array('required' => 'Campo requerido %s.')
        );
        $this->form_validation->set_rules('plazo_maximo', 'Plazo Máximo', 'required', 
                array('required' => 'Campo requerido %s.')
        );
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $configuracion = $this->input->post();
            $this->configuracion_model->setConfiguracion($configuracion);
            $this->index(); 
        }
    }

}
