<?php

/**
 * @file
 * Contains Drupal\hugs\Controller\HugsController.
 */

namespace Drupal\hugs\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class HugsController.
 *
 * @package Drupal\hugs\Controller
 */
class HugsController extends ControllerBase {
  /**
   * Hug.
   *
   * @return string
   *   Return Hello string.
   */
  public function hug($from, $to) {
    return [
        '#type' => 'markup',
        '#markup' => $this->t('Implement method: hug with parameter(s): $from, $to')
    ];
  }

}
