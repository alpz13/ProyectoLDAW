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
                            
                            //**Busca el área con mayor calificacion**
                            $area = $this->areaAfin($idUser);
                            $query = $area->row();
                            $idAreaMayor = $query->idAreas;
                            $data['proyectosAreas'] = $this->getProyectos($idAreaMayor);
                            //********************************************//
                            //********************************************//
                            
                            //**Busca la competencia con mayor calificacion**
                            $competencia = $this->competenciaAfin($idUser);
                            $query = $competencia->row();
                            $idCompetenciaMayor = $query->idCompetencias;
                            $data['proyectosCompetencias'] = $this->getCompetencias($idCompetenciaMayor);
                            //********************************************//
                            //********************************************//
                            
                            //***********************************************
                            //Librería grid
//                            $usuarios = $this->usuariosGrid();
//                            $data['output'] = $usuarios->output;
//                            $data['js_files'] = $usuarios->js_files;
//                            $data['css_files'] = $usuarios->css_files;
                            //$data['grid'] = $usuarios;
                            //$data['js_files'] = $js_files;
                            //**********************************************
                            
                            
	                    $this->session->set_userdata($dataUser);
	                    $this->load->view('homeView', $data);
                            $this->load->view('footer');
	                } else {
	                	$data['error'] = "User/Password incorrect";
                                $data['bin'] = 1;
	                    $this->load->view('indexView', $data);
	                }
                } else {
                	$data['error'] = "User/Password incorrect";
	                $this->load->view('indexView', $data);
                }
	        } else {
	        	$data['error'] = "User/Password incorrect";
	            $this->load->view('indexView', $data);
	        }
            
        }
        
        
        public function homeView()
        {
            $this->load->view('homeView');
            $this->load->view('footer');
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
            $this->load->view('footer');
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
            $this->load->view('footer');
        }
        
        public function Usuarios()
        {
            $this->load->model('usuariosModel');
            $id = $this->session->userdata('id');
            
            $data['usuarios'] = $this->usuariosModel->getUsuarios($id);
            $this->load->view('usuariosView', $data);
            $this->load->view('footer');
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
        
        
        //**Buscar id y nombre de area afin//**
        public function areaAfin($idUsuario)
        {
            $this->load->model('usuariosModel');
            //**Devuelve el id del Area con mayor puntaje**
            $resultado = $this->usuariosModel->getArea($idUsuario);
            
            $resultado = $this->nombreArea($resultado);
            
            return $resultado;
        }
        
        public function competenciaAfin($idUsuario)
        {
            $this->load->model('usuariosModel');
            //**Devuelve el id de la Competencia con mayor puntaje**
            $resultado = $this->usuariosModel->getCompetencia($idUsuario);
            
            $resultado = $this->nombreCompetencia($resultado);
            
            return $resultado;
        }
        
        //**Busca el nombre del área dependiendo del id que se le pase**
       public function nombreArea($idArea)
       {
           $this->load->model('usuariosModel');
           $resultado = $this->usuariosModel->getNombreArea($idArea);
           
           return $resultado;
       }
       
       //**Busca el nombre del área dependiendo del id que se le pase**
       public function nombreCompetencia($idCompetencia)
       {
           $this->load->model('usuariosModel');
           $resultado = $this->usuariosModel->getNombreCompetencia($idCompetencia);
           
           return $resultado;
       }
       
       public function getProyectos($idArea)
       {
           $this->load->model('proyectosModel');
           $resultado = $this->proyectosModel->getProyectos($idArea, 1);
           
           if($resultado->num_rows() > 0) {
               $proyectos = $this->getProyectosData($resultado);
           }
           
           return $proyectos;
       }
       
       public function getCompetencias($idCompetencia)
       {
           $this->load->model('proyectosModel');
           $resultado = $this->proyectosModel->getProyectos($idCompetencia, 2);
           
           if($resultado->num_rows() > 0) {
               $proyectos = $this->getProyectosData($resultado);
           }
           
           return $proyectos;
       }
       
       public function getProyectosData($arrayProyectos)
       {
           $this->load->model('proyectosModel');
           $query = array();
           $i = 0;
           foreach($arrayProyectos->result() as $row) {
               $idTrabajo = $row->idTrabajos;
               
//               $this->load->library('grocery_CRUD');
//               $crud =  $crud = new grocery_CRUD();
//               $crud->where('idTrabajos', $idTrabajo);
//               $crud->columns('Nombre','Descripcion');
//               $query = $crud->render();
               $query[$i++] = $this->proyectosModel->getProyectosData($idTrabajo);
           }
           
           return $query;
       }
       
       public function usuariosGrid()
       {
           $this->load->library('grocery_CRUD');
           $this->grocery_crud->set_table('usuarios');
           $output = $this->grocery_crud->render();
           
           return $output;
       }
}