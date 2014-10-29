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
                    'Nombre' => $nom,
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
        $this->db->order_by('idTrabajos', "desc");
        
        $query = $this->db->get();
        
        return $query;
    }
    
    public function consultarProyectosSupervisor($idSupervisor)
    {
        $this->db->select('*');
        $this->db->from('trabajos');
        //$this->db->join('usuarios', 'usuarios.idUsuarios = trabajos.idSupervisor');
        $this->db->where('idSupervisor', $idSupervisor);
        
        $query = $this->db->get();
        
        return $query;
    }
    
    public function consultaTrabajadores($id)
    {
        //$query = "SELECT idUsuario FROM usuariotrabajo GROUP BY idUsuario HAVING COUNT(*) >= 5 ORDER BY idUsuario";
        //$resultado = $this->db->query($query);
        $this->db->where('idUsuarios !=', $id);
        $resultado = $this->db->get('usuarios');
        
        return $resultado;
    }
    
    public function menoresCinco($resultado, $id) {
        if($resultado->num_rows() > 0) {
            $aux = "WHERE ";
            foreach($resultado->result() as $row) {
                $aux .= "idUsuarios != ".$row->idUsuario." OR ";
            }
            $aux .= "idUsuarios != 0";
            
            $query = "SELECT * FROM usuarios ".$aux;
            $resultado = $this->db->query($query);
            
            return $resultado;
        }
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
    
    public function buscarProyecto($idProyecto)
    {
        $this->db->where('idTrabajos', $idProyecto);
        $this->db->from('trabajos');
        $resultado = $this->db->get();
        
        return $resultado;
    }
    
    public function eliminaProyecto($idProyecto)
    {
        $this->db->where('idTrabajos', $idProyecto);
        try {
            $this->db->delete('trabajos');
            return 1;
        } catch (Exception $ex) {
            return 0;
        }
    }
    
    public function getProyectos($id, $flag)
    {
        $notIn = $this->buscarIn($this->session->userdata('id'));
        $cont = count($notIn);
        if($cont > 0) {
            if($flag == 1) {
                $this->db->where('idArea', $id);
                foreach($notIn->result() as $row) {
                    $this->db->where('idTrabajos != ', $row->idTrabajos);
                }
                $this->db->group_by('idTrabajos');
                $resultado = $this->db->get('trabajoarea');    
            } else if($flag == 2) {
                $this->db->where('idCompetencias', $id);
                foreach($notIn->result() as $row) {
                    $this->db->where('idTrabajos != ', $row->idTrabajos);
                }
                $this->db->group_by('idTrabajos');
                $resultado = $this->db->get('trabajocompetencia');
            }
        }
        
        return $resultado;
    }
    
    public function buscarIn($id)
    {
        $this->db->where('idUsuario', $id);
        $resultado = $this->db->get('usuariotrabajo');
        
        return $resultado;
    }
    
    public function getProyectosData($idTrabajo)
    {
        $this->db->where('idTrabajos', $idTrabajo);
        $resultado = $this->db->get('trabajos');
        
        return $resultado;
    }
    
    public function getSupervisor($idProyecto)
    {
        $this->db->where('idTrabajos', $idProyecto);
        $resultado = $this->db->get('trabajos');
        
        $row = $resultado->row();
        $idSupervisor = $row->idSupervisor;
        
        return $idSupervisor;
    }
    
    public function addRequest($idProyecto, $idUser, $idSupervisor, $value)
    {
        $data = array(
                  'idProyecto'      => $idProyecto,
                  'idUsuario'       => $idUser,
                  'idSupervisor'    => $idSupervisor,
                  'status'          => $value
                );
        
        try {
            $this->db->insert('requests', $data);
            return 1;
        } catch (Exception $ex) {
            return 0;
        }
    }
    
    public function getAllProjects($idUser)
    {
        $this->db->where('idSupervisor', $idUser);
        $resultado = $this->db->get('trabajos');
        
        return $resultado;
    }
    
    public function getAllRequests($idUser)
    {
        $this->db->where('idSupervisor', $idUser);
        $this->db->where('status', 1);
        $resultado = $this->db->get('requests');
        
        return $resultado;
    }
    
    public function addUser($idProyecto, $idUsuario)
    {
        $data = array(
                'idTrabajos'    => $idProyecto,
                'idUsuario'     => $idUsuario
            );
        
        try {
            $this->db->insert('usuariotrabajo', $data);
            return 1;
        } catch (Exception $ex) {
            return 0;
        }
    }
    
    public function updateRequest($idRequest, $flag) 
    {
        if($flag == 1) {
            $data = array(
                'status'    => 2
            );
        }
        $this->db->where('idrequests', $idRequest);
        try {
            $this->db->update('requests', $data);
            return 1;
        } catch (Exception $ex) {
            return 0;
        }
    }
    
    public function insertaAreas($idArea, $idTrabajos)
    {
        $data = array(
                'idTrabajos'    => $idTrabajos,
                'idArea'        => $idArea
            );
        try {
            $this->db->insert('trabajoarea', $data);
            return 1;
        } catch (Exception $ex) {
            return 0;
        }
    }
    
    public function insertaCompetencias($idCompetencia, $idTrabajos)
    {
        $data = array(
                'idTrabajos'    => $idTrabajos,
                'idCompetencias'        => $idCompetencia
            );
        try {
            $this->db->insert('trabajocompetencia', $data);
            return 1;
        } catch (Exception $ex) {
            return 0;
        }
    }
}

?>