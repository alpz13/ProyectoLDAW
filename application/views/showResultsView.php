<?php 
    include_once 'header.php';
    if($this->session->userdata('nombre')) {
        $nombre = $this->session->userdata('nombre');
        $nombre .= " ".$this->session->userdata('apellidoP');
        $nombre .= " ".$this->session->userdata('apellidoM');   
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styleJavascript.css" >
<title>Search results</title>
<body class='home'>
    <div id="tooplate_wrapper">
        <div class='menuArea'>
            <?php 
                if($this->session->userdata('tipo') == 3) {
                    include_once 'headWorker.php';
                } else {
                    include_once 'headAdmin.php';
                }
            ?>
        </div>
        <div class="principalArea">
            <div>
                <div id="title"><h2>Welcome! <?php echo $nombre; ?></h2></div>
                <br/><br/>
                <div>
                    <?php echo form_open("buscarController/searchAll"); ?>
                    <input type="hidden" name="urlBuscar" value="<?php echo base_url(); ?>"/>
                    <input type="search" name="buscar" id="buscar" class="busqueda"/>
                    <!--<input type="submit" value="Buscar" style="border-style: none; background: url('<?php echo base_url(); ?>images/search.gif') no-repeat; width: 24px; height: 20px;">-->
                    <input type="submit" value="Search"/>
                <?php echo form_close();?>
                </div>
            </div>
            <div class="overlay-container">
                <div id="searchValues" class="window-container zoomin">
                    
                </div>
            </div>
            <div id="contentArea">
                <br/><br/>
                <div>
                    <?php
                    //************************USERS*****************************************************//
                        if(isset($users)) {
                            echo '<div id="divUsers" style="cursor: pointer"><h2>Users</h2></div>';
                            echo '<div id="usersSearchId">';
                                echo '<span>Users found</span><br/>';
                                echo '<br/>';
                                echo '<table>';
                                    echo '<tr>';
                                        echo '<td><strong>Last Name</strong></td>';
                                        echo '<td><strong>Name</strong></td>';
                                        echo '<td><strong>Actions</strong></td>';
                                    echo '</tr>';
                                    foreach($users as $row) {
                                        echo '<tr>';
                                            echo '<td>'.$row->APaterno.' '.$row->AMaterno.'</td>';
                                            echo '<td>'.$row->Nombre.'</td>';
                                            echo '<td>';
                                                echo '<input type="button" value="See profile" name="profileButton" ident="'.$row->idUsuarios.'" data-type="zoomin"/>';
                                            echo '</td>';
                                        echo '</tr>';
                                    }
                                echo '</table>';
                            echo '</div>';
                        } else {
                            echo '<div id="divUsers" style="cursor: pointer"><h2>Users</h2></div>';
                            echo '<div id="usersSearchId">';
                                echo '<span>Users not found</span>';
                            echo '</div>';
                        }
                        
                        echo '</br></br>';
                        
                        //************************PROJECTS*****************************************************//
                        if(isset($projects)) {
                            echo '<div id="divProject" style="cursor: pointer"><h2>Projects</h2></div>';
                                echo '<div id="projectSearchId" style="display: none">';
                                echo '<span>Projects found</span><br/>';
                                echo '<br/>';
                                echo '<table>';
                                    echo '<tr>';
                                        echo '<td><strong>Name</strong></td>';
                                        echo '<td><strong>Description</strong></td>';
                                        echo '<td><strong>Actions</strong></td>';
                                    echo '</tr>';
                                    foreach($projects as $row) {
                                        echo '<tr>';
                                            echo '<td>'.$row->Nombre.'</td>';
                                            echo '<td>'.$row->Descripcion.'</td>';
                                            echo '<td>';
                                                echo '<input type="button" value="Description" ident="'.$row->idTrabajos.'" />';
                                            echo '</td>';
                                        echo '</tr>';
                                    }
                                echo '</table>';
                            echo '</div>';
                        } else {
                            echo '<div id="divProject" style="cursor: pointer"><h2>Projects</h2></div>';
                            echo '<div id="projectSearchId">';
                                echo '<span>Projects not found</span>';
                            echo '</div>';
                        }
                        
                        echo '</br></br>';
                        
                        //************************USERS WITH AREAS*****************************************************//
                        if(isset($userArea)) {
                            echo '<div id="divUserArea" style="cursor: pointer"><h2>Users that match with Area</h2></div>';
                            echo '<div id="usersAreaSearchId" style="display: none">';
                                echo '<span>Users with specific area found</span><br/>';
                                echo '<br/>';
                                echo '<table>';
                                    echo '<tr>';
                                        echo '<td><strong>Last Name</strong></td>';
                                        echo '<td><strong>Name</strong></td>';
                                        echo '<td><strong>Actions</strong></td>';
                                    echo '</tr>';
                                    foreach($userArea as $row) {
                                        echo '<tr>';
                                            echo '<td>'.$row->APaterno.' '.$row->AMaterno.'</td>';
                                            echo '<td>'.$row->Nombre.'</td>';
                                            echo '<td>';
                                                echo '<input type="button" value="Profile" name="profileButton" ident="'.$row->idUsuarios.'" data-type="zoomin"/>';
                                            echo '</td>';
                                        echo '</tr>';
                                    }
                                echo '</table>';
                            echo '</div>';
                        } else {
                            echo '<div id="divUserArea" style="cursor: pointer"><h2>Users that match with Area</h2></div>';
                            echo '<div id="usersAreaSearchId">';
                                echo '<span>Users with specific area not found</span>';
                            echo '</div>';
                        }
                        
                        echo '</br></br>';
                        
                        //************************USERS COMPETENCE*****************************************************//
                        if(isset($userCompetence)) {
                            echo '<div id="divUserCompetence" style="cursor: pointer"><h2>Users that match with Competence</h2></div>';
                            echo '<div id="usersCompetenceSearchId" style="display: none">';
                                echo '<span>Users with specific competence found</span><br/>';
                                echo '<br/>';
                                echo '<table>';
                                    echo '<tr>';
                                        echo '<td><strong>Last Name</strong></td>';
                                        echo '<td><strong>Name</strong></td>';
                                        echo '<td><strong>Actions</strong></td>';
                                    echo '</tr>';
                                    foreach($userCompetence as $row) {
                                        echo '<tr>';
                                            echo '<td>'.$row->APaterno.' '.$row->AMaterno.'</td>';
                                            echo '<td>'.$row->Nombre.'</td>';
                                            echo '<td>';
                                                echo '<input type="button" value="Profile" name="profileButton" ident="'.$row->idUsuarios.'" data-type="zoomin"/>';
                                            echo '</td>';
                                        echo '</tr>';
                                    }
                                echo '</table>';
                            echo '</div>';
                        } else {
                            echo '<div id="divUserCompetence" style="cursor: pointer"><h2>Users that match with Competence</h2></div>';
                            echo '<div id="usersCompetenceSearchId">';
                                echo '<span>Users with specific competence not found</span>';
                            echo '</div>';
                        }
                        
                        echo '</br></br>';
                        
                        //************************PROJECTS AREA*****************************************************//
                        if(isset($projectArea)) {
                            echo '<div id="divProjectArea" style="cursor: pointer"><h2>Projects that match with Area</h2></div>';
                            echo '<div id="projectAreaSearchId" style="display: none">';
                                echo '<span>Projects with specific area found</span><br/>';
                                echo '<br/>';
                                echo '<table>';
                                    echo '<tr>';
                                        echo '<td><strong>Name</strong></td>';
                                        echo '<td><strong>Description</strong></td>';
                                        echo '<td><strong>Actions</strong></td>';
                                    echo '</tr>';
                                    foreach($projectArea as $row) {
                                        echo '<tr>';
                                            echo '<td>'.$row->Nombre.'</td>';
                                            echo '<td>'.$row->Descripcion.'</td>';
                                            echo '<td>';
                                                echo '<input type="button" value="Description" ident="'.$row->idTrabajos.'" />';
                                            echo '</td>';
                                        echo '</tr>';
                                    }
                                echo '</table>';
                            echo '</div>';
                        } else {
                            echo '<div id="divProjectArea" style="cursor: pointer"><h2>Projects that match with Area</h2></div>';
                            echo '<div id="projectAreaSearchId">';
                                echo '<span>Projects with specific area not found</span>';
                            echo '</div>';
                        }
                        
                        echo '</br></br>';
                        
                        //************************PROJECTS COMPETENCE*****************************************************//
                        if(isset($projectCompetence)) {
                            echo '<div id="divProjectCompetence" style="cursor: pointer"><h2>Projects that match with Competence</h2></div>';
                            echo '<div id="projectCompetenceSearchId" style="display: none">';
                                echo '<span>Projects with specific competence found</span><br/>';
                                echo '<br/>';
                                echo '<table>';
                                    echo '<tr>';
                                        echo '<td><strong>Name</strong></td>';
                                        echo '<td><strong>Description</strong></td>';
                                        echo '<td><strong>Actions</strong></td>';
                                    echo '</tr>';
                                    foreach($projectCompetence as $row) {
                                        echo '<tr>';
                                            echo '<td>'.$row->Nombre.'</td>';
                                            echo '<td>'.$row->Descripcion.'</td>';
                                            echo '<td>';
                                                echo '<input type="button" value="Description" ident="'.$row->idTrabajos.'" />';
                                            echo '</td>';
                                        echo '</tr>';
                                    }
                                echo '</table>';
                            echo '</div>';
                        } else {
                            echo '<div id="divProjectCompetence" style="cursor: pointer"><h2>Projects that match with Competence</h2></div>';
                            echo '<div id="projectCompetenceSearchId">';
                                echo '<span>Projects with specific competence not found</span>';
                            echo '</div>';
                        }
                        
                        echo '</br></br>';
                    ?>
                </div>
            </div>
        </div>
    </div>
    <br/><br/><br/>
    <input type="hidden" id="url" value="<?php echo base_url(); ?>"/>
</body>

<?php
    } else {
        include 'error.php';
    }
?>