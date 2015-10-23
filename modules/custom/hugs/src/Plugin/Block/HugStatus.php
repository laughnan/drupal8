<?php

/**
 * @file
 * Contains Drupal\hugs\Plugin\Block\HugStatus.
 */

namespace Drupal\hugs\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\hugs\HugTracker;

/**
 * Provides a 'HugStatus' block.
 *
 * @Block(
 *  id = "hug_status",
 *  admin_label = @Translation("Hug status"),
 * )
 */
class HugStatus extends BlockBase implements ContainerFactoryPluginInterface {

  protected $hugTracker;

  public function __construct(array $configuration, $plugin_id, $plugin_definition, HugTracker $hugTracker) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->hugTracker = $hugTracker;
  }

  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration, $plugin_id, $plugin_definition, $container->get('hugs.hug_tracker')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['enabled'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Hugging enabled'),
      '#description' => $this->t('Check for Hugging enabled website'),
      '#default_value' => isset($this->configuration['enabled']) ? $this->configuration['enabled'] : '',
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['enabled'] = $form_state->getValue('enabled');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
//    $build = [];
//    $build['hug_status_enabled']['#markup'] = '<p>' . $this->configuration['enabled'] . '</p>';

//    $message = $this->configuration['enabled']
//      ? $this->t('Now accepting hugs')
//      : $this->t('No hugs :(');

    $message = $this->t('@to was the last person hugged', ['@to' => $this->hugTracker->getLastRecipient()]);

    // Set max-age to 0 so that it is not cached.
    return ['#markup' => $message, '#cache' => array('max-age'=> 0)];
  }

}
