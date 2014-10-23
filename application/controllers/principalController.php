<?php

class PrincipalController extends CI_Controller {

    public function index()
	{
		$this->load->view('principalView');
	}
        
        public function home()
        {
            $this->load->model('usuariosModel');
            $this->load->model('proyectosModel');
            
            $usuario = $this->input->post('usuario');
            $passwd = $this->input->post('passwd');
            
            if($usuario != "") {
                if($passwd != "") {
                    $response = $this->usuariosModel->login($usuario, $passwd);
                    if($response->num_rows() > 0) {
	                    foreach($response->result() as $row) {
	                        $dataUser['id'] = $row->idUsuarios;
                                $idUser = $row->idUsuarios;
	                        $dataUser['nombre'] = $row->Nombre;
	                        $dataUser['apellidoP'] = $row->APaterno;
	                        $dataUser['apellidoM'] = $row->AMaterno;
	                        $dataUser['pass'] = $row->Passwd;
	                        $dataUser['mail'] = $row->Mail;
	                        $dataUser['disponible'] = $row->Disponibilidad;
	                        $dataUser['tipo'] = $row->idTipo;
                                $dataUser['foto'] = $row->urlFoto;
	                    }
                            //Obtiene los datos de la competencia con mayor puntaje
                            $competencias = $this->usuariosModel->getCompetencias($idUser);
                            //Busca los proyectos con el id de competencia mayor
                            if($competencias->num_rows() > 0) {
                                $row = $competencias->row();
                                $idComp = $row->idCompetencias;
                                $this->proyectosModel->getProyectos($idComp);
                            }
                            //Obtiene los datos del area con mayor puntaje
                            $areas = $this->usuariosModel->getAreas($idUser);
                            
                            $data['competencias'] = $competencias;
                            $data['areas'] = $areas;
                            
	                    $this->session->set_userdata($dataUser);
	                    $this->load->view('homeView', $data);
	                } else {
	                	$data['error'] = "Usuario/Contraseña incorrectos";
                                $data['bin'] = 1;
	                    $this->load->view('indexView', $data);
	                }
                } else {
                	$data['error'] = "Usuario/Contraseña incorrectos";
	                $this->load->view('indexView', $data);
                }
	        } else {
	        	$data['error'] = "Usuario/Contraseña incorrectos";
	            $this->load->view('indexView', $data);
	        }
        }
        
        public function homeView()
        {
            $this->load->view('homeView');
        }

        public function mensajesView()
        {
            $this->load->view('header');
            $this->load->view('headAdmin');
            $this->load->view('index_messageView');
            $this->load->view('footer');
        }
        
        public function conexionView()
        {
            $this->load->view('header');
            $this->load->view('headAdmin');
            $this->load->view('connexionView');
            $this->load->view('footer');
        }        

        public function mensajessignView()
        {
            $this->load->helper('form');
            $this->load->view('header');
            $this->load->view('headAdmin');
            $this->load->view('sign_upView');
            $this->load->view('footer');
        }
        
        public function mensajeseditinfoView()
        {
            $this->load->view('header');
            $this->load->view('headAdmin');
            $this->load->view('edit_infosView');
            $this->load->view('footer');
        }

     	 public function mensajeslistView()
        {
            $this->load->view('header');
            $this->load->view('headAdmin');
            $this->load->view('list_pmView');
            $this->load->view('footer');
        }

		 public function nuevomensajeView()
        {
            $this->load->view('header');
            $this->load->view('headAdmin');
            $this->load->view('new_pmView');
            $this->load->view('footer');
        }
        
        public function leermensajeView()
        {
            $this->load->view('header');
            $this->load->view('headAdmin');
            $this->load->view('read_pmView');
            $this->load->view('footer');
        }
        
        public function config()
        {
        	$this->load->view('config');
        }
        
        public function Proyectos()
        {
            $this->load->model('proyectosModel');
            $id = $this->session->userdata('id');
            
            $resultado = $this->proyectosModel->consultarProyectosSupervisor($id);
            $data['proyectos'] = $resultado;
            $this->load->view('principalProyectosView', $data);
        }
        
        public function Configuracion()
        {
            $this->load->model('usuariosModel');
            $id = $this->session->userdata('id');
            $resultado = $this->usuariosModel->getInfo($id);
            
            if($resultado->num_rows() > 0) {
                foreach($resultado->result() as $row) {
                    $data['id'] = $row->idUsuarios;
                    $data['nombre'] = $row->Nombre;
                    $data['aPaterno'] = $row->APaterno;
                    $data['aMaterno'] = $row->AMaterno;
                    $data['pass'] = $row->Passwd;
                    $data['mail'] = $row->Mail;
                    $data['foto'] = $row->urlFoto;
                }
            }
            $this->load->view('configuracionView', $data);
        }
        
        public function Usuarios()
        {
            $this->load->model('usuariosModel');
            $id = $this->session->userdata('id');
            
            $data['usuarios'] = $this->usuariosModel->getUsuarios($id);
            $this->load->view('usuariosView', $data);
        }
        
        public function cerrarSesion()
        {
            $this->session->sess_destroy();
            $this->load->view('indexView');
        }
        
        public function registrar()
        {
            $this->load->view('registrarUsuariosView');
        }
}