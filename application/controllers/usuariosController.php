<?php

class UsuariosController extends CI_Controller {

    public function registraUsuario()
    {
        $this->load->model('usuariosModel');
        
        $nom = $this->input->post('nombre');
        $apeP = $this->input->post('apellidoP');
        $apeM = $this->input->post('apellidoM');
        $pass = $this->input->post('pass');
        $passCon = $this->input->post('passCon');
        $mail = $this->input->post('mail');
        $foto = $this->input->post('foto');

        if(($nom || $apeP || $apeM || $pass || $passCon || $mail) == "") {
            echo "<span class='alert alert-info' role='alert'>All fields must be filled</span>";
        } else if($pass != $passCon) {
            echo "<span class='alert alert-info' role='alert'>Passwords does not match</span>";
        } else {
            if($foto == "") {
                $foto = "../../files/defaultFoto.jpg";
            }
            $resultado = $this->usuariosModel->registraUsuario($nom, $apeP, $apeM, $pass, $mail, 3, $foto);
            if($resultado == 1) {
                echo "<span class='alert alert-info' role='alert'>User register</span>";
            } else {
                echo "</span>User could not be created with the information provided</span>";
            }
        }        
    }
    
    public function actualizaUsuario()
    {
        $this->load->model('usuariosModel');
        
        $id = $this->session->userdata('id');
        $nombre = $this->input->post('nombre');
        $aPaterno = $this->input->post('aPaterno');
        $aMaterno = $this->input->post('aMaterno');
        $pass = $this->input->post('pass');
        $passCon = $this->input->post('passCon');
        $mail = $this->input->post('mail');
        $foto = $this->input->post('foto');
        
        if(($nombre || $aPaterno || $aMaterno || $pass || $passCon || $mail) == "") {
            echo "All fields must be filleds";
        } else if($pass != $passCon) {
            echo "Passwords does not match";
        } else {
            if($foto == "") {
                $foto = "../../files/defaultFoto.jpg";
            }
            $pass = base64_encode($pass);
            $resultado = $this->usuariosModel->actualizaUsuario($id, $nombre, $aPaterno, $aMaterno, $pass, $mail, $foto);
            if($resultado == 1) {
                echo "Information Updated";
                $dataUser['nombre'] = $nombre;
                $dataUser['apellidoP'] = $aPaterno;
                $dataUser['apellidoM'] = $aMaterno;
                $dataUser['pass'] = $pass;
                $dataUser['mail'] = $mail;
                $dataUser['foto'] = $foto;
                $this->session->set_userdata($dataUser);
            } else {
                echo "Something has happened, please try again";
            }
        }
    }
    
    public function cargaUsuarios()
    {
        $this->load->model('usuariosModel');
        $id = $this->session->userdata('id');
        $resultados = $this->usuariosModel->getUsuarios($id);
        
        if($resultados->num_rows() > 0) {
            echo "<select id='usuariosSelect'>";
                foreach($resultados->result() as $row) {
                    echo "<option id='".$row->idUsuarios."'>".$row->Nombre." ".$row->APaterno." ".$row->AMaterno."</option>";
                }
            echo "</select>";
        } else {
            echo "No users has been found";
        }
    }
    
    public function crearUsuario()
    {
        $this->load->model('usuariosModel');
        
        $this->form_validation->set_rules('mail', 'Correo', 'valid_email');
        
        if ($this->form_validation->run() == FALSE) {
                echo "<p>*Debe indicar un email vﾃ｡lido</p>";
        } else {
            $nom = $this->input->post('nombre');
            $apeP = $this->input->post('apellidoP');
            $apeM = $this->input->post('apellidoM');
            $pass = $this->input->post('pass');
            $passCon = $this->input->post('passCon');
            $mail = $this->input->post('mail');
            $type = $this->input->post('type');
            $foto = $this->input->post('foto');
            
            if($nom == "" || $apeP == "" || $apeM == "" || $pass == "" || $passCon == "") {
                echo "<p>*All fields must be filled</p>";
            } else if($pass != $passCon) {
                echo "<p>*Passwords doesn not match</p>";
            } else {
                if($foto == "") {
                    $foto = "../../files/defaultFoto.jpg";
                }
                $resultado = $this->usuariosModel->registraUsuario($nom, $apeP, $apeM, $pass, $mail, $type, $foto);

                if($resultado == 1) {
                    echo '<p>User has been registered</p>';
                } else {
                    echo "<p>*User could not be created with provided information, please try again</p>";
                }
            }
        }
    }
    
