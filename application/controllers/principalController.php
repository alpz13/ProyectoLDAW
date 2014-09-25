<?php

class PrincipalController extends CI_Controller {

    public function index()
	{
		$this->load->view('principalView');
	}
        
        public function home()
        {
            $this->load->model('usuariosModel');
            
            $usuario = $this->input->post('usuario');
            $passwd = $this->input->post('passwd');
            
            if($usuario != "") {
                if($passwd != "") {
                    $response = $this->usuariosModel->login($usuario, $passwd);
                    if($response->num_rows() > 0) {
	                    foreach($response->result() as $row) {
	                        $dataUser['id'] = $row->idUsuarios;
	                        $dataUser['nombre'] = $row->Nombre;
	                        $dataUser['apellidoP'] = $row->APaterno;
	                        $dataUser['apellidoM'] = $row->AMaterno;
	                        $dataUser['pass'] = $row->Passwd;
	                        $dataUser['mail'] = $row->Mail;
	                        $dataUser['disponible'] = $row->Disponibilidad;
	                        $dataUser['tipo'] = $row->idTipo;
	                    }
	                    $this->session->set_userdata($dataUser);
	                    $this->load->view('homeView');
	                } else {
	                	$data['error'] = "Usuario/Contraseña incorrectos";
	                    $this->load->view('principalView', $data);
	                }
                } else {
                	$data['error'] = "Usuario/Contraseña incorrectos";
	                $this->load->view('principalView', $data);
                }
	        } else {
	        	$data['error'] = "Usuario/Contraseña incorrectos";
	            $this->load->view('principalView', $data);
	        }
        }
        
        public function homeView()
        {
            $this->load->view('homeView');
        }
        
        public function Proyectos()
        {
            $this->load->view('principalProyectosView');
        }
        
        public function cerrarSesion()
        {
            $this->session->sess_destroy();
            $this->load->view('principalView');
        }
        
        public function registrar()
        {
            $this->load->view('registrarUsuariosView');
        }
}