<?php

/**
 * @file
 * Contains Drupal\hugs\Form\HugConfigForm.
 */

namespace Drupal\hugs\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class HugConfigForm.
 *
 * @package Drupal\hugs\Form
 */
class HugConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'hugs.hugconfig'
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'hug_config_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('hugs.hugconfig');
    $form['count'] = array(
      '#type' => 'number',
      '#title' => $this->t('Count'),
      '#description' => $this->t('Default hug count'),
      '#default_value' => $config->get('count'),
    );

    $form['default_from'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Default From'),
      '#description' => $this->t('Default from first name'),
      '#default_value' => $config->get('default_from'),
      '#size' => 30,
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('hugs.hugconfig')
      ->set('count', $form_state->getValue('count'))
      ->set('default_from', $form_state->getValue('default_from'))
      ->save();
  }

}
