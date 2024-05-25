<?php

$searchFields['Student'] =
    array(
        'name' => array('query_type' => 'default'),
        'classes_name' => array('query_type' => 'default'),
        'current_user_only' => array(
            'query_type' => 'default',
            'db_field' => array
            (
                'assigned_user_id'
            ),
            'my_items' => true,
            'vname' => 'LBL_CURRENT_USER_FILTER',
            'type' =>
                'bool'
        ),
        'assigned_user_id' => array('query_type' => 'default'),
    );


?>