    public function eliminarUsuario()
    {
        $this->load->model('usuariosModel');
        $id = $this->input->post('id');
        
        $resultado = $this->usuariosModel->eliminaUsuario($id);
        if($resultado == 1) {
            echo "<p>User deleted</p>";
        } else {
            echo "<p>User could not be deleted, please try again.</p>";
        }
    }
    
    public function mostrarEliminarUsuario()
    {
        $this->load->model("usuariosModel");
        $id = $this->input->post('id');
        $resultado = $this->usuariosModel->getInfo($id);
        
        if($resultado->num_rows > 0) {
            echo "<br/><br/>";
            foreach($resultado->result() as $row) {
                echo "<table class='table_message'>";
                    echo "<tr>";
                        echo "<td>";
                            echo "<img src='".$row->urlFoto."' width='100' height='100' alt='img'/>";
                        echo "</td>";
                        echo "<td>";
                            echo $row->Nombre."<br/>".$row->APaterno." ".$row->AMaterno."<br/>";
                            echo $row->Mail;
                        echo "</td>";
                    echo "</tr>";
                echo "</table>";
            }
        }
    }
    
    public function modificarUsuarioShow()
    {
        $this->load->model('usuariosModel');
        $id = $this->input->post('id');
        
        $resultado = $this->usuariosModel->getInfo($id);
        
        if($resultado->num_rows > 0){
            $data['usuario'] = $resultado;
            $this->load->view('usuarioModificarView', $data);
        } else {
            echo "<p>Information could not be found</p>";
        }
    }
    
    public function modificarUsuario()
    {
        $this->load->model('usuariosModel');
        
        $this->form_validation->set_rules('mail', 'Correo', 'valid_email');
        
        if ($this->form_validation->run() == FALSE) {
                echo "<p>Debe indicar un email vﾃ｡lido</p>";
        } else {
            $id = $this->input->post('id');
            $nom = $this->input->post('nombre');
            $apeP = $this->input->post('apellidoP');
            $apeM = $this->input->post('apellidoM');
            $pass = $this->input->post('pass');
            $passCon = $this->input->post('passCon');
            $mail = $this->input->post('mail');
            $foto = $this->input->post('foto');
            
            if(($nom || $apeP || $apeM || $pass || $passCon) == "") {
                echo "<p>All fields must be filleds</p>";
            } else if($pass != $passCon) {
                echo "<p>Passwords does not match</p>";
            } else {
                if($foto == "") {
                    $foto = "../../files/defaultFoto.jpg";
                }
                $resultado = $this->usuariosModel->actualizaUsuario($id, $nom, $apeP, $apeM, $pass, $mail, $foto);

                if($resultado == 1) {
                    echo '<p>Information updated</p>';
                } else {
                    echo "<p>Information could not be updated, please try again.</p>";
                }
            }
        }
    }
    
    public function loadImage()
    {
        print_r($this->input->post('formData'));
    }
    
    public function seeProfile()
    {
        $idUsuario = $this->input->post('idUsuario');
        $this->load->model('usuariosModel');
        $resultado = $this->usuariosModel->getInfo($idUsuario);
        if($resultado->num_rows() > 0) {
            $data['usuario'] = $resultado->row();
            $califAreas = $this->usuariosModel->getCalifArea($idUsuario);
            $califCompetencias = $this->usuariosModel->getCalifCompetencias($idUsuario);
            $proyectos = $this->usuariosModel->getMyProjects($idUsuario);
            $average = $this->usuariosModel->getAverage($idUsuario);
            if($average > 0) {
                $data['average'] = $average;
            }
            if(!is_numeric($proyectos)) {
                $data['proyectos'] = $proyectos;
            }
            $data['califAreas'] = $califAreas;
            $data['califCompetencias'] = $califCompetencias;
        } else {
            $data['error'] = 0;
        }
        
        $this->load->view('seeProfileView', $data);
    }
    
    public function gradeUser()
    {
        $user = $this->input->post('user');
        $idProyecto = $this->input->post('idProyecto');
        $grade = $this->input->post('grade');
        $this->load->model('usuariosModel');
        $resultado = $this->usuariosModel->addGrade($user, $idProyecto, $grade);
        if($resultado == 1) {
            echo '<span>The user has been evaluated</span>';
        } else {
            echo '<span>The user has not been evaluated. Please try again</span>';
        }
    }
    
