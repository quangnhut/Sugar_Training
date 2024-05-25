<?php

$dictionary['Subject'] = array(
    'table' => 'subject',
    'audited' => true,
    'fields' => array(
        'level' =>
            array(
                'name' => 'level',
                'vname' => 'LBL_LEVEL',
                'type' => 'enum',
                'len' => '50',
                'options' => 'level_enum',
            ),
            // 'student_id' =>
            // array(
            //     'name' => 'student_id',
            //     'rname' => 'id',
            //     'vname' => 'LBL_STUDENT_ID',
            //     'type' => 'relate',
            //     'dbType' => 'id',
            //     'isnull' => 'true',
            //     'module' => 'Student',
            // ),
            // 'student_name' =>
            // array(
            //     'name' => 'student_name',
            //     'rname' => 'name',
            //     'vname' => 'LBL_STUDENT_NAME',
            //     'type' => 'relate',
            //     'table' => 'student',
            //     'module' => 'Student',
            //     'dbType' => 'varchar',
            //     'len' => '255',
            //     'id_name' => 'student_id',
            // ),

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

VardefManager::createVardef('Subject', 'Subject', array('basic', 'assignable'));


