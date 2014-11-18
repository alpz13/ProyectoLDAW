<?php

class BuscarController extends CI_Controller {

    public function searchAll()
    {
        $search = $this->input->post('buscar');
        $this->load->model('buscarModel');
        $users = $this->buscarModel->searchAllUsuarios($search);
        $projects = $this->buscarModel->searchAllProjects($search);
        $usuarioAC = $this->buscarModel->searchAllUsuarioAC($search);
        $projectoAC = $this->buscarModel->searchAllProjectAC($search);
        if(!is_numeric($users)) {
            $data['users'] = $users->result();
        } 
        if(!is_numeric($projects)) {
            $data['projects'] = $projects->result();
        }
        if(!is_numeric($usuarioAC[0])) {
            $data['userArea'] = $usuarioAC[0];
        }
        if(!is_numeric($usuarioAC[1])) {
            $data['userCompetence'] = $usuarioAC[1];
        }
        if(!is_numeric($projectoAC[0])) {
            $data['projectArea'] = $projectoAC[0];
        }
        if(!is_numeric($projectoAC[1])) {
            $data['projectCompetence'] = $projectoAC[1];
        }
        
        $this->load->view('showResultsView', $data);
    }
}