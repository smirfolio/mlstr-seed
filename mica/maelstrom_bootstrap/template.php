<?php

/**
 * @file
 * template.php
 */

/*
 * Hook to override default theme pages
 *  copy '<modules>/obiba_mica_study/templates/'   files in current theme 'templates/' path
 * you can modify default display of listed page by rearrange block field
 *don't forget to clear the theme registry.
 *
 */
function maelstrom_bootstrap_theme($existing, $type, $theme, $path) {
  $theme_array = array();

  $destination_path = file_exists($path . '/templates/obiba_mica_study-list-page.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['obiba_mica_study_list-page'] = array(
      'template' => 'obiba_mica_study-list-page',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_study-list-page-block.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['obiba_mica_study-list-page-block'] = array(
      'template' => 'obiba_mica_study-list-page-block',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_study_search.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['obiba_mica_study_search'] = array(
      'template' => 'obiba_mica_study_search',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_study_detail.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['obiba_mica_study_detail'] = array(
      'template' => 'obiba_mica_study_detail',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/mica_population_detail.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['mica_population_detail'] = array(
      'template' => 'mica_population_detail',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_study-dce-detail.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['mica_dce_detail'] = array(
      'template' => 'mica_dce_detail',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_study-contact-detail.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['mica_contact_detail'] = array(
      'template' => 'mica_contact_detail',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_study_attachments.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['obiba_mica_study_attachments'] = array(
      'template' => 'obiba_mica_study_attachments',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_study_block_search.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['obiba_mica_study_block_search'] = array(
      'template' => 'obiba_mica_study_block_search',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_dataset-detail.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['obiba_mica_dataset-detail'] = array(
      'template' => 'obiba_mica_dataset-detail',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_dataset-tables.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['obiba_mica_dataset-tables'] = array(
      'template' => 'obiba_mica_dataset-tables',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_dataset-harmonization-table-legend.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['obiba_mica_dataset-harmonization-table-legend'] = array(
      'template' => 'obiba_mica_dataset-harmonization-table-legend',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/block--obiba_mica_facet_search.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['block__obiba_mica_facet_search.tpl.php'] = array(
      'variables' => array('block' => array()),
      'template' => 'block--obiba_mica_facet_search',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_facet_search_variable-search.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['obiba_mica_facet_search_variable-search.tpl.php'] = array(
      'variables' => array('block' => array()),
      'template' => 'obiba_mica_facet_search_variable-search',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_facet_search_coverage.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['obiba_mica_facet_search_coverage.tpl.php'] = array(
      'template' => 'obiba_mica_facet_search_coverage',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_facet_search_vocabulary_coverage.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['obiba_mica_facet_search_vocabulary_coverage.tpl.php'] = array(
      'template' => 'obiba_mica_facet_search_vocabulary_coverage',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_facet_search_input_text_range.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['obiba_mica_facet_search_input_text_range.tpl.php'] = array(
      'variables' => array('block' => array()),
      'template' => 'obiba_mica_facet_search_input_text_range',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_facet_search_checkbox_term.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['obiba_mica_facet_search_checkbox_term.tpl.php'] = array(
      'variables' => array('block' => array()),
      'template' => 'obiba_mica_facet_search_checkbox_term',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_facet_search_tab_block.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['obiba_mica_facet_search_tab_block.tpl.php'] = array(
      'variables' => array('block' => array()),
      'template' => 'obiba_mica_facet_search_tab_block',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_facet_search_charts.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['obiba_mica_facet_search_charts.tpl.php'] = array(
      'variables' => array('block' => array()),
      'template' => 'obiba_mica_facet_search_charts',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_facet_search_vocabulary_charts.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['obiba_mica_facet_search_vocabulary_charts.tpl.php'] = array(
      'template' => 'obiba_mica_facet_search_vocabulary_charts',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_network-detail.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['obiba_mica_network-detail.tpl.php'] = array(
      'variables' => array('block' => array()),
      'template' => 'obiba_mica_network-detail',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_network-list-page-block.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['obiba_mica_network-list-page-block'] = array(
      'template' => 'obiba_mica_network-list-page-block',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_network-list.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['obiba_mica_network-list.tpl.php'] = array(
      'variables' => array('block' => array()),
      'template' => 'obiba_mica_network-list',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_facet_search_fixed_sidebar.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['obiba_mica_facet_search_fixed_sidebar.tpl.php'] = array(
      'variables' => array('block' => array()),
      'template' => 'obiba_mica_facet_search_fixed_sidebar',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_study_fixed_sidebar.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['obiba_mica_study_fixed_sidebar.tpl.php'] = array(
      'variables' => array('block' => array()),
      'template' => 'obiba_mica_study_fixed_sidebar',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_variable_harmonization_algorithm.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['obiba_mica_variable_harmonization_algorithm.tpl.php'] = array(
      'variables' => array('block' => array()),
      'template' => 'obiba_mica_variable_harmonization_algorithm',
      'path' => $path . '/templates'
    );
  }

  $destination_path = file_exists($path . '/templates/obiba_mica_facet_search_cloned_block.tpl.php');
  if (!empty($destination_path)) {
    $theme_array['obiba_mica_facet_search_cloned_block.tpl.php'] = array(
      'variables' => array('block' => array()),
      'template' => 'obiba_mica_facet_search_cloned_block',
      'path' => $path . '/templates'
    );
  }

  return $theme_array;

}

function maelstrom_bootstrap_breadcrumb($variables) {
  $output = '';
  $breadcrumb = $variables['breadcrumb'];

  // Determine if we are to display the breadcrumb.
  $bootstrap_breadcrumb = theme_get_setting('bootstrap_breadcrumb');
  if (($bootstrap_breadcrumb == 1 || ($bootstrap_breadcrumb == 2 && arg(0) == 'admin')) && !empty($breadcrumb)) {
    $output = theme('item_list', array(
      'attributes' => array(
        'class' => array('breadcrumb', 'pull-right'),
      ),
      'items' => $breadcrumb,
      'type' => 'ul',
    ));
  }
  return $output;
}

/**
 * Implements hook_bootstrap_based_theme().
 */
function maelstrom_bootstrap_bootstrap_based_theme() {
  return array('maelstrom_bootstrap' => TRUE);
}

function maelstrom_bootstrap_js_alter(&$javascript) {
  unset($javascript['sites/all/modules/obiba_mica/obiba_mica_commons/js/obiba-mica-commons-got-top.js']);
}

/**
 * Implements hook_preprocess_html().
 */
function maelstrom_bootstrap_preprocess_html(&$variables) {

  $current_path = current_path();
  drupal_add_js(path_to_theme() . '/js/app.js');
  switch ($current_path) {
    case 'contact':

      drupal_add_js('http://maps.google.com/maps/api/js?sensor=true', array('type' => 'external'));
      drupal_add_js(path_to_theme() . '/js/plugins/gmap.js');
      drupal_add_js(path_to_theme() . '/js/pages/page_contacts.js');
      break;
    default :
      if (drupal_is_front_page()) {
        drupal_add_js(path_to_theme() . '/plugins/flexslider/jquery.flexslider-min.js');
        drupal_add_js(path_to_theme() . '/js/plugins/layer-slider.js');
        drupal_add_js(path_to_theme() . '/js/plugins/fancy-box.js');
        drupal_add_js(path_to_theme() . '/js/plugins/revolution-slider.js');
        drupal_add_js(path_to_theme() . '/js/custom.js');
      }

  }
  drupal_add_css('https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700,700italic', array('type' => 'external'));
  $variables['classes_array'][] = 'header-fixed';
}

function maelstrom_bootstrap_letters_badge_title() {
  $current_item = explode('/', drupal_get_path_alias());

  if (drupal_get_http_header('status') == '404 Not Found') {
    return 'mael-not-found';
  }

  if (drupal_get_http_header('status') == '403 Forbidden') {
    return 'mael-not-allowed';
  }

  if (!empty($current_item[0]) && $current_item[0] == 'contact') {
    return 'mael-contact';
  }

  if (!empty($current_item[0]) && $current_item[0] == 'about') {
    return 'mael-about';
  }

  if (!empty($current_item[0]) && $current_item[0] == 'platform') {
    return 'mael-platform';
  }

  if (!empty($current_item[0]) && $current_item[0] == 'repository') {
    return 'mael-repository';
  }

  if (!empty($current_item[0]) && $current_item[0] == 'partnerships') {
    return 'mael-partnerships';
  }

  if (!empty($current_item[0]) && $current_item[0] == 'contact') {
    return 'mael-contact';
  }

  if (!empty($current_item[0]) && $current_item[0] != 'mica') {
    return 'X';
  }

  if (!empty($current_item[1])) {
    if ((!empty($current_item[2]) && strstr($current_item[2], 'study-')) || strstr($current_item[1], 'study-')) {
      return 'D';
    }
    if ((!empty($current_item[2]) && strstr($current_item[2], 'harmonization-')) ||
      strstr($current_item[1], 'harmonization-')
    ) {
      return 'D-h';
    }
    if (strstr($current_item[1], 'datasets')) {
      return 'D';
    }
    if (strstr($current_item[1], 'coverage')) {
      return 'taxonomy';
    }

    elseif (strstr($current_item[1], 'search')) {
      if (!empty($_GET['type'])) {
        return drupal_strtoupper(drupal_substr($_GET['type'], 0, 1));
      }
      else {
        return 'V';
      }
    }
    else {
      return drupal_strtoupper(drupal_substr($current_item[1], 0, 1));
    }
  }
  else {
    return 'X';
  }
}

/**
 * Implements hook_preprocess_page().
 *
 * @see page.tpl.php
 */
function maelstrom_bootstrap_preprocess_page(&$variables) {
  //add badge letter
  $first_letter_title = maelstrom_bootstrap_letters_badge_title();
  if (!empty($first_letter_title)) {
    $variables['classes_array']['title_page'] = maelstrom_bootstrap_letters_badge_title();
  }
  drupal_add_js('misc/jquery.cookie.js', 'file');
  // Add information about the number of sidebars.
  if (!empty($variables['page']['facets']) && !empty($variables['page']['sidebar_second'])) {
    $variables['content_column_class'] = ' class="col-sm-6"';
  }
  elseif (!empty($variables['page']['facets']) || !empty($variables['page']['sidebar_second'])) {
    $variables['content_column_class'] = ' class="col-sm-9"';
  }
  // Add information about the number of sidebars.
  elseif (!empty($variables['page']['sidebar_first']) && !empty($variables['page']['sidebar_second'])) {
    $variables['content_column_class'] = ' class="col-sm-6"';
  }
  elseif (!empty($variables['page']['sidebar_first']) || !empty($variables['page']['sidebar_second'])) {
    $variables['content_column_class'] = ' class="col-sm-9"';
  }

  else {
    $variables['content_column_class'] = ' class="col-sm-12"';
  }
}

/**
 * Overrides theme_menu_local_action().
 */
function maelstrom_bootstrap_menu_local_action($variables) {
  dpm($variables);
  $link = $variables['element']['#link'];

  $options = isset($link['localized_options']) ? $link['localized_options'] : array();

  // If the title is not HTML, sanitize it.
  if (empty($options['html'])) {
    $link['title'] = check_plain($link['title']);
  }

  $icon = _bootstrap_iconize_button($link['title']);

  // Format the action link.
  $output = '<li>';
  if (isset($link['href'])) {
    // Turn link into a mini-button and colorize based on title.
    if ($class = _bootstrap_colorize_button($link['title'])) {
      if (!isset($options['attributes']['class'])) {
        $options['attributes']['class'] = array();
      }
      $string = is_string($options['attributes']['class']);
      if ($string) {
        $options['attributes']['class'] = explode(' ', $options['attributes']['class']);
      }
      $options['attributes']['class'][] = 'btn';
      //$options['attributes']['class'][] = 'btn-xs';
      $options['attributes']['class'][] = $class;
      if ($string) {
        $options['attributes']['class'] = implode(' ', $options['attributes']['class']);
      }
    }
    // Force HTML so we can add the icon rendering element.
    $options['html'] = TRUE;
    $output .= l($icon . $link['title'], $link['href'], $options);
  }
  else {
    $output .= $icon . $link['title'];
  }
  $output .= "</li>\n";

  return $output;
}

function maelstrom_bootstrap_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    // Prevent dropdown functions from being added to management menu so it
    // does not affect the navbar module.
    if (($element['#original_link']['menu_name'] == 'management') && (module_exists('navbar'))) {
      $sub_menu = drupal_render($element['#below']);
    }
    elseif ((!empty($element['#original_link']['depth'])) && ($element['#original_link']['depth'] == 1)) {
      // Add our own wrapper.
      unset($element['#below']['#theme_wrappers']);
      $sub_menu = '<ul class="dropdown-menu">' . drupal_render($element['#below']) . '</ul>';
      // Generate as standard dropdown.
      //$element['#title'] .= ' <span class="caret"></span>';
      $element['#attributes']['class'][] = 'dropdown';
      $element['#localized_options']['html'] = TRUE;

      // Set dropdown trigger element to # to prevent inadvertant page loading
      // when a submenu link is clicked.
      $element['#localized_options']['attributes']['data-target'] = '#';
      $element['#localized_options']['attributes']['class'][] = 'dropdown-toggle';
      $element['#localized_options']['attributes']['data-toggle'] = 'dropdown';
    }
  }
  // On primary navigation menu, class 'active' is not set on active menu item.
  // @see https://drupal.org/node/1896674
  if (($element['#href'] == $_GET['q'] || ($element['#href'] == '<front>' && drupal_is_front_page())) && (empty($element['#localized_options']['language']))) {
    $element['#attributes']['class'][] = 'active';
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}