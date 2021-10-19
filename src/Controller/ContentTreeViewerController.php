<?php

namespace Drupal\content_tree_viewer\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Content Tree Viewer routes.
 */
class ContentTreeViewerController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }

}
