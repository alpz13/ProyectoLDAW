<?php

class ProyectosController extends CI_Controller {
    
    public function creaProyecto()
    {
        $this->load->view('creaProyectoView');
    }
    
    public function nuevoProyecto()
    {
        $this->load->model('proyectosmodel');
        $nombre = $this->input->post('nombre');
        $descripcion = $this->input->post('descripcion');
        $habilitado = $this->input->post('habilitado');
        $supervisor = $this->session->userdata('id');
        
        //Areas
        $security = $this->input->post('security');
        $web = $this->input->post('web');
        $db = $this->input->post('db');
        $network = $this->input->post('network');
        $desktop = $this->input->post('desktop');
        
        //Competences
        $team = $this->input->post('team');
        $comunication = $this->input->post('comunication');
        $work = $this->input->post('work');
        $initiative = $this->input->post('initiative');
        $leader = $this->input->post('leader');
        
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
        
        if ($this->form_validation->run() == FALSE) {
                $data['error'] = "All fields must be filled";
                $this->load->view("creaProyectoView", $data);
        } else {
            $resultado = $this->proyectosmodel->creaProyecto($nombre, $descripcion, $habilitado, $supervisor);

            if($resultado == 1) {
                $data['success'] = "New Project has been created";
                $idProject = $this->getIdProject($nombre);
                $row = $idProject->row();
                if($security != "") {
                    $this->proyectosmodel->insertaAreas($security, $row->idTrabajos);
                }
                if($web != "") {
                    $this->proyectosmodel->insertaAreas($web, $row->idTrabajos);
                }
                if($db != "") {
                    $this->proyectosmodel->insertaAreas($db, $row->idTrabajos);
                }
                if($network != "") {
                    $this->proyectosmodel->insertaAreas($network, $row->idTrabajos);
                }
                if($desktop != "") {
                    $this->proyectosmodel->insertaAreas($desktop, $row->idTrabajos);
                }
                if($team != "") {
                    $this->proyectosmodel->insertaCompetencias($team, $row->idTrabajos);
                }
                if($comunication != "") {
                    $this->proyectosmodel->insertaCompetencias($comunication, $row->idTrabajos);
                }
                if($work != "") {
                    $this->proyectosmodel->insertaCompetencias($work, $row->idTrabajos);
                }
                if($initiative != "") {
                    $this->proyectosmodel->insertaCompetencias($initiative, $row->idTrabajos);
                }
                if($leader != "") {
                    $this->proyectosmodel->insertaCompetencias($leader, $row->idTrabajos);
                }
            } else {
                $data['error'] = 'Something has occured, please try again.';
            }
            $id = $this->session->userdata('id');
            $resultado = $this->proyectosmodel->consultarProyectosSupervisor($id);
            $data['proyectos'] = $resultado;
            $this->load->view('principalProyectosView', $data);
        }
    }
    
    public function consultar()
    {
        $this->load->model('proyectosmodel');
        $resultado = $this->proyectosmodel->consultarTodo();
        
        if($resultado->num_rows() > 0) {
            $data['proyectos'] = $resultado;
            $data['usersProyectos'] = $this->consultarTodosUsuarios($resultado);
        }
        $this->load->view('mostrarProyectosView', $data);
    }
    
    public function asignarTrabajador()
    {
        $this->load->model('proyectosmodel');
        $idSupervisor = $this->session->userdata('id');
        $trabajos = $this->proyectosmodel->consultarProyectosSupervisor($idSupervisor);
        $trabajador = $this->proyectosmodel->consultaTrabajadores($this->session->userdata('id'));
//        $trabajadoresReales = $this->proyectosmodel->menoresCinco($trabajador, $idSupervisor);
//        if($trabajadoresReales != "") {
//            if($trabajadoresReales->num_rows() > 0) {
//                $data['trabajador'] = $trabajadoresReales;
//            }
//        } else {
//            $data['error'] = "There are no workers assigned";
//        }
        if($trabajos->num_rows() > 0) {
            $data['trabajos'] = $trabajos;
        } 
        $data['trabajador'] = $trabajador;
        
        
        $this->load->view('asignarTrabajadorView', $data);
    }
    
