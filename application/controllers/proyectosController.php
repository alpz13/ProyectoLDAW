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
        
        $resultado = $this->proyectosModel->creaProyecto($nombre, $descripcion, $habilitado, $supervisor);
        
        if($resultado == 1) {
            $data['success'] = "Se ha creado un nuevo proyecto";
        } else {
            $data['error'] = 'Ha ocurrido un error. Por favor vuelva a intentarlo.';
        }
        $this->load->view('principalProyectosView', $data);
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
        
        if($trabajos->num_rows() > 0) {
            $data['trabajos'] = $trabajos;
        } 
        if($trabajador->num_rows() > 0) {
            $data['trabajador'] = $trabajador;
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
        $this->load->view('principalProyectosView', $data);
    }
}