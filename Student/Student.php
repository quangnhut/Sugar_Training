<?php

class Student extends Basic{
    var $new_schema = true;
    var $module_dir = 'Student';
    var $object_name = 'Student';
    var $table_name = 'student';
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
    var $address;
    var $phone;
    var $email;
    var $photo;
    var $phone_parent;
    var $email_parent;
    var $classes_id;
    var $classes_name;
    var $average_point_1;
    var $average_point_2;
    var $average_point_final;
    var $rating;


    public function Student(){
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