    public function asignarProyecto()
    {
        $proyecto = $this->input->post('proyecto');
        $trabajador = $this->input->post('trabajador');
        
        $this->load->model('proyectosmodel');
        $resultado = $this->proyectosmodel->asignarProyecto($proyecto, $trabajador);
        
        if($resultado == 1) {
            $data['success'] = "Project has been assigned succesfully";
        } else if($resultado == 0) {
            $data['error'] = "Worker has a full load. You cannot assign more";
        } else {
            $data['error'] = "Something has happened, please try again.";
        }
        $id = $this->session->userdata('id');
        $resultado = $this->proyectosmodel->consultarProyectosSupervisor($id);
        $data['proyectos'] = $resultado;
        $this->load->view('principalProyectosView', $data);
    }
    
    public function buscarProyecto()
    {
        $this->load->model('proyectosmodel');
        $idProyecto = $this->input->post('idProyecto');
        
        $resultado = $this->proyectosmodel->buscarProyecto($idProyecto);
        
        if($resultado->num_rows() > 0) {
            echo "<table class='table_message'>";
                echo "<tr><td>Project</td><td>Description</td></tr>";
                echo "<tr>";
                    foreach($resultado->result() as $row) {
                        echo "<td>".$row->Nombre."</td>";
                        echo "<td>".$row->Descripcion."</td>";
                    }
                echo "</tr>";
            echo "</table>";
        } else {
            echo "<p>No projects has been found</p>";
        }
    }
    
    public function eliminarProyecto()
    {
        $this->load->model('proyectosmodel');
        $idProyecto = $this->input->post('idProyecto');
        
        $resultado = $this->proyectosmodel->eliminaProyecto($idProyecto);
        
        if($resultado == 1) {
            echo "<p>The project has been deleted succesfully</p>";
        } else {
            echo "<p>Project could not be deleted, please try again.</p>";
        }
    }
    
    public function eliminar()
    {
        $this->load->model('proyectosmodel');
        $id = $this->session->userdata('id');
        
        $resultado = $this->proyectosmodel->consultarProyectosSupervisor($id);
        $data['proyectos'] = $resultado;
        $this->load->view('eliminarProyectoView', $data);
    }
    
    public function requestProyect()
    {
        $this->load->model('proyectosmodel');
        $idProyecto = $this->input->post('idProyecto');
        $idUser = $this->session->userdata('id');
        $value = $this->input->post('value');
        
        $idSupervisor = $this->proyectosmodel->getSupervisor($idProyecto);
        
        $resultado = $this->proyectosmodel->addRequest($idProyecto, $idUser, $idSupervisor, $value);
        if($resultado == 1) {
            echo "Request has been send";
        } else {
            echo "Request could not been sent";
        }
    }
    
    public function seeRequest()
    {
        $this->load->model('proyectosmodel');
        $this->load->model('usuariosmodel');
        $idSupervisor = $this->input->post('idSupervisor');
        
        $requests = $this->proyectosmodel->getAllRequests($idSupervisor);
        if(!is_numeric($requests)) {
            $cont = count($requests->result());
        
            $i = 0;
            $j = 0;
            $k = 0;
            foreach($requests->result() as $row) {
                $projects[$i++] = $this->proyectosmodel->getProyectosData($row->idProyecto);
                $users[$j++] = $this->usuariosmodel->getInfo($row->idUsuario);
                $ids[$k++] = $row->idrequests;
            }

            $data['projects'] = $projects;
            $data['users'] = $users;
            $data['cont'] = $cont;
            $data['ids'] = $ids;
        } else {
            $data['error'] = 0;
        }

        $this->load->view('seeRequestView', $data);
    }
    
