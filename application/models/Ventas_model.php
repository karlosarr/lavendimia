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
        $this->db->insert('venta', $venta);
    }

    public function guardarDetalleVenta($idventa, $detalle) {
        $detalleVenta = array();
        foreach ($detalle as $key => $value) {
            $detalleVenta = array(
                'venta_idventa' => $idventa,
                'articulos_idarticulos' => $value['id'],
                'cantidad' => $value['cantidad'],
                'importe' => $value['importe']
            );
            $this->db->insert('detalles_venta', $detalleVenta);
        }
        
    }

    public function getDetallesVenta($idventa) {
        $this->db->select('venta.idventa, articulos.modelo, venta.fecha_registro, CONCAT_WS(\' \',clientes.nombre, clientes.apellido_parterno, clientes.apellido_materno) AS nombre, detalles_venta.cantidad, detalles_venta.importe');
        $this->db->from('detalles_venta');
        $this->db->join('venta', 'detalles_venta.venta_idventa = venta.idventa');
        $this->db->join('articulos', 'articulos.idarticulos = detalles_venta.articulos_idarticulos');
        $this->db->join('clientes', 'clientes.idclientes = venta.clientes_idclientes');
        $this->db->where('detalles_venta.venta_idventa', $idventa);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

}
