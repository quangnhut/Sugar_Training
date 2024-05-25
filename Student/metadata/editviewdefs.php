<?php

$viewdefs['Student']['EditView'] = array(
    'templateMeta' => array(
        'maxColumns' => '2',
        'widths' => array(
            array('label' => '10', 'field' => '30'),
            array('label' => '10', 'field' => '30')
        ),
    ),
    'panels' => array(
        'default' =>
            array(
                array(
                    'name',
                    'assigned_user_name',
                ),
                array(
                    'address',
                    'phone',
                ),
                array(
                    'email',
                    'photo',
                ),
                array(
                    'classes_name',
                ),
            ),
            'Parent'=> array(
                array(
                    'phone_parent',
                    'email_parent',
                ),
            ),
    ),
);


