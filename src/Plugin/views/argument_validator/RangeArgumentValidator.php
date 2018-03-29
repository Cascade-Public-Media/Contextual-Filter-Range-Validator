<?php

namespace Drupal\contextual_filter_range_validator\Plugin\views\argument_validator;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\argument_validator\ArgumentValidatorPluginBase;

/**
 * Validate whether an argument falls within a specified range.
 *
 * @ingroup views_argument_validate_plugins
 *
 * @ViewsArgumentValidator(
 *   id = "range",
 *   title = @Translation("Range")
 * )
 */
class RangeArgumentValidator extends ArgumentValidatorPluginBase {

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    $form['range_min'] = array(
      '#type' => 'number',
      '#title' => $this->t('Minimum value'),
      '#description' => $this->t('Inclusive. Leave blank for no minimum.'),
      '#default_value' => (isset($this->options['range_min'])
        ? $this->options['range_min'] : ''),
    );
    $form['range_max'] = array(
      '#type' => 'number',
      '#title' => $this->t('Maximum value'),
      '#description' => $this->t('Inclusive. Leave blank for no maximum.'),
      '#default_value' => (isset($this->options['range_max'])
        ? $this->options['range_max'] : ''),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function validateArgument($argument) {
    $options = $this->options;
    if (!empty($options['range_min']) || $options['range_min'] == '0') {
      $min = (float)$options['range_min'];
    }
    if (!empty($options['range_max']) || $options['range_max'] == '0') {
      $max = (float)$options['range_max'];
    }

    if (is_numeric($argument)) {
      $val = (float)$argument;
      if (isset($min) && isset($max) && $val >= $min && $val <= $max) {
        return true;
      }
      elseif (isset($min) && $val >= $min) {
        return true;
      }
      elseif (isset($max) && $val <= $max) {
        return true;
      }
    }

    return false;
  }

}
