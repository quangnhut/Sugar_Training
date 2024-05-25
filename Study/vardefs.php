<?php

$dictionary['Study'] = array(
    'table' => 'study',
    'audited' => true,
    'fields' => array(
        // 'level' =>
        //     array(
        //         'name' => 'level',
        //         'vname' => 'LBL_LEVEL',
        //         'type' => 'enum',
        //         'len' => '50',
        //         'options' => 'level_enum',
        //     ),

            'teacher_id' =>
            array(
                'name' => 'teacher_id',
                'rname' => 'id',
                'vname' => 'LBL_TEACHER_ID',
                'type' => 'relate',
                'dbType' => 'id',
                'isnull' => 'true',
                'module' => 'Teacher',
            ),
            'teacher_name' =>
            array(
                'name' => 'teacher_name',
                'rname' => 'name',
                'vname' => 'LBL_TEACHER_NAME',
                'type' => 'relate',
                'table' => 'teacher',
                'module' => 'Teacher',
                'dbType' => 'varchar',
                'len' => '255',
                'id_name' => 'teacher_id',
            ),
            'classes_id' =>
            array(
                'name' => 'classes_id',
                'rname' => 'id',
                'vname' => 'LBL_CLASSES_ID',
                'type' => 'relate',
                'dbType' => 'id',
                'isnull' => 'true',
                'module' => 'Classes',
            ),
            'classes_name' =>
            array(
                'name' => 'classes_name',
                'rname' => 'name',
                'vname' => 'LBL_CLASSES_NAME',
                'type' => 'relate',
                'table' => 'classes',
                'module' => 'Classes',
                'dbType' => 'varchar',
                'len' => '255',
                'id_name' => 'classes_id',
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
            'point_id' =>
            array(
                'name' => 'point_id',
                'rname' => 'id',
                'vname' => 'LBL_POINT_ID',
                'type' => 'relate',
                'dbType' => 'id',
                'isnull' => 'true',
                'module' => 'Point',
            ),
            'point_name' =>
            array(
                'name' => 'point_name',
                'rname' => 'name',
                'vname' => 'LBL_POINT_NAME',
                'type' => 'relate',
                'table' => 'point',
                'module' => 'Point',
                'dbType' => 'varchar',
                'len' => '255',
                'id_name' => 'point_id',
            ),
            'semester' =>
            array(
                'name' => 'semester',
                'vname' => 'LBL_SEMESTER',
                'type' => 'enum',
                'len' => '50',
                'options' => 'semester_study_enum',
            ),
            'list_points' =>
            array(
                'name' => 'list_points',
                'vname' => 'LBL_LIST_POINTS',
                'type' => 'varchar',
                'len' => '255',
            ),

    ),
    'indices' => array(
        array(
            'name' => 'idx_level',
            'type' => 'index',
            'fields' =>
                array('id', 'level')
        ),
    ),
    'relationships' => array(
    ),
    'optimistic_lock' => true,
);



require_once ('include/SugarObjects/VardefManager.php');

VardefManager::createVardef('Study', 'Study', array('basic', 'assignable'));


