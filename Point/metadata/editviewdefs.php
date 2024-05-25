<?php

$viewdefs['Point']['EditView'] = array(
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
                    'point_answer',
                    'point_15',
                ),
                array(
                    'point_45',
                    'point_exam',
                ),
                array(
                    'student_name',
                    // 'subject_name',
                ),
            ),
    ),
);


