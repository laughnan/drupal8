<?php

/**
 * @file
 * Contains Drupal\hugs\Controller\HugsController.
 */

namespace Drupal\hugs\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\hugs\HugTracker;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class HugsController.
 *
 * @package Drupal\hugs\Controller
 */
class HugsController extends ControllerBase {
  protected $hugTracker;

  public function __construct(HugTracker $tracker) {
    $this->hugTracker = $tracker;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('hugs.hug_tracker')
    );
  }


  /**
   * Hug.
   *
   * @return string
   *   Return Hello string.
   */
  public function hug($from, $to, $count) {
    if (!$count) {
      $count = $this->config('hugs.hugconfig')->get('count');
    }
    if ($from == "") {
      $from = $this->config('hugs.hugconfig')->get('default_from');
    }

    $this->hugTracker->addHug($to);

    return [
      '#theme' => 'hug_page',
      '#to' => $to,
      '#from' => $from,
      '#count' => $count,
    ];
  }
}
