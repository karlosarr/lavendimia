<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Clientes_model
 *
 * @author karlo
 */
class Clientes_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getClientes() {
        $this->db->select('idclientes, nombre, apellido_parterno, apellido_materno, rfc');
        $this->db->from('clientes');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function getCliente($idCliente) {
        $this->db->select('idclientes, nombre, apellido_parterno, apellido_materno, rfc');
        $this->db->from('clientes');
        $this->db->where('idclientes', $idCliente);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function setCliente($articulo) {
        $this->db->insert('clientes', $articulo);
    }

    public function ultimoRegistro() {
        $this->db->select_max('idclientes');
        $this->db->from('clientes');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function update($articulo) {
        $acticuloEditar = array(
            'nombre' => $articulo['nombre'],
            'apellido_parterno' => $articulo['apellido_parterno'],
            'apellido_materno' => $articulo['apellido_materno'],
            'rfc' => $articulo['rfc']
        );
        $this->db->where('idclientes', $articulo['idclientes']);
        $this->db->update('clientes', $acticuloEditar);
    }

    public function buscarCliente($nombre) {
        $this->db->select('idclientes, nombre, apellido_parterno, apellido_materno, rfc');
        $this->db->from('clientes');
        $this->db->or_like('nombre', $nombre);
        $this->db->or_like('apellido_parterno', $nombre);
        $this->db->or_like('apellido_materno', $nombre);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

}
