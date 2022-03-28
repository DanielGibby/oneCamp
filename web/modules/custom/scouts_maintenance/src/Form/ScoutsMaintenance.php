<?php

namespace Drupal\scouts_maintenance\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * DTS settings form.
 */
class ScoutsMaintenance extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'scouts_maintenance';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    // Form constructor.
    $form = parent::buildForm($form, $form_state);
    // Default settings.
    $config = $this->config('scouts_custom.scouts_maintenance');

    $form['fee_master_switch'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Show fee info on all course pages'),
      '#default_value' => $config->get('fee_master_switch'),
      '#description' => $this->t("Get out of jail card. Show or hide the fee information?"),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'scouts_maintenance',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    // Retrieve the configuration.
    $this->configFactory->getEditable('scouts_custom.maintenance')
      ->set('fee_master_switch', $form_state->getValue('fee_master_switch'))
      ->save();
  }

}
