<?php

class Subject extends Basic{
    var $new_schema = true;
    var $module_dir = 'Subject';
    var $object_name = 'Subject';
    var $table_name = 'subject';
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
    var $level;
    // var $point_answer;
    // var $point_15;
    // var $point_45;
    // var $point_exam;
    // var $final_point;
    // var $student_id;
    // var $student_name;


    public function Subject(){
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

    // public function save( $check_notify = FALSE){
    //     $this->final_point = 1000;
    //     parent::save();

    // }






}

?>