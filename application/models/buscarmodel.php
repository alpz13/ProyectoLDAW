<?php

class BuscarModel extends CI_Model {
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function searchAllUsuarios($search)
    {
        $this->db->like('Nombre', $search);
        $this->db->or_like('APaterno', $search);
        $this->db->or_like('AMaterno', $search);
        $resultado = $this->db->get('usuarios');
        if($resultado->num_rows() > 0) {
            return $resultado;
        } else {
            return 0;
        }
    }
    
    public function searchAllProjects($search)
    {
        $this->db->like('Nombre', $search);
        $this->db->or_like('Descripcion', $search);
        $resultado = $this->db->get('trabajos');
        if($resultado->num_rows() > 0) {
            return $resultado;
        } else {
            return 0;
        }
    }
    
    //*************Busca todos los usuarios con el área o la competencia buscada//***********
    //***************************************************************************************
    public function searchAllUsuarioAC($search) 
    {
        $areas = $this->getAreasSearch($search);
        $competencias = $this->getCompetenciasSearch($search);
        $i = 0;
        $data = array();
        //echo "areas: ".$areas."\n competencias: ".$competencias;
        if(!is_numeric($areas)) {
            $resultadoAreas = $this->getUserAreas($areas);
            if(!is_numeric($resultadoAreas)) {
                $data[$i++] = $resultadoAreas->result();
            } else {
                $data[$i++] = $resultadoAreas;
            }
        } else {
            $data[$i++] = $areas;
        }
        if(!is_numeric($competencias)) {
            $resultadoCompetencias = $this->getUserCompetencias($competencias);
            if(!is_numeric($resultadoCompetencias)) {
                $data[$i++] = $resultadoCompetencias->result();
            } else {
                $data[$i++] = $resultadoCompetencias;
            }
        } else {
            $data[$i++] = $competencias;
        }
        if(count($data) > 0) {
            return $data;
        } else{
            return 0;
        }
    }
    
    public function getAreasSearch($search)
    {
        $this->db->like('NombreArea', $search);
        $resultado = $this->db->get('areas');
        if($resultado->num_rows() > 0) {
            return $resultado;
        } else {
            return 0;
        }
    }
    
    public function getCompetenciasSearch($search)
    {
        $this->db->like('NombreCompetencia', $search);
        $resultado = $this->db->get('competencias');
        if($resultado->num_rows() > 0) {
            return $resultado;
        } else {
            return 0;
        }
    }
    
    public function getUserAreas($areas)
    {
        $flag = true;
        foreach($areas->result() as $row) {
            if($flag) {
                $this->db->where('idAreas', $row->idAreas);
                $flag = false;
            } else {
                $this->db->or_where('idAreas', $row->idAreas);
            }
        }
        $this->db->order_by('idUsuario', 'asc');
        $this->db->group_by('idUsuario');
        $resultado = $this->db->get('areasusuario');
        $i = 0;
        $idsUser = array();
        foreach($resultado->result() as $row) {
            $idsUser[$i++] = $row->idUsuario;
        }
        $resultadoUsuarios = $this->getFinalUsers($idsUser);
        if(!is_numeric($resultadoUsuarios)) {
            return $resultadoUsuarios;
        } else {
            return 0;
        }
    }
    
    public function getUserCompetencias($competencias)
    {
        $flag = true;
        foreach($competencias->result() as $row) {
            if($flag) {
                $this->db->where('idCompetencias', $row->idCompetencias);
                $flag = false;
            } else {
                $this->db->or_where('idCompetencias', $row->idCompetencias);
            }
        }
        $this->db->order_by('idUsuario', 'asc');
        $this->db->group_by('idUsuario');
        $resultado = $this->db->get('competenciasusuario');
        $i = 0;
        $idsUser = array();
        foreach($resultado->result() as $row) {
            $idsUser[$i++] = $row->idUsuario;
        }
        $resultadoUsuarios = $this->getFinalUsers($idsUser);
        if(!is_numeric($resultadoUsuarios)) {
            return $resultadoUsuarios;
        } else {
            return 0;
        }
    }
    
