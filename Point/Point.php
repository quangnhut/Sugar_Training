<?php

class Point extends Basic
{
    var $new_schema = true;
    var $module_dir = 'Point';
    var $object_name = 'Point';
    var $table_name = 'point';
    var $importable = true;
    var $id;
    var $name;
    var $date_entered;
    var $date_modified;
    var $modified_user_id;
    var $modified_by_name;
    var $created_by;
    var $created_by_name;
    var $deleted;
    var $assigned_user_id;
    var $assigned_user_name;

    //custom
    var $point_answer;
    var $point_15;
    var $point_45;
    var $point_exam;
    var $final_point;
    var $student_id;
    var $student_name;
    var $study_id;
    var $study_name;
    var $rating;
    // var $classes_id;
    // var $classes_name;
    var $subject_id;
    var $subject_name;


    public function Point()
    {
        parent::Basic();
    }

    public function bean_implements($interface)
    {
        switch ($interface) {
            case 'ACL':
                return true;
        }
        return false;
    }

    public function save($check_notify = FALSE)
    {
        $final_point = 0;
        $point_answer = $this->point_answer;
        $point_15 = $this->point_15;
        $point_45 = $this->point_45;
        $point_exam = $this->point_exam;

        $final_point = ($point_answer + $point_15 * 2 + $point_45 * 3 + $point_exam * 4) / 10;
        $this->final_point = $final_point;

        if($final_point < 5){
            $this->rating = "YẾU";
        }else if(5 <= $final_point && $final_point < 8){
            $this->rating = "TRUNG BÌNH - KHÁ";
        }else{
            $this->rating = "GIỎI";
        }

        parent::save();
    }






}

?>