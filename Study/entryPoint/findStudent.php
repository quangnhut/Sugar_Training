<?php

global $db, $current_user, $app_list_strings;

$sql_student_name = "SELECT name FROM student WHERE deleted = 0";
$res_student_name = $db->query($sql_student_name);
$count_student_name = $db->getRowCount($res_student_name);
$array_student_name = array();

while ($row_student_name = $db->fetchByAssoc($res_student_name)) {
    array_push($array_student_name, $row_student_name['name']);
}

echo json_encode($array_student_name);



?>