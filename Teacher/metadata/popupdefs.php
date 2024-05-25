<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');


global $mod_strings;

$popupMeta = array(
	'moduleMain' => 'Teacher',
	'varName' => 'TEACHER',
	'orderBy' => 'name',
	'listviewdefs' => array(
		'NAME' => array(
			'width' => '10',
			'label' => 'LBL_NAME',
			'link' => true,
			'default' => true,
		),
		'ADDRESS' => array(
			'width' => '10',
			'label' => 'LBL_ADDRESS',
			'link' => false,
			'default' => true,
		),
		'PHONE' => array(
			'width' => '10',
			'label' => 'LBL_PHONE',
			'link' => false,
			'default' => true,
		),
	),
	'searchdefs' => array(
		'name',
		array('name' => 'assigned_user_id', 'label' => 'LBL_ASSIGNED_TO', 'type' => 'enum', 'function' => array('name' => 'get_user_array', 'params' => array(false))),
	)
);


?>