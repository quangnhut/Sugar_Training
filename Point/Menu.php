<?php

global $mod_strings, $app_strings, $sugar_config;
if (ACLController::checkAccess('Point', 'edit', true))
    $module_menu[] = array
    (
        "index.php?module=Point&action=EditView&return_module=Point&return_action=index",
        $mod_strings['LBL_NEW_POINT'],
        "CreatePoint",
        'Point'
    );
if (ACLController::checkAccess('Point', 'list', true))
    $module_menu[] = array
    (
        "index.php?module=Point&action=index&return_module=Point&return_action=DetailView",
        $mod_strings['LBL_POINT_LIST'],
        "Point",
        'Point'
    );
if (ACLController::checkAccess('Point', 'import', true))
    $module_menu[] = array
    ("index.php?module=Import&action=Step1&import_module=Point&return_module=Point&return_action=index",
        $app_strings['LBL_IMPORT'],
        "Import",
        'Point'
    );


