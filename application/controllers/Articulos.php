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

    public function agregar() {

        $ultimoRegistro = $this->articulos_model->ultimoRegistro();
        $idarticulos = sprintf('%04d', $ultimoRegistro[0]->idarticulos + 1);
        $data["codigo"] = $idarticulos;
        $this->load->view('template/header');
        $this->load->view('articulos_agregar', $data);
        $this->load->view('template/footer');
    }

    public function add() {
        $this->form_validation->set_rules('descripcion', 'Descripción', 'required', array('required' => 'Campo requerido %s.')
        );
        $this->form_validation->set_rules('precio', 'Precio', 'required', array('required' => 'Campo requerido %s.')
        );
        $this->form_validation->set_rules('existencia', 'Existencia', 'required', array('required' => 'Campo requerido %s.')
        );
        if ($this->form_validation->run() == FALSE) {
            $this->agregar();
        } else {
            $articulo = $this->input->post();
            $this->articulos_model->setArticulo($articulo);
            $this->index();
        }
    }

    public function editar() {
        $ultimoRegistro = $this->articulos_model->ultimoRegistro();
        $data["codigo"] = sprintf('%04d', $ultimoRegistro[0]->idarticulos);
         $idArticulo = $this->input->get();

        $articulo = $this->clientes_model->getCliente($idArticulo['idarticulos']);
        $data["articulo"] = $articulo;
        $this->load->view('template/header');
        $this->load->view('clientes_editar', $data);
        $this->load->view('template/footer');
    }
    public function update() {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required', array('required' => 'Campo requerido %s.')
        );
        $this->form_validation->set_rules('apellido_paterno', 'Apellido Paterno', 'required', array('required' => 'Campo requerido %s.')
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
        $articulos = $this->articulos_model->getArticulos();
        $articulosJson = array();
        foreach ($articulos as $key => $value) {
            $editar = "<a href=\"articulos/editar?idarticulos=$value->idarticulos\" class=\"glyphicon glyphicon-pencil\"></a>";
            $idarticulos = sprintf('%04d', $value->idarticulos);
            $articulosJson[$key] = array(
                'idarticulos' => $idarticulos,
                'descripcion' => $value->descripcion,
                'editar' => "$editar"
            );
        }
        echo json_encode($articulosJson);
    }

}
