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
}
?>