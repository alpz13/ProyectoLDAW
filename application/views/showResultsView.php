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
        <div class="principalArea" style="margin-left:13%; margin-right:13%">
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
                            echo '<div id="divUsers" class="alert alert-info" role="alert" style="cursor: pointer"><strong>Users</strong></div>';
                            echo '<div id="usersSearchId" style="width: 70%">';
                                echo '<br/>';
                                echo '<table class="table table-bordered table-hover table-striped">';
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
                                                echo '<input type="button" class="btn btn-info" value="See profile" name="profileButton" ident="'.$row->idUsuarios.'" data-type="zoomin"/>';
                                            echo '</td>';
                                        echo '</tr>';
                                    }
                                echo '</table>';
                            echo '</div>';
                        } else {
                            echo '<div id="divUsers" class="alert alert-info" role="alert" style="cursor: pointer"><strong>Users</strong></div>';
                            echo '<div id="usersSearchId">';
                                echo '<span>Users not found</span>';
                            echo '</div>';
                        }
                        
                        echo '</br></br>';
                        
                        //************************PROJECTS*****************************************************//
                        if(isset($projects)) {
                            echo '<div id="divProject" class="alert alert-info" role="alert" style="cursor: pointer"><strong>Projects</strong></div>';
                                echo '<div id="projectSearchId" style="display: none; width: 70%">';
                                echo '<br/>';
                                echo '<table class="table table-bordered table-hover table-striped">';
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
                                                echo '<input type="button" class="btn btn-info" value="Description" name="projectButton" ident="'.$row->idTrabajos.'" data-type="zoomin"/>';
                                            echo '</td>';
                                        echo '</tr>';
                                    }
                                echo '</table>';
                            echo '</div>';
                        } else {
                            echo '<div id="divProject" class="alert alert-info" role="alert" style="cursor: pointer"><strong>Projects</strong></div>';
                            echo '<div id="projectSearchId">';
                                echo '<span>Projects not found</span>';
                            echo '</div>';
                        }
                        
                        echo '</br></br>';
                        
                        //************************USERS WITH AREAS*****************************************************//
                        if(isset($userArea)) {
                            echo '<div id="divUserArea" class="alert alert-info" role="alert" style="cursor: pointer"><strong>Users that match with Area</strong></div>';
                            echo '<div id="usersAreaSearchId" style="display: none; width: 70%">';
                                echo '<br/>';
                                echo '<table class="table table-bordered table-hover table-striped">';
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
                                                echo '<input type="button" class="btn btn-info" value="Profile" name="profileButton" ident="'.$row->idUsuarios.'" data-type="zoomin"/>';
                                            echo '</td>';
                                        echo '</tr>';
                                    }
                                echo '</table>';
                            echo '</div>';
                        } else {
                            echo '<div id="divUserArea" class="alert alert-info" role="alert" style="cursor: pointer"><strong>Users that match with Area</strong></div>';
                            echo '<div id="usersAreaSearchId">';
                                echo '<span>Users with specific area not found</span>';
                            echo '</div>';
                        }
                        
                        echo '</br></br>';
                        
                        //************************USERS COMPETENCE*****************************************************//
                        if(isset($userCompetence)) {
                            echo '<div id="divUserCompetence" class="alert alert-info" role="alert" style="cursor: pointer"><strong>Users that match with Competence</strong></div>';
                            echo '<div id="usersCompetenceSearchId" style="display: none; width: 70%">';
                                echo '<br/>';
                                echo '<table class="table table-bordered table-hover table-striped">';
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
                                                echo '<input type="button" class="btn btn-info" value="Profile" name="profileButton" ident="'.$row->idUsuarios.'" data-type="zoomin"/>';
                                            echo '</td>';
                                        echo '</tr>';
                                    }
                                echo '</table>';
                            echo '</div>';
                        } else {
                            echo '<div id="divUserCompetence" class="alert alert-info" role="alert" style="cursor: pointer"><strong>Users that match with Competence</strong></div>';
                            echo '<div id="usersCompetenceSearchId">';
                                echo '<span>Users with specific competence not found</span>';
                            echo '</div>';
                        }
                        
                        echo '</br></br>';
                        
                        //************************PROJECTS AREA*****************************************************//
                        if(isset($projectArea)) {
                            echo '<div id="divProjectArea" class="alert alert-info" role="alert" style="cursor: pointer"><strong>Projects that match with Area</strong></div>';
                            echo '<div id="projectAreaSearchId" style="display: none; width: 70%">';
                                echo '<br/>';
                                echo '<table class="table table-bordered table-hover table-striped">';
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
                                                echo '<input type="button" class="btn btn-info" value="Description" name="projectButton" ident="'.$row->idTrabajos.'" data-type="zoomin"/>';
                                            echo '</td>';
                                        echo '</tr>';
                                    }
                                echo '</table>';
                            echo '</div>';
                        } else {
                            echo '<div id="divProjectArea" class="alert alert-info" role="alert" style="cursor: pointer"><strong>Projects that match with Area</strong></div>';
                            echo '<div id="projectAreaSearchId">';
                                echo '<span>Projects with specific area not found</span>';
                            echo '</div>';
                        }
                        
                        echo '</br></br>';
                        
                        //************************PROJECTS COMPETENCE*****************************************************//
                        if(isset($projectCompetence)) {
                            echo '<div id="divProjectCompetence" class="alert alert-info" role="alert" style="cursor: pointer"><strong>Projects that match with Competence</strong></div>';
                            echo '<div id="projectCompetenceSearchId" style="display: none; width: 70%">';
                                echo '<br/>';
                                echo '<table class="table table-bordered table-hover table-striped">';
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
                                                echo '<input type="button" class="btn btn-info" value="Description" name="projectButton" ident="'.$row->idTrabajos.'" data-type="zoomin"/>';
                                            echo '</td>';
                                        echo '</tr>';
                                    }
                                echo '</table>';
                            echo '</div>';
                        } else {
                            echo '<div id="divProjectCompetence" class="alert alert-info" role="alert" style="cursor: pointer"><strong>Projects that match with Competence</strong></div>';
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