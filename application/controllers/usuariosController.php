<?php

class UsuariosController extends CI_Controller {

    public function registraUsuario()
    {
        $this->load->model('usuariosModel');
        
        $this->form_validation->set_rules('mail', 'Correo', 'valid_email');
        
        if ($this->form_validation->run() == FALSE) {
                echo "Debe indicar un email válido";
        } else {
            $nom = $this->input->post('nombre');
            $apeP = $this->input->post('apellidoP');
            $apeM = $this->input->post('apellidoM');
            $pass = $this->input->post('pass');
            $passCon = $this->input->post('passCon');
            $mail = $this->input->post('mail');
            $foto = $this->input->post('foto');
            
            if(($nom || $apeP || $apeM || $pass || $passCon) == "") {
                echo "Debe llenar todos los campos";
            } else if($pass != $passCon) {
                echo "Las contraseñas no coinciden";
            } else {
                if($foto == "") {
                    $foto = "../../files/defaultFoto.jpg";
                }
                $resultado = $this->usuariosModel->registraUsuario($nom, $apeP, $apeM, $pass, $mail, $foto);

                if($resultado == 1) {
                    echo 'Usuario registrado';
                } else {
                    echo "No se ha podido insertar el usuarion con los datos proporcionados";
                }
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
            echo "Deben indicarse todos los campos";
        } else if($pass != $passCon) {
            echo "Las contraseñas no coinciden";
        } else {
            if($foto == "") {
                $foto = "../../files/defaultFoto.jpg";
            }
            $resultado = $this->usuariosModel->actualizaUsuario($id, $nombre, $aPaterno, $aMaterno, $pass, $mail, $foto);
            if($resultado == 1) {
                echo "Datos actualizados";
                $dataUser['nombre'] = $nombre;
                $dataUser['apellidoP'] = $aPaterno;
                $dataUser['apellidoM'] = $aMaterno;
                $dataUser['pass'] = $pass;
                $dataUser['mail'] = $mail;
                $dataUser['foto'] = $foto;
                $this->session->set_userdata($dataUser);
            } else {
                echo "No se han podido registrar los datos. Favor de volver a intentar";
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
            echo "No se han encontrado Usuarios";
        }
    }
    
    public function crearUsuario()
    {
        $this->load->model('usuariosModel');
        
        $nombre = $this->input->post('nombre');
        $apellidoP = $this->input->post('apellidoP');
        $apellidoM = $this->input->post('apellidoM');
        $pass = $this->input->post('pass');
        $passCon = $this->input->post('pass');
        $mail = $this->input->post('mail');
        
        if(($nombre || $apellidoP || $apellidoM || $pass || $passCon || $mail) == "") {
            echo "Favor de llenar todos los campos";
        } else if($pass != $passCon) {
            echo "Las contraseñas no coinciden";
        } else {
            $resultado = $this->usuariosModel->registraUsuario($nombre, $apellidoP, $apellidoM, $pass, $mail);
            if($resultado == 1) {
                echo "Registro completo";
            } else {
                echo "No se ha podido insertar al usuario";
            }
        }
    }
    
    public function eliminarUsuario()
    {
        
    }
    
    public function mostrarEliminarUsuario()
    {
        $this->load->model("usuariosModel");
        $id = $this->input->post('id');
        $resultado = $this->usuariosModel->getInfo($id);
        
        if($resultado->num_rows > 0) {
            echo "<br/><br/>";
            foreach($resultado->result() as $row) {
                echo "<table>";
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
            echo "<input type='button' id='eliminarUsuarioConfig' value='Eliminar'/>";
        }
    }
    
    public function moficiarUsuario()
    {
        
    }
    
    public function loadImage()
    {
        //comprobamos que sea una petición ajax
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
        {

            //obtenemos el archivo a subir
            $file = $_FILES['archivo']['name'];

            //comprobamos si existe un directorio para subir el archivo
            //si no es así, lo creamos
            if(!is_dir("../files/")) {
                mkdir("../files/", 0777);
            }
            //comprobamos si el archivo ha subido
            if ($file && move_uploaded_file($_FILES['archivo']['tmp_name'], "../files/".$file))
            {
               sleep(3);//retrasamos la petición 3 segundos
               echo $file;//devolvemos el nombre del archivo para pintar la imagen
           }
        }else{
            //alert("Cayo aca");
            echo "Cayo en error";
        }
    }
}
