<?php


function my_bartik_preprocess_page(&$vars) {
  if($vars['is_front']) {
    $vars['title'] = t('Front page');
  }
}


