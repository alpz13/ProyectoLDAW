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
                $data['error'] = "Deben llenarse todos los campos indicados";
                $this->load->view("creaProyectoView", $data);
        } else {
            $resultado = $this->proyectosModel->creaProyecto($nombre, $descripcion, $habilitado, $supervisor);

            if($resultado == 1) {
                $data['success'] = "Se ha creado un nuevo proyecto";
            } else {
                $data['error'] = 'Ha ocurrido un error. Por favor vuelva a intentarlo.';
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
        $trabajador = $this->proyectosModel->consultaTrabajadores();
        $trabajadoresReales = $this->proyectosModel->menoresCinco($trabajador, $idSupervisor);
        
        if($trabajos->num_rows() > 0) {
            $data['trabajos'] = $trabajos;
        } 
        if($trabajadoresReales->num_rows() > 0) {
            $data['trabajador'] = $trabajadoresReales;
        }
        $this->load->view('asignarTrabajadorView', $data);
    }
    
    public function asignarProyecto()
    {
        $proyecto = $this->input->post('proyecto');
        $trabajador = $this->input->post('trabajador');
        
        $this->load->model('proyectosModel');
        $resultado = $this->proyectosModel->asignarProyecto($proyecto, $trabajador);
        
        if($resultado == 1) {
            $data['success'] = "Se ha asignado al trabajador al proyecto exitosamente";
        } else if($resultado == 0) {
            $data['error'] = "El trabajador seleccionado cuenta con más de 5 proyectos. No se puede asignar más";
        } else {
            $data['error'] = "Ha ocurrido un error. Por favor vuelva a intentarlo";
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
                echo "<tr><td>Proyecto</td><td>Descripción</td></tr>";
                echo "<tr>";
                    foreach($resultado->result() as $row) {
                        echo "<td>".$row->NombreTrabajo."</td>";
                        echo "<td>".$row->Descripcion."</td>";
                    }
                echo "</tr>";
            echo "</table>";
        } else {
            echo "<p>No se han encontrado resultados</p>";
        }
    }
    
    public function eliminarProyecto()
    {
        $this->load->model('proyectosModel');
        $idProyecto = $this->input->post('idProyecto');
        
        $resultado = $this->proyectosModel->eliminaProyecto($idProyecto);
        
        if($resultado == 1) {
            echo "<p>El proyecto se ha eliminado correctamente</p>";
        } else {
            echo "<p>No se ha podido eliminar el proyecto. Favor de intentarlo de nuevo</p>";
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