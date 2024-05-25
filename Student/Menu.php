<?php

global $mod_strings, $app_strings, $sugar_config;
if (ACLController::checkAccess('Student', 'edit', true))
    $module_menu[] = array
    (
        "index.php?module=Student&action=EditView&return_module=Student&return_action=index",
        $mod_strings['LBL_NEW_STUDENT'],
        "CreateStudent",
        'Student'
    );
if (ACLController::checkAccess('Student', 'list', true))
    $module_menu[] = array
    (
        "index.php?module=Student&action=index&return_module=Student&return_action=DetailView",
        $mod_strings['LBL_STUDENT_LIST'],
        "Student",
        'Student'
    );
if (ACLController::checkAccess('Student', 'import', true))
    $module_menu[] = array
    ("index.php?module=Import&action=Step1&import_module=Student&return_module=Student&return_action=index",
        $app_strings['LBL_IMPORT'],
        "Import",
        'Student'
    );


