<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function smarty_function_display_tracklanged_lent($aparams, $smtpl) {
    $aparams = is_array($aparams) ? $aparams : [];
    $params = DataMap\CommonDataMap::F()->rebind($aparams);
    $language_id = \Router\Router::F()->route->get_params()->get_filtered("language_id", ['IntMore0', 'Default0']);
    $lent = \Content\MediaContentRibbon\MediaContentLangSplitList::F($language_id, 0, 100, \Language\LanguageList::F()->get_current_language(), \Language\LanguageList::F()->get_default_language());
    $lent->render();
    return '';
}
