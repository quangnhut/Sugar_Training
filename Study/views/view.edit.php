<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once ('include/MVC/View/views/view.edit.php');

class StudyViewEdit extends ViewEdit
{
    function StudyViewEdit()
    {
        parent::ViewEdit();
    }

    function display()
    {
        $this->customField();
        $this-> displayCSS();
        parent::display();
    }

    function customField()
    {
        global $db, $current_user, $app_list_strings;

        $html = "";
        $html .= '<table id="table_point" border="0" style="width: 100%">
            <thead>
            <tr>
                <th width="5%">COUNT</th>
                <th>Student Name</th>
                <th>Point Answer</th>
                <th>Point 15</th>
                <th>Point 45</th>
                <th>Point Exam</th>
                <th style="display: none">Point ID</th>
            </tr>
            </thead>
            <tbody>';

        $sql_students = "SELECT id, name FROM student WHERE deleted = 0";
        $sql_point = "SELECT id, student_id, student_name, point_answer, point_15, point_45, point_exam, final_point, rating FROM point  WHERE study_id = '" . $this->bean->id . "' and deleted = 0 ORDER BY id";

        //query to get all student name from table student
        $res_students = $db->query($sql_students);
        $count_students = $db->getRowCount($res_students);
        $array_student_name = array();
        $id_and_student_name = array();

        while ($row_students = $db->fetchByAssoc($res_students)) {
            // array_push($array_student_name, $row_student_name['name']);
            $subArray = array(
                'id' => $row_students['id'],
                'name' => $row_students['name']
            );
            array_push($id_and_student_name, $subArray);

        }

        //query to get list points in study if exits
        $list_points = $db->query($sql_point);
        $count_points = $db->getRowCount($list_points);
        // var_dump($count_points);

        $i = 1;

        if ($count_points > 0) {

            while ($row_point = $db->fetchByAssoc($list_points)) {
                $html .= '<tr id="ct_line_' . $i . '">';
                $html .= '<td style="text-align:center;" id="stt' . $i . '" class="stt"> ' . $i . '</td>';
                $html .= '<td style="text-align:center;">
                <input placeholder="Tìm học sinh" type="text" name="student_name[]" class="student_name" id="student_name_'.$i.'" value="'. $row_point['student_name'] .'" data-positon="'.$i.'" oninput="SearchStudent('.$i.')">';          
                $html .= '</td>';
                $html .= '<td style="text-align:center;"><input type="number" step="0.01" name="point_answer[]" value="' . $row_point['point_answer'] . '"></td>';
                $html .= '<td style="text-align:center;"><input type="number" step="0.01" name="point_15[]" value="' . $row_point['point_15'] . '"></td>';
                $html .= '<td style="text-align:center;"><input type="number" step="0.01" name="point_45[]" value="' . $row_point['point_45'] . '"></td>';
                $html .= '<td style="text-align:center;"><input type="number" step="0.01" name="point_exam[]" value="' . $row_point['point_exam'] . '"></td>';
                $html .= '<td style="text-align:center;"><input type="hidden" name="point_id[]" id="point_id_' . $i . '" value="' . $row_point['id'] . '"></td>';
                $html .= '<td><input type="hidden" name="student_id[]" class="student_id" id="student_id_' . $i . '" value="' . $row_point['student_id'] . '"></td>';

                $html .= '<td><button class="button remove-line" title="Xóa dòng" type="button" onclick="markPointDeleted(' . $i . ')"><img src="modules/Study/image/delete.png" /></button>
                <input type="hidden" value="0" name="ct_deleted[]" id="ct_deleted' . $i . '" /></td>';
    
                $html .= '</tr>';
                $i += 1;

            }

        } else {
            $html .= '<tr id="ct_line_' . $i . '">';
            $html .= '<td style="text-align:center;" id="stt' . $i . '" class="stt"> ' . $i . '</td>';

            $html .= '<td style="text-align:center;">
            <input placeholder="Tìm học sinh" type="text" name="student_name[]" class="student_name" id="student_name_'.$i.'" value="" data-positon="'.$i.'" oninput="SearchStudent('.$i.')">';          
            $html .= '</td>';
            $html .= '<td style="text-align:center;"><input type="number" step="0.01" name="point_answer[]" value=""></td>';
            $html .= '<td style="text-align:center;"><input type="number" step="0.01" name="point_15[]" value=""></td>';
            $html .= '<td style="text-align:center;"><input type="number" step="0.01" name="point_45[]" value=""></td>';
            $html .= '<td style="text-align:center;"><input type="number" step="0.01" name="point_exam[]" value=""></td>';
            $html .= '<td style="text-align:center;"><input type="hidden" name="point_id[]" id="point_id_' . $i . '" value=""></td>';
            $html .= '<td><input type="hidden" name="student_id[]" class="student_id" id="student_id_' . $i . '" value=""></td>';

            $html .= '<td><button class="button remove-line" title="Xóa dòng" type="button" onclick="markPointDeleted(' . $i . ')"><img src="modules/Study/image/delete.png" /></button>
            <input type="hidden" value="0" name="ct_deleted[]" id="ct_deleted' . $i . '" /></td>';

            $html .= '</tr>';

        }

        $html .= '<br>';
        $html .= '<tr id="last_row" style="display: none;"></tr>';
        $html .= '</tbody></table>';
        $html .= '<br>';
        $html .= '<br>';

        $html .= '<input type="button" class="button" id="btnAddRow" value="Thêm dòng" title="Thêm dòng" />';
        if($count_points > 0){
            $html .= '<input type="hidden" class="number" id="count_row" value="'. $count_points.'" />';
        }else{
            $html .= '<input type="hidden" class="number" id="count_row" value="1" />';
        }
        $html .= '<div class="json_data" id="json_data" style="display: none">' . json_encode($id_and_student_name) . '</div>';

        $this->ss->assign("POINTS", $html);

    }

    function displayCSS(){
        echo "<style>
            #btnAddRow{
                    margin-left: -6%;
                    font-weight: 600;
                    color: blue;
            }
            th{
                color: darkgreen;
                font-size: small;
            }
            #table_point{
                margin-left: -5%;
            }
        </style>";
    }





    // public function GenSelectOption($array_student_name, $student_name, $html)
    // {
    //     foreach ($array_student_name as $value) {
    //         if ($value == $student_name) {
    //             $html .= '<option name="student_name" value="' . $value . '" selected>' . $value . '</option>';
    //         } else {
    //             $html .= '<option name="student_name" value="' . $value . '">' . $value . '</option>';
    //         }
    //     }
    //     return $html;
    // }



}