    public function acceptRequest()
    {
        $this->load->model('proyectosmodel');
        $idProyecto = $this->input->post('idProyect');
        $idUser = $this->input->post('idUser');
        $idRequest = $this->input->post('idRequest');
        
        $resultado = $this->proyectosmodel->addUser($idProyecto, $idUser);
        
        if($resultado == 1) {
            $resultado2 = $this->proyectosmodel->updateRequest($idRequest, 1);
            if($resultado2 == 1) {
                echo "User added to proyect!";
            } else {
                echo "Cannot update user";
            }
        } else {
            echo "Cannot update user";
        }
    }
    
    public function consultarTodosUsuarios($arrayProyectos)
    {
        $this->load->model('usuariosmodel');
        $i = 0;
        $data = array();
        foreach($arrayProyectos->result() as $row) {
            $data[$i++] = $this->usuariosmodel->getSupervisor($row->idSupervisor);
        }
        
        return $data;
    }
    
    public function getIdProject($nombre)
    {
        $this->load->model('usuariosmodel');
        $this->db->where('Nombre', $nombre);
        $resultado = $this->db->get('trabajos');
        
        return $resultado;
    }
    
    public function myProjects()
    {
        $idSupervisor = $this->session->userdata('id');
        if($idSupervisor != "") {
            $this->load->model('proyectosmodel');
            $resultado = $this->proyectosmodel->getMyProjects($idSupervisor);
            if(!is_numeric($resultado)) {
                $data['myProjects'] = $resultado;
            } else {
                $data['error'] = "There are no projects to show. Please add some projects";
            }
            $this->load->view('principalProyectosView', $data);
            $this->load->view('footer');
        } else {
            $this->session->sess_destroy();
            $this->load->view("indexView");
        }
    }
    
    public function getProyectModify()
    {
        $idProyect = $this->input->post('idProyecto');
        $this->load->model("proyectosmodel");
        $resultado = $this->proyectosmodel->getInfoProyectoModify($idProyect);
        if(!is_numeric($resultado)) {
            $data['project'] = $resultado;
        } else {
            $data['error1'] = "There if no information related to the specified project";
        }
        $resultado2 = $this->proyectosmodel->getGradesAreas($idProyect);
        if(!is_numeric($resultado2)) {
            $data['califArea'] = $resultado2;
        }
        $resultado3 = $this->proyectosmodel->getGradesCompetences($idProyect);
        if(!is_numeric($resultado3)) {
            $data['califCompetence'] = $resultado3;
        }
        $this->load->view('modifyProjectView', $data);
    }
    
