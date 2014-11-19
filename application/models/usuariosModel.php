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
        $query = "SELECT * FROM usuarios WHERE Mail='".$user."' AND Passwd='".$pass."';";
        $result = $this->db->query($query);
        
        return $result;
    }
    
    public function registraUsuario($nom, $apeP, $apeM, $pass, $mail, $foto)
    {
        try {
            $data = array(
                    'Nombre' => $nom,
                    'APaterno' => $apeP,
                    'AMaterno' => $apeM,
                    'Passwd' => $pass,
                    'Mail' => $mail,
                    'Disponibilidad' => 1,
                    'idTipo' => 3,
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
        $this->db->order_by('idAreas', 'desc');
        $resultado = $this->db->get('areasusuario');
        
        return $resultado;
    }
    
    function getCalifCompetencias($idUsuario)
    {
        $this->db->where('idUsuario', $idUsuario);
        $this->db->order_by('idCompetencias', 'desc');
        $resultado = $this->db->get('competenciasusuario');
        
        return $resultado;
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

}
?>