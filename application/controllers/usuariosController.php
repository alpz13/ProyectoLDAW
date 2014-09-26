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
        
        if ($this->form_validation->run() == FALSE) {
                //$data['error'] = "Favor de llenar todos los campos";
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
}
