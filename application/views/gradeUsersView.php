<!DOCTYPE>
<html>
    <head>
        
    </head>
    <script>
        $(document).ready(function() {
            $('.close').click(function() {
                $('.overlay-container').fadeOut().end().find('.window-container').removeClass('window-container-visible');
            });
            
            
            $('[name="gradeWorker"').click(function() {
                user = $(this).attr('ident');
                grade = $("#gradeUser"+user).val();
                idProyecto = $("#idProyecto").val();
                url = $("#url").val();
                $.post(url+"index.php/usuariosController/gradeUser", {
                    user : user,
                    idProyecto : idProyecto,
                    grade : grade
                }, function(data) {
                    $("#resultGrade").html(data);
                })
            });
            $('[name="upgradeWorker"').click(function() {
                user = $(this).attr('ident');
                grade = $("#gradeUser"+user).val();
                idProyecto = $("#idProyecto").val();
                url = $("#url").val();
                $.post(url+"index.php/usuariosController/upgradeGrade", {
                    user : user,
                    idProyecto : idProyecto,
                    grade : grade
                }, function(data) {
                    $("#resultGrade").html(data);
                })
            });
        });
    </script>
    <body>
        <div>
            <?php if(!isset($error)) { ?>
            <input type="hidden" id="idProyecto" value="<?php echo $idProyecto; ?>"/>
            <input type="hidden" id="url" value="<?php echo base_url(); ?>"/>
                <div style="text-align: center">
                    <h2>Users working in the project</h2><br/>
                </div>
                <br/>
                <div id="resultGrade">
                    
                </div>
                <div style="margin-left: 23%">
                    <table>
                        <tr>
                            <td><strong>User </strong></td>
                            <td><strong>Grade value</strong></td>
                        </tr>
                        
                        <?php 
                            $totalRows = count($users);
                            for($i = 0; $i < $totalRows; $i++) {
                                echo '<tr>';
                                    echo '<td>';
                                        $namesAux = $names[$i];
                                        echo $namesAux->APaterno.' '.$names[$i]->AMaterno.' '.$names[$i]->Nombre;
                                    echo '</td>';
                                    echo '<td>';
                                        $infoUser = $users[$i];
                                        if($infoUser == 0) {
                                            echo '&nbsp;&nbsp;<label>Grade: </label>';
                                            echo '<select id="gradeUser'.$names[$i]->idUsuarios.'">';
                                                echo '<option value="0">0</option>';
                                                echo '<option value="1">1</option>';
                                                echo '<option value="2">2</option>';
                                                echo '<option value="3">3</option>';
                                                echo '<option value="4">4</option>';
                                                echo '<option value="5">5</option>';
                                                echo '<option value="6">6</option>';
                                                echo '<option value="7">7</option>';
                                                echo '<option value="8">8</option>';
                                                echo '<option value="9">9</option>';
                                                echo '<option value="10">10</option>';
                                            echo '</select>';
                                            echo '&nbsp;<input type="button" value="Rate" name="gradeWorker" ident="'.$names[$i]->idUsuarios.'" />';
                                        } else {
                                            $calif = $infoUser[0]->Calificacion;
                                            echo '&nbsp;&nbsp;<label>Grade: </label>';
                                            echo '<select id="gradeUser'.$names[$i]->idUsuarios.'">';
                                                for($j = 0; $j <= 10; $j++) {
                                                    if($calif == $j) {
                                                        echo '<option value="'.$j.'" selected="selected">'.$j.'</option>';
                                                    } else {
                                                        echo '<option value="'.$j.'">'.$j.'</option>';
                                                    }
                                                }
                                            echo '</select>';
                                            echo '&nbsp;<input type="button" value="Rate" name="upgradeWorker" ident="'.$names[$i]->idUsuarios.'" />';
                                        }
                                    echo '</td>';                                        
                            }
                        ?>
                    </table>
                </div>
                <br/>
                <span class="close">Close</span>
            <?php }else { ?>
                <div style="text-align: center">
                    <h2>There are no users in the project</h2>
                </div>
                <br/>
                <span class="close">Close</span>
            <?php } ?>
        </div>
    </body>
</html>