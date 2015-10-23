<?php

/**
 * @file
 * Contains Drupal\hugs\Plugin\Block\HugStatus.
 */

namespace Drupal\hugs\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'HugStatus' block.
 *
 * @Block(
 *  id = "hug_status",
 *  admin_label = @Translation("Hug status"),
 * )
 */
class HugStatus extends BlockBase {


  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['hug_status']['#markup'] = 'Implement HugStatus.';

    return $build;
  }

}
