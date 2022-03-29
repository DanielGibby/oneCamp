<?php

namespace Drupal\color_picker\Element;

use Drupal\Core\Render\Element;
use Drupal\Core\Render\Element\FormElement;

/**
 * Provides a colour picker field form element.
 *
 * Properties:
 * - #colour_values: A comma separated list of hex codes.
 *
 * Usage example:
 * @code
 * $form['colour'] = array(
 *   '#type' => 'color_picker',
 *   '#title' => $this->t('Colour'),
 *   '#color_values' => '#000000,#ffffff',
 *   '#default_value' => '#000000',
 *   '#required' => TRUE,
 * );
 * @endcode
 *
 * @see \Drupal\Core\Render\Element\Color
 * @see \Drupal\Core\Render\Element\Email
 * @see \Drupal\Core\Render\Element\MachineName
 * @see \Drupal\Core\Render\Element\Number
 * @see \Drupal\Core\Render\Element\Password
 * @see \Drupal\Core\Render\Element\PasswordConfirm
 * @see \Drupal\Core\Render\Element\Range
 * @see \Drupal\Core\Render\Element\Tel
 * @see \Drupal\Core\Render\Element\Url
 *
 * @FormElement("color_picker")
 */
class ColorPicker extends FormElement {

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    $class = get_class($this);
    return [
      '#input' => TRUE,
      '#size' => 7,
      '#maxlength' => 7,
      '#pattern' => '#([A-Fa-f0-9]{6})',
      '#process' => [
        [$class, 'processAjaxForm'],
        [$class, 'processPattern'],
      ],
      '#pre_render' => [
        [$class, 'preRenderColorPicker'],
      ],
      '#theme' => 'color_picker',
      '#theme_wrappers' => ['form_element'],
      '#attached' => [
        'library' => ['color_picker/color_picker'],
      ],
    ];
  }

  /**
   * Prepares a 'color_picker' render element for colour-element.html.twig.
   *
   * @param array $element
   *   An associative array containing the properties of the element.
   *
   * @return array
   *   The $element with prepared variables ready for input.html.twig.
   */
  public static function preRenderColorPicker(array $element) {
    $element['#attributes']['type'] = 'text';
    Element::setAttributes($element, [
      'id',
      'name',
      'value',
      'size',
      'maxlength',
      'color_values',
    ]);
    static::setAttributes($element, ['form-color-picker']);

    return $element;
  }

}
