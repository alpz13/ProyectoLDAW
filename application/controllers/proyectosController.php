    <?php

class ProyectosController extends CI_Controller {
    
    public function creaProyecto()
    {
        $this->load->view('creaProyectoView');
    }
    
    public function nuevoProyecto()
    {
        $this->load->model('proyectosModel');
        $nombre = $this->input->post('nombre');
        $descripcion = $this->input->post('descripcion');
        $habilitado = $this->input->post('habilitado');
        $supervisor = $this->session->userdata('id');
        
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
        
        if ($this->form_validation->run() == FALSE) {
                $data['error'] = "All fields must be filled";
                $this->load->view("creaProyectoView", $data);
        } else {
            $resultado = $this->proyectosModel->creaProyecto($nombre, $descripcion, $habilitado, $supervisor);

            if($resultado == 1) {
                $data['success'] = "New Project has been created";
            } else {
                $data['error'] = 'Something has occured, please try again.';
            }
            $id = $this->session->userdata('id');
            $resultado = $this->proyectosModel->consultarProyectosSupervisor($id);
            $data['proyectos'] = $resultado;
            $this->load->view('principalProyectosView', $data);
        }
    }
    
    public function consultar()
    {
        $this->load->model('proyectosModel');
        $resultado = $this->proyectosModel->consultarTodo();
        
        if($resultado->num_rows() > 0) {
            $data['proyectos'] = $resultado;
        }
        $this->load->view('mostrarProyectosView', $data);
    }
    
    public function asignarTrabajador()
    {
        $this->load->model('proyectosModel');
        $idSupervisor = $this->session->userdata('id');
        $trabajos = $this->proyectosModel->consultarProyectosSupervisor($idSupervisor);
        $trabajador = $this->proyectosModel->consultaTrabajadores($this->session->userdata('id'));
//        $trabajadoresReales = $this->proyectosModel->menoresCinco($trabajador, $idSupervisor);
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
        
        $this->load->model('proyectosModel');
        $resultado = $this->proyectosModel->asignarProyecto($proyecto, $trabajador);
        
        if($resultado == 1) {
            $data['success'] = "Project has been assigned succesfully";
        } else if($resultado == 0) {
            $data['error'] = "Worker has a full load. You cannot assign more";
        } else {
            $data['error'] = "Something has happened, please try again.";
        }
        $id = $this->session->userdata('id');
        $resultado = $this->proyectosModel->consultarProyectosSupervisor($id);
        $data['proyectos'] = $resultado;
        $this->load->view('principalProyectosView', $data);
    }
    
    public function buscarProyecto()
    {
        $this->load->model('proyectosModel');
        $idProyecto = $this->input->post('idProyecto');
        
        $resultado = $this->proyectosModel->buscarProyecto($idProyecto);
        
        if($resultado->num_rows() > 0) {
            echo "<table class='table_message'>";
                echo "<tr><td>Project</td><td>Description</td></tr>";
                echo "<tr>";
                    foreach($resultado->result() as $row) {
                        echo "<td>".$row->NombreTrabajo."</td>";
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
        $this->load->model('proyectosModel');
        $idProyecto = $this->input->post('idProyecto');
        
        $resultado = $this->proyectosModel->eliminaProyecto($idProyecto);
        
        if($resultado == 1) {
            echo "<p>The project has been deleted succesfully</p>";
        } else {
            echo "<p>Project could not be deleted, please try again.</p>";
        }
    }
    
    public function eliminar()
    {
        $this->load->model('proyectosModel');
        $id = $this->session->userdata('id');
        
        $resultado = $this->proyectosModel->consultarProyectosSupervisor($id);
        $data['proyectos'] = $resultado;
        $this->load->view('eliminarProyectoView', $data);
    }
    
}