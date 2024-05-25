<?php

global $mod_strings, $app_strings, $sugar_config;
if (ACLController::checkAccess('Study', 'edit', true))
    $module_menu[] = array
    (
        "index.php?module=Study&action=EditView&return_module=Study&return_action=index",
        $mod_strings['LBL_NEW_STUDY'],
        "CreateStudy",
        'Study'
    );
if (ACLController::checkAccess('Study', 'list', true))
    $module_menu[] = array
    (
        "index.php?module=Study&action=index&return_module=Study&return_action=DetailView",
        $mod_strings['LBL_STUDY_LIST'],
        "Study",
        'Study'
    );
if (ACLController::checkAccess('Study', 'import', true))
    $module_menu[] = array
    ("index.php?module=Import&action=Step1&import_module=Study&return_module=Study&return_action=index",
        $app_strings['LBL_IMPORT'],
        "Import",
        'Study'
    );


