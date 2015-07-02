<?php
/**
* Переопределение или вставка переменных в шаблоне html.
*/
function grayscale_process_html(&$vars) {
  // Добавление классов для стилей шрифтов.
  $classes = explode(' ', $vars['classes']);
  $classes[] = theme_get_setting('font_family');
  $classes[] = theme_get_setting('font_size');
  $vars['classes'] = trim(implode(' ', $classes));
}

/**
* Возвращает HTML для навигационной цепочки.
*
* @param $variables
* Ассоциативный массив, содержащий:
* - breadcrumb — массив, содержащий навигационные ссылки.
*/
/*function grayscale_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
    // Предоставление контекста для навигационных ссылок пользователям,
    // читающим с экрана. Заголовок можно сделать видимым
    // с помощью .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    $output .= '<div class="breadcrumb">' . implode(' * ', $breadcrumb) . '</div>';
    return $output;
  }
}*/

/**
* Реализация $themeenginename_preprocess_$hook().
* Устанавливаемые здесь переменные будут доступны в шаблонном файле
* навигационной цепочки.
*/
function grayscale_preprocess_breadcrumb(&$variables) {
  $variables['breadcrumb_delimiter'] = '#';
}

function grayscale_preprocess_mytheme_header(&$variables){
  $variables['title'] = "This is a title";
  $variables['some_text'] = "Some text...";
}

function grayscale_theme($existing, $type, $theme, $path){
  return array(
    'mytheme_header'=>array(
      'template'=>'header',
      'path'=>$path.'/templates',
      'type'=>'theme',
      'variables' => array(
        'title' => NULL,
        'some_text' => NULL,
      ),
    ),
  );
}
