<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
require_once ('include/MVC/View/views/view.detail.php');

class SubjectViewDetail extends ViewDetail
{

    function SubjectViewDetail()
    {
        parent::ViewDetail();
    }

    
    function display()
    {
        $this->customField();
        parent::display();
    }

    function customField()
    {
        // $final_point = 0;
        // $point_answer = $this->bean->point_answer;
        // $point_15 = $this->bean->point_15;
        // $point_45 = $this->bean->point_45;
        // $point_exam = $this->bean->point_exam;

        // $final_point = ($point_answer + $point_15 * 2 + $point_45 * 3 + $point_exam * 4) / 10;
        // $this->bean->final_point = $final_point;

        $html = "<a href=''>" . $this->bean->name . "</a></td>";
        $this->ss->assign("FINAL_POINT", $html);

    }



}
