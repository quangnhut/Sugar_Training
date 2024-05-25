<?php

$dictionary['Teacher'] = array(
    'table' => 'teacher',
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

VardefManager::createVardef('Teacher', 'Teacher', array('basic', 'assignable'));


