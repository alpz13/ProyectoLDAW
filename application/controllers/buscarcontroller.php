<?php

class BuscarController extends CI_Controller {

    public function searchAll()
    {
        $search = $this->input->post('buscar');
        $this->load->model('buscarmodel');
        $users = $this->buscarmodel->searchAllUsuarios($search);
        $projects = $this->buscarmodel->searchAllProjects($search);
        $usuarioAC = $this->buscarmodel->searchAllUsuarioAC($search);
        $projectoAC = $this->buscarmodel->searchAllProjectAC($search);
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
        $data['error'] = 0;
        $this->load->view('showResultsView', $data);
    }
}