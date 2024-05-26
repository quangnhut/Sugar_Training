<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once ('include/MVC/View/views/view.detail.php');

class ClassesViewDetail extends ViewDetail
{
    function ClassesViewDetail()
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
                <th>Address</th>
                <th>Email</th>
                <th>Point semester 1</th>
                <th>Point semester 2</th>
                <th>Point final</th>
                <th>Rating</th>
            </tr>
            </thead>
            <tbody>';

        $sql = "SELECT id, name, address, email, photo, average_point_1, average_point_2, average_point_final, rating 
        FROM student  WHERE classes_id = '" . $this->bean->id . "' and deleted = 0";

        $res = $db->query($sql);
        $row_count = $db->getRowCount($res);
        $count = 1;
        var_dump($res);

        while ($row = $db->fetchByAssoc($res)) {
            $html .= '<tr id="ct_line_' . $count . '">';
            $html .= '<td style="text-align:center;" id="stt' .$count .'" class="stt"> '. $count . '</td>';
            $html .= '<td style="text-align:center;"><a href="index.php?module=Student&action=DetailView&record='.$row['id'].'" target="_blank">' .$row['name'] .'</a></td>';
            $html .= '<td style="text-align:center;">' .$row['address']. '</td>';
            $html .= '<td style="text-align:center;">' .$row['email']. '</td>';
            $html .= '<td style="text-align:center;">' .$row['average_point_1']. '</td>';
            $html .= '<td style="text-align:center;">' .$row['average_point_2']. '</td>';
            $html .= '<td style="text-align:center;">' .$row['average_point_final']. '</td>';
            $html .= '<td style="text-align:center;">' .$row['rating']. '</td>';

            $html .= '</tr>';

            $count+=1;
        }
        $html .= '</tbody></table>';

        $this->ss->assign("STUDENTS", $html);
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