    public function getFinalUsers($idsUsers)
    {
        $flag = true;
        $rows = count($idsUsers);
        for($i = 0; $i < $rows; $i++) {
            if($flag) {
                $this->db->where('idUsuarios', $idsUsers[$i]);
                $flag = false;
            } else {
                $this->db->or_where('idUsuarios', $idsUsers[$i]);
            }
        }
        $this->db->order_by('APaterno', 'asc');
        $this->db->group_by('idUsuarios');
        $resultado = $this->db->get('usuarios');
        if($resultado->num_rows() > 0) {
            return $resultado;
        } else {
            return 0;
        }
    }
    
    //*************Busca todos los proyectos con el área o la competencia buscada//***********
    //***************************************************************************************
    public function searchAllProjectAC($search) 
    {
        $areas = $this->getAreasSearch($search);
        $competencias = $this->getCompetenciasSearch($search);
        $i = 0;
        $data = array();
        if(!is_numeric($areas)) {
            $resultadoAreas = $this->getProjectAreas($areas);
            if(!is_numeric($resultadoAreas)) {
                $data[$i++] = $resultadoAreas->result();
            } else {
                $data[$i++] = $resultadoAreas;
            }
        } else {
            $data[$i++] = $areas;
        }
        if(!is_numeric($competencias)) {
            $resultadoCompetencias = $this->getProjectCompetencias($competencias);
            if(!is_numeric($resultadoCompetencias)) {
                $data[$i++] = $resultadoCompetencias->result();
            } else {
                $data[$i++] = $resultadoCompetencias;
            }
        } else {
            $data[$i++] = $competencias;
        }
        if(count($data) > 0) {
            return $data;
        } else{
            return 0;
        }
    }
    
    
    public function getProjectAreas($areas)
    {
        $flag = true;
        foreach($areas->result() as $row) {
            if($flag) {
                $this->db->where('idArea', $row->idAreas);
                $flag = false;
            } else {
                $this->db->or_where('idArea', $row->idAreas);
            }
        }
        $this->db->order_by('idTrabajos', 'asc');
        $this->db->group_by('idTrabajos');
        $resultado = $this->db->get('trabajoarea');
        $i = 0;
        $idsProject = array();
        foreach($resultado->result() as $row) {
            $idsProject[$i++] = $row->idTrabajos;
        }
        $resultadoProjectos = $this->getFinalProjects($idsProject);
        if(!is_numeric($resultadoProjectos)) {
            return $resultadoProjectos;
        } else {
            return 0;
        }
    }
    
    public function getProjectCompetencias($competencias)
    {
        $flag = true;
        foreach($competencias->result() as $row) {
            if($flag) {
                $this->db->where('idCompetencias', $row->idCompetencias);
                $flag = false;
            } else {
                $this->db->or_where('idCompetencias', $row->idCompetencias);
            }
        }
        $this->db->order_by('idTrabajos', 'asc');
        $this->db->group_by('idTrabajos');
        $resultado = $this->db->get('trabajocompetencia');
        $i = 0;
        $idsProject = array();
        foreach($resultado->result() as $row) {
            $idsProject[$i++] = $row->idTrabajos;
        }
        $resultadoProjects = $this->getFinalProjects($idsProject);
        if(!is_numeric($resultadoProjects)) {
            return $resultadoProjects;
        } else {
            return 0;
        }
    }
    
    public function getFinalProjects($idsProject)
    {
        $flag = true;
        $rows = count($idsProject);
        for($i = 0; $i < $rows; $i++) {
            if($flag) {
                $this->db->where('idTrabajos', $idsProject[$i]);
                $flag = false;
            } else {
                $this->db->or_where('idTrabajos', $idsProject[$i]);
            }
        }
        $this->db->order_by('Nombre', 'asc');
        $this->db->group_by('idTrabajos');
        $resultado = $this->db->get('trabajos');
        if($resultado->num_rows() > 0) {
            return $resultado;
        } else {
            return 0;
        }
    }
}

?>