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
        <div id="mensajeConfig" style="margin-left: 30%; margin-right: 30%; text-align: center">
            
        </div>
        <div style="margin-left: 30%; margin-right: 30%; text-align: center">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <td>Name: </td>
                        <td><input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Paternal Surname: </td>
                        <td><input type="text" class="form-control" name="aPaterno" id="aPaterno" value="<?php echo $aPaterno; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Maternal Surname: </td>
                        <td><input type="text" class="form-control" name="aMaterno" id="aMaterno" value="<?php echo $aMaterno; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td><input type="password" class="form-control" name="pass" id="pass" value="<?php echo base64_decode($pass); ?>"/></td>
                    </tr>
                    <tr>
                        <td>Re-entry Passworld: </td>
                        <td><input type="password" class="form-control" name="passCon" id="passCon"/></td>
                    </tr>
                    <tr>
                        <td>Mail: </td>
                        <td><input type="text" class="form-control" name="mail" id="mail" value="<?php echo $mail; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Picture: </td>
                        <td><input type="text" class="form-control" name="urlFoto" id="urlFoto" value="<?php echo $foto; ?>"/></td>
                    </tr>
                    <tr>
                        <td><br/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="button" class="btn btn-primary" id="enviarConfigurar" value="Update"/></td>
                    </tr>
                </table>
            <input type="hidden" id="url" value="<?php echo base_url(); ?>"/>
        </div>
        <br/>
        <div id="userAverage" style="margin-left: 20%; margin-right: 20%; text-align: center">
            <?php 
                if(isset($average)) {
                    if($average <= 3) {
                        echo '<span>General performance: <strong>Bad ('.$average.')</strong></span>';
                    } elseif($average <=6) {
                        echo '<span>General performance: <strong>Regular ('.$average.')</strong></span>';
                    } elseif($average <= 8) {
                        echo '<span>General performance: <strong>Good ('.$average.')</strong></span>';
                    } elseif($average <= 10) {
                        echo '<span>General performance: <strong>Excellent ('.$average.')</strong></span>';
                    }
                    echo '<br/><br/>';
                    for($i = 1; $i < $average; $i++) {
                        echo '<img src="../../files/barra'.$i.'.png" alt="Img" />';
                    }
                    echo '<img src="../../files/barra'.$i.'.png" alt="Img"/>';

                } else {
                    echo '<div class="alert alert-warning" role="alert">The user has not been rated yet</class>';
                }
            ?>
        </div>
        <br/>
        <div style="margin-left: 10%; margin-right: 10%; text-align: center">
            <script>
                //Script para mostrar y esconder las dos graficas (inicia escondiendo la segunda grafica) 23 de octubre del 2014.
                $(document).ready(function(){
                    $("p2").hide();
                    $("#hide").click(function(){
                        $("p2").hide();
                        $("p1").show();
                    });

                    $("#show").click(function(){
                        $("p1").hide();
                        $("p2").show();
                    });
                });
            </script>
            <br><hr><br><br>
            <?php
            if(isset($califAreas)) {
                $i = 0;
                $dataAreas = array();
                foreach($califAreas as $row) {
                    $dataAreas[$i++] = $row->calificacionArea;
                } ?>
            <p1 id="graph1"><img style="-webkit-user-select:none;" width="35%" src="<?php echo base_url(); ?>lib/graph/radarmarkex1View.php?a=<?php echo $dataAreas[0];?>&amp;b=<?php echo $dataAreas[1];?>&amp;c=<?php echo $dataAreas[2];?>&amp;d=<?php echo $dataAreas[3];?>&amp;e=<?php echo $dataAreas[4];?>" alt="" ></p1>
            <br/>
       
            <?php }
            if(isset($califCompetencias)) {
                $i = 0;
                $dataCompetencias = array();
                foreach($califCompetencias as $row) {
                    $dataCompetencias[$i++] = $row->calificacionCompetencia;
                }
                ?>
            <p2 id="graph2"><img style="-webkit-user-select:none;" width="35%" src="<?php echo base_url(); ?>lib/graph/radarmarkex2View.php?a=<?php echo $dataCompetencias[0];?>&amp;b=<?php echo $dataCompetencias[1];?>&amp;c=<?php echo $dataCompetencias[2];?>&amp;d=<?php echo $dataCompetencias[3];?>&amp;e=<?php echo $dataCompetencias[4];?>" alt="" ></p2>
            <br/>
                    <div>
                        <button class="btn btn-primary" id="hide">Areas</button>
                            <button class="btn btn-primary" id="show">Abilities</button>
                    </div>
                    <br/><br/>
            <?php } ?>                
            <br/>
                    <br>   
        </div>
        <br/>
    </body>
</html>

