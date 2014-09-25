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
    
    function login($user, $pass)
    {
        $query = "SELECT * FROM usuarios WHERE Mail='".$user."' AND Passwd='".$pass."';";
        $result = $this->db->query($query);
        
        if($result->num_rows() > 0) {
            return $result;
        } else{
            return 0;
        }
    }
    
    function registraUsuario($nom, $apeP, $apeM, $pass, $mail)
    {
        try {
            $data = array(
                    'Nombre' => $nom,
                    'APaterno' => $apeP,
                    'AMaterno' => $apeM,
                    'Passwd' => $pass,
                    'Mail' => $mail,
                    'Disponibilidad' => 1,
                    'idTipo' => 3
                );
            $this->db->insert('usuarios', $data);
            return 1;
        } catch (Exception $ex) {
            return 0;
        }
        
    }

}

?>