<!DOCTYPE>
<html>
    <head>
        
    </head>
    <script>
        $(document).ready(function() {
            $('.close').click(function() {
                $('.overlay-container').fadeOut().end().find('.window-container').removeClass('window-container-visible');
            });
        });
    </script>
    <body>
        <div>
            <?php if(!isset($error)) { ?>
                <div>
                    <h2>User profile</h2>
                    <br/>
                    <div style="text-align: center">
                        <img src="<?php echo $usuario->urlFoto; ?>" title="User picture" alt="Nothing to display" width="200" height="200"/>
                    </div>
                    <div style="text-align: center">
                        <table>
                            <tr>
                                <td><strong>Lastname</strong></td>
                                <td><strong>Name</strong></td>
                                <td><strong>Email</strong></td>
                            </tr>
                            <tr>
                                <?php 
                                    echo '<tr>';
                                        echo '<td>'.$usuario->APaterno.' '.$usuario->AMaterno.'</td>';
                                        echo '<td>'.$usuario->Nombre.'</td>';
                                        echo '<td>'.$usuario->Mail.'</td>';
                                    echo '</tr>';
                                ?>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <?php 
                        if(isset($proyectos)) { 
                            echo '<div>';
                                echo '<span><strong>Projects which are currently working</strong></span><br/>';
                                echo '<table>';
                                    echo '<tr>';
                                        echo '<td><strong>Project</strong></td>';
                                        echo '<td><strong>Description</strong></td>';
                                    echo '</tr>';
                                    foreach($proyectos as $row) {
                                        echo '<tr>';
                                            echo '<td>'.$row->Nombre.'</td>';
                                            echo '<td>'.$row->Descripcion.'</td>';
                                        echo '</tr>';
                                    }
                                echo '</table>';
                            echo '</div>';
                        } 
                    ?>
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
                    <!--***Muestra las gráficas con las calificaciones-->
                    <div style="text-align: center">
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
                        <p1 id="graph1"><img style="-webkit-user-select:none;" width="60%" src="<?php echo base_url(); ?>lib/graph/radarmarkex1View.php?a=<?php echo $dataAreas[0];?>&amp;b=<?php echo $dataAreas[1];?>&amp;c=<?php echo $dataAreas[2];?>&amp;d=<?php echo $dataAreas[3];?>&amp;e=<?php echo $dataAreas[4];?>" alt="" ></p1>
                        <p2 id="graph2"><img style="-webkit-user-select:none;" width="60%" src="<?php echo base_url(); ?>lib/graph/radarmarkex2View.php?a=<?php echo $dataCompetencias[0];?>&amp;b=<?php echo $dataCompetencias[1];?>&amp;c=<?php echo $dataCompetencias[2];?>&amp;d=<?php echo $dataCompetencias[3];?>&amp;e=<?php echo $dataCompetencias[4];?>" alt="" ></p2>
                        <br/>
                        <div>
                                <button class="button2" id="hide">Areas</button>
                                <button class="button2" id="show">Abilities</button>
                        </div>
                    </div>
                    
                    <span class="close">Close</span>
                </div>
            <?php } else {
                        echo "<div>";
                            echo "<h2>Information not found</h3>";
                        echo "</div>";
                    }
            ?>
        </div>
    </body>
</html>