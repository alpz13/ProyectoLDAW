<?php

class UsuariosController extends CI_Controller {

    public function registraUsuario()
    {
        $this->load->model('usuariosModel');
        $nom = $this->input->post('nombre');
        $apeP = $this->input->post('apellidoP');
        $apeM = $this->input->post('apellidoM');
        $pass = $this->input->post('pass');
        $mail = $this->input->post('mail');

        if($nom != ""){
            if($apeP != "") {
                if($apeM != "") {
                    if($pass != "") {
                        if($mail != "") {
                            $resultado = $this->usuariosModel->registraUsuario($nom, $apeP, $apeM, $pass, $mail);

                            if($resultado == 1) {
                                $data['success'] = "Registro completo";
                            } else {
                                $data['error'] = "Ocurrió un error. Por favor vuelva a intentarlo";
                            }
                            $this->load->view('principalView', $data);
                        } else {
                            $data['error'] = "Datos incompletos";
                            $this->load->view("registrarUsuariosView", $data);
                        }
                    } else {
                            $data['error'] = "Datos incompletos";
                            $this->load->view("registrarUsuariosView", $data);
                        }
                } else {
                            $data['error'] = "Datos incompletos";
                            $this->load->view("registrarUsuariosView", $data);
                        }
            } else {
                            $data['error'] = "Datos incompletos";
                            $this->load->view("registrarUsuariosView", $data);
                        }
        } else {
                            $data['error'] = "Datos incompletos";
                            $this->load->view("registrarUsuariosView", $data);
                        }
    }
}