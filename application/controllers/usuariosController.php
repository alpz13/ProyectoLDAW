<?php

class UsuariosController extends CI_Controller {

    public function registraUsuario()
    {
        $this->load->model('usuariosModel');
        
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellidoP', 'Apellido Paterno', 'required');
        $this->form_validation->set_rules('apellidoM', 'Apellido Materno', 'required');
        $this->form_validation->set_rules('pass', 'Contraseña', 'required|min_lenght[6]');
        $this->form_validation->set_rules('passCon', 'Confirmacion contraseña', 'required|matches[pass]');
        $this->form_validation->set_rules('mail', 'Correo', 'required|valid_email');
        
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        $this->form_validation->set_message('min_lenght', 'El campo %s debe tener al menos 6 caracteres');
        $this->form_validation->set_message('matches', 'Las contraseñas no coinciden');
        $this->form_validation->set_message('valid_email', 'Debe incluir un email válido');
        
        if ($this->form_validation->run() == FALSE) {
                $this->load->view('registrarUsuariosView');
        } else {
            $nom = $this->input->post('nombre');
            $apeP = $this->input->post('apellidoP');
            $apeM = $this->input->post('apellidoM');
            $pass = $this->input->post('pass');
            $mail = $this->input->post('mail');
            $resultado = $this->usuariosModel->registraUsuario($nom, $apeP, $apeM, $pass, $mail);

            if($resultado == 1) {
                $data['success'] = "Registro completo";
                $this->load->view('principalView', $data);
            } else {
                $data['error'] = "No se ha podido insertar el usuarion con los datos proporcionados";
                $this->load->view('registrarUsuariosView', $data);
            }
        }
    }
    
    public function actualizaUsuario()
    {
        $this->load->model('usuariosModel');
        
        $id = $this->session->userdata('id');
        $nombre = $this->input->post('nombre');
        $aPaterno = $this->input->post('aPaterno');
        $aMaterno = $this->input->post('aMaterno');
        $pass = $this->input->post('pass');
        $passCon = $this->input->post('passCon');
        $mail = $this->input->post('mail');
        $foto = $this->input->post('foto');
        
        if(($nombre || $aPaterno || $aMaterno || $pass || $passCon || $mail) == "") {
            echo "Deben indicarse todos los campos";
        } else if($pass != $passCon) {
            echo "Las contraseñas no coinciden";
        } else {
            if($foto == "") {
                $foto = "../../files/defaultFoto.jpg";
            }
            $resultado = $this->usuariosModel->actualizaUsuario($id, $nombre, $aPaterno, $aMaterno, $pass, $mail, $foto);
            if($resultado == 1) {
                echo "Datos actualizados";
                $dataUser['nombre'] = $nombre;
                $dataUser['apellidoP'] = $aPaterno;
                $dataUser['apellidoM'] = $aMaterno;
                $dataUser['pass'] = $pass;
                $dataUser['mail'] = $mail;
                $dataUser['foto'] = $foto;
                $this->session->set_userdata($dataUser);
            } else {
                echo "No se han podido registrar los datos. Favor de volver a intentar";
            }
        }
    }
    
    public function loadImage()
    {
        
    }
}
