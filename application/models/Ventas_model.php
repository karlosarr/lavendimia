<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ventas_model
 *
 * @author karlo
 */
class Ventas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getVentas() {
        $this->db->select('venta.idventa, venta.status, venta.fecha_registro, venta.total, clientes.idclientes, clientes.nombre, clientes.apellido_parterno, clientes.apellido_materno');
        $this->db->from('venta');
        $this->db->join('clientes', 'clientes.idclientes = venta.clientes_idclientes');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function ultimoRegistro() {
        $this->db->select_max('idventa');
        $this->db->from('venta');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function guardarVenta($venta) {
        var_dump($venta);
        $this->db->insert('venta', $venta);
    }

}
