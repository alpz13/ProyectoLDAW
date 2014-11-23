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
        <div>
            <form style="margin-left: 31%">
                <table>
                    <tr>
                        <td>Name: </td>
                        <td><input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Paternal Surname: </td>
                        <td><input type="text" name="aPaterno" id="aPaterno" value="<?php echo $aPaterno; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Maternal Surname: </td>
                        <td><input type="text" name="aMaterno" id="aMaterno" value="<?php echo $aMaterno; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td><input type="password" name="pass" id="pass" value="<?php echo $pass; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Re-entry Passworld: </td>
                        <td><input type="password" name="passCon" id="passCon"/></td>
                    </tr>
                    <tr>
                        <td>Mail: </td>
                        <td><input type="text" name="mail" id="mail" value="<?php echo $mail; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Picture: </td>
                        <td><input type="text" name="urlFoto" id="urlFoto" value="<?php echo $foto; ?>"/></td>
                    </tr>
                    <tr>
                        <td><br/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="button" class="button2" id="enviarConfigurar" value="Update"/></td>
                    </tr>
                </table>
            <input type="hidden" id="url" value="<?php echo base_url(); ?>"/>
            </form>
        </div>
        <br/>
        <div id="userAverage">
            <?php 
                if(isset($average)) {
                    if($average <= 3) {
                        echo '<span>General performance: <strong>Bad</strong></span>';
                    } elseif($average <=6) {
                        echo '<span>General performance: <strong>Regular</strong></span>';
                    } elseif($average <= 8) {
                        echo '<span>General performance: <strong>Good</strong></span>';
                    } elseif($average <= 10) {
                        echo '<span>General performance: <strong>Excellent</strong></span>';
                    }
                    echo '<br/><br/>';
                    for($i = 1; $i < $average; $i++) {
                        echo '<img src="../../files/barra'.$i.'.png" alt="Img" />';
                    }
                    echo '<img src="../../files/barra'.$i.'.png" alt="Img"/><span>'.$average.'</span>';

                } else {
                    echo '<span>The user has not been rated yet</span>';
                }
            ?>
        </div>
        <br/>
        <div style="text-align: center;">
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
            <img id="usrProfilePhoto" width="250x250" src="<?php echo base_url(); ?>images/user.png">
            <?php
                $i = 0;
                $dataAreas = array();
                foreach($califAreas->result() as $row) {
                    $dataAreas[$i++] = $row->calificacionArea;
                }
                $i = 0;
                $dataCompetencias = array();
                foreach($califCompetencias->result() as $row) {
                    $dataCompetencias[$i++] = $row->calificacionCompetencia;
                }
            ?>
            <p1 style="margin-left:5%" id="graph1"><img style="-webkit-user-select:none;" width="35%" src="<?php echo base_url(); ?>lib/graph/radarmarkex1View.php?a=<?php echo $dataAreas[0];?>&amp;b=<?php echo $dataAreas[1];?>&amp;c=<?php echo $dataAreas[2];?>&amp;d=<?php echo $dataAreas[3];?>&amp;e=<?php echo $dataAreas[4];?>" alt="" ></p1>
            <p2 style="margin-left:5%" id="graph2"><img style="-webkit-user-select:none;" width="35%" src="<?php echo base_url(); ?>lib/graph/radarmarkex2View.php?a=<?php echo $dataCompetencias[0];?>&amp;b=<?php echo $dataCompetencias[1];?>&amp;c=<?php echo $dataCompetencias[2];?>&amp;d=<?php echo $dataCompetencias[3];?>&amp;e=<?php echo $dataCompetencias[4];?>" alt="" ></p2>
            <br/>
                    <div style="margin-left:42%">
                            <button class="button2" id="hide">Areas</button>
                            <button class="button2" id="show">Abilities</button>
                    </div>
                    <br><hr><br><br>   
        </div>
        <br/>
        <div id="mensajeConfig">
            
        </div>
    </body>
</html>

