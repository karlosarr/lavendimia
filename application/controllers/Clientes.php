<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Clientes
 *
 * @author karlo
 */
class Clientes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('clientes_model');
        $this->load->helper('url');
        $this->load->database('default');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view('template/header');
        $this->load->view('clientes');
        $this->load->view('template/footer');
    }

    public function agregar() {

        $ultimoRegistro = $this->clientes_model->ultimoRegistro();
        $idclientes = sprintf('%04d', $ultimoRegistro[0]->idclientes + 1);
        $data["codigo"] = $idclientes;
        $this->load->view('template/header');
        $this->load->view('clientes_agregar', $data);
        $this->load->view('template/footer');
    }

    public function add() {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required', array('required' => 'Campo requerido %s.')
        );
        $this->form_validation->set_rules('apellido_parterno', 'Apellido Paterno', 'required', array('required' => 'Campo requerido %s.')
        );
        $this->form_validation->set_rules('apellido_materno', 'Apellido Materno', 'required', array('required' => 'Campo requerido %s.')
        );
        $this->form_validation->set_rules('rfc', 'RFC', 'required', array('required' => 'Campo requerido %s.')
        );
        if ($this->form_validation->run() == FALSE) {
            $this->agregar();
        } else {
            $cliente = $this->input->post();
            $this->clientes_model->setCliente($cliente);
            $this->index();
        }
    }

    public function editar() {
        $ultimoRegistro = $this->clientes_model->ultimoRegistro();
        $data["codigo"] = sprintf('%04d', $ultimoRegistro[0]->idclientes);
        $idClientes = $this->input->get();

        $articulo = $this->clientes_model->getCliente($idClientes['idclientes']);
        $data["cliente"] = $articulo;
        $this->load->view('template/header');
        $this->load->view('clientes_editar', $data);
        $this->load->view('template/footer');
    }

    public function update() {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required', array('required' => 'Campo requerido %s.')
        );
        $this->form_validation->set_rules('apellido_parterno', 'Apellido Paterno', 'required', array('required' => 'Campo requerido %s.')
        );
        $this->form_validation->set_rules('apellido_materno', 'Apellido Materno', 'required', array('required' => 'Campo requerido %s.')
        );
        $this->form_validation->set_rules('rfc', 'RFC', 'required', array('required' => 'Campo requerido %s.')
        );
        if ($this->form_validation->run() == FALSE) {
            $this->editar();
        } else {
            $articulo = $this->input->post();
            $this->clientes_model->update($articulo);
            $this->index();
        }
    }

    public function show() {
        $clientes = $this->clientes_model->getClientes();
        $clientesJson = array();
        foreach ($clientes as $key => $value) {
            $editar = "<a href=\"clientes/editar?idclientes=$value->idclientes\" class=\"glyphicon glyphicon-pencil\"></a>";
            $idarticulos = sprintf('%04d', $value->idclientes);
            $nombre = "$value->nombre $value->apellido_parterno $value->apellido_materno";
            $clientesJson[$key] = array(
                'idclientes' => $idarticulos,
                'nombre' => $nombre,
                'editar' => "$editar"
            );
        }
        echo json_encode($clientesJson);
    }
    
    public function buscar() {
        $nombre = $this->input->get();
        $clientes = $this->clientes_model->buscarCliente($nombre['query']);
        $clientesJson = array();
        foreach ($clientes as $key => $value) {
            $nombre = "$value->nombre $value->apellido_parterno $value->apellido_materno - $value->rfc";
            $clientesJson[$key] = array(
                'id' => $value->idclientes,
                'label' => $nombre,
		'rfc' => $value->rfc
            );
        }
        echo json_encode($clientesJson);
    }

}
