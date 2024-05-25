<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once ('include/MVC/View/views/view.detail.php');

class StudentViewDetail extends ViewDetail
{
    function StudentViewDetail()
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
                <th>Subject</th>
                <th>Point Answer</th>
                <th>Point 15</th>
                <th>Point 45</th>
                <th>Point Exam</th>
                <th>Final Point</th>
                <th>Rating</th>
            </tr>
            </thead>
            <tbody>';

        $sql = "SELECT subject_id, subject_name, point_answer, point_15, point_45, point_exam, final_point, rating 
        FROM point  WHERE student_id = '" . $this->bean->id . "' and deleted = 0";

        $sql_get_point = "SELECT final_point FROM point WHERE student_id = '" .$this->bean->id. "' and deleted = 0";

        $res_point = $db->query($sql_get_point);
        $count_point = $db->getRowCount($res_point);
        $sum_point = 0;
        while($row_point = $db->fetchByAssoc($res_point)) {
            $sum_point += $row_point["final_point"];
        }
        $this->SetAveragePointAndRating($count_point, $sum_point, $this->bean->id);


        $res = $db->query($sql);
        $row_count = $db->getRowCount($res);
        $count = 1;
        // var_dump($sql);

        while ($row = $db->fetchByAssoc($res)) {
            $html .= '<tr id="ct_line_' . $count . '">';
            $html .= '<td style="text-align:center;" id="stt' .$count .'" class="stt"> '. $count . '</td>';
            $html .= '<td style="text-align:center;"><a href="index.php?module=Subject&action=DetailView&record='.$row['subject_id'].'" target="_blank">' .$row['subject_name'] .'</a></td>';
            $html .= '<td style="text-align:center;">' .$row['point_answer']. '</td>';
            $html .= '<td style="text-align:center;">' .$row['point_15']. '</td>';
            $html .= '<td style="text-align:center;">' .$row['point_45']. '</td>';
            $html .= '<td style="text-align:center;">' .$row['point_exam']. '</td>';
            $html .= '<td style="text-align:center;">' .$row['final_point']. '</td>';
            $html .= '<td style="text-align:center;">' .$row['rating']. '</td>';
            $html .= '</tr>';

            $count+=1;
        }
        $html .= '<tr name="average">';
        $html .= '<td style="text-align:center;">Tổng:</td>';
        $html .= '<td></td>';
        $html .= '<td></td>';
        $html .= '<td></td>';
        $html .= '<td></td>';
        $html .= '<td></td>';
        $html .= '<td class="average_point" id="average_point" style="text-align:center;">'. $this->bean->average_point .'</td>';
        $html .= '<td class="rating" id="rating" style="text-align:center;">'. $this->bean->rating .'</td>';

        $html .= '</tr>';
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

    function SetAveragePointAndRating($count_point, $sum_point, $id){
        $average_point = $count_point == 0 ? 0 : $sum_point / $count_point;
        // var_dump($count_point);
        $rating = "";

        if($average_point < 5){
            $rating = "YẾU";
        }else if(5 <= $average_point && $average_point < 8){
            $rating = "TRUNG BÌNH - KHÁ";
        }else{
            $rating = "GIỎI";
        }

        $this->bean->id = $id;
        $this->bean->average_point = $average_point;
        $this->bean->rating = $rating;
        $this->bean->save();

    }

}
