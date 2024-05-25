<?php

$dictionary['Classes'] = array(
    'table' => 'classes',
    'audited' => true,
    'fields' => array(
        'level' =>
            array(
                'name' => 'level',
                'vname' => 'LBL_LEVEL',
                'type' => 'enum',
                'len' => '50',
                'options' => 'level_classes_enum',
            ),
            'teacher_id' =>
            array(
                'name' => 'teacher_id',
                'rname'=> 'id',
                'vname' => 'LBL_TEACHER_ID',
                'type' => 'relate',
                'isnull' => 'true',
                'module' => 'Teacher',
                'dbType' => 'id',
                'massupdate' => false,
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
                'massupdate' => false,
                // 'source' => 'non-db',
            ),
            'subject_id' =>
            array(
                'name' => 'subject_id',
                'rname'=> 'id',
                'vname' => 'LBL_SUBJECT_ID',
                'type' => 'relate',
                'isnull' => 'true',
                'module' => 'Subject',
                'dbType' => 'id',
                'massupdate' => false,
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
                'massupdate' => false,
                // 'source' => 'non-db',
            ),

            'semester' =>
            array(
                'name' => 'semester',
                'vname' => 'LBL_SEMESTER',
                'type' => 'enum',
                'len' => '50',
                'options' => 'semester_classes_enum',
            ),
    ),
    'indices' => array(
        array(
            'name' => 'idx_level_class',
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

VardefManager::createVardef('Classes', 'Classes', array('basic', 'assignable'));


