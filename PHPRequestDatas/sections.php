<?php
    include('server.php');
        $sections = [];
        $sqlSelect = "SELECT * FROM student";
        $result = mysqli_query($db, $sqlSelect);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                for($i = 1; $i<=10;$i++){
                    $sectioncounter = 'section'.strval($i);
                    if($row[$sectioncounter]=='Same as my Current Section'){
                        $sectionAdder = $row['course'].$row['year'].'-'.$row['section'];
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
        echo 'var js_section = '.json_encode($arr).';';
?>