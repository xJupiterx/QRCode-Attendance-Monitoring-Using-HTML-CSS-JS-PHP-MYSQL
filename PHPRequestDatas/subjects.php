<?php
    include('server.php');
    $subjects = [];
    $sqlSelect = "SELECT * FROM courses_enrolled";
    $result = mysqli_query($db, $sqlSelect);
    if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                array_push($subjects, $row['subject1'], $row['subject2'], $row['subject3'], $row['subject4'], $row['subject5']
                , $row['subject6'], $row['subject7'], $row['subject8'], $row['subject9'], $row['subject10']);
                }
    }
    array_walk($subjects, function(&$value)
    {
        $value = strtoupper($value);
    });
    $subjects = array_unique($subjects);
    $subjects = array_filter($subjects,'strlen');
    $subjects = array_values($subjects);
    $counter = count($subjects);
    for($x = 0; $x<$counter; $x++){
        echo "<option value='$subjects[$x]'>$subjects[$x]</option>";
    }
?>