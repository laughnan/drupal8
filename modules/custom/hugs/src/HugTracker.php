<?php

/**
 * @file
 * Contains Drupal\hugs\HugTracker.
 */

namespace Drupal\hugs;

use Drupal\Core\State\State;

/**
 * Class HugTracker.
 *
 * @package Drupal\hugs
 */
class HugTracker {

  /**
   * Drupal\Core\State\State definition.
   *
   * @var Drupal\Core\State\State
   */
  protected $state;

  /**
   * Constructor.
   */
  public function __construct(State $state) {
    $this->state = $state;
  }

  public function addHug($target_name) {
    $this->state->set('hugs.last_recipient', $target_name);
    return $this;
  }

  public function getLastRecipient() {
    return $this->state->get('hugs.last_recipient');
  }

}
