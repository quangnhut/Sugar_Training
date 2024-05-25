<?php

$viewdefs['Classes']['DetailView'] = array(
    'templateMeta' => array(
        'form' => array(
            'buttons' => array(
                'EDIT',
                'DUPLICATE',
                'DELETE',
                array(
                    'customCode' => '<input title="{$MOD.LBL_VIEWPARTIMAGE_TITLE}"
     accessKey="{$MOD.LBL_VIEWPARTIMAGE_BUTTON_KEY}" type="button" class="button"
     ;" name="image" value="{$MOD.LBL_VIEWPARTIMAGE}">'
                ),
            ),
        ),
        'maxColumns' => '2',
        'widths' => array(
            array('label' => '10', 'field' => '30'),
            array('label' => '10', 'field' => '30')
        ),
    ),
    'panels' => array(
        'default'=> array(
            array(
                'name',
                'assigned_user_name',
            ),
            array(
                'level',
                'teacher_name',
            ),
            array(
                'semester',
            ),
        ),
        'STUDENTS'=> array(
            array(
                array(
                    'customCode' => '{$STUDENTS}',
                ),
            ),
        ),
    
    ),


);





