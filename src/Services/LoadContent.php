<?php

namespace Drupal\content_tree_viewer\Services;

use Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException;
use Drupal\Component\Plugin\Exception\PluginNotFoundException;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Session\AccountInterface;

class LoadContent {
  protected \Drupal\Core\Entity\EntityStorageInterface $nodeStorage;
  protected AccountInterface $currentUser;

  /**
   * @param EntityTypeManagerInterface $entity_type_manager
   * @param AccountInterface $current_user
   * @throws InvalidPluginDefinitionException
   * @throws PluginNotFoundException
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager, AccountInterface $current_user) {
    $this->nodeStorage = $entity_type_manager->getStorage('node');
    $this->currentUser = $current_user;
  }

  /**
   * @return string[]
   */
  public function hello(): array {
    return ['hello'];
  }
}
