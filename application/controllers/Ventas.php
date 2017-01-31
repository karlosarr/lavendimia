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
        $this->load->model('clientes_model');
        $this->load->model('articulos_model');
        $this->load->model('configuracion_model');
        $this->load->helper('url');
        $this->load->database('default');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view('template/header');
        $this->load->view('ventas');
        $this->load->view('template/footer');
    }

    public function show() {
        $ventas = $this->ventas_model->getVentas();
        $ventasJson = array();
        foreach ($ventas as $key => $value) {
            $idarticulos = sprintf('%04d', $value->idventa);
            $idclientes = sprintf('%04d', $value->idclientes);
            $nombre = "$value->nombre $value->apellido_parterno $value->apellido_materno";
            $ventasJson[$key] = array(
                'idventa' => $idarticulos,
                'idclientes' => $idclientes,
                'nombre' => $nombre,
                'total' => $value->total,
                'fecha_registro' => $value->fecha_registro,
                'status' => $value->status
            );
        }
        echo json_encode($ventasJson);
    }

    public function agregar() {
        $ultimoRegistro = $this->ventas_model->ultimoRegistro();
        $idventa = sprintf('%04d', $ultimoRegistro[0]->idventa + 1);
        $data["codigo"] = $idventa;
        $data["configuracion"] = $this->cargarConfiguraciones();
        $this->load->view('template/header');
        $this->load->view('ventas_agregar', $data);
        $this->load->view('template/footer');
    }

    public function cargarConfiguraciones() {
        $configuracion = $this->configuracion_model->getConfiguracion();
        return $configuracion[0];
    }

    public function add() {
        $post = $this->input->post();
        $this->ventas_model->guardarVenta($post);
        $this->index();
    }

}
