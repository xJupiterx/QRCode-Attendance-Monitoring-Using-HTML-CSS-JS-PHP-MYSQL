<?php
    $subjects = [];
    $sqlSelect = "SELECT * FROM loaded_subjects where username = '" . $_SESSION['username'] . "';";
    $result = mysqli_query($db, $sqlSelect);
    if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                array_push($subjects, $row['sched1'], $row['sched2'], $row['sched3'], $row['sched4'], $row['sched5']
                , $row['sched6'], $row['sched7'], $row['sched8'], $row['sched9']);
                }
    }
    $subjects = array_unique($subjects);
    $subjects = array_filter($subjects,'strlen');
    $subjects = array_values($subjects);
    $counter = count($subjects);
    for($x = 0; $x<$counter; $x++){
        echo "<option value='$subjects[$x]'>$subjects[$x]</option>";
    }
?>