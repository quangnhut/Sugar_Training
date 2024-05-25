<?php

class Teacher extends Basic{
    var $new_schema = true;
    var $module_dir = 'Teacher';
    var $object_name = 'Teacher';
    var $table_name = 'teacher';
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

    public function Teacher(){
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