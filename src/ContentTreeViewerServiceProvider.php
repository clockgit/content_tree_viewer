<?php

namespace Drupal\content_tree_viewer;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\Finder\Finder;

/**
 * Defines a service provider for the Content tree viewer module.
 */
class ContentTreeViewerServiceProvider extends ServiceProviderBase {
  public function register(ContainerBuilder $container) {
    $containerModules = $container->getParameter('container.modules');
    $finder = new Finder();

    $foldersWithServiceContainers = [];

    $foldersWithServiceContainers['Drupal\content_tree_viewer\Services\\'] = $finder->in(dirname($containerModules['content_tree_viewer']['pathname']) . '/src/')->files()->name('*.php');

    foreach ($foldersWithServiceContainers as $namespace => $files) {
      foreach ($files as $fileInfo) {
        // remove .php extension from filename
        $class = $namespace . substr($fileInfo->getFilename(), 0, -4);
        // don't override any existing service
        if ($container->hasDefinition($class)) {
          continue;
        }
        $definition = new Definition($class);
        $definition->setAutowired(TRUE);
        $container->setDefinition($class, $definition);
      }
    }
  }
}
