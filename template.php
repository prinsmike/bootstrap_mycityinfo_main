<?php

/**
 * Returns HTML for a button form element.
 */
function bootstrap_mycityinfo_main_button($variables) {
  $element = $variables['element'];
  $label = $element['#value'];
  element_set_attributes($element, array('id', 'name', 'value', 'type'));

  $element['#attributes']['class'][] = 'form-' . $element['#button_type'];
  if (!empty($element['#attributes']['disabled'])) {
    $element['#attributes']['class'][] = 'form-button-disabled';
  }
  if (in_array('fbss-comments-submit', $element['#attributes']['class'])) {
  	return '<input' . drupal_attributes($element['#attributes']) . ">\n";
  }
  if (in_array('statuses-submit', $element['#attributes']['class'])) {
    return '<input' . drupal_attributes($element['#attributes']) . ">\n";
  }

  // Prepare input whitelist - added to ensure ajax functions don't break
  $whitelist = _bootstrap_element_whitelist();

  if (isset($element['#id']) && in_array($element['#id'], $whitelist)) {
    return '<input' . drupal_attributes($element['#attributes']) . ">\n"; // This line break adds inherent margin between multiple buttons
  }
  else {
    return '<button' . drupal_attributes($element['#attributes']) . '>'. $label ."</button>\n"; // This line break adds inherent margin between multiple buttons
  }
}