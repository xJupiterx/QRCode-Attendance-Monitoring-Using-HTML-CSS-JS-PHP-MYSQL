<?php
    $db->set_charset("utf8");
    $exp_table = "compiled_attendance"; // Table to export
    if (!$db){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    // Create and open new csv file
    $csv  = $exp_table . "-" . date('d-m-Y-his') . '.csv';
    $file = fopen($csv, 'w');
    //selecting all student in student_table
    $StudentSelect = "SELECT * FROM student";
    $result = mysqli_query($db, $StudentSelect);
    if (mysqli_num_rows($result) > 0) {
        //looping student 1 by 1
        while ($row = mysqli_fetch_array($result)) {
            $selectedStudent = $row['student_id'];
            
            //display course depends on student_id
            $course = "SELECT course FROM student WHERE student_id = '$selectedStudent'";
            $course = mysqli_query($db,$course);
            $course = mysqli_fetch_assoc($course);
            $course = reset($course);
                
            //display year depends on student_id
            $year = "SELECT year FROM student WHERE student_id = '$selectedStudent'";
            $year = mysqli_query($db,$year);
            $year = mysqli_fetch_assoc($year);
            $year = reset($year);
                
            //display section depends on student_id
            $ssection = "SELECT section FROM student WHERE student_id = '$selectedStudent'";
            $ssection = mysqli_query($db,$ssection);
            $ssection = mysqli_fetch_assoc($ssection);
            $ssection = reset($ssection);
            //display all subjects and section

            $all = "SELECT * FROM courses_enrolled WHERE student_id = '$selectedStudent'";
            $all = mysqli_query($db,$all);
            $all = mysqli_fetch_assoc($all);
            $_SESSION['subject1'] = $all['subject1'];
            $_SESSION['subject2'] = $all['subject2'];
            $_SESSION['subject3'] = $all['subject3'];
            $_SESSION['subject4'] = $all['subject4'];
            $_SESSION['subject5'] = $all['subject5'];
            $_SESSION['subject6'] = $all['subject6'];
            $_SESSION['subject7'] = $all['subject7'];
            $_SESSION['subject8'] = $all['subject8'];
            $_SESSION['subject9'] = $all['subject9'];
            $_SESSION['subject10'] = $all['subject10'];
                                                
            $_SESSION['section1'] = $all['section1'];
            if($all['section1'] == 'Same as my Current Section'){
                $_SESSION['section1'] = $course . $year . '-' . $ssection;
            }
            $_SESSION['section2'] = $all['section2'];
            if($all['section2'] == 'Same as my Current Section'){
                $_SESSION['section2'] = $course . $year . '-' . $ssection;
            }
            $_SESSION['section3'] = $all['section3'];
            if($all['section3'] == 'Same as my Current Section'){
                $_SESSION['section3'] = $course . $year . '-' . $ssection;
            }
            $_SESSION['section4'] = $all['section4'];
            if($all['section4'] == 'Same as my Current Section'){
                $_SESSION['section4'] = $course . $year . '-' . $ssection;
            }
            $_SESSION['section5'] = $all['section5'];
            if($all['section5'] == 'Same as my Current Section'){
                $_SESSION['section5'] = $course . $year . '-' . $ssection;
            }
            $_SESSION['section6'] = $all['section6'];
            if($all['section6'] == 'Same as my Current Section'){
                $_SESSION['section6'] = $course . $year . '-' . $ssection;
            }
            $_SESSION['section7'] = $all['section7'];
            if($all['section7'] == 'Same as my Current Section'){
                $_SESSION['section7'] = $course . $year . '-' . $ssection;
            }
            $_SESSION['section8'] = $all['section8'];
            if($all['section8'] == 'Same as my Current Section'){
                $_SESSION['section8'] = $course . $year . '-' . $ssection;
            }
            $_SESSION['section9'] = $all['section9'];
            if($all['section9'] == 'Same as my Current Section'){
                $_SESSION['section9'] = $course . $year . '-' . $ssection;
            }
            $_SESSION['section10'] = $all['section10'];
            if($all['section10'] == 'Same as my Current Section'){
                $_SESSION['section10'] = $course . $year . '-' . $ssection;
            }
            //loop all subjects of student
            for($i = 1; $i<=10; $i++) {
                $i = strval($i);
                $subjectcounter = 'subject' . $i;
                $sectioncounter = 'section' . $i;
                $remarkscounter = 'ontime' . $i . '/late' . $i . '/absent' . $i . '=total' . $i;
                    if($_SESSION[$subjectcounter] != ''){
                        if($i == 1){
                            //count student ontime based on selected subject/section
                            $ontimesql = "SELECT COUNT( * ) as 'rows1'
                                FROM student_attendance
                                WHERE subject = '" . $_SESSION[$subjectcounter] . "' and section = '" . $_SESSION[$sectioncounter] . "' and student_id = '" . $_SESSION['sstudent_id'] . "' and remarks = 'ON-TIME';";
                            $ontimeCount = mysqli_query($db, $ontimesql);
                            $ontimeCount = mysqli_fetch_assoc($ontimeCount);
                            //count student late based on selected subject/section
                            $latesql = "SELECT COUNT( * ) as 'rows2'
                                FROM student_attendance
                                WHERE subject = '" . $_SESSION[$subjectcounter] . "' and section = '" . $_SESSION[$sectioncounter] . "' and student_id = '" . $_SESSION['sstudent_id'] . "' and remarks = 'LATE';";
                            $lateCount = mysqli_query($db, $latesql);
                            $lateCount = mysqli_fetch_assoc($lateCount);
                            //count student ontime based on selected subject/section
                            $absentsql = "SELECT COUNT( * ) as 'rows3'
                                FROM student_attendance
                                WHERE subject = '" . $_SESSION[$subjectcounter] . "' and section = '" . $_SESSION[$sectioncounter] . "' and student_id = '" . $_SESSION['sstudent_id'] . "' and remarks = 'ABSENT';";
                            $absentCount = mysqli_query($db, $absentsql);
                            $absentCount = mysqli_fetch_assoc($absentCount);

                            // create variable which displays ontime/late/absent=total
                            $remarks = $ontimeCount['rows1'] . "/" . $lateCount['rows2'] . "/" . $absentCount['rows3'];
                            //convert counts into int then add
                            $count1 = intval($ontimeCount['rows1']);
                            $count2 = intval($lateCount['rows2']);
                            $count3 = intval($absentCount['rows3']);
                            $totalCount = $count1 + $count2 + $count3;
                            $remarks = $remarks . "=" . $totalCount;
                            $insertData = "
                                INSERT INTO compiled_attendance(student_id, " . $subjectcounter . ", " . $remarkscounter . ")
                                VALUES('" . $selectedStudent . "', '" . $_SESSION[$subjectcounter] . "', '" . $remarks . ");
                                ";
                        }
                    }

                $i = intval($i);
            }
        }
    }
    $j=3;
    if($j==1){
        // Get the table
        if (!$mysqli_result = mysqli_query($db, "SELECT * FROM {$exp_table}"))
            printf("Error: %s\n", $db->error);
            // Get column names 
            while ($column = mysqli_fetch_field($mysqli_result)) {
                $column_names[] = $column->name;
            }
            
            // Write column names in csv file
            if (!fputcsv($file, $column_names))
                die('Can\'t write column names in csv file');
            
            // Get table rows
            while ($row = mysqli_fetch_row($mysqli_result)) {
                // Write table rows in csv files
                if (!fputcsv($file, $row))
                    die('Can\'t write rows in csv file');
            }
        fclose($file);
    }
    echo "<p><a href=\"$csv\" style = 'position:relative; top:8px'>Download</a></p>\n";
?>