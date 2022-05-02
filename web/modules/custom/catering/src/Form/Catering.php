<?php

namespace Drupal\catering\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * DTS settings form.
 */
class Catering extends ConfigFormBase
{

  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'catering';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {

    // Form constructor.
    $form = parent::buildForm($form, $form_state);
    // Default settings.
    $config = $this->config('scouts_custom.catering');


    $form['show_on_homepage'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Show this module link on the homepage'),
      '#default_value' => $config->get('show_on_homepage'),
      '#description' => $this->t("If you want this module to display on the homepage, select this option and then complete the requirements below."),
    ];

    $form['settings'] = [
      '#type' => 'vertical_tabs',
      '#default_tab' => 'module_settings',
    ];
    $form['module_settings'] = [
      '#type' => 'details',
      '#title' => $this->t('Module settings'),
      '#group' => 'settings',
    ];

    $form['module_settings']['homepage_title'] = [
      '#type' => 'textfield',
      '#maxlength' => 255,
      '#title' => $this->t('Title'),
      '#default_value' => $config->get('homepage_title'),
      '#description' => $this->t('Set the title you want to use for the link on the homepage.'),
    ];

    $form['module_settings']['homepage_link_path'] = [
      '#type' => 'textfield',
      '#maxlength' => 255,
      '#title' => $this->t('URL'),
      '#default_value' => $config->get('homepage_link_path'),
      '#description' => $this->t('The path, or URL you want to link this to.'),
    ];

    $form['module_settings']['homepage_icon'] = [
      '#type' => 'textfield',
      '#maxlength' => 255,
      '#title' => $this->t('Font awesome icon'),
      '#default_value' => $config->get('homepage_icon'),
      '#description' => $this->t('The class from FontAwesome to use as the icon.'),
    ];


    // Get all current user roles
    $roles = \Drupal\user\Entity\Role::loadMultiple();

    $user_labels = [];

    foreach ($roles as $role) {
      $user_labels[$role->get('id')] = $role->get('label');
    }

    $form['user_settings'] = [
      '#type' => 'details',
      '#title' => $this->t('User access settings'),
      '#group' => 'settings',
    ];

    $form['user_settings']['user_access_by_role'] = array(
      '#type' => 'checkboxes',
      '#options' => $user_labels,
      '#default_value' => $config->get('user_access_by_role'),
      '#title' => $this->t('Access by user'),
      '#description' => $this->t('Give access to this module to these roles.'),
    );

    $form['custom_settings'] = [
      '#type' => 'details',
      '#title' => $this->t('Module specific settings'),
      '#group' => 'settings',
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames()
  {
    return [
      'catering',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state)
  {
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    // Retrieve the configuration.
    $this->configFactory->getEditable('scouts_custom.catering')
      ->set('show_on_homepage', $form_state->getValue('show_on_homepage'))
      ->set('homepage_title', $form_state->getValue('homepage_title'))
      ->set('homepage_link_path', $form_state->getValue('homepage_link_path'))
      ->set('homepage_icon', $form_state->getValue('homepage_icon'))
      ->set('user_access_by_role', $form_state->getValue('user_access_by_role'))
      ->save();
  }
}
