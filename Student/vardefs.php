<?php

$dictionary['Student'] = array(
    'table' => 'student',
    'audited' => true,
    'fields' => array(
        'address' =>
            array(
                'name' => 'address',
                'vname' => 'LBL_ADDRESS',
                'type' => 'varchar',
                'len' => '255',
                'audited' => true,

            ),
        'phone' =>
            array(
                'name' => 'phone',
                'vname' => 'LBL_PHONE',
                'type' => 'varchar',
                'len' => '11',
            ),
        'email' =>
            array(
                'name' => 'email',
                'vname' => 'LBL_EMAIL',
                'type' => 'varchar',
                'len' => '50',
            ),
            'photo' =>
            array(
                'name' => 'photo',
                'vname' => 'LBL_PHOTO',
                'type' => 'varchar',
                'len' => '255',
            ),
            'phone_parent' =>
            array(
                'name' => 'phone_parent',
                'vname' => 'LBL_PHONE_PARENT',
                'type' => 'varchar',
                'len' => '11',
            ),
            'email_parent' =>
            array(
                'name' => 'email_parent',
                'vname' => 'LBL_EMAIL_PARENT',
                'type' => 'varchar',
                'len' => '50',
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
            'average_point_1' =>
            array(
                'name' => 'average_point_1',
                'vname' => 'LBL_AVERAGE_POINT_1',
                'type' => 'float',
                'len' => '15',
            ),
            'average_point_2' =>
            array(
                'name' => 'average_point_2',
                'vname' => 'LBL_AVERAGE_POINT_2',
                'type' => 'float',
                'len' => '15',
            ),
            'average_point_final' =>
            array(
                'name' => 'average_point_final',
                'vname' => 'LBL_AVERAGE_POINT_FINAL',
                'type' => 'float',
                'len' => '15',
            ),
            'rating' =>
            array(
                'name' => 'rating',
                'vname' => 'LBL_RATING',
                'type' => 'varchar',
                'len' => '50',
            ),

    ),
    'indices' => array(
        array(
            'name' => 'idx_email_id',
            'type' => 'index',
            'fields' =>
                array('id', 'email')
        ),
    ),
    'relationships' => array(
    ),
    'optimistic_lock' => true,
);



require_once ('include/SugarObjects/VardefManager.php');

VardefManager::createVardef('Student', 'Student', array('basic', 'assignable'));


