<?php

$viewdefs['Study']['EditView'] = array(
    'templateMeta' => array(
        'maxColumns' => '2',
        'widths' => array(
            array('label' => '10', 'field' => '30'),
            array('label' => '10', 'field' => '30')
        ),
        'includes' => 
        array (
            0 => 
          array (
            'file' => 'modules/Study/js/jquery-3.7.1.min.js',
          ),
          1 => 
          array (
            'file' => 'modules/Study/js/editview.js',
          ),
          2 => 
          array (
            'file' => 'https://code.jquery.com/ui/1.13.3/jquery-ui.js',
          ),
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
                    'teacher_name',
                    'classes_name',
                ),
                array(
                    'subject_name',
                    'semester',
                ),

            ),
            ''=> array(
                array(
                    array(
                        // 'name' => 'list_points',
                        'customCode' => '{$POINTS}',
                    ),
                ),
            ),
    ),
);


