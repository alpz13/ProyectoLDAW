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
        <br/><br/><br/>
        <div id="msgConfirm" style="display: none">
            
        </div>
<<<<<<< HEAD
        <div class='principalMenus' id="principalRequests">
                <?php 
                    $i = 0;
                    for($i; $i < $cont; $i++) {
                        $row = $users[$i]->row($i);
                        $rowP = $projects[$i]->row($i);
                        $rowI = $ids[$i];
                ?>
                    <table class="table_message">
                        <tr>
                            <td class='td2'>
                                User: <?php echo $row->APaterno." ".$row->AMaterno." ".$row->Nombre;?>
                            </td>
                            <td class='td'>
                                <input type="button" class="btn btn-primary" value="See user" onClick="seeUser('<?php echo $row->idUsuarios; ?>')"/>
                            </td>
                            <td class='td2'>
                                Project: <?php echo $rowP->Nombre?>
                            </td>
                            <td class='td'>
                                <input type="button" class="btn btn-primary" value="See Project" onClick="seeProject('<?php echo $rowP->idTrabajos; ?>')"/>
                            </td>
                            <td class='td'>
                                <input type="button" class="btn btn-success" value="Accept" onClick="acceptProyect('<?php echo $rowP->idTrabajos; ?>', '<?php echo $row->idUsuarios; ?>', '<?php echo $rowI; ?>')"/>
                            </td>
                            <td class='td'>
                                <input type='button' name="denyProject" class='btn btn-danger' value='Deny' ident='<?php echo $row->idUsuarios;?>' ident2='<?php echo $rowP->idTrabajos;?>'/>
                            </td>
                        </tr>
                    </table>
                    <br/>
                    <?php $id = "div".$rowP->idTrabajos.$row->idUsuarios; ?>
                        <div style="display: none" name="<?php echo $id ;?>">
                            <textarea cols="90" rows="3" name="commentText<?php echo $rowP->idTrabajos.$row->idUsuarios; ?>"></textarea>
                            <br/>
                            <input type="button" name="commentButton" ident3="<?php echo $row->idUsuarios;?>" ident4="<?php echo $rowP->idTrabajos;?>" value="Send comments"/>
                        </div>
                    <br/>
=======
        <div class="overlay-container">
            <div id="searchValues" class="window-container zoomin">

            </div>
        </div>
        <?php if(!isset($error)) { ?>
            <div class='principalMenus' id="principalRequests">
>>>>>>> 417398a409c885a5e9d99853441ff1e23567f65c
                    <?php 
                        $i = 0;
                        for($i; $i < $cont; $i++) {
                            $row = $users[$i]->row($i);
                            $rowP = $projects[$i]->row($i);
                            $rowI = $ids[$i];
                    ?>
<<<<<<< HEAD
            <table>
                <tr>
                    <td class='td'>
                        <?php echo form_open("principalController/homeView"); ?>
                            <input type="submit" class="btn btn-primary" value="Back"/>
                        <?php echo form_close(); ?>
                    </td>
                </tr>
            </table>
        </div>
=======
                        <table class="table_message">
                            <tr>
                                <td class='td2'>
                                    User: <?php echo $row->APaterno." ".$row->AMaterno." ".$row->Nombre;?>
                                </td>
                                <td class='td'>
                                    <input type="button" class="button2" name="profileButton" value="See user" ident="<?php echo $row->idUsuarios; ?>" data-type="zoomin"/>
                                </td>
                                <td class='td2'>
                                    Project: <?php echo $rowP->Nombre?>
                                </td>
                                <td class='td'>
                                    <input type="button" class="button2" name="projectButton" value="See Project" ident="<?php echo $rowP->idTrabajos; ?>" data-type="zoomin"/>
                                </td>
                                <td class='td'>
                                    <input type="button" class="button2" value="Accept" onClick="acceptProyect('<?php echo $rowP->idTrabajos; ?>', '<?php echo $row->idUsuarios; ?>', '<?php echo $rowI; ?>')"/>
                                </td>
                                <td class='td'>
                                    <input type='button' name="denyProject" class='button2' value='Deny' ident='<?php echo $row->idUsuarios;?>' ident2='<?php echo $rowP->idTrabajos;?>'/>
                                </td>
                            </tr>
                        </table>
                        <br/>
                        <?php $id = "div".$rowP->idTrabajos.$row->idUsuarios; ?>
                            <div style="display: none" name="<?php echo $id ;?>">
                                <textarea cols="90" rows="3" name="commentText<?php echo $rowP->idTrabajos.$row->idUsuarios; ?>"></textarea>
                                <br/>
                                <input type="button" name="commentButton" ident3="<?php echo $row->idUsuarios;?>" ident4="<?php echo $rowP->idTrabajos;?>" value="Send comments"/>
                            </div>
                        <br/>
                        <?php 

                        } 
                        ?>
                <table>
                    <tr>
                        <td class='td'>
                            <?php echo form_open("principalController/homeView"); ?>
                                <input type="submit" class="button2" value="Back"/>
                            <?php echo form_close(); ?>
                        </td>
                    </tr>
                </table>
            </div>
        <?php } else {
            echo '<div style="center"><span>There are no pending requests</span></div>';
        }
        ?>
>>>>>>> 417398a409c885a5e9d99853441ff1e23567f65c
        <input type="hidden" id="url" value="<?php echo base_url(); ?>" />
    </body>
</html>

