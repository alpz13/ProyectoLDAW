<!DOCTYPE>
<html>
    <head>
        <title>Job Scope</title>
        <link type="image/x-icon" href="<?php echo base_url(); ?>images/websiteico.ico" rel="shortcut icon"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body class="home">
        <div>
            
        </div>
        <?php include ('header.php'); ?>
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
        </div>
        <br/><br/>
        <div>
            <table>
                <?php 
                    $i = 0;
                    for($i; $i < $cont; $i++) {
                        $row = $users[$i]->row($i);
                        $rowP = $projects[$i]->row($i);
                        $rowI = $ids[$i];
                ?>
                        <tr>
                            <td>
                                User: <?php echo $row->APaterno." ".$row->AMaterno." ".$row->Nombre;?>
                            </td>
                            <td>
                                <input type="button" value="See user" onClick="seeUser('<?php echo $row->idUsuarios; ?>')"/>
                            </td>
                            <td>
                                Project: <?php echo $rowP->Nombre?>
                            </td>
                            <td>
                                <input type="button" value="See Project" onClick="seeProject('<?php echo $rowP->idTrabajos; ?>')"/>
                            </td>
                            <td>
                                <input type="button" value="Accept" onClick="acceptProyect('<?php echo $rowP->idTrabajos; ?>', '<?php echo $row->idUsuarios; ?>', '<?php echo $rowI; ?>')"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo form_open("principalController/homeView"); ?>
                                    <input type="submit" value="Back"/>
                                <?php echo form_close(); ?>
                            </td>
                        </tr>
                    <?php 
                        
                    } 
                    ?>
            </table>
        </div>
        <input type="hidden" id="url" value="<?php echo base_url(); ?>" />
    </body>
</html>