    public function upgradeGrade()
    {
        $user = $this->input->post('user');
        $idProyecto = $this->input->post('idProyecto');
        $grade = $this->input->post('grade');
        $this->load->model('usuariosModel');
        $resultado = $this->usuariosModel->upgradeGrade($user, $idProyecto, $grade);
        if($resultado == 1) {
            echo '<span>The user grade has been upgraded</span>';
        } else {
            echo '<span>The user grade has not been upgraded. Please try again</span>';
        }
    }
    
    public function takeTest()
    {
        $user = $this->session->userdata('id');
        $data['user'] = $user;
        $this->load->view('testView', $data);
    }
    
    public function gradeAreas()
    {
        $this->load->model('usuariosModel');
        $user = $this->input->post('user');
        //**Security**//
        $a21 = $this->input->post('a21');
        $a22 = $this->input->post('a22');
        $a23 = $this->input->post('a23');
        $a24 = $this->input->post('a24');
        $a25 = $this->input->post('a25');
        $a26 = $this->input->post('a26');
        $a27 = $this->input->post('a27');
        $a28 = $this->input->post('a28');
        $a29 = $this->input->post('a29');
        $a30 = $this->input->post('a30');
        $averageDB = ($a21+$a22+$a23+$a24+$a25+$a26+$a27+$a28+$a29+$a30);
        $this->usuariosModel->addGradeArea(1, $averageDB, $user);
        //**Web**//
        $a11 = $this->input->post('a11');
        $a12 = $this->input->post('a12');
        $a13 = $this->input->post('a13');
        $a14 = $this->input->post('a14');
        $a15 = $this->input->post('a15');
        $a16 = $this->input->post('a16');
        $a17 = $this->input->post('a17');
        $a18 = $this->input->post('a18');
        $a19 = $this->input->post('a19');
        $a20 = $this->input->post('a20');
        $averageWeb = ($a11+$a12+$a13+$a14+$a15+$a16+$a17+$a18+$a19+$a20);
        $this->usuariosModel->addGradeArea(2, $averageWeb, $user);
        //**DB**//
        $a1 = $this->input->post('a1');
        $a2 = $this->input->post('a2');
        $a3 = $this->input->post('a3');
        $a4 = $this->input->post('a4');
        $a5 = $this->input->post('a5');
        $a6 = $this->input->post('a6');
        $a7 = $this->input->post('a7');
        $a8 = $this->input->post('a8');
        $a9 = $this->input->post('a9');
        $a10 = $this->input->post('a10');
        $averageSecurity = ($a1+$a2+$a3+$a4+$a5+$a6+$a7+$a8+$a9+$a10);
        $this->usuariosModel->addGradeArea(3, $averageSecurity, $user);
        //**Networking**//
        $a31 = $this->input->post('a31');
        $a32 = $this->input->post('a32');
        $a33 = $this->input->post('a33');
        $a34 = $this->input->post('a34');
        $a35 = $this->input->post('a35');
        $a36 = $this->input->post('a36');
        $a37 = $this->input->post('a37');
        $a38 = $this->input->post('a38');
        $a39 = $this->input->post('a39');
        $a40 = $this->input->post('a30');
        $averageNetworking = ($a31+$a32+$a33+$a34+$a35+$a36+$a37+$a38+$a39+$a40);
        $this->usuariosModel->addGradeArea(4, $averageNetworking, $user);
        //**Desktop**//
        $a41 = $this->input->post('a41');
        $a42 = $this->input->post('a42');
        $a43 = $this->input->post('a43');
        $a44 = $this->input->post('a44');
        $a45 = $this->input->post('a45');
        $a46 = $this->input->post('a46');
        $a47 = $this->input->post('a47');
        $a48 = $this->input->post('a48');
        $a49 = $this->input->post('a49');
        $a50 = $this->input->post('a50');
        $averageDesktop = ($a41+$a42+$a43+$a44+$a45+$a46+$a47+$a48+$a49+$a50);
        $this->usuariosModel->addGradeArea(5, $averageDesktop, $user);
        $this->usuariosModel->updateTest(1, $user);
        echo '<span>Test completed. Please check your results in your profile</span>';
    }
}
