<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once ('include/MVC/View/views/view.detail.php');

class StudyViewDetail extends ViewDetail
{
    function StudyViewDetail()
    {
        parent::ViewDetail();
    }

    function display()
    {
        $this-> customField();
        $this->displayCSS();
        parent::display();
    }

    function customField()
    {
        global $db, $current_user, $app_list_strings;

        $html = "";
        $html .= '<table id="table_point" border="0" style="width: 100%;">
            <thead>
            <tr>
                <th width="5%">COUNT</th>
                <th>Student Name</th>
                <th>Point Answer</th>
                <th>Point 15</th>
                <th>Point 45</th>
                <th>Point Exam</th>
                <th>Final Point</th>
                <th>Rating</th>
            </tr>
            </thead>
            <tbody>';

        $sql = "SELECT student_name, point_answer, point_15, point_45, point_exam, final_point, rating 
        FROM point  WHERE study_id = '" . $this->bean->id . "' and deleted = 0";

        $res = $db->query($sql);
        $row_count = $db->getRowCount($res);
        $count = 1;
        // var_dump($sql);

        while ($row = $db->fetchByAssoc($res)) {
            $html .= '<tr id="ct_line_' . $count . '">';
            $html .= '<td style="text-align:center;" id="stt' .$count .'" class="stt"> '. $count . '</td>';
            $html .= '<td style="text-align:center;">' .$row['student_name'] .'</td>';
            $html .= '<td style="text-align:center;">' .$row['point_answer']. '</td>';
            $html .= '<td style="text-align:center;">' .$row['point_15']. '</td>';
            $html .= '<td style="text-align:center;">' .$row['point_45']. '</td>';
            $html .= '<td style="text-align:center;">' .$row['point_exam']. '</td>';
            $html .= '<td style="text-align:center;">' .$row['final_point']. '</td>';
            $html .= '<td style="text-align:center;">' .$row['rating']. '</td>';
            $html .= '</tr>';

            $count+=1;
        }
        $html .= '</tbody></table>';

        $this->ss->assign("POINTS", $html);
    }


    function displayCSS(){
        echo "<style>
            #table_point{
                    margin-left: -5%;
                    font-weight: 600;
                    color: blue;
            }
            // th{
            //     color: darkgreen;
            //     font-size: small;
            // }
        </style>";
    }

}
