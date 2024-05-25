<?php

class Classes extends Basic{
    var $new_schema = true;
    var $module_dir = 'Classes';
    var $object_name = 'Classes';
    var $table_name = 'classes';
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
    var $teacher_id;
    var $teacher_name;
    var $subject_id;
    var $subject_name;
    var $semester;
    

    public function Classes(){
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






}

?>