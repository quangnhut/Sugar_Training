<?php

$dictionary['Point'] = array(
    'table' => 'point',
    'audited' => true,
    'fields' => array(
                    'point_answer' =>
            array(
                'name' => 'point_answer',
                'vname' => 'LBL_POINT_ANSWER',
                'type' => 'float',
                'len' => '50',
            ),
            'point_15' =>
            array(
                'name' => 'point_15',
                'vname' => 'LBL_POINT_15',
                'type' => 'float',
                'len' => '50',
            ),
            'point_45' =>
            array(
                'name' => 'point_45',
                'vname' => 'LBL_POINT_45',
                'type' => 'float',
                'len' => '50',
            ),
            'point_exam' =>
            array(
                'name' => 'point_exam',
                'vname' => 'LBL_POINT_EXAM',
                'type' => 'float',
                'len' => '50',
            ),
            'final_point' =>
            array(
                'name' => 'final_point',
                'vname' => 'LBL_FINAL_POINT',
                'type' => 'float',
                'len' => '50',
            ),
            'rating' =>
            array(
                'name' => 'rating',
                'vname' => 'LBL_RATING',
                'type' => 'varchar',
                'len' => '50',
            ),
            'semester' =>
            array(
                'name' => 'semester',
                'vname' => 'LBL_SEMESTER',
                'type' => 'enum',
                'len' => '50',
                'options' => 'semester_point_enum',
            ),

            'student_id' =>
            array(
                'name' => 'student_id',
                'rname' => 'id',
                'vname' => 'LBL_STUDENT_ID',
                'type' => 'relate',
                'dbType' => 'id',
                'isnull' => 'true',
                'module' => 'Student',
            ),
            'student_name' =>
            array(
                'name' => 'student_name',
                'rname' => 'name',
                'vname' => 'LBL_STUDENT_NAME',
                'type' => 'relate',
                'table' => 'student',
                'module' => 'Student',
                'dbType' => 'varchar',
                'len' => '255',
                'id_name' => 'student_id',
            ),
            'study_id' =>
            array(
                'name' => 'study_id',
                'rname' => 'id',
                'vname' => 'LBL_STUDY_ID',
                'type' => 'relate',
                'dbType' => 'id',
                'isnull' => 'true',
                'module' => 'Study',
            ),
            'study_name' =>
            array(
                'name' => 'study_name',
                'rname' => 'name',
                'vname' => 'LBL_STUDY_NAME',
                'type' => 'relate',
                'table' => 'study',
                'module' => 'Study',
                'dbType' => 'varchar',
                'len' => '255',
                'id_name' => 'study_id',
            ),
            'subject_id' =>
            array(
                'name' => 'subject_id',
                'rname' => 'id',
                'vname' => 'LBL_SUBJECT_ID',
                'type' => 'relate',
                'dbType' => 'id',
                'isnull' => 'true',
                'module' => 'Subject',
            ),
            'subject_name' =>
            array(
                'name' => 'subject_name',
                'rname' => 'name',
                'vname' => 'LBL_SUBJECT_NAME',
                'type' => 'relate',
                'table' => 'subject',
                'module' => 'Subject',
                'dbType' => 'varchar',
                'len' => '255',
                'id_name' => 'subject_id',
            ),


    ),
    'indices' => array(
        array(
            'name' => 'idx_final_point',
            'type' => 'index',
            'fields' =>
                array('id', 'final_point')
        ),
    ),
    'relationships' => array(
    ),
    'optimistic_lock' => true,
);



require_once ('include/SugarObjects/VardefManager.php');

VardefManager::createVardef('Point', 'Point', array('basic', 'assignable'));


