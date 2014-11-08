<div>
    <?php
        if(isset($project)) { 
            echo "<table>";
                foreach($project->result() as $row) {
                    echo "<tr>";
                        echo "<td>";
                            echo "Name of project:";
                        echo "</td>";
                        echo "<td>";
                            echo '<input type="text" name="nombre" value="'.$row->Nombre.'"/>';
                        echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>";
                            echo "Description:";
                        echo "</td>";
                        echo "<td>";
                            echo '<textarea rows="5" cols="70">'.$row->Descripcion.'</textarea>';
                        echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>";
                            echo "Availability:";
                        echo "</td>";
                        echo "<td>";
                            if($row->Habilitado == 1) {
                                echo '<label>Enable: </label><input type="radio" name="habilitado" value="1" checked="true"/>';
                                echo '<label>Disable: </label><input type="radio" name="habilitado" value="0"/>';
                            } else {
                                echo '<label>Enable: </label><input type="radio" name="habilitado" value="1"/>';
                                echo '<label>Disable: </label><input type="radio" name="habilitado" value="0"  checked="true"/>';
                            }
                        echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>";
                            echo "<strong>Areas:</strong><br/>
                                    Security: <br/>
                                    Web: <br/>
                                    DataBases: <br/>
                                    Networking: <br/>
                                    DesktopApps: <br/>";
                            echo "</td>";
                        echo "<td>";
                            echo '<br/>
                                    <input type="checkbox" name="security" value="1"/><br/>
                                    <input type="checkbox" name="web" value="2"/><br/>
                                    <input type="checkbox" name="db" value="3"/><br/>
                                    <input type="checkbox" name="network" value="4"/><br/>
                                    <input type="checkbox" name="desktop" value="5"/><br/>';
                        echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>";
                            echo "<strong>Competences:</strong><br/>
                                    Team Work: <br/>
                                    Comunication: <br/>
                                    Work under pressure: <br/>
                                    Initiative: <br/>
                                    Leadership: <br/>";
                        echo "</td>";
                        echo "<td>";
                            echo "<br/>";
                            if(isset($califArea)) {
                                $areas = $califArea->result();
                                $totalAreas = count($areas);
                                $i = 0;
                                for($i; $i < $totalAreas; $i++) {
                                    if($areas[$i]->idArea == 1) {
                                        echo '<input type="checkbox" name="team" value="1" checked/><br/>';
                                    }else if($areas[$i]->idArea == 2) {
                                        echo '<input type="checkbox" name="comunication" value="1" checked/><br/>';
                                    }else if($areas[$i]->idArea == 3) {
                                        echo '<input type="checkbox" name="work" value="1" checked/><br/>';
                                    }else if($areas[$i]->idArea == 4) {
                                        echo '<input type="checkbox" name="initiative" value="1" checked/><br/>';
                                    } else if($areas[$i]->idArea == 5) {
                                        echo '<input type="checkbox" name="leader" value="1" checked/><br/>';
                                    } else {
                                        
                                    }
                                }
                            }
                        echo "</td>";
                    echo "</tr>";
                }
        } else if(isset ($error1)) {
            echo "<span>".$error1."</span>";
        }
    ?>
</div>