    public function updateProject()
    {
        //**Datos básicos del proyecto
        $id = $this->input->post("id");
        $nombre = $this->input->post("nombre");
        $desc = $this->input->post("descripcion");
        $habilitado = $this->input->post("habilitado");
        //**Datos áreas
        $security = $this->input->post("security");
        $web = $this->input->post("web");
        $db = $this->input->post("db");
        $network = $this->input->post("network");
        $desktop = $this->input->post("desktop");
        //**Datos competencias
        $team = $this->input->post("team");
        $comunication = $this->input->post("comunication");
        $work = $this->input->post("work");
        $initiative = $this->input->post("initiative");
        $leader = $this->input->post("leader");
        
        if($nombre == "" || $desc == "") {
            echo "<span>All the fields must be filled</span>";
        } else {
            $this->load->model('proyectosmodel');
            $resultado = $this->proyectosmodel->updateProject($id, $nombre, $desc, $habilitado);
            //**Se actualizó correctamente el proyecto
            if($resultado == 1) {
                //**Se actualizan las áreas, si no existe se inserta
                $area = "trabajoarea";
                $competencia = "trabajocompetencia";
                if($security == "true") {
                    $flag = $this->proyectosmodel->getUpdateProject($id, 1, $area);
                    if($flag == 0) {
                        $this->proyectosmodel->insertaAreas(1, $id);
                    }
                } else {
                    $flag = $this->proyectosmodel->getUpdateProject($id, 1, $area);
                    if($flag != 0) {
                        $this->proyectosmodel->deleteAC($flag,$area);
                    }
                }
                if($web == "true") {
                    $flag = $this->proyectosmodel->getUpdateProject($id, 2, $area);
                    if($flag == 0) {
                        $this->proyectosmodel->insertaAreas(2, $id);
                    }
                } else {
                    $flag = $this->proyectosmodel->getUpdateProject($id, 2, $area);
                    if($flag != 0) {
                        $this->proyectosmodel->deleteAC($flag,$area);
                    }
                }
                if($db == "true") {
                    $flag = $this->proyectosmodel->getUpdateProject($id, 3, $area);
                    if($flag == 0) {
                        $this->proyectosmodel->insertaAreas(3, $id);
                    }
                } else {
                    $flag = $this->proyectosmodel->getUpdateProject($id, 3, $area);
                    if($flag != 0) {
                        $this->proyectosmodel->deleteAC($flag,$area);
                    }
                }
                if($network == "true") {
                    $flag = $this->proyectosmodel->getUpdateProject($id, 4, $area);
                    if($flag == 0) {
                        $this->proyectosmodel->insertaAreas(4, $id);
                    }
                } else {
                    $flag = $this->proyectosmodel->getUpdateProject($id, 4, $area);
                    if($flag != 0) {
                        $this->proyectosmodel->deleteAC($flag,$area);
                    }
                }
                if($desktop == "true") {
                    $flag = $this->proyectosmodel->getUpdateProject($id, 5, $area);
                    if($flag == 0) {
                        $this->proyectosmodel->insertaAreas(5, $id);
                    }
                } else {
                    $flag = $this->proyectosmodel->getUpdateProject($id, 5, $area);
                    if($flag != 0) {
                        $this->proyectosmodel->deleteAC($flag,$area);
                    }
                }
                if($team == "true") {
                    $flag = $this->proyectosmodel->getUpdateProject($id, 1, $competencia);
                    if($flag == 0) {
                        $this->proyectosmodel->insertaCompetencias(1, $id);
                    }
                } else {
                    $flag = $this->proyectosmodel->getUpdateProject($id, 1, $competencia);
                    if($flag != 0) {
                        $this->proyectosmodel->deleteAC($flag, $competencia);
                    }
                }
                if($comunication == "true") {
                    $flag = $this->proyectosmodel->getUpdateProject($id, 2, $competencia);
                    if($flag == 0) {
                        $this->proyectosmodel->insertaCompetencias(2, $id);
                    }
                } else {
                    $flag = $this->proyectosmodel->getUpdateProject($id, 2, $competencia);
                    if($flag != 0) {
                        $this->proyectosmodel->deleteAC($flag, $competencia);
                    }
                }
                if($work == "true") {
                    $flag = $this->proyectosmodel->getUpdateProject($id, 3, $competencia);
                    if($flag == 0) {
                        $this->proyectosmodel->insertaCompetencias(3, $id);
                    }
                } else {
                    $flag = $this->proyectosmodel->getUpdateProject($id, 3, $competencia);
                    
                    if($flag != 0) {
                        $this->proyectosmodel->deleteAC($flag, $competencia);
                    }
                } 
                if($initiative == "true") {
                    $flag = $this->proyectosmodel->getUpdateProject($id, 4, $competencia);
                    if($flag == 0) {
                        $this->proyectosmodel->insertaCompetencias(4, $id);
                    }
                } else {
                    $flag = $this->proyectosmodel->getUpdateProject($id, 4, $competencia);
                    
                    if($flag != 0) {
                        $this->proyectosmodel->deleteAC($flag, $competencia);
                    }
                }
                if($leader == "true") {
                    $flag = $this->proyectosmodel->getUpdateProject($id, 5, $competencia);
                    if($flag == 0) {
                        $this->proyectosmodel->insertaCompetencias(5, $id);
                    }
                } else {
                    $flag = $this->proyectosmodel->getUpdateProject($id, 5, $competencia);
                    
                    if($flag != 0) {
                        $this->proyectosmodel->deleteAC($flag, $competencia);
                    }
                }
                echo "<span>The project was successfuly updated</span>";
            } else {
                echo "<span>An error has ocurred. Please try again</span>";
            }
        }
    }
    
