<?php

global $mod_strings, $app_strings, $sugar_config;
if (ACLController::checkAccess('Classes', 'edit', true))
    $module_menu[] = array
    (
        "index.php?module=Classes&action=EditView&return_module=Classes&return_action=index",
        $mod_strings['LBL_NEW_CLASSES'],
        "CreateClasses",
        'Classes'
    );
if (ACLController::checkAccess('Classes', 'list', true))
    $module_menu[] = array
    (
        "index.php?module=Classes&action=index&return_module=Classes&return_action=DetailView",
        $mod_strings['LBL_CLASSES_LIST'],
        "Classes",
        'Classes'
    );
if (ACLController::checkAccess('Classes', 'import', true))
    $module_menu[] = array
    ("index.php?module=Import&action=Step1&import_module=Classes&return_module=Classes&return_action=index",
        $app_strings['LBL_IMPORT'],
        "Import",
        'Classes'
    );


