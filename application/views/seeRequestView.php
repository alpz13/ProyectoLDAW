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
        <div class='principalMenus' id="principalRequests" style="margin-left: 20%; margin-right: 20%">
            <div class="overlay-container">
                <div id="searchValues" class="window-container zoomin">

                </div>
            </div>
            <?php if(!isset($error)) { ?>
                <?php 
                    $i = 0;
                    for($i; $i < $cont; $i++) {
                        $row = $users[$i]->row($i);
                        $rowP = $projects[$i]->row($i);
                        $rowI = $ids[$i];
                ?>
                    <table class="table table-bordered table-hover table-striped">
                        <tr>
                            <td>
                                <strong>User:</strong> <?php echo $row->APaterno." ".$row->AMaterno." ".$row->Nombre;?>
                            </td>
                            <td>
                                <input type="button" name="profileButton" class="btn btn-primary" value="See user" ident="<?php echo $row->idUsuarios; ?>" data-type="zoomin"/>
                            </td>
                            <td>
                                <strong>Project:</strong> <?php echo $rowP->Nombre?>
                            </td>
                            <td>
                                <input type="button" name="projectButton" class="btn btn-primary" value="See Project" ident="<?php echo $rowP->idTrabajos; ?>" data-type="zoomin"/>
                            </td>
                            <td>
                                <input type="button" class="btn btn-success" value="Accept" onClick="acceptProyect('<?php echo $rowP->idTrabajos; ?>', '<?php echo $row->idUsuarios; ?>', '<?php echo $rowI; ?>')"/>
                            </td>
                            <td>
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
        <div class="overlay-container">
            <div id="searchValues" class="window-container zoomin">

            </div>
        </div>
        <?php } ?>
            <div style="text-align: center">
                <?php echo form_open("principalcontroller/homeView"); ?>
                    <input type="submit" class="btn btn-primary" value="Back"/>
                <?php echo form_close(); ?>
            </div>
        </div>
        <?php } else { ?>
        <div style="text-align:center; margin-left: 30%; margin-right: 30%"><div class="alert alert-success" role="alert">There are no pending requests</div></div>
                    <?php } ?>
        <input type="hidden" id="url" value="<?php echo base_url(); ?>" />
    </body>
</html>

