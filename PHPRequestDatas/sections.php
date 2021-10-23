<?php
    include('server.php');
        $sections = [];
        $sqlSelect = "SELECT * FROM courses_enrolled";
        $result = mysqli_query($db, $sqlSelect);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                for($i = 1; $i<=10;$i++){
                    $sectioncounter = 'section'.strval($i);
                    if($row[$sectioncounter]=='Same as my Current Section'){
                        $idCaller = $row['student_id'];

                        // select course based on idCaller
                        $courseCaller = "SELECT course FROM student WHERE student_id = '$idCaller'";
                        $courseCaller = mysqli_query($db,$courseCaller);
                        $courseCaller = mysqli_fetch_assoc($courseCaller);
                        $courseCaller = reset($courseCaller);
                        // select year based on idCaller
                        $yearCaller = "SELECT year FROM student WHERE student_id = '$idCaller'";
                        $yearCaller = mysqli_query($db,$yearCaller);
                        $yearCaller = mysqli_fetch_assoc($yearCaller);
                        $yearCaller = reset($yearCaller);
                        // select section based on idCaller
                        $sectionCaller = "SELECT section FROM student WHERE student_id = '$idCaller'";
                        $sectionCaller = mysqli_query($db,$sectionCaller);
                        $sectionCaller = mysqli_fetch_assoc($sectionCaller);
                        $sectionCaller = reset($sectionCaller);

                        $sectionAdder = $courseCaller.$yearCaller.'-'.$sectionCaller;
                        array_push($sections,$sectionAdder);
                    }
                    else{
                        array_push($sections,$row[$sectioncounter]);
                    }
                }
            }
        }
        array_walk($sections, function(&$value)
        {
            $value = strtoupper($value);
        });
        $sections = array_unique($sections);
        $sections = array_filter($sections,'strlen');
        $sections = array_values($sections);
        $scounter = count($sections);
        for($y = 0; $y<$scounter; $y++){
            echo "<option value='$sections[$y]'>$sections[$y]</option>";
        }
?>