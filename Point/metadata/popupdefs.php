<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');


global $mod_strings;

$popupMeta = array(
	'moduleMain' => 'Point',
	'varName' => 'Point',
	'orderBy' => 'name',
	'listviewdefs' => array(
		'NAME' => array(
			'width' => '10',
			'label' => 'LBL_NAME',
			'link' => true,
			'default' => true,
		),
		'LEVEL' => array(
			'width' => '10',
			'label' => 'LBL_LEVEL',
			'link' => false,
			'default' => true,
		),
	),
	'searchdefs' => array(
		'name',
		'level',
		array('name' => 'assigned_user_id', 'label' => 'LBL_ASSIGNED_TO', 'type' => 'enum', 'function' => array('name' => 'get_user_array', 'params' => array(false))),
	)
);




?>