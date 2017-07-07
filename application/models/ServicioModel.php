<?php
/**
* Servicio Model. Mantiene la comunicación con la bd y tabla de servicios
 */
class ServicioModel extends CI_Model {

    public $id;
    public $nombre;
    public $descripcion;
    public $visible;
    public $precio;

    /**
     * Método para listar todos los servicios visibles
     *
     * @return array
     */
    public function listar() {
        $servicios = $this->db
            ->select("id, nombre, descripcion, visible, precio")
            ->from("servicios")
            ->where("visible", 1)
            ->get()
            ->result("ServicioModel");

        return $servicios;
    }
}