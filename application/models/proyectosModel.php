<?php

class ProyectosModel extends CI_Model {
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function creaProyecto($nom, $desc, $hab, $id)
    {
        try {
            $data = array(
                    'nombreTrabajo' => $nom,
                    'Descripcion' => $desc,
                    'Habilitado' => $hab,
                    'idSupervisor' => $id
                );
            $this->db->insert('trabajos', $data);
            return 1;
        } catch (Exception $ex) {
            return 0;
        }
    }
    
    public function consultarTodo()
    {
        $this->db->select('*');
        $this->db->from('trabajos');
        $this->db->join('usuarios', 'usuarios.idUsuarios = trabajos.idSupervisor');
        
        $query = $this->db->get();
        
        return $query;
    }
    
    public function consultarProyectosSupervisor($idSupervisor)
    {
        $this->db->select('*');
        $this->db->from('trabajos');
        $this->db->join('usuarios', 'usuarios.idUsuarios = trabajos.idSupervisor');
        $this->db->where('idSupervisor', $idSupervisor);
        
        $query = $this->db->get();
        
        return $query;
    }
    
    public function consultaTrabajadores()
    {
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('idTipo !=', 1);
        $this->db->where('idTipo !=', 2);
        $query = $this->db->get();
        
        return $query;
    }
    
    public function cuentaProyectos($idUsuario)
    {
         $this->db->from('usuariotrabajo');
         $this->db->where('idUsuario', $idUsuario);
         $total = $this->db->count_all_results();
         
         return $total;
    }
    
    public function asignarProyecto($proyecto, $trabajador)
    {
        $total = $this->cuentaProyectos($trabajador);
        try {
            if($total <= 5) {
                $data = array(
                            'idTrabajos' => $proyecto,
                            'idUsuario' => $trabajador
                        );
                $this->db->insert('usuariotrabajo', $data);
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $ex) {
            return -1;
        }
    }

}

?>