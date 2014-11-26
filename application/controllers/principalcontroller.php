<?php

class PrincipalController extends CI_Controller {

    public function index()
	{
		$this->load->view('principalView');
	}
        
        public function home()
        {
            $this->load->model('usuariosmodel');
            $this->load->model('proyectosmodel');
            
            $usuario = $this->input->post('usuario');
            $passwd = $this->input->post('passwd');
            
            if($usuario != "") {
                if($passwd != "") {
                    $passwd = base64_encode($passwd);
                    $response = $this->usuariosmodel->login($usuario, $passwd);
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
                                $tipo = $row->idTipo;
                                $dataUser['foto'] = $row->urlFoto;
                                $dataUser['test'] = $row->test;
	                    }
                            
                            //**Busca el ・・ｽ｡rea con mayor calificacion**
                            $area = $this->areaAfin($idUser);
                            $query = $area->row();
                            if(!is_numeric($query)) {
                                $idAreaMayor = $query->idAreas;
                                $proyectosAreas = $this->getProyectos($idAreaMayor);
                                if($proyectosAreas != "") {
                                    $data['proyectosAreas'] = $proyectosAreas;
                                } else {
                                    $data['proyectosAreas'] = null;
                                }
                            }
                            //********************************************//
                            //********************************************//
                            
                            //**Busca la competencia con mayor calificacion**
                            $competencia = $this->competenciaAfin($idUser);
                            $query = $competencia->row();
                            $idCompetenciaMayor = $query->idCompetencias;
                            $proyectosCompetencias = $this->getCompetencias($idCompetenciaMayor);
                            if($proyectosCompetencias != "") {
                                $data['proyectosCompetencias'] = $proyectosCompetencias;
                            } else {
                                $data['proyectosCompetencias'] = null;
                            }
                            //********************************************//
                            //********************************************//
                            
                            //**Busca todos los proyectos en los que est・・ｽ｡ incrito el usuario**
                            $proyectos = $this->getProyectosUser($idUser);
                            $data['proyectosUser'] = $proyectos;
                            //********************************************//
                            //********************************************//
                            
                            //**Busca todos los proyectos a cargo del supervisor**
                            if($tipo == 1 || $tipo == 2) {
                                $proyectos = $this->getAllProjects($idUser);                                
                                if(!is_numeric($proyectos)) {
                                    $data['proyectosAdmin'] = $proyectos;
                                }
                                $requests = $this->getAllRequests($idUser);
                                if(!is_numeric($requests)) {
                                    $data['requests'] = $requests;
                                }
                            } 
                            //********************************************//
                            //********************************************//
                            
                            //***********************************************
                            //Librer・・ｽｭa grid
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
            //**Busca el ・・ｽ｡rea con mayor calificacion**
            $idUser = $this->session->userdata('id');
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
            
            //**Busca todos los proyectos a cargo del supervisor**
            $tipo = $this->session->userdata('tipo');
            if($tipo == 1 || $tipo == 2) {
                $proyectos = $this->getAllProjects($idUser);                                
                $data['proyectosAdmin'] = $proyectos;
                
                $requests = $this->getAllRequests($idUser);
                if(!is_numeric($requests)) {
                   $row = $requests->row(); 
                   $data['requests'] = $requests;
                }
            }
            //********************************************//
            //********************************************//
            
            //**Busca todos los proyectos en los que est・・ｽ｡ incrito el usuario**
            $proyectos = $this->getProyectosUser($idUser);
            $data['proyectosUser'] = $proyectos;
            //********************************************//
            //********************************************//
                            
                            
            $this->load->view('homeView', $data);
            $this->load->view('footer');
        }
        
     	 public function mensajesView()
        {
            $this->load->view('header');
            if($this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 2) {
                $this->load->view('headAdmin');
            } else {
                $this->load->view('headWorker');
            }
            $this->load->view('list_pmView');
            $this->load->view('footer');
        }

        public function nuevomensajeView()
        {
            $this->load->view('header');
            if($this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 2) {
                $this->load->view('headAdmin');
            } else {
                $this->load->view('headWorker');
            }
            $this->load->view('new_pmView');
            $this->load->view('footer');
        }
        
        public function leermensajeView()
        {
            $this->load->view('header');
            if($this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 2) {
                $this->load->view('headAdmin');
            } else {
                $this->load->view('headWorker');
            }
            $this->load->view('read_pmView');
            $this->load->view('footer');
        }
        
        public function config()
        {
        	$this->load->view('config');
        }
        
        public function Proyectos()
        {
            $this->load->model('proyectosmodel');
            $id = $this->session->userdata('id');
            
            $resultado = $this->proyectosmodel->consultarProyectosSupervisor($id);
            if(!is_numeric($resultado)) {
                $data['proyectos'] = $resultado;
            } 
            $data['errorNumeric'] = 0;
            $this->load->view('principalProyectosView', $data);
            $this->load->view('footer');
        }
        
        public function Configuracion()
        {
            $this->load->model('usuariosmodel');
            $id = $this->session->userdata('id');
            $resultado = $this->usuariosmodel->getInfo($id);
            $califAreas = $this->usuariosmodel->getCalifArea($id);
            $califCompetencias = $this->usuariosmodel->getCalifCompetencias($id);
            $areas = $this->usuariosmodel->getNombreAreas();
            $competencias = $this->usuariosmodel->getNombreCompetencias();
            
            if(!is_numeric($califAreas)) {
                $data['califAreas'] = $califAreas;
            }
            if(!is_numeric($califCompetencias)) {
                $data['califCompetencias'] = $califCompetencias;
            }
            $data['areas'] = $areas;
            $data['competencias'] = $competencias;
            
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
            $average = $this->usuariosmodel->getAverage($id);
            if($average > 0) {
                $data['average'] = $average;
            }
            $this->load->view('configuracionView', $data);
            $this->load->view('footer');
        }
        
        public function Usuarios()
        {
            $this->load->model('usuariosmodel');
            $id = $this->session->userdata('id');
            
            $data['usuarios'] = $this->usuariosmodel->getUsuarios($id);
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
            $this->load->model('usuariosmodel');
            //**Devuelve el id del Area con mayor puntaje**
            $resultado = $this->usuariosmodel->getArea($idUsuario);
            
            $resultado = $this->nombreArea($resultado);
            
            return $resultado;
        }
        
        public function competenciaAfin($idUsuario)
        {
            $this->load->model('usuariosmodel');
            //**Devuelve el id de la Competencia con mayor puntaje**
            $resultado = $this->usuariosmodel->getCompetencia($idUsuario);
            
            $resultado = $this->nombreCompetencia($resultado);
            
            return $resultado;
        }
        
        //**Busca el nombre del ・・ｽ｡rea dependiendo del id que se le pase**
       public function nombreArea($idArea)
       {
           $this->load->model('usuariosmodel');
           $resultado = $this->usuariosmodel->getNombreArea($idArea);
           
           return $resultado;
       }
       
       //**Busca el nombre del ・・ｽ｡rea dependiendo del id que se le pase**
       public function nombreCompetencia($idCompetencia)
       {
           $this->load->model('usuariosmodel');
           $resultado = $this->usuariosmodel->getNombreCompetencia($idCompetencia);
           
           return $resultado;
       }
       
       public function getProyectos($idArea)
       {
           $this->load->model('proyectosmodel');
           $resultado = $this->proyectosmodel->getProyectos($idArea, 1);
           
           $proyectos = "";
           if($resultado->num_rows() > 0) {
               $proyectos = $this->getProyectosData($resultado);
           }
           
           return $proyectos;
       }
       
       public function getCompetencias($idCompetencia)
       {
           $this->load->model('proyectosmodel');
           $resultado = $this->proyectosmodel->getProyectos($idCompetencia, 2);
           
           $proyectos = "";
           if($resultado->num_rows() > 0) {
               $proyectos = $this->getProyectosData($resultado);
           }
           
           return $proyectos;
       }
       
       public function getProyectosData($arrayProyectos)
       {
           $this->load->model('proyectosmodel');
           $query = array();
           $i = 0;
           foreach($arrayProyectos->result() as $row) {
               $idTrabajo = $row->idTrabajos;
//               $this->load->library('grocery_CRUD');
//               $crud =  $crud = new grocery_CRUD();
//               $crud->where('idTrabajos', $idTrabajo);
//               $crud->columns('Nombre','Descripcion');
//               $query = $crud->render();
               $query[$i++] = $this->proyectosmodel->getProyectosData($idTrabajo);
           }
           
           return $query;
       }
       
       public function getAllProjects($idUser)
       {
           $this->load->model('proyectosmodel');
           $resultado = $this->proyectosmodel->getAllProjects($idUser);
           
           return $resultado;           
       }
       
       public function getAllRequests($idUser)
       {
           $this->load->model('proyectosmodel');
           $resultado = $this->proyectosmodel->getAllRequests($idUser);
           
           return $resultado;
       }
       
       public function getProyectosUser($idUser)
       {
           $this->load->model('usuariosmodel');
           $this->load->model('proyectosmodel');
           $resultado = $this->usuariosmodel->getProyectosUser($idUser);
           
           $cont = count($resultado->result());
           $data = null;
           if($cont > 0) {
               $i = 0;
               $data = array();
               foreach($resultado->result() as $row) {
                   $idProyecto = $row->idTrabajos;
                   $data[$i++] = $this->proyectosmodel->getProyectosData($idProyecto);
               }
           }
           
           return $data;
       }
       
       public function sendPassword()
       {
           $mail = $this->input->post('email');
           //**Se crea un password aleatorio
           $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
            $numerodeletras=10; //numero de letras para generar el texto
            $cadena = ""; //variable para almacenar la cadena generada
            for($i=0;$i<$numerodeletras;$i++)
            {
                $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
            entre el rango 0 a Numero de letras que tiene la cadena */
            }
            $this->load->model('usuariosmodel');
            $resultado = $this->usuariosmodel->restorePassword($mail);
            if(!is_numeric($resultado)) {
                $row = $resultado->row();
                $this->usuariosmodel->changePassword($row->idUsuarios, $cadena);
                
                $this->load->library('email');
                //configuracion para gmail
                $configGmail = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.gmail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'xxfinalmikexx@gmail.com',
                    'smtp_pass' => '22MikeLegend',
                    'mailtype' => 'html',
                    'charset' => 'utf-8',
                    'newline' => "\r\n"
                ); 
                
                $message = "The following message has been sent because you request a new password. \n";
                $message .= "Once you enter the application, please change to a new password that you can remember. \n";
                $message .= "Your new password is: ".$cadena;
                
                $this->email->initialize($configGmail);
                $this->email->from('no-reply@jscope.com', 'JScope');
                $this->email->to($mail);
                $this->email->subject('Password restore');
                $this->email->message($message);	

                if($this->email->send()) {
                    echo "<span>Your password has been sent to the specified mail</span>";
                } else {
                    echo "<span>The password could not been sent</span>";
                }
            } else {
                echo "<span>There is no account with the specified email</span>";
            }
       }
       
//       public function usuariosGrid()
//       {
//           $this->load->library('grocery_CRUD');
//           $this->grocery_crud->set_table('usuarios');
//           $output = $this->grocery_crud->render();
//           
//           return $output;
//       }
}