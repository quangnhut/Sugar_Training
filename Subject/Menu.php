<?php

global $mod_strings, $app_strings, $sugar_config;
if (ACLController::checkAccess('Subject', 'edit', true))
    $module_menu[] = array
    (
        "index.php?module=Subject&action=EditView&return_module=Subject&return_action=index",
        $mod_strings['LBL_NEW_SUBJECT'],
        "CreateSubject",
        'Subject'
    );
if (ACLController::checkAccess('Subject', 'list', true))
    $module_menu[] = array
    (
        "index.php?module=Subject&action=index&return_module=Subject&return_action=DetailView",
        $mod_strings['LBL_SUBJECT_LIST'],
        "Subject",
        'Subject'
    );
if (ACLController::checkAccess('Subject', 'import', true))
    $module_menu[] = array
    ("index.php?module=Import&action=Step1&import_module=Subject&return_module=Subject&return_action=index",
        $app_strings['LBL_IMPORT'],
        "Import",
        'Subject'
    );