    public function cancelUpdate()
    {
        $this->load->view("usuariosView");
    }
    
    public function deleteAllProject() 
    {
        $idProjecto = $this->input->post('idProyecto');
        $this->load->model('proyectosmodel');
        try {
            $this->proyectosmodel->deleteAreas($idProjecto);
            $this->proyectosmodel->deleteCompetences($idProjecto);
            $resultado = $this->proyectosmodel->eliminaProyecto($idProjecto);
            if($resultado == 1) {
                echo "<span>The project was successfully deleted</span>";
            } else {
                echo "<span>An error has ocurred. The project was not deleted</span>";
            }
        } catch (Exception $ex) {
            echo "<span>An error has ocurred. Please try again</span>";
        }
    }
    
    public function sendComments()
    {
        $this->load->model('proyectosmodel');
        $idProject = $this->input->post('idProject');
        $idUsuario = $this->input->post('idUsuario');
        $comment = $this->input->post('comment');
        $flag = $this->input->post('flag');
        
        $resultado = $this->proyectosmodel->addComments($idProject, $idUsuario, $comment, $flag);
        if($resultado == 1) {
            echo "<span>The comments has been sent</span>";
        } else {
            echo "<span>An error has occurred. Please try again</span>";
        }
    }
    
    public function seeProject()
    {
        $idProyecto = $this->input->post('idProyecto');
        $this->load->model('proyectosmodel');
        $this->load->model('usuariosmodel');
        $resultado = $this->proyectosmodel->buscarProyecto($idProyecto);
        if($resultado->num_rows() > 0) {
            $data['proyecto'] = $resultado->row();
            $supervisor = $this->proyectosmodel->getSupervisor($idProyecto);
            $supervisor = $this->usuariosmodel->getInfo($supervisor);
            $data['supervisor'] = $supervisor->row();
            $califAreas = $this->proyectosmodel->getGradesAreas($idProyecto);
            $califCompetencias = $this->proyectosmodel->getGradesCompetences($idProyecto);
            if(!is_numeric($califAreas)) {
                $i = 0;
                $areas = array();
                foreach($califAreas->result() as $row) {
                    $areas[$i++] = $row->idArea;
                }
                $data['areas'] = $this->proyectosmodel->getAreaName($areas);
            }
            if(!is_numeric($califCompetencias)) {
                $i = 0;
                $competencias = array();
                foreach($califCompetencias->result() as $row) {
                    $competencias[$i++] = $row->idCompetencias;
                }
                $data['competencias'] = $this->proyectosmodel->getCompetenceName($competencias);
            }  
            $usuarios = $this->usuariosmodel->getUsersWorking($idProyecto);
            if(!is_numeric($usuarios)) {
                $data['usuariosWorking'] = $usuarios;
            }
        } else {
            $data['error'] = 0;
        }
        
        $this->load->view('seeProjectView', $data);
    }
    
    public function gradeWorkers()
    {
        $idProyecto = $this->input->post('idProyecto');
        $this->load->model('usuariosmodel');
        $resultado = $this->usuariosmodel->getUsuariosProyecto($idProyecto);
        if(!is_numeric($resultado)) {
            $i = 0;
            $users = array();
            $names = array();
            foreach($resultado as $row) {
                $users[$i] = $this->usuariosmodel->getGrades($row->idUsuario, $idProyecto);
                $nameAux = $this->usuariosmodel->getInfo($row->idUsuario);
                $names[$i++] = $nameAux->row();
            }
            $data['users'] = $users;
            $data['names'] = $names;
            $data['idProyecto'] = $idProyecto;
        } else {
            $data['error'] = 0;
        }
        $this->load->view('gradeUsersView', $data);
    }
}