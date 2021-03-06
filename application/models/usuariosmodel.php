<?php

class UsuariosModel extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function login($user, $pass)
    {
        $this->db->where('Mail', $user);
        $this->db->where('Passwd', $pass);
        $result = $this->db->get('usuarios');
        
        return $result;
    }
    
    public function registraUsuario($nom, $apeP, $apeM, $pass, $mail, $type, $foto)
    {
        $pass = base64_encode($pass);
        try {
            $data = array(
                    'Nombre' => $nom,
                    'APaterno' => $apeP,
                    'AMaterno' => $apeM,
                    'Passwd' => $pass,
                    'Mail' => $mail,
                    'Disponibilidad' => 1,
                    'idTipo' => $type,
                    'urlFoto' => $foto
                );
            $this->db->insert('usuarios', $data);
            return 1;
        } catch (Exception $ex) {
            return 0;
        }        
    }
    
    public function getInfo($id)
    {
        $this->db->select('*');
        $this->db->where('idUsuarios', $id);
        $this->db->from('usuarios');

        $query = $this->db->get();
        return $query;
    }
    
    public function actualizaUsuario($id, $nombre, $aPaterno, $aMaterno, $pass, $mail, $foto)
    {
        try {
            $data = array(
                      'Nombre'      => $nombre,
                      'APaterno'    => $aPaterno,
                      'AMaterno'    => $aMaterno,
                      'Passwd'      => $pass,
                      'Mail'        => $mail,
                      'urlFoto'     => $foto
                    );
            $this->db->where('idUsuarios', $id);
            $this->db->update('usuarios', $data);
            
            return 1;
        } catch (Exception $ex) {
            return 0;
        }
    }
    
    public function getUsuarios($id)
    {
        $this->db->select('*');
        $this->db->where('idUsuarios !=', $id);
        if($this->session->userdata('tipo') != 1) {
            $this->db->where('idTipo', 3);
        }
        $this->db->from('usuarios');
        
        $resultado = $this->db->get();
        
        return $resultado;
    }
    
    public function eliminaUsuario($id)
    {
        $this->db->where('idUsuarios', $id);
        
        try {
            $this->db->delete('usuarios');
            return 1;
        } catch (Exception $ex) {
            return 0;
        }        
    }
    
    public function getCalificaciones($idUsuario, $flag)
    {
        $this->db->where('idUsuario', $idUsuario);
        if($flag == 1) {
            $this->db->where('calificacionArea >', 8);
            $resultado = $this->db->get('areasusuario');
            if($resultado->num_rows() > 0) {
                $row = $resultado->row();
                $idArea = $row->idAreas;
                $calif = $row->calificacionArea;
                foreach($resultado->result() as $row) {
                    $califRow = $row->calificacionArea;
                    $idAreaRow = $row->idAreas;
                    if($califRow > $calif) {
                        $calif = $califRow;
                        $idArea = $idAreaRow;
                    }
                }
                $mayor = $idArea;
            } else {
                $mayor = 1;
            }
        } else if($flag == 2) {
            $this->db->where('calificacionCompetencia >', 8);  
            $resultado = $this->db->get('competenciasusuario');
            if($resultado->num_rows() > 0) {
                $row = $resultado->row();
                $idCompetencia = $row->idCompetencias;
                $calif = $row->calificacionCompetencia;
                foreach($resultado->result() as $row) {
                    $califRow = $row->calificacionCompetencia;
                    $idCompetenciaRow = $row->idCompetencias;
                    if($califRow > $calif) {
                        $calif = $califRow;
                        $idCompetencia = $idCompetenciaRow;
                    }
                }
                $mayor = $idCompetencia;
            } else {
                $mayor = 1;
            }
        }        
        
        return $mayor;
    }
    

    function getArea($idUsuario)
    {
        $resultado = $this->getCalificaciones($idUsuario, 1);
        return $resultado;
    }
    
    function getCompetencia($idUsuario)
    {
        $resultado = $this->getCalificaciones($idUsuario, 2);
        return $resultado;
    }
    
    function getNombreArea($idArea)
    {
        $this->db->where('idAreas', $idArea);
        $resultado = $this->db->get('areas');
        
        return $resultado;
    }
    
    function getNombreCompetencia($idCompetencia)
    {
        $this->db->where('idCompetencias', $idCompetencia);
        $resultado = $this->db->get('competencias');
        
        return $resultado;
    }
    
    function getCalifArea($idUsuario)
    {
        $this->db->where('idUsuario', $idUsuario);
        $this->db->order_by('idAreas', 'asc');
        $resultado = $this->db->get('areasusuario');
        if($resultado->num_rows() > 0) {
            return $resultado->result();
        } else {
            return 0;
        }
    }
    
    function getCalifCompetencias($idUsuario)
    {
        $this->db->where('idUsuario', $idUsuario);
        $this->db->order_by('idCompetencias', 'asc');
        $resultado = $this->db->get('competenciasusuario');
        if($resultado->num_rows() > 0) {
            return $resultado->result();
        } else {
            return 0;
        }
    }
    
    function getNombreAreas()
    {
        $this->db->order_by('idAreas');
        $resultado = $this->db->get('areas');
        
        return $resultado;
    }
    
    function getNombreCompetencias()
    {
        $this->db->order_by('idCompetencias');
        $resultado = $this->db->get('competencias');
        
        return $resultado;
    }
    
    function getProyectosUser($idUser)
    {
        $this->db->where('idUsuario', $idUser);
        $resultado = $this->db->get('usuariotrabajo');
        
        return $resultado;
    }
    
    function getSupervisor($idSupervisor)
    {
        $this->db->where('idUsuarios', $idSupervisor);
        $resultado = $this->db->get('usuarios');
        
        return $resultado;
    }
    
    public function getUsersWorking($idProject)
    {
        $this->db->where('idTrabajos', $idProject);
        $resultado = $this->db->get('usuariotrabajo');
        if($resultado->num_rows() > 0) {
            $i = 0;
            $usuarios = array();
            foreach($resultado->result() as $row) {
                $usuarios[$i++] = $row->idUsuario;
            }
            $dataUsuarios = $this->usuariosData($usuarios);
            return $dataUsuarios;
        }else {
            return 0;
        }
    }
    
    public function usuariosData($arrayUsuarios)
    {
        $totalUsers = count($arrayUsuarios);
        $this->db->where('idUsuarios', $arrayUsuarios[0]);
        if($totalUsers > 1) {
            for($i = 1; $i < $totalUsers; $i++) {
                $this->db->or_where('idUsuarios', $arrayUsuarios[$i]);
            }
        }
        $resultado = $this->db->get('usuarios');
        if($resultado->num_rows() > 0) {
            return $resultado->result();
        } else {
            return 0;
        }
    }
    
    public function getMyProjects($idUsuario)
    {
        $this->db->where('idUsuario', $idUsuario);
        $resultado = $this->db->get('usuariotrabajo');
        if($resultado->num_rows() > 0) {
            $i = 0;
            $data = array();
            foreach($resultado->result() as $row) {
                $data[$i++] = $row->idTrabajos;
            }
            $resultado = $this->getProyectos($data);
            if(!is_numeric($resultado)) {
                return $resultado;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
    
    public function getProyectos($data)
    {
        $totalProyectos = count($data);
        $i = 1;
        $dataProyectos = array();
        $this->db->where('idTrabajos',$data[0]);
        for($i; $i < $totalProyectos; $i++) {
            $this->db->or_where('idTrabajos', $data[$i]);
        }
        $resultado = $this->db->get('trabajos');
        if($resultado->num_rows() > 0) {
            return $resultado->result();
        } else {
            return 0;
        }
    }
    
    public function getUsuariosProyecto($idProyecto)
    {
        $this->db->where('idTrabajos', $idProyecto);
        $resultado = $this->db->get('usuariotrabajo');
        if($resultado->num_rows() > 0) {
            return $resultado->result();
        } else {
            return 0;
        }
    }
    
    public function getGrades($idUsuario, $idProyecto) {
        $this->db->where('idUsuario', $idUsuario);
        $this->db->where('idProyecto', $idProyecto);
        $resultado = $this->db->get('calificacion');
        if($resultado->num_rows() > 0) {
            return $resultado->result();
        } else {
            return 0;
        }
    } 
    
    public function addGrade($user, $idProject, $grade)
    {
        $data = array(
                    'idUsuario'     => $user,
                    'idProyecto'    => $idProject,
                    'Calificacion'  => $grade
                );
        try {
            $this->db->insert('calificacion', $data);
            return 1;
        } catch (Exception $ex) {
            return 0;
        }
    }
    
    public function upgradeGrade($user, $idProject, $grade) 
    {
        $data = array(
                    'idUsuario'     => $user,
                    'idProyecto'    => $idProject,
                    'Calificacion'  => $grade
                );
        try{
            $this->db->where('idUsuario', $user);
            $this->db->where('idProyecto', $idProject);
            $this->db->update('calificacion', $data);
            return 1;
        } catch (Exception $ex) {
            return 0;
        }
    }
    
    public function restorePassword($mail)
    {
        $this->db->where('Mail', $mail);
        $resultado = $this->db->get('usuarios');
        if($resultado->num_rows() > 0) {
            return $resultado;
        } else {
            return 0;
        }
    }
    
    public function changePassword($idUsuario, $pass)
    {
        $pass = base64_encode($pass);
        $data = array(
                    'Passwd'  => $pass
                );
        $this->db->where('idUsuarios', $idUsuario);
        $this->db->update('usuarios', $data);
    }
    
    public function getAverage($idUsuario)
    {
        $this->db->where('idUsuario', $idUsuario);
        $resultado = $this->db->get('calificacion');
        if($resultado->num_rows() > 0) {
            $i = $resultado->num_rows();
            $average = 0;
            foreach($resultado->result() as $row) {
                $average = $average + $row->Calificacion;
            }
            $average = $average / $i;
            return $average;
        } else {
             return -1;
        }
    }
    
    public function addGradeArea($area, $average, $user)
    {
        $data = array(
                    'idUsuario'     => $user,
                    'idAreas'       => $area,
                    'calificacionArea'  => $average
                );
        try {
            $this->db->insert('areasusuario', $data);
            return 1;
        } catch (Exception $ex) {
            return 0;
        }
    }
    
    public function addGradeCompetence($competence, $average, $user)
    {
        $data = array(
                    'idUsuario'     => $user,
                    'idCompetencias'       => $competence,
                    'calificacionCompetencia'  => $average
                );
        try {
            $this->db->insert('competenciasusuario', $data);
            return 1;
        } catch (Exception $ex) {
            return 0;
        }
    }
    
    public function updateTest($valor, $user) 
    {
        $data = array(
                'test'  => $valor
            );
        $this->db->where('idUsuarios', $user);
        try {
            $this->db->update('usuarios', $data);
            return 1;
        } catch (Exception $ex) {
            return 0;
        }
    }
    
    public function alert()
    {
        return "Hola";
    }
}
?>