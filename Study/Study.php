<?php

class Study extends Basic{
    var $new_schema = true;
    var $module_dir = 'Study';
    var $object_name = 'Study';
    var $table_name = 'study';
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
    var $teacher_id;
    var $teacher_name;
    var $classes_id;
    var $classes_name;
    var $subject_id;
    var $subject_name;
    var $semester;
    var $point_id;
    var $point_name;
    var $list_points;
    


    public function Study(){
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

    public function save( $check_notify = FALSE){

        $point_id = array();
        $point_answer = array();
        $point_15 = array();
        $point_45 = array();
        $point_exam = array();
        $student_id = array();
        $student_name = array();
        $ct_deleted = array();

        $point_id = isset($_POST['point_id']) ? $_POST['point_id'] : array();
        $student_name = isset($_POST['student_name']) ? $_POST['student_name'] : array();
        $student_id = isset($_POST['student_id']) ? $_POST['student_id'] : array();
        $point_answer = (isset($_POST['point_answer'])) ? $_POST['point_answer'] :array();
        $point_15 = (isset($_POST['point_15'])) ? $_POST['point_15'] :array();
        $point_45 = (isset($_POST['point_45'])) ? $_POST['point_45'] :array();
        $point_exam = (isset($_POST['point_exam'])) ? $_POST['point_exam'] :array();
        $ct_deleted = (isset($_POST['ct_deleted'])) ? $_POST['ct_deleted'] :array();

        parent::save();

        for($i = 0; $i < count($student_name) ; $i++){
            //save in modules point
            if(!empty($student_name[$i])){
                $this->saveDetail($point_answer[$i], $point_15[$i], $point_45[$i], $point_exam[$i], $student_name[$i], $student_id[$i], 
                $this-> id, $point_id[$i], $ct_deleted[$i], $this -> subject_id, $this -> subject_name, $this->semester);
            }
        }
        // $this -> SaveClasses($this -> classes_id, $this -> teacher_id, $this -> subject_id);
    }


    public function saveDetail($point_answer, $point_15, $point_45, $point_exam, $student_name, $student_id, 
    $study_id, $point_id, $ct_deleted, $subject_id, $subject_name, $semester){
        $point_detail = new Point() ;
        $final_point = 0;

        $final_point = ($point_answer + $point_15 * 2 + $point_45 * 3 + $point_exam * 4) / 10;

        $point_detail -> student_id = $student_id;
        $point_detail-> student_name = $student_name;
        $point_detail -> point_answer = $point_answer;
        $point_detail -> point_15 = $point_15;
        $point_detail -> point_45 = $point_45;
        $point_detail -> point_exam = $point_exam;
        $point_detail -> final_point = $final_point;

        $point_detail -> study_id = $study_id;
        $point_detail -> subject_id = $subject_id;
        $point_detail -> subject_name = $subject_name;
        $point_detail -> semester = $semester;

        if(!empty($point_id) && $ct_deleted == "0"){
            $point_detail -> id = $point_id;
            $point_detail -> deleted = 0;
        }else if(!empty($point_id) && $ct_deleted == "1"){
            $point_detail -> id = $point_id;
            $point_detail -> deleted = 1;
        }
        $point_detail -> save();
    }

    // public function SaveClasses($classes_id, $teacher_id, $subject_id){

    //     $classes = new Classes();
    //     $classes->id = $classes_id;
    //     $classes->teacher_id = $teacher_id;
    //     $classes->subject_id = $subject_id;

    //     $classes -> save();
    // }





}

?>