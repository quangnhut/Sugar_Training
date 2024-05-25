<?php

global $mod_strings, $app_strings, $sugar_config;
if (ACLController::checkAccess('Teacher', 'edit', true))
    $module_menu[] = array
    (
        "index.php?module=Teacher&action=EditView&return_module=Teacher&return_action=index",
        $mod_strings['LBL_NEW_TEACHER'],
        "CreateTeacher",
        'Teacher'
    );
if (ACLController::checkAccess('Teacher', 'list', true))
    $module_menu[] = array
    (
        "index.php?module=Teacher&action=index&return_module=Teacher&return_action=DetailView",
        $mod_strings['LBL_TEACHER_LIST'],
        "Teacher",
        'Teacher'
    );
if (ACLController::checkAccess('Teacher', 'import', true))
    $module_menu[] = array
    ("index.php?module=Import&action=Step1&import_module=Teacher&return_module=Teacher&return_action=index",
        $app_strings['LBL_IMPORT'],
        "Import",
        'Teacher'
    );


