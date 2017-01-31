<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getConfiguracion() {
        $this->db->select('idconfiguraciones, tasa_financiamiento, enganche,
            plazo_maximo, fecha_actualizacion');
        $this->db->from('configuraciones');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function setConfiguracion($configuracion) {
        $configuracionActual = $this->getConfiguracion();
        if (empty($configuracionActual)) {
            $this->db->insert('configuraciones', $configuracion);
        } else {
            $configuracion['fecha_actualizacion'] = 'CURRENT_TIMESTAMP'; 
            $this->db->where('idconfiguraciones', $configuracionActual[0]->idconfiguraciones);
            $this->db->update('configuraciones', $configuracion);
        }
    }

}
